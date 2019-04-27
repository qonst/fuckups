<?php

class Model{
	private $Smarty;
	private $Config;
	private $Mysqli;
	private $Auth;
	 
	public function __construct(){
		global $Mysqli, $Smarty, $Auth, $Config;
	
		$this->Config = $Config;
		$this->Mysqli = $Mysqli;
		$this->Smarty = isset($Smarty)?$Smarty:null;
		$this->Auth = $Auth;
	}
	
	private function createProject($domain, $user_id, $filename, $isp_username, $email, $ym_id, $pages_count, $utm_multipages_flag){
		if(empty($email)) $email = $this->Auth->User['email'];
		$this->Mysqli->query("INSERT INTO `projects`(`domain`, `email`, `user_id`, `version`, `lastupdate_datetime`, `filename`, `isp_username_old`, `isp_username_new`, `ym`, `pages_count`,`utm_multipages_flag`) VALUES ('{$domain}', '{$email}', '{$user_id}', 1, NOW(), '{$filename}', '{$isp_username}', '{$isp_username}', '{$ym_id}', '{$pages_count}', {$utm_multipages_flag});");
		
		$id = $this->Mysqli->insert_id;
		if($id){
			$this->Mysqli->query("INSERT INTO `project_forms_ym`(`project_id`) VALUES ('{$id}');");
			return $id;
		}
			
		return false;
	}
	
	private function updateProject($project_id, $user_id, $filename, $pages_count, $utm_multipages_flag){
		$sql = "UPDATE `projects` SET `lastupdate_user`='{$user_id}', `version`=`version`+1, `lastupdate_datetime`=NOW(), `filename`='{$filename}', `pages_count`='{$pages_count}', `utm_multipages_flag`={$utm_multipages_flag} WHERE `id`='{$project_id}';";
		$this->Mysqli->query($sql);
		
		if($this->Mysqli->affected_rows) return true;
		
		return false;
	}
	
	private function getProjectVersion($project_id){
		if($result = $this->Mysqli->query("SELECT `version` FROM `projects` WHERE `id`='{$project_id}';")->fetch_row()) return $result[0];
		
		return 0;
	}
	
	private function getProjectDomain($project_id){
		if($result = $this->Mysqli->query("SELECT `domain` FROM `projects` WHERE `id`='{$project_id}';")->fetch_row()) return $result[0];
		
		return false;
	}
	
	private function getProjectIspUsername($project_id){
		if($result = $this->Mysqli->query("SELECT `isp_username_new` FROM `projects` WHERE `id`='{$project_id}';")->fetch_row()) return $result[0];
		
		return false;
	}
	
	private function getProjectIdByDomain($project_domain){
		if($result = $this->Mysqli->query("SELECT `id` FROM `projects` WHERE `domain` LIKE '{$project_domain}';")->fetch_row()) return $result[0];
		
		return 0;
	}
	
	private function getProjectYMId($project_id){
		if($result = $this->Mysqli->query("SELECT `ym` FROM `projects` WHERE `id`='{$project_id}';")->fetch_row()) return $result[0];
		
		return false;
	}
	
	/*private function createPage($name, $user_id, $project_id, $filename){
		$this->Mysqli->query("INSERT INTO `project_pages`(`name`, `user_id`, `project_id`, `filename`, `firstpage_id`, `lastpage_id`, `version`, `lastupdate`) VALUES ('{$name}', '{$user_id}', '{$project_id}', '{$filename}', (SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE `table_name` = 'project_pages'), 0, 1, NOW());");
		
		$id = $this->Mysqli->insert_id;
		return $id?$id:false;
	}*/
	
	/*private function updatePage($page_id, $user_id, $filename){
		$this->Mysqli->query("INSERT INTO `project_pages`(`name`, `user_id`, `project_id`, `filename`, `firstpage_id`, `lastpage_id`, `version`, `lastupdate`) SELECT `name`, '{$user_id}', `project_id`, '{$filename}', `firstpage_id`, `id`, `version`+1, NOW() FROM `project_pages` WHERE `id`='{$page_id}';");
		
		$id = $this->Mysqli->insert_id;
		return $id?$id:false;
	}*/
	
