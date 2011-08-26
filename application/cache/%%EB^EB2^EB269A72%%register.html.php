<?php /* Smarty version 2.6.26, created on 2011-08-23 17:29:00
         compiled from users/register.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['CSSDIR']; ?>
/main.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['JSDIR']; ?>
/sea.js" data-main="<?php echo $this->_tpl_vars['JSDIR']; ?>
/regist"></script>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>

<body>
<div class="wrapper">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_only.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<h1 class="reg">注册</h1>
	<div class="reg_con">
		<div class="reg_left">
			<form name="register" action="/users/do_register" method="post">
			<div><span>我的邮箱：</span>
			<input type="text" name="email" id="email" />
			<em >请输入常用邮箱</em></div>
			<div><span>昵称：</span>
			<input type="text" name="nick" id="nick" />
			<em>不超过7个汉字</em></div>
			<div><span>创建密码：</span>
			<input type="password" name="pwd" id="p1" />
			<em class="right_img">密码长度6～14位</em>
			</div>
			<div><span>确认密码：</span>
			<input type="password" name="pwd2" id="p2" />
        		<em class="right_img"></em></div>
			<div><span>验证码：</span>
			<input type="text" name="basedoor" id="door" />
			</div>
			<div class="check"><img src="/users/authimage" alt="" /><a href="javascript: void(0);">换一张</a></div>
			<a href="javascript: void(0);" class="reg_btn" onclick="document.register.submit();">立即注册</a>
			</form>
			<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
		</div>
		<div class="reg_right">
			<div class="photo"></div>
		</div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer_only.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>