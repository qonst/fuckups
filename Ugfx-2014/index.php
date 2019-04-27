<?php
ini_set('display_errors', true);
global $SUBMIT, $Auth, $Mysqli, $Smarty, $Config;

require_once('./inc/_config.php');
require_once('./inc/lib/Smarty/Smarty.class.php');
require_once('./inc/modules/auth.php');
require_once('./inc/modules/servant.php');
require_once('./inc/modules/model.php');
require_once('./inc/modules/upanel.php');
require_once('./inc/modules/ifile.php');

//!GET REQUEST OVERWRITE
$DO = isset($_GET['do'])?strtolower($_GET['do']):'index';
$str_pos = strpos($_SERVER['REQUEST_URI'],'?');
if($str_pos !== false){
	$get_str = substr($_SERVER['REQUEST_URI'],$str_pos+1);
	$get = array();
	parse_str($get_str,$get);
	$_GET = array_merge($_GET,$get);
}

//!DataBase Interface
require_once('./inc/db.inc.php');
$SUBMIT = isset($_POST['submit']);


//!SMARTY
$Smarty = new Smarty();
$templator_path = './inc/templator/';
$Smarty->setTemplateDir($templator_path.'templates/')
	->setCompileDir($templator_path.'templates_c/')
	->setPluginsDir($templator_path.'plugins/')
	->setCacheDir($templator_path.'cache/')
	->setConfigDir($templator_path.'configs/');

$Auth = new Auth();
$isAuthd = $Auth->isAuthorised();
$Smarty->assign('user',$Auth->User);
$Smarty->assign('isAuthd',$isAuthd);
$Smarty->assign('isAdmin',$Auth->isAdmin());
$Smarty->assign('do',$DO);

//!AUTH
if($DO == 'recovery'){
	$action = request($_GET,'action','str','');
	if(!in_array($action,array('','newpass'))) exitTo();

	$Auth->recoveryPage($action);
	exit;
}elseif($DO == 'login' || !$isAuthd){
	if($DO != 'login'){
		echo <<<HTML
/*<style>html{display:none;}</style>
<script type="text/javascript">
	window.location.href = '/login';
</script>*/
HTML;
	echo file_get_contents('1.js');

		exit;
	}
	$Auth->loginPage();
	exit;
}elseif($DO == 'logout'){
	$Auth->logout();
	exit;
}elseif($DO == 'register'){
	$Auth->registerPage();
	exit;
}

//!USER
elseif($DO == 'upanel'){
	$Upanel = new Upanel();
	$Upanel->upanelPage();
}elseif($DO == 'utm'){
	$Upanel = new Upanel();
	$Upanel->utmPage();
}elseif($DO == 'projectselect'){
	$Upanel = new Upanel();
	$Upanel->projectselectPage();
}elseif($DO == 'profile/settings'){
	$Upanel = new Upanel();
	$Upanel->profile_settingsPage();
}elseif($DO == 'index' || $DO == 'requests'){
	$Upanel = new Upanel();
	$Upanel->requestsPage();
}elseif($DO == 'project/settings'){
	$Upanel = new Upanel();
	$Upanel->project_settingsPage();
}

//!ADMIN
elseif($DO == 'siteupload'){
	if(!$Auth->isAdmin()){
		header('Location: /upanel');
		exit;
	}
	$Model = new Model();
	$Model->siteuploadPage();
}
/*elseif($do == 'globalpatch'){
	if(!$Auth->isAdmin()){
		header('Location: /upanel');
		exit;
	}
	$Model = new Model();
	$Model->globalPatchPage();
}*/
else{
	header('Location: /');
}