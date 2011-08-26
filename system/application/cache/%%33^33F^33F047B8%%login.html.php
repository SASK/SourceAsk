<?php /* Smarty version 2.6.26, created on 2011-08-22 06:54:27
         compiled from users/login.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['CSSDIR']; ?>
/main.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['JSDIR']; ?>
/sea.js" data-main="login"></script>
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
	<h1 class="reg"><?php echo $this->_tpl_vars['title']; ?>
</h1>
	<div class="log_con">
		<form name="login" action="/users/do_login" method="post">
		<input type="hidden" name="referer" value="<?php echo $this->_tpl_vars['referer']; ?>
" />
		<div class="login">
			<h2>还没有账号？<a href="/users/register">立即注册</a></h2>
			<div>
				<span>登录邮箱：</span>
				<input type="text" name="loginname" id="loginname" autocomplete="off" tabindex="1" title="邮箱" style="color: rgb(153,153,153);" alt="邮箱" />
				<em></em>
			</div>
			<div>
				<span>密码：</span>
				<input type="password" name="password" id="password" tabindex="2" title="密码" style="color: rgb(153,153,153);" />
				<em ><a href="#" tabindex="4" target="_blank">取回密码</a></em>
			</div>
			<div>
				<input class="checkbox" type="checkbox" name="rememername" id="rememname" checked="false" tabindex="3" />
				<label for="rememername">下次自动登录</label>
			</div>
			<div><?php echo $this->_tpl_vars['message']; ?>
</div>
			<a id="login_submit_btn" tabindex="5" href="javascript: void(0);" class="reg_btn">登录</a>
		</div>
		</form>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer_only.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>