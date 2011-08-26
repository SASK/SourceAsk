define(function(require, exports, module){
	var Static = require('static');
	var common = require('common');
	require("prototype").init();
	exports.RegistVertify = function(){
		var arg = arguments;
		switch(arg[0]){
			case 'EMAIL':{
				return common.isEmail(arg[1]);
				break;
			}
			case 'NICK':{
				return (arg[1].StrLen() <= 14 && arg[1].StrLen() >=4);
				break;
			}
			case 'PASSWORD':{
				(arg[1].length > 14 &&arg[2].length < 6)  && ((function(){return }())) 
				return (arg[1] == arg[2]);
				break;
			}
			case 'VERTIFY':{
				break;
			}
		}
	}
	exports.Login = function(){
	}
	
})