	/*private function getProjectFirstPages($project_id){
		$result = array();
		
		$query = $this->Mysqli->query("SELECT `id`, `name` FROM `project_pages` WHERE `project_id`='{$project_id}' GROUP BY `firstpage_id`;");
		while($row = $query->fetch_assoc()){
			$result[] = $row;
		}
		
		return $result;
	}*/
	
	/*private function getLastPage($firstpage_id){
		if($result = $this->Mysqli->query("SELECT `id`, `name` FROM `project_pages` WHERE `firstpage_id`='{$firstpage_id}' ORDER BY `id` DESC LIMIT 1;")->fetch_assoc()){
			return $result;
		}
		return false;
	}*/
	
	private function siteuploadErrorPage($error='Неизвестная ошибка. Обратитесь к администратору.'){
		$this->Smarty->assign('error', $error);
		$this->Smarty->display('siteupload_page.tpl');
		exit;
	}
	
	public function getUserProjects($user_id){
		$user_id = (int)$user_id;
		
		$result = array();
		$query = $this->Mysqli->query("SELECT `id`, `domain` FROM `projects` WHERE `user_id`='{$user_id}';");
		while($row = $query->fetch_assoc()){
			$result[] = $row;
		}
		if(!empty($result)) return $result;
		
		return false;
	}
	
	public function getProjectPagesList($project_id){
		$project_id = (int)$project_id;
		
		$result = array();
		$query = $this->Mysqli->query("SELECT `filename`, `title` FROM `project_pages` WHERE `project_id`='{$project_id}';");
		while($row = $query->fetch_assoc()){
			$row['name'] = str_replace('.html','',$row['filename']);
			$result[] = $row;
		}
		
		return $result;
	}
	
	public function getUserProjectsCount($user_id){
		$user_id = (int)$user_id;
		
		if($result = $this->Mysqli->query("SELECT count(`id`) FROM `projects` WHERE `user_id`='{$user_id}';")->fetch_row()) return $result[0];
		
		return 0;
	}
	
	public function getProject($project_id=false){
		$project_id = ($project_id === false)?request($_COOKIE, 'project_id', 'int', 0):$project_id;
		if(!$project_id) return false;
		
		if($result = $this->Mysqli->query("SELECT * FROM `projects` WHERE `id`='{$project_id}';")->fetch_assoc()){
			return $result;
		}
		
		return false;
	}
	
	public function getProjectIndexPage($project_id){
		$project_id = (int)$project_id;
		
		$result = $this->Mysqli->query("SELECT `title`, `description`, `keywords` FROM `project_pages` WHERE `project_id`='{$project_id}' AND `filename`='index.html';")->fetch_assoc();
		
		return $result;
	}
	
	public function getProjectFormRequests($project_id, $limit_pos=0){
		$result = array();
		$limit_per = $this->Config['requests_per_count']+1;
		$query = $this->Mysqli->query("SELECT * FROM `project_requests` WHERE `project_id`='{$project_id}' ORDER BY `id` DESC LIMIT {$limit_pos},{$limit_per};");
		while($row = $query->fetch_assoc()){
			$result[] = $row;
		}

		if($result){
			$length = count($result);
			$max = $result[0]['id'];
			$min = $result[$length-1]['id'];
			$this->Mysqli->query("UPDATE `project_requests` SET `is_old`=1 WHERE `id`>={$min} AND `id`<={$max};");
		}

		$more = false;
		if($this->Config['requests_per_count'] < count($result)){
			$result = array_slice($result,0,$this->Config['requests_per_count']);
			$more = true;
		}

		return array('result'=>$result,'more'=>$more);
	}
	
