<?php
/**
 * smarty插件 - 页面提示信息
 * @author yuhang
 *
 * @param $params['name'] 信息编号
 * @param $params['assign'] 需要复制给的变量，空则直接返回值
 * 
 * @example <%msg name="MSG_001"%>
 */
function smarty_function_msg($params, &$smarty) {
	if (empty($params)) {
		return false;
	}

	$msg = "";
	if (!empty($params['name'])) {
		switch ($params['name']) {
			case "MSG_001":
				$msg = "用户名和密码不匹配";
				break;
			case "MSG_002":
				$msg = "用户名不存在";
				break;
			case "MSG_003":
				$msg = "密码不匹配";
				break;
			case "MSG_OK":
				$msg = "ok";
				break;
		}
	}

	if (!isset($params["assign"]) && empty($params['assign'])) {
		return $msg;
	}

	$smarty->assign($params['assign'], $msg);
}
