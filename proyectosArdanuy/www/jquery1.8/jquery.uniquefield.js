/**
 * jquery.uniqueField.js
 * Copyright (c) 2009 (www.bulgaria-web-developers.com/en/home)
 * 
 * @author Dimitar Ivanov (info@bulgaria-web-developers.com)
 * @date 2009-05-22
 * @projectDescription UniqueField is jQuery plugin check for unique values 
 * @version 1.0
 * 
 * @requires jquery.js (tested with 1.3.2)
 * @param url: "", //required
 * @param baseId: "", // required
 * @param availableClass: "availableValue", //optional
 * @param unavailableClass: "unavailableValue", //optional
 * @param availableLabel: "is available.", //optional
 * @param unavailableLabel: "is already in use.", //optional
 * @param baseClass: "availability", //optional
 * @param location: 1 // 1 == after, else == before
 */
(function($){
	// Prototype methods	
	$.fn.uniqueField = function(options) {  

		var defaults = {
			url: "ajax.php", //required
			baseId: '', // required
			availableClass: "availableValue", //optional
			unavailableClass: "unavailableValue", //optional
			availableLabel: "is available.", //optional
			unavailableLabel: "is already in use.", //optional
			baseClass: "availability", //optional
			location: 1 // 1 == after, else == before
		}; 
		var options = $.extend(defaults, options);
		
		var resultStyle = new Array();
		var resultText  = new Array();
		      
		return this.each(function() { 
			var obj = $(this);

	 		$(obj).unbind().keyup(function() {
					
				testUnique($(this).val(), $(this).attr('name'));

				$(this).ajaxComplete(function(){
					if(options.location === 1) {
						$(this).next("#" + options.baseId).remove();
						$(this).after("<span id=\""+options.baseId+"\" class=\""+options.baseClass+"\"><span></span></span>");
						$(this).next("#" + options.baseId).addClass(resultStyle[options.baseId]).find("span").text(resultText[options.baseId]);
					} else {
						$(this).prev("#" + options.baseId).remove();
						$(this).before("<span id=\""+options.baseId+"\" class=\""+options.baseClass+"\"><span></span></span>");
						$(this).prev("#" + options.baseId).addClass(resultStyle[options.baseId]).find("span").text(resultText[options.baseId]);
					}
				});
	 		});

	 		// Private function
			function testUnique(value, field){
			 	$.ajax({
			 		type: 'POST',
			 		url: options.url, 
			 		data: {value: value, field: field}, 
			 		success: function(response){
				 		if (response == '1'){
			 			 	resultStyle[options.baseId] = options.availableClass;
			 			 	resultText[options.baseId]  = value + ' ' + options.availableLabel;
					 	} else {
					 		resultStyle[options.baseId] = options.unavailableClass;
					 		resultText[options.baseId]  = value + ' ' + options.unavailableLabel;
					 	}
			 		}
			 	});
			 	return false;
			};

		});
	};
})(jQuery);