	public function editProject($project_id, $update_data){
		if(isset($update_data['email'])){
			if(strlen($update_data['email']) == 0) {
				$owner_email = $this->Mysqli->query("SELECT `u`.`email` FROM `users` `u` INNER JOIN `projects` `p` ON `p`.`user_id`=`u`.`id` WHERE `p`.`id`='{$project_id}';")->fetch_row();
				$update_data['email'] = $owner_email[0];
			}
		}

		$sql_set = '';
		foreach($update_data as $k=>$v){
			$sql_set .= "`{$k}`='{$v}',";
		}
		$sql_set = rtrim($sql_set,',');
		
		if($sql_set) $this->Mysqli->query("UPDATE `projects` SET {$sql_set} WHERE `id`='{$project_id}';");
	}

	public function setProjectEmailOld(){
		$email = request($_POST, 'project_email', 'str', '');
		$project_id = request($_POST, 'project_id', 'int', 0);

		if(empty($email)){
			$row = $this->Mysqli->query("SELECT `email` FROM `users` WHERE `id`=(SELECT `user_id` FROM `projects` WHERE `id`='{$project_id}');")->fetch_row();
			$email = $row[0];
		}

		$this->Mysqli->query("UPDATE `projects` SET `email`='{$email}' WHERE `id`='{$project_id}';");

		return $email;
	}
	
	public function setProjectOwner($project_id,$project_owner){
		$this->Mysqli->query("UPDATE `projects` SET `user_id`='{$project_owner}' WHERE `id`='{$project_id}';");
	}

	public function setProjectOwnerOld(){
		$project_id = request($_POST, 'project_id', 'int', 0);
		$project_owner = request($_POST, 'project_owner', 'int', 0);

		$query = $this->Mysqli->query("UPDATE `projects` SET `user_id`='{$project_owner}' WHERE `id`='{$project_id}';");

		if($result = $this->Mysqli->query("SELECT (SELECT `login` FROM `users` WHERE `id`='{$project_owner}') `login` FROM `projects` WHERE `user_id`='{$project_owner}' AND `id`='{$project_id}';")->fetch_row()){
			return array('status'=>1, 'login'=> $result[0]);
		}else array('status'=>0);
	}

	public function setProjectIspUsername($project_id, $isp_username=''){
		if(empty($isp_username)) $isp_username = '`isp_username_old`';
		else $isp_username = "'{$isp_username}'";

		$this->Mysqli->query("UPDATE `projects` SET `isp_username_new`={$isp_username} WHERE `id`={$project_id};");
	}
	
	public function setProjectIspUsernamePublic(){
		$project_id = request($_POST, 'project_id', 'int', 0);
		$project_isp_username = request($_POST, 'project_isp_username', 'str', '');
		if($result = $this->setProjectIspUsernameOld($project_id, $project_isp_username)){
			return array('status'=>1, 'isp_username'=> $result);
		}else return array('status'=>0);
	}
	
	private function setProjectIspUsernameOld($project_id, $isp_username=''){
		if(empty($isp_username)){
			$isp_username = '`isp_username_old`';
		}else{
			$isp_username = "'{$isp_username}'";
		}
		$this->Mysqli->query("UPDATE `projects` SET `isp_username_new`={$isp_username} WHERE `id`='{$project_id}';");
		
		if($result = $this->Mysqli->query("SELECT `isp_username_new` FROM `projects` WHERE `isp_username_new`={$isp_username} AND `id`='{$project_id}';")->fetch_row()){
			return $result[0];
		}else return false;
	}
	
	public function setProjectYM(){
		$project_id = request($_POST, 'project_id', 'int', 0);
		if(!$project_ym = request($_POST, 'project_ym', 'str', '')) return false;
		
		$this->Mysqli->query("UPDATE `projects` SET `ym`='{$project_ym}' WHERE `id`='{$project_id}';");
		
		if($this->Mysqli->query("SELECT `id` FROM `projects` WHERE `ym`='{$project_ym}' AND `id`='{$project_id}';")->fetch_row()){
			
			return array('status'=>$this->parseProject($project_id)?1:0);
		}else return array('status'=>0);
	}
	
