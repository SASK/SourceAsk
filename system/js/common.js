define(function(require, exports, module){
	var Static = require("static");
	exports.isEmail = function(email){
		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		return myreg.test(email);
	}
	exports.samePass = function(a, b){
		return (a == b);
	}
	exports.exitNick = function(nick){
	}
	exports.vertifyNum = function(n){
	}
	exports.registwarn = function(em, wclass, rclass, msg, imgsrc){
		em.html('<img src="' + imgsrc + '">');
		em.removeClass(rclass).addClass(wclass).html(em.html() + msg);
	}
})
