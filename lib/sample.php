<?php 
function api_call($url, $postdata=false) {
    $postdata = $postdata == false? $_POST : $postdata;
    foreach ($postdata as $k => $v) {
        $v = is_null($v)? '' :$v;
        $postdata[$k] = @iconv('utf-8', 'gb2312', $v);
    }


    $ch = curl_init($url);  
    $curl_opts = array(CURLOPT_HEADER=>false,
                       CURLOPT_RETURNTRANSFER=>true,
                       CURLOPT_USERAGENT=>'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:6.0.2) Gecko/20100101 Firefox/6.0.2',
                       CURLOPT_POST => true,
                       CURLOPT_POSTFIELDS => $postdata,
                  );
    curl_setopt_array($ch, $curl_opts);
    $rtn = unserialize(curl_exec($ch));
    if (is_array($rtn)) {
        foreach ($rtn as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k1 => $v1) {
                    if (mb_detect_encoding($v1) == 'UTF-8')
                        continue;
                    $rtn[$k][$k1] = mb_convert_encoding($v1, 'UTF-8', 'GB2312');
                }   
            }
            else {
                if (mb_detect_encoding($v) == 'UTF-8')
                    continue;
                $rtn[$k] = mb_convert_encoding($v, 'UTF-8', 'GB2312');
            }
        }   
    }
    if (isset($_REQUEST['debug'])) {
        var_dump($rtn);exit;
    }
    
    return $rtn;
}

function agent_register($data) {
    return api_call(AS_API.AS_ACTION_REG.'?reg=partner', $data);
}


define('AS_API', 'http://101.187.216.194:8080/dataapi/');
define('AS_ACTION_REG', 'reg.php');

$postdata['t_type'] = 'sub'; // fix value
$postdata['t_cate'] = 'education'; // fix value
$postdata['t_name'] = 'panitest'; //Company name
$postdata['t_web'] = '';  // web site
$postdata['t_tel'] = ''; // mobile
$postdata['t_email'] = ''; // email
$postdata['t_add'] = ''; // address
$postdata['t_contact'] = ''; // contact name
$postdata['t_city'] = '';
$postdata['t_state'] = '';
$postdata['t_wechatid'] = '';
$postdata['t_pos'] = ''; // position


var_dump(agent_register($postdata));