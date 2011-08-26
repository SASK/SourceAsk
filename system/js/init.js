seajs.config({
  'alias': {
    'jquery': './jquery.js'
  }
});
define(function(require) {
 	var $ = require("jquery");
 	var question = require("./question");
	$(function(){
		question.autoDrawColor("#FFEFC6");
                question.AddTagDeleteIcon();
                require('tag').init();
        });
});

