<?php
/**
 * 用户状态相关函数
 *
 * @author yuhang
 */

function sessionStart() {
	session_start();
}

/**
 * 检查用户是否在线
 */
function check_userlogin() {
	sessionStart();
	if (isset($_SESSION[CK_USERID]) && !empty($_SESSION[CK_USERID])) {
		return true;
	} else {
		$iUserID = get_cookie(CK_USERID);
		$sExpireTime = get_cookie(CK_EXPIRE_TIME);
		$sUserIP = getIP();
		
		// 读取用户信息
		$CI = &get_instance();
		$CI->load->model("Common_Model");
		$CI->Common_Model->setParam(T_USER, "id");
		$aWhere["id"] = $iUserID;
		$aUserInfo = $CI->Common_Model->getInfoByField($aWhere);
		if (!$aUserInfo) {
			return false;	
		}
		if (hashCookie($iUserID, $sExpireTime, $sUserIP) == $aUserInfo["expire_string"]) {
			$_SESSION[CK_USERID] = $aUserInfo["id"];
			$_SESSION[CK_USERNAME] = $aUserInfo["username"];

			return true;
		}

		return false;
	}
}

/**
 * 获得用户IP
 */
function getIP() {
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$cip = $_SERVER["HTTP_CLIENT_IP"];
  	} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    	} elseif (!empty($_SERVER["REMOTE_ADDR"])) {
      		$cip = $_SERVER["REMOTE_ADDR"];
      	} else {
        	$cip = "null";
	}
	return $cip;
}

/**
 * 生成加密串
 */
function hashCookie($sUserID, $iExpireTime, $sUserIP = "") {
	return md5($sUserID."_".$iExpireTime."_".$sUserIP."_".CK_CONSTANCE);
}

/**
 * hash后的验证码
 */
function getAuthCode($sAuthCode) {
	return md5($sAuthCode.SECURITY_KEY);
}

