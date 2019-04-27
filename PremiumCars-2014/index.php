<?php
	require_once('./inc/modules/view_page.php');

	$View = new ViewPage();
	$Pages = array(
		'index'=>'',
		'suggestion'=>'',
		'suggestion/edit'=>'suggestion_edit',
		'suggestion/add'=>'suggestion_add',
		'login'=>'',
		'suggestions'=>'',
		'brands/abt'=>'brands',
		'brands/ac-schnitzer'=>'brands',
		'brands/alpina'=>'brands',
		'brands/amg'=>'brands',
		'brands/brabus'=>'brands',
		'brands/carlsson'=>'brands',
		'brands/g-power'=>'brands',
		'brands/gemballa'=>'brands',
		'brands/hamann'=>'brands',
		'brands/je-design'=>'brands',
		'brands/lumma'=>'brands',
		'brands/mansory'=>'brands',
		'brands/startech'=>'brands',
		'brands/topcar'=>'brands',
		'brands/techart'=>'brands',
		'brands/trasco'=>'brands',
		'brands/konig-club'=>'brands',
		'brands/larte-design'=>'brands',
		'brands/wald'=>'brands',
		'services/koch-chemie-unna'=>'services',
		'services/padding'=>'services',
		
		'detailing'=>'',
		'detailing/mojka-avto'=>'detailing_mojka_avto',
		'detailing/modesta-keramika'=>'detailing_modesta_keramika',
		'detailing/polirovka'=>'detailing_polirovka',
		'detailing/ximchistka'=>'detailing_ximchistka',
		'detailing/plenki'=>'detailing_plenki'
	);

	if(strlen($DO) > 2) {
		if ($DO[0] . $DO[1] == '//') exitTo($DO);
	}

	if(!isset($Pages[$DO])) exitTo();

	$View->_view(empty($Pages[$DO])?$DO:$Pages[$DO]);