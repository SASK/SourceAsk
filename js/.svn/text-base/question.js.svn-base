define(function(require, exports, module) {
 	var $ = require("jquery");

	exports.autoDrawColor = function(color){
			//console.log(exports.tags);
			!color && (color = '#FFEFC6');
			var myfavTags = $(".addtag .tag span"),
 			questionTagsf = $(".question .q_tag");
 			exports.tags = " ";
	 		for(var i = 0; i < myfavTags.length; i++){
		 		exports.tags += myfavTags.eq(i).html().trim() + " ";
		 	}
			questionTagsf.each(function(){
				var questionTags = $(this).children(".tag");
				for(var i = 0; i < questionTags.length; i++){
		 			if(exports.tags.indexOf(questionTags.eq(i).html().trim() + " ") != -1){
		 				questionTags.eq(i).parents(".q").css("background",color);
		 				break;
		 			}
		 			questionTags.eq(i).parents(".q").css("background","#fff");
		 		}
		 });
	};
	exports.AddTagDeleteIcon = function(){
		var myfavTags = $(".addtag .tag");
		myfavTags.each(function(){
			$(this).html($(this).html() + '<a href="#" class="deltag"></a>');
		});
	}
});