	public function globalPatchPage(){
		$fails = array();
		$success = array();
		$query = $this->Mysqli->query("SELECT * FROM `projects` WHERE `patch_flag`=0;");
		while($project = $query->fetch_assoc()){
			$domain = $project['domain'];
			if(preg_match(iconv('utf-8','windows-1251','/^([а-я0-9\.\-]+)\.([а-я]+)/'),iconv('utf-8','windows-1251',$project['domain']))){
				require_once('/var/www/ugfx/data/www/ugfx.ru/inc/lib/punycode/idna_convert.class.php');
				$idn = new idna_convert(array('idn_version'=>2008));
				$domain = $idn->encode($project['domain']);
			}
			$filepath = $this->Config['site_upload_dir'] . $project['isp_username_new'] . '/data/www/' . $domain.'/index.html';

			if(!file_exists($filepath)){
				$fails[] = array('id'=>$project['id'],'domain'=>$project['domain']);
				continue;
			}

			require_once('pages.php');

			$Page = new Pages($filepath);

			$handle = fopen($filepath, 'w');
			$Page->addOldBrowsersScript();
			fwrite($handle, $Page->Document);
			fclose($handle);

			$success[] = array('id'=>$project['id'],'domain'=>$project['domain']);
			$this->Mysqli->query("UPDATE `projects` SET `patch_flag`=1 WHERE `id`={$project['id']};");
		}

		echo '<pre>';
		print_r(array('success'=>$success,'fail'=>$fails));
		echo '</pre>';
	}
	
	private function parseProject($project_id){
		return true;
	}
	
	/*public function isProjectCreated($project_id, $user_id){
		$project_id = (int)$project_id;
		$user_id = (int)$user_id;
		
		if($this->Mysqli->query("SELECT `id` FROM `projects` WHERE `id`='{$project_id}' AND `user_id`='{$project_id}';")->fetch_row()){
			return true;
		}
		
		return false;
	}*/
	
	public function isUserProject($project_id, $user_id){
		$project_id = (int)$project_id;
		$user_id = (int)$user_id;
		
		if($this->Mysqli->query("SELECT `id` FROM `projects` WHERE `id`='{$project_id}' AND `user_id`='{$user_id}';")->fetch_row()){
			return true;
		}
		
		return false;
	}
	
	/*public function getPages(){
		$project_id = request($_POST, 'project', 'int', 0);
		
		$result = array();
		
		$pages = $this->getProjectFirstPages($project_id);
		foreach($pages as $row){
			$result[] = $this->getLastPage($row['id']);
		}
		
		return $result;
	}*/
	
