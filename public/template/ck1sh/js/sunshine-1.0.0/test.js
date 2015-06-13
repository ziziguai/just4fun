define(
	['sunshine/datetime'],
	function(datetime){
		"use strict";
		!(function(){
			console.log(0);
		})(window.jQuery);

		var foo1 = function(){
			console.log(1);
		};

		var foo2 = function(){
			foo1();
			console.log(2);
		};

		$(document).ready(function() {
			datetime.initDatetimePicker($('[name=testInput]'));
		});

		return {
			foo2: foo2,
		};
});