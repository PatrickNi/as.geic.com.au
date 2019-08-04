<?php
require_once dirname(dirname(__FILE__)).'/init.php';

include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;

define('PAGE_TYPE', 'wxp');
try {
	
	//submit
	if(count($_POST) > 0) {
		if (!isset($_REQUEST['wid']) || $_REQUEST['wid'] <= 0)
			$_REQUEST['isNew'] = 1;
		
		$_REQUEST['cid'] = $T_USER;
		
		if ($T_USER == 0 || $T_USER == '') 
			throw new Exception ("Please login first");

			
		$rtn = set_wxp($T_USER);
		if (stripos($rtn, 'error') !== false) {
			throw new Exception ($rtn);
		}

		set_step($T_USER, PAGE_TYPE);			
		$arr['succ'] = 1;
		if (strtolower($rtn) != 'success') {
			if (isset($_REQUEST['next']) && $_REQUEST['next'] == 1) {
				confirm_step($T_USER, PAGE_TYPE);
			}
				
			$country = get_country();
			$tpl = new Template;
			$tpl->assign('id', $rtn);
			$tpl->assign('v', $_POST);
			$tpl->assign('country', $country[$_REQUEST['t_country']]);	
			$arr['add'] = $tpl->fetch('wxp_add.tpl');
		}
		else{
			$arr['add'] = '';
//			confirm_step($T_USER, PAGE_TYPE);
//			header("Location: /client/ielts.php"); 
//			exit;
		}	

		if (isset($_COOKIE['_ref']) && isset($URI_BACK[$_COOKIE['_ref']])) {
	            $arr['href'] = $URI_BACK[$_COOKIE['_ref']];
	              setcookie('_ref', 0, 0, '/');
	   	} 
	    else {
			 $arr['href'] = '';
		} 

		$arr['msg'] = 'success';
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

	if(count($_GET) > 0 && $_GET['del'] == 1) {
		if ($_GET['id'] == 0)
			throw new Exception ('No record delete');

		$_REQUEST['wid'] = $_REQUEST['id'];
		$rtn = del_wxp();
		if ($rtn)
			$arr['succ'] = 1;
		else
			throw new Exception ('Delete record failed');

		$arr['msg' ] = 'success';
		echo json_encode($arr);
		exit;			
	}


	$data = array();
	if ($T_USER > 0) {
		$data = get_wxp($T_USER);
	}

	$tpl = new Template;
	$tpl->assign('wxp', $data);
	$tpl->assign('login_user', $T_EMAIL);
	$tpl->assign('pagetype', PAGE_TYPE);	
	$tpl->assign('country', get_country());	
	$tpl->assign('save', isset($T_STEPS[PAGE_TYPE]) ? $T_STEPS[PAGE_TYPE]['s'] : 0);	
    $tpl->display('wxp.tpl');
}
catch(Exception $e) {
	$err['succ'] = 0;
	$err['msg' ] = $e->getMessage();
	echo json_encode($err);
	exit(1);
}


