<?php
define('FRONTEND_PATH', dirname(dirname(__FILE__)));
set_include_path(get_include_path() . PATH_SEPARATOR . FRONTEND_PATH . '/lib' . PATH_SEPARATOR . FRONTEND_PATH . '/tpl' . PATH_SEPARATOR . FRONTEND_PATH . '/config'. PATH_SEPARATOR . FRONTEND_PATH . '/i
nclude');


require_once FRONTEND_PATH.'/config/define.php';
require_once FUNC_DB_SOURCE;
require_once DEFINE_DB_WWW;

include_once FUNC_BASE;
include_once FUNC_BASE_CLIENT;


include_once dirname(__FILE__).'/table.php';

$sync_cfg = array( 'client_info' => AS_API.AS_ACTION_REG,
		   'client_qual' => AS_API.AS_ACTION_EDU,
		   'client_work' => AS_API.AS_ACTION_WXP,
		   'client_ielts' => AS_API.AS_ACTION_IELTS, 
		);
//upload client_info
foreach ($sync_cfg as $tbl => $websvr) {
	if (!isset($TABLE[$tbl]))
		continue;

	//col
	$cols = $TABLE[$tbl]['col'];
	$sql = "SELECT `".implode('`,`', array_keys($cols))."` FROM {$tbl} WHERE RSYNC = 0";
	$res = send_query($sql);
	$uplodes = array();
	while ($row = fetch_row($res)) {
		$arr = array('post' => array(), 'pk' => '');
		foreach ($row as $k => $v) {
			if ($cols[$k] == 'pk') {
				$arr['pk'] = "{$k} = {$v}";
				continue;
			}
			elseif (stripos($cols[$k], 'fk:') === 0) {
				if ($v > 0){
					$arr['post'][str_replace('fk:', '', $cols[$k])] = $v;
				}
			}
			else {
		   		$arr['post'][$cols[$k]] = $v;
			}
		}

		foreach ($TABLE[$tbl]['ext'] as $k => $v) {
			$arr['post'][$k] = $v;
		}

		array_push($uplodes, $arr);	
	}

	foreach ($uplodes as $v) {
		$rtn = api_call($websvr, $v['post']);
		if (stripos($rtn, 'succ') !== false) {
			$sql = "UPDATE {$tbl} SET RSYNC = 1 WHERE {$v['pk']} ";
			echo $sql."\n";
			send_query($sql);
		}
		elseif (preg_match('/^([\d]+)$/', trim($rtn), $m)) {
			$sql = "UPDATE {$tbl} SET FK={$m[1]}, RSYNC = 1 WHERE {$v['pk']} "; 
			echo $sql."\n";
			send_query($sql);
		}
	}		
}


//client
foreach ($sync_cfg as $tbl => $websvr) {
        if (!isset($TABLE[$tbl]))
                continue;

        //col
        $cols = $TABLE[$tbl]['col'];
        $sql = "SELECT `".implode('`,`', array_keys($cols))."` FROM {$tbl} WHERE RSYNC = 2";
        $res = send_query($sql);
        $uplodes = array();
        while ($row = fetch_row($res)) {

                $arr = array('get' => array(), 'pk' => '');
        	foreach ($row as $k => $v) {
                        if ($cols[$k] == 'pk') {
                                $arr['pk'] = "{$k} = {$v}";
                                continue;
                        }
                        elseif (stripos($cols[$k], 'fk:') === 0) {
                                if ($v > 0){
                                        $arr['get'][str_replace('fk:', '', $cols[$k])] = $v;
                                	$arr['get']['del'] = 1; 
				}
                        }
 
		}
		
		array_push($uplodes, $arr);	
	}
	
        foreach ($uplodes as $v) {
		$_str = '';                                                                                                   
                foreach ($v['get'] as $k=>$val) {
			$_str .= '&'.$k.'='.$val;
		}                                                                                                 
                $rtn = api_call($websvr.'?'.$_str);                                                                                            
                if (stripos($rtn, 'succ') !== false) {                                                                               
                        $sql = "UPDATE {$tbl} SET RSYNC = 1 WHERE {$v['pk']} ";                                                      
                        echo $sql."\n";                                                                                              
                        send_query($sql);                                                                                            
                }                                                                                                                    
        }  	
}

