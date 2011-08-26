<?php
/**
 * 提示
 *
 * @author yuhang
 */

function show_message($message, $recode = "", $bTrue = false, $page="", $type = "") {
	$oLoader = &load_class('Loader');
	$CI = &get_instance();
	if (empty ($type)) {
		$oLoader->library('Template');
		$CI->template->assign('msg', $message);
		$CI->template->assign('result', $bTrue);
		$CI->template->view($page);
	} else {
		$oLoader->library('Zend/Zend_json');
		$json = array('result' => $bTrue, 'msg' => $message, "recode" => $recode);
		ob_start();
		header("Content-Type: application/json;");	
		print $CI->zend_json->encode($json);
	}
	exit;
}
?>
