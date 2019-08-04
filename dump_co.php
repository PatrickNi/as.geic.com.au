<?php
define('FRONTEND_PATH', dirname(__FILE__));
set_include_path(get_include_path() . PATH_SEPARATOR . FRONTEND_PATH . '/lib' . PATH_SEPARATOR . FRONTEND_PATH . '/tpl' . PATH_SEPARATOR . FRONTEND_PATH . '/config'. PATH_SEPARATOR . FRONTEND_PATH . '/include');


require_once 'define.php';
include_once FUNC_BASE;
include_once FUNC_BASE_CLIENT;
$co = dump_country();
$file_tmp = FRONTEND_PATH."/country.tmp";
$file = FRONTEND_PATH."/country.php";

if (is_array($co) && count($co) > 0) {
	file_put_contents($file_tmp, "<?php return ".var_export($co,true).";\n");
	rename($file_tmp, $file);
}

$ca = dump_visacate();
$file_tmp = FRONTEND_PATH."/visacate.tmp";
$file = FRONTEND_PATH."/visacate.php";
if (is_array($co) && count($co) > 0) {
	file_put_contents($file_tmp, "<?php return ".var_export($ca,true).";\n");
	rename($file_tmp, $file);
}

