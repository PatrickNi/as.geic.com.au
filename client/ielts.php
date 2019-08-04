<?php
require_once dirname(dirname(__FILE__)).'/init.php';

include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;
define('PAGE_TYPE', 'ielts');

try {
	
	//submit
	if(count($_POST) > 0) {
		$_REQUEST['cid'] = $T_USER;

		if ($_POST['t_testday'] != '' && $_POST['t_testday'] != '0000-00-00') {
			if ($_POST['t_result'] == "" || $_POST['t_listen'] == "" || $_POST['t_read'] == "" || $_POST['t_write'] == "" || $_POST['t_speak'] == "") {
				throw new Exception ("All the scores should not be EMPTY!");
			}
		}

		$rtn = set_ielts();
		if (stripos($rtn, 'error') !== false)
			throw new Exception ($rtn);

		confirm_step($T_USER, PAGE_TYPE);		
		$arr['succ'] = 1;
		$arr['href'] = 'confirm.php';
		echo json_encode($arr);
		exit;
	}

	if ($T_USER == 0 || $T_USER == '') 
		header("Location: /index.php?err=1");

	//go to next step
	if ($T_USER > 0 && isset($_GET['next']) && $_GET['next'] > 0) {
		confirm_step($T_USER, PAGE_TYPE);
		header("Location: confirm.php");
		exit;
	}

	$data = array();
	if ($T_USER > 0) {
		$data = get_ielts($T_USER);
	}

	$tpl = new Template;
	$tpl->assign('user', $data);
	$tpl->assign('login_user', $T_EMAIL);
	$tpl->assign('pagetype', PAGE_TYPE);	
	$tpl->assign('save', isset($T_STEPS[PAGE_TYPE]) ? $T_STEPS[PAGE_TYPE]['s'] : 0);	

    $tpl->display('ielts.tpl');
}
catch(Exception $e) {
	$err['succ'] = 0;
	$err['msg' ] = $e->getMessage();
	echo json_encode($err);
	exit(1);
}


