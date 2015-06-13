"use strict";
define(
	['datepicker', 'datepicker_cn'], 
	function(datepicker, datepicker_cn){
	// [封装]日期控件-(注：必须在页面加载日期控件的js,css文件)--start
	var initDatetimePicker = function (obj) {
		obj.datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			weekStart: 1,
			minView: 1,
			autoclose: true,
			todayBtn: true,
			todayHighlight: true,
			forceParse: true,
			language: 'zh-CN',
		});
		//获取当前日期
		var today = new Date();
		today.setHours(today.getHours() + 1)
		obj.datetimepicker('setEndDate', today);
	};
	// [封装]日期控件-(注：必须在页面加载日期控件的js,css文件)--end

	return {
		initDatetimePicker: initDatetimePicker,
	};
});