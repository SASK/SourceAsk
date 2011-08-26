define(function(require, exports, module){
	exports.init = function(){
		String.prototype.StrLen = function(){
			var len = 0;  
		 	for (var i=0; i<this.length; i++) {   
		 		var c = this.charCodeAt(i);   
		 		//单字节加1   
				if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f)) {   
		  			len++;   
		 		}   
		 		else {   
		  			len+=2;   
		  		}   
		  	}   
		   	return len;
		}
	}
})