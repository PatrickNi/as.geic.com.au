<?php
require_once dirname(__FILE__).'/init.php';

include_once FUNC_BASE_CLIENT;

try {

    $code = isset($_REQUEST['code'])? $_REQUEST['code'] : '';
    $state = isset($_REQUEST['state'])? $_REQUEST['state'] : '';

    if ($code == '' && $state == '') {
        header("Location: https://open.weixin.qq.com/connect/qrconnect?appid=". WECHAT_APPID ."&redirect_uri=". urlencode(SITE_SSO_URL) ."&response_type=code&scope=snsapi_login&state=". time() ."#wechat_redirect");
        exit;
    }
    elseif ($code != '' && $state != '') {
        //Get accesstoken by code
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=". WECHAT_APPID ."&secret=". WECHAT_APP_SERECT ."&code={$code}&grant_type=authorization_code";
        $rtn = json_decode(do_request($url), true);

        if (!$rtn || (isset($rtn['errorcode']) && $rtn['errorcode']))
            throw new Exception ("Get token failed");

        /*
        { 
            "access_token":"ACCESS_TOKEN", 
            "expires_in":7200, 
            "refresh_token":"REFRESH_TOKEN",
            "openid":"OPENID", 
            "scope":"SCOPE",
            "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL"
            }
         */
        
        //Get user info by token
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token={$rtn['access_token']}&openid={$rtn['openid']}";
        $rtn = json_decode(do_request($url), true);
        if (!$rtn || (isset($rtn['errorcode']) && $rtn['errorcode']))
            throw new Exception ("Get user_info failed");

        /*
            Array ( [openid] => ocD7lw_2I29hilJDLtWGU1ugizkQ [nickname] => pani [sex] => 1 [language] => en [city] => Pudong New District [province] => Shanghai [country] => CN [headimgurl] => http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJAWT7fJwqgn1458H0UEWHxpsvkIS7bN56wVpt6ElIibf4jGGa0PYtKG6PeicLZ12cAT5TJicicnJ5ALg/132 [privilege] => Array ( ) [unionid] => ol1EwxHm3vr0kf2zzjo4uUY9M1UU )

         */
        print_r($rtn);

    }
    else {
        throw new Exception ("Auth failed");
    }
}
catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}

