<?php
/**
 * 控制器 - 用户
 */
class Users extends CI_Controller {

	/**
	 * 默认
	 */
	public function index() {
		$this->login();
	}

	/**
	 * 用户登录
	 */
	public function login() {
		// 用户已登录
		if (check_userlogin()) {
			//redirect(DEFAULT_PAGE);
		}
		
		// 接受参数
		$sReferer = $this->input->get("referer");

		// 校验参数

		$this->load->library('template');
		$this->template->assign("title", "用户 - 登录");
		$this->template->assign("referer", $sReferer);
		$this->template->view('users/login');
	}

	/**
	 * 处理登录
	 */
	public function do_login() {
		// 接受数据
		$iAjax		= $this->input->get_post("aj");				// 是否是ajax请求
		$sLoginName	= $this->input->post("loginname");			// 登录名
		$sPassword	= $this->input->post("password");			// 密码
		$sReferer	= $this->input->post("referer");			// referer
		$sReferer	= empty($sReferer) ? DEFAULT_PAGE : $sReferer;
		$sRememerLogin	= $this->input->post("rememername");

		// 校验数据格式
		$this->load->helper("notice");
		if (empty($sLoginName) || empty($sPassword)) {
			show_message(MSG_001, "MSG_001", false, "users/login", $iAjax);
		}

		// 检查数据
		$this->load->model('Common_Model');
		$this->Common_Model->setParam(T_USER, "id");
		$aWhere["username"] = $sLoginName;
		$aUserInfo = $this->Common_Model->getInfoByField($aWhere);
		if (!$aUserInfo) {
			show_message(MSG_002, "MSG_002", false, "users/login", $iAjax);
		} else {
			// 检查用户状态

			if ($sPassword == $aUserInfo["password"]) {
				// cookie\session保存
				$iExpireTime = time() + CK_EXPIRE_TIME;
				set_cookie(CK_USERID, $auserInfo["id"], $iExpireTime);
				set_cookie(CK_EXPIRE, $iExpireTime, $iExpireTime);
				// 加密串保存
				$sUserIP = getIP();
				$sSecString = hashCookie($sUserID, $iExpireTime, $sUserIP);
				$this->Common_Model->saveInfo(array("expire_string" => $sSecString), $aUserInfo["id"]);

				session_start();
				$_SESSION[CK_USERID] = $auserInfo["id"];
				$_SESSION[CK_USERNAME] = $sLoginName;

				if ($iAjax == 1) {
					show_message(MSG_OK, "MSG_OK", true, "users/login", $iAjax);
				} else {
					redirect($sReferer);
				}
			} else {
				show_message(MSG_003, "MSG_003", false, "users/login", $iAjax);
			}
		}
	}

	/**
	 * 用户退出
	 */
	public function logout() {
		// 删除cookie
		delete_cookie(CK_USERID);
		delete_cookie(CK_EXPIRE);
		// 删除session
		session_unset();
	}

	/**
	 * 用户注册
	 */
	public function register() {
		$this->load->library('template');
		$this->template->assign("title", "用户 - 注册");
		$this->template->view('users/register');
	}

	public function do_register() {
		sessionStart();
		// 接受参数
		$iAjax	= $this->input->get_post("aj");
		$email	= $this->input->post("email");
		$nick	= $this->input->post("nick");
		$pwd	= $this->input->post("pwd");
		$pwd2	= $this->input->post("pwd2");
		$door	= $this->input->post("door");
		$sReferer = $this->input->post("referer");
		$sReferer = empty($sReferer) ? DEFAULT_PAGE : $sReferer;

		// 参数校验
		$this->load->helper("notice");
		if (empty($email) || empty($nick)) {
			show_message(MSG_004, "MSG_004", false, "users/register", $iAjax);
		}
		if (getAuthCode($door) != $_SESSION["authcode"]) {
			show_message(MSG_007, "MSG_007", false, "users/register", $iAjax);
		}
		
		// 检查是否存在，写入数据库
		$this->load->model('Common_Model');
		$this->Common_Model->setParam(T_USER, "id");
		$bEmailExist = $this->Common_Model->isExists(array("username" => $email));
		if ($bEmailExist) {
			show_message(MSG_005, "MSG_005", false, "users/register", $iAjax);
		}
		$aData = array(
			"username"		=> $email,
			"realname"		=> $nick,
			"password"		=> md5($pwd),
		);
		$iSaveReturn = $this->Common_Model->saveInfo($aData);
		if ($iSaveReturn == false) {
			show_message(MSG_006, "MSG_006", false, "users/register", $iAjax);
		}
		if ($iAjax == 1) {
			show_message(MSG_OK, "MSG_OK", true, "users/register", $iAjax);
		} else {
			redirect($sReferer);
		}
	}

	/**
	 * 创建验证码
	 */
	function authImage() {
		$this->load->library("authimage");
		if ($this->authimage->gdCheck()) {
			header("Content-Type: image/png");
			$this->authimage->showImage();
		} else {
			echo $this->authimage->error;
		}
	}

	/**
	 * ajax - 检查用户名是否存在
	 * @param string 用户名
	 * @return bool
	 */
	function ajaxCheckUserNameExist() {
		if (empty($sUserName)) {
			return false;
		}
		$this->load->model('Common_Model');
		$this->Comon_Model->setParam(T_USER, "id");
		$bEmailExist = $this->Common_Model->isExists(array("username" => $sUserName));
		if ($bEmailExist) {
			//show_message(MSG_005, "MSG_005", false, )
		}
	
	}
}

?>
