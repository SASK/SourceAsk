define(function(require, exports, module){
	var $ = require("jquery");
	var question = require("question");
	RemoveFavTag = function(tagid, that){
		$(that).parent().remove();
		question.autoDrawColor();
	}
	AddFavTag = function(value){
		if(question.tags.toLowerCase().indexOf(" " + value.toLowerCase() + " ") != -1 || value == ""){
			$("#addfavtag").val("");
			$("#favtags .tag span").each(function(){
				if($(this).html().trim().toLowerCase() == value.toLowerCase()){
					var that = $(this).parent();;
					that.animate({opacity: 0}, "slow", function(){
						that.animate({opacity: 1}, "slow")
					})
				}
			})
			return 0;
		}
		$("#favtags").append('<span class="tag"><span>' + value + '</span><a class="deltag" href="javascript:void(0)"></a></span>');
		question.tags += value + " ";
		question.autoDrawColor();
		$("#addfavtag").val("");
	}
	exports.init = function(){
		$("#favtags").delegate(".deltag", "click",function(){
			RemoveFavTag($(this).attr("tagid"), this);
		})
		$(".addaction a").click(function(){
			AddFavTag($("#addfavtag").val().trim());
		});
		$("#addfavtag").keydown(function(e){
			if(e.keyCode == 13){
				AddFavTag($("#addfavtag").val().trim());
			}
		})
	}
})
