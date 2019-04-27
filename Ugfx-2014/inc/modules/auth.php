<?php

class Auth{
	public $User;
	private $Smarty;
	private $Config;
	private $Mysqli;
	
	public function __construct(){
		global $Mysqli, $Smarty, $Config;
		
		$this->Config = $Config;
		$this->Mysqli = $Mysqli;
		$this->Smarty = isset($Smarty)?$Smarty:null;
	}
	
	private function login(){
		$email = strtolower(request($_POST,'email','str',''));
		$pass = request($_POST,'pass','str','');
		
		$sql = "SELECT * FROM `users` WHERE `email`='{$email}';";
		if($result = $this->Mysqli->query($sql)->fetch_assoc()){
			$md5_pass = md5($pass);
			if($result['pass'] == $md5_pass){
				$result['pass'] = null;
				$this->User = $result;
				
				return true;
			}else return false;
		}else return false;
	}
	
	private function register(){
		$email = strtolower(request($_POST,'email','email',''));
		$pass = request($_POST,'pass','str','');
		$pass_verify = request($_POST,'pass_verify','str','');
		
		//!check values
		if(empty($email)) return array('status' => 0, 'text' => 'Неправильно введен email.');
		if(empty($pass)){
			return array('status' => 0, 'text' => 'Не введен пароль.');
		}
		$passlen = strlen($pass);
		
		if($passlen < 8){
			return array('status' => 0, 'text' => 'Минимальная длина пароля - 8 символов.');
		}
		if($passlen > 16){
			return array('status' => 0, 'text' => 'Максимальная длина пароля - 16 символов.');
		}
		if($pass != $pass_verify){
			return array('status' => 0, 'text' => 'Пароль и подтверждение пароля не совпадают.');
		}
		//check values
		
		if($this->Mysqli->query("SELECT `id` FROM `users` WHERE `email`='{$email}';")->fetch_row()){
			return array('status' => 0, 'text' => 'Пользователь с таким email\'ом был зарегистрирован ранее.');
		}
		
		$md5pass = md5($pass);
		if($this->Mysqli->query("INSERT INTO `users`(`pass`,`email`) VALUES ('{$md5pass}','{$email}');")){
			return array('status' => 1, 'text' => 'Регистрация прошла успешно. Данные: '.$email.':'.$pass);
		}else return array('status' => 0, 'text' => 'Запрос на регистрацию не прошел. Обратитесь к администратору.');
	}
	
	public function changeEmail($user_id,$email){
		if($this->Mysqli->query("SELECT `id` FROM `users` WHERE `email`='{$email}' AND `id`!='{$user_id}';")->fetch_row()){
			throw new Exception('Пользователь с таким email\'ом уже зарегистрирован.');
		}

		$this->Mysqli->query("UPDATE `users` SET `email`='{$email}' WHERE `id`='{$user_id}';");
	}

	public function changeEmailOld(){
		if(!$email = request($_POST, 'user_email', 'str', '')) return false;
		$user_id = $this->User['id'];

		if($this->Mysqli->query("SELECT `id` FROM `users` WHERE `email`='{$email}';")->fetch_row()){
			return false;
		}

		$query = $this->Mysqli->query("UPDATE `users` SET `email`='{$email}' WHERE `id`='{$user_id}';");

		return true;
	}

	public function getUserIdByEmail($email){
		if($user = $this->Mysqli->query("SELECT `id` FROM `users` WHERE `email`='{$email}';")->fetch_assoc()){
			return $user['id'];
		}

		return false;
	}

	public function addRecoveryToken($user_id){
		$md5 = md5(uniqid($this->Config['recovery_salt']));

		$sql = "UPDATE `users` SET `recovery_token`='{$md5}',`recovery_datetime`=ADDDATE(NOW(),'1') WHERE `id`={$user_id};";
		$this->Mysqli->query($sql);

		return $md5;
	}

	public function checkRecoveryToken($user_id,$token){
		if($this->Mysqli->query("SELECT `id` FROM `users` WHERE `id`='{$user_id}' AND `recovery_token`='{$token}' AND `recovery_datetime`>NOW();")->fetch_assoc()){
			return true;
		}else return false;
	}

	public function clearRecoveryToken($user_id){
		$this->Mysqli->query("UPDATE `users` SET `recovery_token`='' WHERE `id`='{$user_id}';");
	}
	
	public function getUserLoginById($user_id){
		$user_id = (int)$user_id;
		
		if($result = $this->Mysqli->query("SELECT `email` FROM `users` WHERE `id`='{$user_id}';")->fetch_row()){
			return $result[0];
		}
		
		return null;
	}

	public function getUserDataById($user_id,$fields='*'){
		$user_id = (int)$user_id;

		$fields_list = $fields;
		if(is_array($fields)) $fields_list = '`'.implode('`,`').'`';
		if($result = $this->Mysqli->query("SELECT {$fields_list} FROM `users` WHERE `id`='{$user_id}';")->fetch_row()){
			return $result[0];
		}

		return null;
	}

	public function changePasswordCheckValues($user_id){
		$pass = request($_POST, 'user_pass', 'str', '', 'min|8,max|16');
		$pass_verify = request($_POST, 'user_pass_verify', 'str', '');
		if($pass != $pass_verify) throw new Exception('Пароль и подтверждение пароля не совпадают.');

		$this->changePassword($pass, $user_id);
	}
	
	public function changePassword($pass, $user_id=false){
		$pass = md5($pass);
		$this->Mysqli->query("UPDATE `users` SET `pass`='{$pass}' WHERE `id`='{$user_id}';");
		
		return true;
	}

