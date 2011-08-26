define(function(require, exports, module){
	var $ = require("jquery"),
		user = require("user"),
		common = require('common'),
		sta = require('static'),
		Loginsta = 0;
		require("prototype").init();
	$(function(){
		$('#loginname').blur(function(){
			user.RegistVertify("EMAIL",$(this).val()) ? 
			(common.registwarn($(this).parent().children('em'), '' ,'error', '', sta.RightPic) && (loginsta = 1)): 
			(common.registwarn($(this).parent().children('em'), 'error' ,'', '请输入合法的邮箱', sta.WrongPic) && (Loginsta = 0));
		})
		$("#login_submit_btn").click(function(){
			(!Loginsta && (function(){ return false;})());
			$.post("/users/do_login",{"aj" : 1, "loginname" : $("#loginname").val(), "password" : $("#password").val()}, function(data){
				if(1){
					common.go(((window.location.search.Parse('uri'))['refer'] || sta.index));
				}
			});
		})
	})
})
