<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'smarty/Smarty.class.php';

class Template extends Smarty
{
	function  __construct() {
		$this->Smarty();
		$this->template_dir		= APPPATH . "views/";						// 模板目录
		$this->compile_dir		= APPPATH . "cache/";						// 编译目录
		$this->plugins_dir		= array('plugins', APPPATH . "plugins");	// 插件目录
		$this->left_delimiter	= "<%";										// 边界符
		$this->right_delimiter	= "%>";

		// 定义图片、js路径
		$this->assign("IMGDIR", base_url().APPPATH."views/image");
		$this->assign("JSDIR", base_url().APPPATH."views/js");
		$this->assign("CSSDIR", base_url().APPPATH."views/css");
		$this->assign("FONTDIR", base_url().APPPATH."views/fonts");
	}

	function view($resource_name, $cache_id = null) {
		if (strpos($resource_name, '.') === false) {
			$resource_name .= ".html";
		}
		parent::display($resource_name, $cache_id);
	}
}

?>
