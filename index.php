<?php
require_once dirname(__FILE__).'/init.php';
include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;

try {
	
	//user login
	if (COUNT($_POST) > 0) {
		$u = user_login();
		$T_USER = $u['cid'];
		$T_STATUS = $u['status'];
		if ($T_USER > 0) {
			$T_EMAIL = $_POST['t_email'];
			set_cookie();

			//redirection
			header("Location: {$_SERVER['HTTP_REFERER']}");			
			exit;
		}
		echo "<script>alert('登录失败,请重新尝试!');</script>";
	}

	//user register
	if (isset($_GET['em']) && $_GET['em'] != '') {
		$arr['succ'] = 0;
		$T_USER = user_register($_GET['em']);
		$T_STATUS = 'pending';
		if ($T_USER > 0) {
			$T_EMAIL = $_GET['em'];
			set_cookie();
			
			$arr['succ'] = 1;
			
			add_local_client($T_USER, $T_EMAIL);
		}
		echo json_encode($arr);
		exit;
	}

	$tpl = new Template;
	
    if ($T_EMAIL == '') {
		date_default_timezone_set('Australia/Sydney');
		$week = date('w');
		$hm   = date('H')*60+date('i');
		if ($week >= 1 && $week <= 5 && $hm >= 540 && $hm <= 1050) {
			header("Location: https://tawk.to/chat/5ef3c1124a7c6258179b47b4/default");
		}
		else {
			header("Location: /welcome");
		}

		//$tpl->display('login2.html');
		exit;
	}


	$tpl->assign('login_user', $T_EMAIL);
	$tpl->assign('status', $T_STATUS);
	$tpl->assign('info', isset($T_STEPS['info'])? $T_STEPS['info'] : '');
	$tpl->assign('edu', isset($T_STEPS['edu'])? $T_STEPS['edu'] : '');
	$tpl->assign('wxp', isset($T_STEPS['wxp'])? $T_STEPS['wxp'] : '');
	$tpl->assign('ielts', isset($T_STEPS['ielts'])? $T_STEPS['ielts'] : '');	
	$tpl->assign('error', isset($_REQUEST['err'])? $_REQUEST['err'] : '');	
	$tpl->assign('cfm', isset($_REQUEST['googlepass'])? $_REQUEST['googlepass'] : 0);	
    $tpl->display('index.tpl');
}
catch(Exception $e) {
	echo $e->getMessage();
	exit(1);
}


