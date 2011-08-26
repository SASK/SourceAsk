define(function(require){
	var $ = require('jquery'),
		user = require("user"),
		common = require('common'),
		sta = require('static');
	$(function(){
		$('#email').blur(function(){
			user.RegistVertify("EMAIL",$(this).val().trim()) ?
			common.registwarn($(this).parent().children('em'), '' ,'error', '', sta.RightPic) : 
			common.registwarn($(this).parent().children('em'), 'error' ,'', '请输入合法的邮箱', sta.WrongPic);
		})
		$('#p2').blur(function(){
			if($("#p2").val() == "" || $("#p1").val() == ""){
				return;
			}
			user.RegistVertify("PASSWORD",$(this).val(),$("#p1").val()) ?
			common.registwarn($(this).parent().children('em'), '' ,'error', '', sta.RightPic) : 
			common.registwarn($(this).parent().children('em'), 'error' ,'', '两次密码输入不一致', sta.WrongPic);
		})
		$('#p1').blur(function(){
			var len = $(this).val().trim().length;
			(len <= 14 && len >= 6) ?
			common.registwarn($(this).parent().children('em'), '' ,'error', '', sta.RightPic) : 
			common.registwarn($(this).parent().children('em'), 'error' ,'', '密码长度6～14位', sta.WrongPic);
			if($("#p2").val() == "" || $("#p1").val() == ""){
				return;
			}
			user.RegistVertify("PASSWORD",$(this).val(),$("#p2").val());
		})
		$("#nick").blur(function(){
			user.RegistVertify("NICK", $(this).val()) ?
			common.registwarn($(this).parent().children('em'), '' ,'error', '', sta.RightPic) : 
			common.registwarn($(this).parent().children('em'), 'error' ,'', '2~7个汉字,4~14个字符', sta.WrongPic);
		})
	});
})
