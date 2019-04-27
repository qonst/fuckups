<?php
class ViewPage{
	private $Mysqli;
	private $Config;
	private $Auth;
	private $Smarty;
	private $Model;
	
	public function __construct(){
		global $Mysqli, $Config, $Auth, $Smarty;
	
		$this->Mysqli = $Mysqli;
		$this->Config = $Config;
		$this->Auth = $Auth;
		$this->Smarty = $Smarty;
		$this->Model = new Model();
	}
	
	private function _errorPage($error){
		//
	}
	
	public function _view($name){
		try{
			$action = $name.'Page';
			if(is_callable(array($this,$action))){
				$this->$action();
			}elseif($this->Smarty->templateExists($name . '.tpl')){
				$this->Smarty->display($name . '.tpl');
			}else{
				exitTo();
			}
		}catch(Exception $e){
			$mess = $e->getMessage();
			//$mess .= ' '.$e->getFile().', '.$e->getLine();
			$this->_errorPage($mess);
		}
	}

	private function suggestion_editPage(){
		if(!$this->Auth->isAuthorised()){
			exitTo('/login');
		}

		//some code
	}

	//other methods
}