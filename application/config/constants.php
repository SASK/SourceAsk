<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

// 定义数据表
define("T_USER", "cb_user");

// 定义状态
define("MSG_OK", "ok");
define("MSG_001", "用户名和密码不匹配");
define("MSG_002", "用户名不存在");
define("MSG_003", "密码不匹配");
define("MSG_004", "注册信息不完整");
define("MSG_005", "邮箱已经存在，请更换邮箱");
define("MSG_006", "注册失败");
define("MSG_007", "验证码错误");

// 定义常用变量
define("DEFAULT_PAGE", "/question");	// 默认跳转页面
define("CK_USERID", "userid");		// cookie id
define("CK_USERNAME", "username");	// cookie 用户名
define("CK_PASSWD", "passwd");		// 用户密码
define("CK_EXPIRE_TIME", 604800);	// cookie 生产时间
define("CK_CONSTANCE", "everyonelovesourceask");

// 验证码
define("SECURITY_KEY", "ilovesourceask");

/* End of file constants.php */
/* Location: ./application/config/constants.php */
