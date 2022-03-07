<?php
require_once dirname(__FILE__).'/../init.php';
include_once CLASS_TEMPLATE;
include_once FUNC_BASE_CLIENT;

try {
    
    //user login
    if (count($_POST) > 0) {
        $rtn = user_register_v2();
        
        $arr['succ'] = 0;
        if (isset($rtn['id']) && $rtn['id'] > 0) {
            $T_USER = $rtn['id'];
            $T_EMAIL = $_REQUEST['t_email'];
            $T_STATUS = 'pending';
            set_cookie();
            
            $arr['succ'] = 1;
            $arr['href'] = '/welcome/contactus.php?code='.$rtn['code'];
            add_local_client_v2($T_USER, $T_EMAIL,$_POST['t_lname'],$_POST['t_fname'],$_POST['t_phone'],$_POST['t_wechatid'],$_POST['t_ctype']);
        }
        echo json_encode($arr);
        exit;
    }
    elseif (isset($_REQUEST['sig']) && $_REQUEST['sig'] != ''){
        $rtn = user_login_sig($_REQUEST['sig']);
        //var_dump($rtn);exit;
        if (isset($rtn['cid']) && $rtn['cid'] > 0) {
            $T_USER = $rtn['cid'];
            $T_EMAIL = $rtn['emil'];
            $T_STATUS = $rtn['status'];
            set_cookie();

            header('Location: /client/info.php');
            exit;
        }        
    }

    $tpl = new Template;  
    $tpl->assign('pagetype', 'welcome');
    $tpl->display('welcome.tpl');
}
catch(Exception $e) {
    echo $e->getMessage();
    exit(1);
}


