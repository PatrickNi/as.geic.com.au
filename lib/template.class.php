<?php
class Template extends Smarty{
   	
    function Template() {
    	$this->Smarty();
		$this->template_dir	= SMARTY_TPL_PATH;
		$this->compile_dir	= SMARTY_CPL_PATH;
		$this->config_dir	= SMARTY_CFG_PATH;
		$this->cache_dir	= SMARTY_CAH_PATH;
//		$this->caching		= true;
    }
}
?>