	public function changePasswordOld($pass, $pass_verify, $user_id=false){
		if (empty($pass) || empty($pass_verify)) {
			return array('status' => 0, 'text' => 'Не все поля заполнены.');
		}
		$passlen = strlen($pass);
		if ($passlen < 8) {
			return array('status' => 0, 'text' => 'Минимальная длинна пароля - 8 символов.');
		}
		if ($passlen > 16) {
			return array('status' => 0, 'text' => 'Максимальная длинна пароля - 16 символов.');
		}
		if ($pass != $pass_verify) {
			return array('status' => 0, 'text' => 'Пароль и подтверждение пароля не совпадают.');
		}
		if (!preg_match('/^[0-9a-z\!\@\#\$\%\^\&\*\(\)\-\=\_\?\:\;\№]+$/i', $pass)) {
			return array('status' => 0, 'text' => 'Пароль содержит запрещенные символы.');
		}

		if(!$user_id) $user_id = $this->User['id'];
		$pass = md5($pass);
		$query = $this->Mysqli->query("UPDATE `users` SET `pass`='{$pass}' WHERE `id`='{$user_id}';");

		if($this->Mysqli->query("SELECT `id` FROM `users` WHERE `pass`='{$pass}' AND `id`='{$user_id}';")->fetch_row()){
			return array('status' => 1, 'text' => 'Пароль успешно изменен.');
		}

		return array('status' => 0, 'text' => 'Неизвестная ошибка. Обратитесь к администратору.');
	}
	
	public function isAuthorised($returndata=false){
		$user_id = request($_COOKIE, 'user_id', 'int', 0);
		$hashkey = request($_COOKIE, 'hashkey', 'str', '');
		
		if(!$user_id || !$hashkey) return false;
		
		if($result = $this->Mysqli->query("SELECT * FROM `user_sessions` WHERE `user_id`='{$user_id}' AND `hashkey`='{$hashkey}';")->fetch_assoc()){
			if($user = $this->Mysqli->query("SELECT * FROM `users` WHERE `id`='{$user_id}';")->fetch_assoc()){
				$result['pass'] = null;
				$this->User = $user;
				
				return $returndata?array('user_id' => $user_id, 'hashkey' => $hashkey):true;
			}
		}
		
		return false;
	}
	
	public function isAdmin(){
		return ($this->User['type'] == 1)?true:false;
	}
	
	public function loginPage(){
		global $SUBMIT;
		$showform = true;
		
		if($SUBMIT){
			if($this->login()){
				$user_id = $this->User['id'];
				$hashkey = md5(uniqid().$this->Config['salt']);
				
				$this->Mysqli->query("INSERT INTO `user_sessions`(`user_id`, `hashkey`, `ip`, `datetime`) VALUES ('{$user_id}', '{$hashkey}', '{$_SERVER['REMOTE_ADDR']}', NOW());");
				
				setcookie('user_id', $user_id);
				setcookie('hashkey', $hashkey);
				
				header('Location: '.$this->Config['adminpanel_url']);
				$showform = false;
			}else{
				$this->Smarty->assign('error', 'Неправильно введены данные.');
			}
		}
		
		if($showform){
			$this->Smarty->display('login_page.tpl');
		}
	}
	
	public function logout(){
		if(!is_array($data = $this->isAuthorised(true))) exit;
		
		$this->Mysqli->query("DELETE FROM `user_sessions` WHERE `user_id`='{$data['user_id']}' AND `hashkey`='{$data['hashkey']}';");
		
		setcookie('user_id', '');
		setcookie('hashkey', '');
		header('Location: '.$this->Config['adminpanel_url']);
		exit;
	}
	
	public function registerPage(){
		global $SUBMIT;
		$showform = true;
		
		if($SUBMIT){
			$result = $this->register();
			if($result['status'] == 0) $this->Smarty->assign('error', $result['text']);
			elseif($result['status'] == 1){
				$this->Smarty->assign('good', $result['text']);
			}else $this->Smarty->assign('error', 'Неизвестная ошибка, сообщите администратору.');
		}
		
		if($showform){
			$this->Smarty->display('register_page.tpl');
		}
	}
	
	public function recoveryPage($action){
		global $SUBMIT;

		$error = false;
		$success = false;
		try {
			if ($action == 'newpass') {
				if (!$user_id = request($_GET, 'user_id', 'int', false)) exitTo();
				if (!$token = request($_GET, 'token', 'str', false)) exitTo();

				if($SUBMIT){
					if(!$this->checkRecoveryToken($user_id,$token)) throw new Exception('Ссылка на восставновление пароля устарела или была использована ранее.');
					$result = $this->changePasswordCheckValues($user_id);

					if($result['status'] == 1) {
						$this->clearRecoveryToken($user_id);
						$success = true;
					}
					else throw new Exception($result['text']);
				}
			} else {
				if ($SUBMIT) {
					if(!$email = request($_POST, 'email', 'email', false)) throw new Exception('Неправильно введен email');
					if(!$user_id = $this->getUserIdByEmail($email)) throw new Exception('Пользователь с данным Email\'ом не найден');

					$token = $this->addRecoveryToken($user_id);

					$url = 'http://' . $_SERVER['HTTP_HOST'] . '/recovery?action=newpass&token='.$token.'&user_id='.$user_id;
					$message = <<<MESSAGE
Для восстановления пароля перейдите по следующей ссылке:
{$url}
MESSAGE;

					notifyUserByEmail($email, $message);
					$success = true;
				}
			}
		}catch(Exception $e){
			$error = $e->getMessage();
		}

		$this->Smarty->assign('error',$error);
		$this->Smarty->assign('success',$success);
		$this->Smarty->assign('action',$action);
		$this->Smarty->display('recovery_page.tpl');
	}
}
?>