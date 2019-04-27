<?php
class ViewAjax
{
	private $Mysqli;
	private $Config;
	private $Auth;
	private $Model;

	public function __construct()
	{
		global $Mysqli, $Config, $Auth;

		$this->Mysqli = $Mysqli;
		$this->Config = $Config;
		$this->Auth = $Auth;
		$this->Model = new Model();
	}

	public function _view($name)
	{
		try {
			$action = $name . 'Ajax';
			if (is_callable(array($this, $action))) {
				$this->$action();
			} else answer(404);
		} catch (Exception $e) {
			answer(400, $e->getMessage());
			//.print_r($_POST,!0)
		}
	}

	public function change_user_emailAjax(){
		if(!$this->Auth->isAuthorised()) answer(403);

		if(!$user_id = request($_POST, 'user_id', 'int',false)) answer(400,'Неправильный номер пользователя.');
		if($this->Auth->User['id'] != $user_id && !$this->Auth->isAdmin()) answer(403);
		if(!$email = request($_POST, 'user_email', 'email', '')) throw new Exception('Неправильно введен email.');

		$this->Auth->changeEmail($user_id,$email);
		answer(200,'Email успешно изменен.');
	}

	public function change_passAjax(){
		if(!$this->Auth->isAuthorised()) answer(403);

		if(!$user_id = request($_POST, 'user_id', 'int',false)) answer(400,'Неправильный номер пользователя.');
		if($this->Auth->User['id'] != $user_id && !$this->Auth->isAdmin()) answer(403);

		$this->Auth->changePasswordCheckValues($user_id);
		answer(200,'Пароль успешно изменен.');
	}

	public function get_project_selectizeAjax(){
		if(!$this->Auth->isAdmin()) exit();

		$projects = array();
		$domain = request($_GET,'q','str','');

		$query = $this->Mysqli->query("SELECT `id`,`domain` FROM `projects` WHERE `domain` LIKE '%{$domain}%';");
		while($row = $query->fetch_assoc()){
			$projects[] = $row;
		}

		echo json_encode($projects);
	}

	public function get_users_selectizeAjax(){
		if(!$this->Auth->isAdmin()) exit();

		$users = array();
		$email = request($_GET, 'q', 'email', '');

		$query = $this->Mysqli->query("SELECT `id`,`email` FROM `users` WHERE `email` LIKE '%{$email}%';");
		while($row = $query->fetch_assoc()){
			$users[] = $row;
		}

		echo json_encode($users);
	}

	public function set_project_ownerAjax(){
		if(!$this->Auth->isAdmin()) answer(403);
		if(!$project_id = request($_POST,'project_id','int',0)) throw new Exception('Неправильный id проекта.');
		if(!$project_owner_id = request($_POST,'project_owner_id','int',0)) throw new Exception('Неправильно задан новый пользователь.');

		$this->Model->setProjectOwner($project_id,$project_owner_id);

		answer(200,'Владелец проекта был успешно изменен.');
	}

	public function set_project_isp_usernameAjax(){
		if(!$this->Auth->isAdmin()) answer(403);
		if(!$project_id = request($_POST,'project_id','int',0)) throw new Exception('Неправильный id проекта.');
		$project_isp_username = request($_POST,'project_isp_username','str','');

		$this->Model->setProjectIspUsername($project_id, $project_isp_username);
		answer(200,'Имя пользователя isp было успешно изменено.');
	}

	public function edit_projectAjax(){
		if(!$project = $this->Model->getProject()) throw new Exception('Не выбран проект.');
		if($project['user_id'] != $this->Auth->User['id'] && !$this->Auth->isAdmin()) answer(403);

		$update_data = array();

		$emails = strtolower(request($_POST,'email','str',''));
		if($emails !== false && $emails != $project['email']){
			$emails_arr = explode(',', $emails);

			$emails_count = count($emails);
			//if($emails_count == 0) throw new Exception('Неправильно введен эмейл.');
			if($emails_count > 7) throw new Exception('Максимальное количество эмейлов - 7.');

			foreach($emails_arr as $k=>$v){
				if(!$email = request($emails_arr, $k, 'email', '', 'trim')) throw new Exception('Неправильно введен один из эмейлов.');
			}

			$update_data['email'] = implode(', ',$emails_arr);
		}

		$ym = request($_POST,'ym','str',0,'to_numerical','Номер яндекс метрики');
		if($ym != $project['ym']){
			$update_data['ym'] = $ym;
		}

		$smsru_key = request($_POST,'smsru_key','str','','trim','Ссылка sms.ru');
		$smsru_phone = request($_POST,'smsru_phone','phone','');
		if($smsru_key != $project['smsru_key'] || $smsru_phone != $project['smsru_phone']){
			if(!preg_match('/^[0-9a-z\-]+$/', $smsru_key)) throw new Exception('Неправильно введен API-ключ sms.ru.');

			$update_data['smsru_key'] = $smsru_key;
			$update_data['smsru_phone'] = $smsru_phone;
		}

		$this->Model->editProject($project['id'], $update_data);
		answer(200,'Информация проекта успешно обновлена.');
	}

	public function get_forms_requestsAjax(){
		if(!$project = $this->Model->getProject()) throw new Exception('Не выбран проект.');
		if($project['user_id'] != $this->Auth->User['id'] && !$this->Auth->isAdmin()) answer(403);
		$limit_pos = request($_POST,'limit_pos','int',0);

		$requests = $this->Model->getProjectFormRequests($project['id'], $limit_pos);

		answer(200,$requests);
	}
}