<?php
require_once dirname(dirname(__FILE__)).'/init.php';

include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;
include_once FUNC_RECAPTCHA;

define('PAGE_TYPE', 'cfm');
try {
	
	//submit

	if ($T_USER == 0 || $T_USER == '') {
		header("Location: /index.php?err=1");
		exit;
	}

	$steps = get_steps($T_USER);
	if (count($steps) < 3) {
		header("Location: /index.php?err=2");
		exit;
	}


	$_POST['cid'] = $T_USER;	
	if (isset($_GET['cfm']) && $_GET['cfm'] == 1) {
		// was there a reCAPTCHA response?
//		if ($_POST["recaptcha_response_field"]) {
//    		$resp = recaptcha_check_answer (GOOGLE_RECAPTCHA_PRI, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
	        //$resp->is_valid &&
			if (user_confirm() > 0) {
				header("Location: /index.php?googlepass=1");		
				exit;
        	} 
			else {
                // set the error code so that we can display it
                $error_recaptcha = $resp->error;
	        }
//		}		
	}


	$tpl = new Template;
	$tpl->assign('user', user_get_client($T_USER));
	$tpl->assign('edu', user_get_edu($T_USER));
	$tpl->assign('wxp', user_get_wxp($T_USER));
	$tpl->assign('ielts', get_ielts($T_USER));
	$tpl->assign('all_types', $client_type_arr);
	$tpl->assign('login_user', $T_EMAIL);
	$tpl->assign('pagetype', PAGE_TYPE);	
	$tpl->assign('country', get_country());
	$tpl->assign('visacate', get_visacate());
	$tpl->assign('quals', array("No Qualification"=>"初中以下(Below Junior School)",
								"Middle School"=>"初中(Junior High School)",
								"High School"=>"高中(Senior High School)",
								"Vocational"=>"职校(Vocational Collage)",
								"Diploma"=>"二年大专(Diploma)",
								"Advance Diploma"=>"三年大专(Advanced Diploma)",
								"Bachelor"=>"大学本科(Bachelor)",
								"Graduate Certificate"=>"研究生证书(Graduate Certificate)",
								"Graduate Diploma"=>"研究生文凭(Graduate Diploma)",
								"Master"=>"研究生(Master)",
								"PH.D"=>"博士(PHD)"));	
	//$tpl->assign('google_recaptcha', recaptcha_get_html(GOOGLE_RECAPTCHA_PUB, $error_recaptcha));
    $tpl->display('cfm.v2.tpl');
}
catch(Exception $e) {
	$err['succ'] = 0;
	$err['msg' ] = $e->getMessage();
	echo json_encode($err);
	exit(1);
}


