define(function(require, exports, module){
	var $ = require("jquery"),
		user = require("user"),
		common = require('common'),
		sta = require('static');
	$('#loginname').blur(function(){
		user.RegistVertify("EMAIL",$(this).val().trim()) ? 
		(	
			1 ? 
			common.registwarn($(this).parent().children('em'), '' ,'error', '', sta.RightPic) :
			common.registwarn($(this).parent().children('em'), 'error' ,'', '用户名已存在', sta.WrongPic)
		) : 
		common.registwarn($(this).parent().children('em'), 'error' ,'', '请输入合法的邮箱', sta.WrongPic);
	})
})