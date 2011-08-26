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
		String.prototype.Parse = function(type){
         	if("" == this){
				return false;
			}
			var arr = [],obj = [];
			if(type){
				switch(type){
					case "uri":
						arr = this.match(/[^\?^&]+/g);	
						for(var i = 0; i < arr.length; i++){
							var temp = arr[i].split('='); 
							obj[temp[i]] = temp[++i] || "";
						}
						return obj;
					break;
				}
			}else{
				return this;
			}
		}
	}
})