	public function siteuploadPage(){
		global $SUBMIT;
		
		/*$projects = array(0 => 'Новый');

		$query = $this->Mysqli->query("SELECT `id`,`domain` FROM `projects`;");
		while($result = $query->fetch_assoc()){
			$projects[$result['id']] = $result['domain'];
		}
		$this->Smarty->assign('projects', $projects);*/
		
		if($SUBMIT){
			if(!isset($_POST['action'])) $this->siteuploadErrorPage('Не все поля были заполнены. Код шибки #1.');
			if(!isset($_FILES['userfile'])) $this->siteuploadErrorPage('Не все поля были заполнены. Код шибки #2.');
			if(!isset($_POST['isp_username']) && $_POST['action'] == 0) $this->siteuploadErrorPage('Не все поля были заполнены. Код шибки #3.');
			if(!isset($_POST['project_id']) && !isset($_POST['project_domain'])) $this->siteuploadErrorPage('Не все поля были заполнены. Код шибки #4.');
			$utm_multipages_flag = isset($_POST['utm_multipage'])?1:0;

			$project_id = 0;
			$userfile = request($_FILES, 'userfile', 'array_str', false);
			$domain = '';
			$email = '';
			$user_id = $this->Auth->User['id'];
			$isp_username = '';
			$ym_id = 0;
			$email_pattern = '/^([a-z0-9\.\_\-]+)\@([a-z0-9\-\.]+)\.([a-z]+)$/i';
			
			if($_POST['action'] == 0){ //загрузка нового
				if(strlen($_POST['email']) > 384) $this->siteuploadErrorPage('Максимальная длинна поля для email - 384 символов.');
				if(empty($_POST['email'])) $this->siteuploadErrorPage('Не задан email.');
				$domain = strtolower(trim(request($_POST, 'project_domain', 'str', '')));
				$isp_username =  strtolower(trim(request($_POST, 'isp_username', 'str', '')));
				$email = strtolower(trim(request($_POST, 'email', 'str', '')));
				$ym_id = strtolower(trim(request($_POST, 'ym', 'int', 0)));
				
				if(!preg_match($email_pattern, $email)){
					$emails = spliti(',', $email);
					if(empty($emails)) $this->siteuploadErrorPage('Неправильно задан email.');
					if(count($emails) > 7) $this->siteuploadErrorPage('Максимальное количество email\'ов - 7.');
					foreach($emails as $el){
						$el = trim($el);
						if(!preg_match($email_pattern, $el)) $this->siteuploadErrorPage('Неправильно введен один из email\'ов.');
					}
				}

				if(!preg_match('/^([a-z0-9\.\-]+)/', $isp_username)) $this->siteuploadErrorPage('Неправильно задано имя пользователя isp.');
				if(empty($isp_username)) $this->siteuploadErrorPage('Не задано имя пользователя isp.');
				if(empty($domain)) $this->siteuploadErrorPage('Не задано доменное имя.');
				if(!preg_match(iconv('utf-8','windows-1251','/^([a-zа-я0-9\.\-]+)\.([а-яa-z]+)/'), iconv('utf-8','windows-1251',$domain))) $this->siteuploadErrorPage('Неправильно задано доменное имя.');
				if($this->getProjectIdByDomain($domain)) $this->siteuploadErrorPage('Проект с данным доменом уже создан.');
				//if(!$ym_id) $this->siteuploadErrorPage('Неправильно введен номер счетчика Яндекс метрики.');
			}else{
				if(!$project_id = request($_POST, 'project_id', 'int', 0)) $this->siteuploadErrorPage('Проект не задан.');
				$isp_username = $this->getProjectIspUsername($project_id);
				if(!$domain = $this->getProjectDomain($project_id)) $this->siteuploadErrorPage('Проект не найден или доменное имя было задано неправильно.');
				$ym_id = $this->getProjectYMId($project_id);
			}
			$path_domain = $domain;
			if(preg_match(iconv('utf-8','windows-1251','/^([а-я0-9\.\-]+)\.([а-я]+)/'),iconv('utf-8','windows-1251',$domain))){
				require_once('/var/www/ugfx/data/www/ugfx.ru/inc/lib/punycode/idna_convert.class.php');
				$idn = new idna_convert(array('idn_version'=>2008));
				$path_domain = $idn->encode($domain);
			}
			
			$site_upload_dir = $this->Config['site_upload_dir'].$isp_username.'/data/www/';
			$site_upload_fulldir = $site_upload_dir.$path_domain;
			if(!file_exists($this->Config['site_upload_dir'].$isp_username)) $this->siteuploadErrorPage('Пользователь isp с таким именем не найден.');
			if(!file_exists($site_upload_fulldir)) $this->siteuploadErrorPage('Необходимо создать www домен в ispmanager\'е.');
			
			if(!is_uploaded_file($userfile['tmp_name'])) $this->siteuploadErrorPage('Файл "'.$userfile['name'].'" не загружен. Код шибки #1.');
			
			$version = $this->getProjectVersion($project_id);
			$fileinfo = pathinfo($userfile['name']);
			if($fileinfo['extension'] != 'zip') $this->siteuploadErrorPage('Файл должен иметь расширение ".zip".'); //FILETYPE FILTER
			$filename =  $fileinfo['filename'].'_v'.($version+1).'.'.$fileinfo['extension'];
			
			$archive_upload_dir = $this->Config['archive_upload_dir'].'project_'.$project_id.'_src/';
			require_once('ifile.php');
			if(!IFile::Upload($userfile['tmp_name'], $filename, $archive_upload_dir)) $this->siteuploadErrorPage('Файл не загружен. Код шибки #2.');
			
			$zipobj = new ZipArchive();
			$archive_upload = $archive_upload_dir.$filename;
			$old_path = $site_upload_dir.'v'.$version.'_'.$path_domain;
			$tiny_count_new = 0;
			$tiny_count_old = 0;
			$tiny_count_err = 0;
			$tiny_size_diff = 0;
			
			$debug = '';
			
			if($zipobj->open($archive_upload) === true){
				if(!$connection = ssh2_connect($this->Config['ssh_host'], 22)){
					unlink($archive_upload);
					$this->siteuploadErrorPage('Не удалось открыть папку для загрузки проекта.');
				}
				ssh2_auth_password($connection, $this->Config['ssh_user'], $this->Config['ssh_pass']);
				$sftp = ssh2_sftp($connection);
				ssh2_sftp_chmod($sftp, $site_upload_dir, 0777); // открываем дверь
				
				rename($site_upload_fulldir, $old_path);
				mkdir($site_upload_fulldir, 0777);
				if(!file_exists($site_upload_fulldir)){
					unlink($archive_upload);
					//ssh2_sftp_chmod($sftp, $site_upload_dir, 0501); // закрываем дверь
					$this->siteuploadErrorPage('Не удалось создать папку. Код ошибки #1');
				}
				
				$zipobj->extractTo($site_upload_fulldir);
				$zipobj->close();
				$pages = glob($site_upload_fulldir.'/*.html');
				$pages_count = count($pages);
				if(empty($pages)){
					unlink($archive_upload);
					//ssh2_sftp_chmod($sftp, $site_upload_dir, 0501); // закрываем дверь
					$this->siteuploadErrorPage('Архив не загружен или не содержит в корне *.html файлов.');
				}

				$glob_js = glob($site_upload_fulldir.'/js/*.js');
				foreach($glob_js as $js){
					$file = pathinfo($js, PATHINFO_BASENAME);
					if($file != 'modernizr.js'){
						$jspath = $site_upload_fulldir . '/js/' . $file;
						$handle = fopen($jspath, 'rb');
						$buffer = fread($handle, filesize($jspath));
						fclose($handle);
						if(strpos($buffer,'Webflow: Front-end site library') !== false){
							$buffer = str_replace("var url = 'https://webflow.com/api/v1/form/' + siteId;", "var url = 'http://ugfx.ru/api/mailit.php';", $buffer);
							$buffer = str_replace("var url = FORM_API_HOST + '/api/v1/form/' + siteId;", "var url = 'http://ugfx.ru/api/mailit.php';", $buffer);
							$buffer = str_replace("var url = (\"https://webflow.com\") + '/api/v1/form/' + siteId;", "var url = 'http://ugfx.ru/api/mailit.php';", $buffer);
							$buffer = str_replace("var url = \"https://webflow.com\" + '/api/v1/form/' + siteId;", "var url = 'http://ugfx.ru/api/mailit.php';", $buffer);
							$buffer = str_replace("https://webflow.com/api/v1/form/", "http://ugfx.ru/api/mailit.php?", $buffer);
							$handle = fopen($jspath, 'w');
							fwrite($handle, $buffer);
							fclose($handle);
							break;
						}
					}
				}

				if($project_id == 0){
					if(!$project_id = $this->createProject($domain, $user_id, $filename, $isp_username, $email, $ym_id, $pages_count, $utm_multipages_flag)) $this->siteuploadErrorPage('Не удалось создать проект. Код шибки #1.');
				}else{
					if(!$this->updateProject($project_id, $user_id, $filename, $pages_count, $utm_multipages_flag)) $this->siteuploadErrorPage('Не удалось обновить проект. Код шибки #2.');
					$this->Mysqli->query("DELETE FROM `project_pages` WHERE `project_id`='{$project_id}';");
				}
				require_once('pages.php');
				//set_time_limit(count($pages)*15);			
				foreach($pages as $filepath){
					$Page = new Pages($filepath);
					
					$handle = fopen($filepath, 'w');
					$Page->verifyDocument($project_id, $ym_id);
					fwrite($handle, $Page->Document);
					fclose($handle);
					
					$fileinfo = pathinfo($filepath);
					$filename = $this->Mysqli->real_escape_string($fileinfo['basename']);
					
					$title = $this->Mysqli->real_escape_string($Page->Title());
					$description = $this->Mysqli->real_escape_string($Page->Description());
					$keywords = $this->Mysqli->real_escape_string($Page->Keywords());
					
					$this->Mysqli->query("INSERT INTO `project_pages`(`project_id`, `filename`, `title`, `description`, `keywords`) VALUES ('{$project_id}', '{$filename}', '{$title}', '{$description}', '{$keywords}');");
				}			
				
				//------------- Tinypng -------------//
				require_once('/var/www/ugfx/data/www/ugfx.ru/inc/lib/Tinypng/Tinypng.php');
				$images = glob($site_upload_fulldir.'/images/*.*');
				$insert_data = array();
				//set_time_limit(count($images)*15);
				foreach($images as $filepath){
					$pathinfo = pathinfo($filepath);
					$file_ext = strtolower($pathinfo['extension']);
					if($file_ext == 'ico') continue; //favicon не нужно обратабывать
					
					$filename = $this->Mysqli->real_escape_string($pathinfo['basename']);
					$filehash = hash_file('md5',$filepath);
					
					$use_tinypng = true;
					if($row = $this->Mysqli->query("SELECT `id`,`filehash` FROM `project_images` WHERE `project_id`='{$project_id}' AND `filename`='{$filename}';")->fetch_assoc()){
						if(!$filehash) continue;
						elseif($filehash === $row['filehash']){
							rename($old_path.'/images/'.$pathinfo['basename'], $site_upload_fulldir.'/images/'.$pathinfo['basename']);
							$use_tinypng = false;
							$tiny_count_old++;
						}
					}
					
					if($use_tinypng){						
						try{
							$tinypng = new TinyPNG($this->Config['tinypng_key']);
							if($tinypng->shrink($filepath)){
								$result = $tinypng->getResult();
								$tiny_size_diff += $result['input']['size'] - $result['output']['size'];
								
								$file_data = file_get_contents($result['output']['url']);
								$handle = fopen($filepath,'w');
								fwrite($handle,$file_data);
								fclose($handle);
								
								$tiny_count_new++;
							}else{
								$tiny_count_err++;
							}
						}catch(Exception $e){
							$tiny_count_err++;
						}
					}
					
					$insert_data[] = array('filename'=>$filename,'filehash'=>$filehash);
				}
				$tiny_size_diff = round($tiny_size_diff/1000000,2);
				
				$this->Mysqli->query("DELETE FROM `project_images` WHERE `project_id`={$project_id};");
				$insert_string = '';
				foreach($insert_data as $v){
					$insert_string .= "('{$v['filename']}', '{$v['filehash']}', '{$project_id}'),";
				}
				$insert_string = rtrim($insert_string,',');
				if($insert_data) $this->Mysqli->query("INSERT INTO `project_images` (`filename`, `filehash`, `project_id`) VALUES {$insert_string};");
				//!------------ Tinypng ------------!//

				//UTM
				if($utm_multipages_flag) recurse_copy('/var/www/ugfx/data/www/ugfx.ru/addons_data/utm_multipages/',$site_upload_fulldir.'/');
				//!UTM
				
				//ssh2_sftp_chmod($sftp, $site_upload_dir, 0501); // закрываем дверь
			}else{
				$this->siteuploadErrorPage('Не удалось открыть архив. Возможно он поврежден.');
			}
			
			$this->Smarty->assign('good', 'Проект успешно добавлен. Новых изображений сжато: '.$tiny_count_new.'('.$tiny_size_diff.'мб), перенесено ранее сжатых: '.$tiny_count_old.', ошибок: '.$tiny_count_err);
		}
		
		$this->Smarty->display('siteupload_page.tpl');
	}
}