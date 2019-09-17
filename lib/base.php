<?php

function get_cookie() {
	$arr = array();
	if (isset($_COOKIE[COOKIE_USER]))
		$arr = explode('|', base64_decode($_COOKIE[COOKIE_USER]));
	return $arr;
}

function set_cookie($retire=false) {
	global $T_USER, $T_EMAIL, $T_STATUS;	

	if ($retire)
		return setcookie(COOKIE_USER, base64_encode(implode('|', array($T_USER, $T_EMAIL, $T_STATUS))), time()-1, '/');
	else
		return setcookie(COOKIE_USER, base64_encode(implode('|', array($T_USER, $T_EMAIL, $T_STATUS))), time()+COOKIE_EXPIRED, '/');
}

function get_user() {
	global $T_USER;
	if ($T_USER != '')
		return $T_USER;
	
	$arr = get_cookie();
	$T_USER =  isset($arr[0])? $arr[0] : 0;
	return $T_USER;
}

function get_email() {
	global $T_EMAIL;
	if ($T_EMAIL != '')
		return $T_EMAIL;

	$arr = get_cookie();
	$T_EMAIL = isset($arr[1])? $arr[1] : '';
	return $T_EMAIL;
}


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


//step control
function set_step($cid=0,$step='') {
	if ($cid == 0 || $step == '')
		return false;

	$sql = "INSERT INTO online_form (CLIENTID, STEP, IS_SAVE) VALUE ('{$cid}', '{$step}', 1) ON DUPLICATE KEY UPDATE IS_SAVE=VALUES(IS_SAVE)";
	return send_query($sql);
}


function confirm_step($cid=0,$step='') {
	if ($cid == 0 || $step == '')
		return false;

	$sql = "INSERT INTO online_form (CLIENTID, STEP, IS_CONFIRM, IS_SAVE) VALUE ('{$cid}', '{$step}', 1, 1) ON DUPLICATE KEY UPDATE IS_CONFIRM=VALUES(IS_CONFIRM),  IS_SAVE=VALUES(IS_SAVE)";
	return send_query($sql);
}

function get_steps($cid=0) {
	if ($cid == 0 || $cid == '')
		return false;

	$sql = "SELECT STEP, IS_SAVE, IS_CONFIRM FROM online_form WHERE CLIENTID = '{$cid}' ";
	$res = send_query($sql);
	$arr = array();
	while($row = fetch_row($res)) {
		$arr[$row['STEP']]['s'] = $row['IS_SAVE'];
		$arr[$row['STEP']]['c'] = $row['IS_CONFIRM'];
	}
	return $arr;
}
