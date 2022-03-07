<?php
require_once dirname(dirname(__FILE__)).'/init.php';

include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;
define('PAGE_TYPE', 'info');


try {
	if ($T_USER == '' || $T_EMAIL == '') {
	    header("Location: ../index.php");
	    exit(0);
	}
	//submit
	if(count($_POST) > 0) {
		$_POST['cid'] = $T_USER;
		$_POST['t_c'] = 1;
		if (!($T_USER > 0)) {
			$_POST['status'] = 'pending';
			$_POST['t_sign'] = date('Y-m-d');
		}
		$_POST['t_type'] = implode(',', $_POST['t_type']);
		
		$rtn = user_set_client();
		if (stripos($rtn, 'error') !== false) {
			throw new Exception ($rtn);
		}

		//set_step($T_USER, PAGE_TYPE);
		confirm_step($T_USER, PAGE_TYPE);
					
		$arr['succ'] = 1;
		if (isset($_COOKIE['_ref']) && isset($URI_BACK[$_COOKIE['_ref']])) {
			$arr['href'] = $URI_BACK[$_COOKIE['_ref']];
			setcookie('_ref', 0, 0, '/');
		}
		else {
			$arr['href'] = '/client/edu.php';
		}
		echo json_encode($arr);
		exit;
	}

	//go to next step
	if ($T_USER > 0 && isset($_GET['next']) && $_GET['next'] > 0) {
		confirm_step($T_USER, PAGE_TYPE);
		header("Location: /client/edu.php");
		exit;
	}


	$data = array();
	if ($T_USER > 0) {
		$data = user_get_client($T_USER);
	}
	
	$tpl = new Template;
	$tpl->assign('user', $data);
	$tpl->assign('login_user', $T_EMAIL);
	$tpl->assign('pagetype', PAGE_TYPE);	
	$tpl->assign('country', get_country());	
	$tpl->assign('visacate', get_visacate());
	$tpl->assign('aboutus', get_aboutus());
	$tpl->assign('save', isset($T_STEPS[PAGE_TYPE]) ? $T_STEPS[PAGE_TYPE]['s'] : 0);	
	$tpl->assign('all_types', $client_type_arr);
	$tpl->assign('steps', $T_STEPS);
	$tpl->display('info.tpl');
}
catch(Exception $e) {
	$err['succ'] = 0;
	$err['msg' ] = $e->getMessage();
	echo json_encode($err);
	exit(1);
}


