<?php

function logException($name,$text){
	global $Mysqli;

	$name = $Mysqli->real_escape_string($name);
	$text = $Mysqli->real_escape_string($text);

	$Mysqli->query("INSERT INTO `logs`(`name`,`text`) VALUES ('{$name}','{$text}');");
}

function fileUpload($tmpfilename, $filename, $fullpath){
	$uploadfile = $fullpath.$filename;
	@mkdir($fullpath, 0776, true);

	if(is_uploaded_file($tmpfilename))
		if(move_uploaded_file($tmpfilename, $uploadfile)) return true;

	return false;
}

function answer($status, $data=false, $options=array()){
	if($data === false){
		if($status == 403) $data = 'У вас недостаточно прав.';
		if($status == 404) $data = 'Вызываемый метод не найден.';
	}
	exit(json_encode(array('status' => $status, 'data' => $data, 'options' => $options)));
}

function exitBack(){
	header('location:javascript://history.go(-1)');
	exit;
}

function exitTo($to='/'){
	header('Location: '.$to);
	exit;
}

function notifyUserByEmail($email,$message){
	global $Config;
	require_once('./inc/lib/libmail/libmail.php');
	$message = <<<MESSAGE
{$message}\r\n
С уважением, команда UveeCMS
MESSAGE;

	$mail = new Mail();
	$mail->From($Config['admin_mail']);
	$mail->To($email);
	$mail->Subject('UveeCMS - уведомление');
	$mail->Body($message);
	//$mail->Priority(4);
	return $mail->Send();
}

function notifyUserByPhone($phone,$message){
	global $Config;
	file_get_contents("http://sms.ru/sms/send?api_id={$Config['smsru_key']}&to={$phone}&text=".urlencode($message));
}

function request($data, $var, $type='str', $default=false, $options='', $field_name=false){
	global $Mysqli;

	if(isset($data[$var])){
		if(!empty($options)){
			$options = explode(',',$options);
			foreach($options as $o){
				$sub_options = explode('|',$o);
				if(count($sub_options) > 1) $o = $sub_options[0];
				switch($o){
					case 'trim':
						$data[$var] = trim($data[$var]);
						break;
					case 'nohtml':
						$data[$var] = htmlspecialchars($data[$var],ENT_QUOTES,'UTF-8');
						break;
					case 'date_standart':
						$data[$var] = date('Y-m-d', strtotime($data[$var]));
						break;
					case 'max':
						if(mb_strlen($data[$var],'UTF-8') > $sub_options[1]){
							throw new Exception('Максимальная длина поля "'.(($field_name === false)?$var:$field_name).'" - '.$sub_options[1].' символ(ов).');
						}
						break;
					case 'min':
						if(mb_strlen($data[$var],'UTF-8') < $sub_options[1]){
							throw new Exception('Минимальная длина поля "'.(($field_name === false)?$var:$field_name).'" - '.$sub_options[1].' символ(ов).');
						}
						break;
					case 'noempty':
					case 'notempty':
						if(empty($data[$var])){
							throw new Exception('Поле "'.(($field_name === false)?$var:$field_name).'" не должно быть пустым.');
						}
						break;
					case 'to_numerical':
						$data[$var] = preg_replace('/[^\-0-9]/', '', $data[$var]);
						break;
					case 'to_timezone':
						$data[$var] = preg_replace('/[^\-0-9]/', '', $data[$var]);
						if($data[$var] > 12 || $data[$var] < -12) throw new Exception('Часовой пояс не божет быть больше +12 и меньше -12.');
						break;
					case 'isset':
						if(!isset($data[$var])) throw new Exception('Поле "'.(($field_name === false)?$var:$field_name).'" не заполнено.');
						break;
				}
			}
		}

		switch($type){
			case 'int':
				$data[$var] = trim($data[$var]);
				$data[$var] = (int)$data[$var];
				if(strlen($data[$var]) > 11) throw new Exception('Поле "'.(($field_name === false)?$var:$field_name).'" не должно быть длиннее 11 символов.');
				return $data[$var];
			case 'str':   if ($data[$var]) { return $Mysqli->real_escape_string($data[$var]); } else return $default;
			case 'email': if(preg_match('/^([a-zA-Z0-9\._-]+)@([a-zA-Z0-9\._-]+)\.([a-zA-Z]{2,8})$/ui', $data[$var])){ return $data[$var]; } else return $default;
			case 'phone':
				if($data[$var] = preg_replace('/[^0-9]/', '', $data[$var])){
					$len = strlen($data[$var]);
					if($len > 11 || $len < 10) return $default;
					return substr($data[$var],$len-10);
					//return $data[$var];
				}else return $default;
			case 'datetime': if(preg_match('/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})\s([0-9]{2})\:([0-9]{2})\:([0-9]{2})$/', $data[$var])){ return $data[$var]; } else return $default;
			case 'date': if(preg_match('/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/', $data[$var])){ return $data[$var]; } else return $default;
			case 'array': if (is_array($data[$var])) { foreach($data[$var] as $k=>$s){ $arr[$k] = $Mysqli->real_escape_string($s); } return $arr; } else return $default;
			case 'array_int':
				if(is_array($data[$var])){
					foreach($data[$var] as $k=>$i){
						if(strlen($i) > 11) throw new Exception('Поле содержимое поля "'.(($field_name === false)?$var:$field_name).'" не должно быть длиннее 11 символов.');
						$arr[$k] = (int)$i;
					}

					return $arr;
				}else return $default;
			case 'array_str': if (is_array($data[$var])) { foreach($data[$var] as $k=>$s){ $arr[$k] = $Mysqli->real_escape_string($s); } return $arr; } else return $default;
		}
	}else return $default;
}

function recurse_copy($src,$dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ( $file = readdir($dir)) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
				recurse_copy($src . '/' . $file,$dst . '/' . $file);
			}
			else {
				copy($src . '/' . $file,$dst . '/' . $file);
			}
		}
	}
	closedir($dir);
}