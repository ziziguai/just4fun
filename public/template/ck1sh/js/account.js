/* 账号管理相关共用方法封装 */
"use strict";
define(['util'], function(util){
	/**
	 * @desc 检查账号选中情况,没选中账号,返回false,否则返回选中账号id（数组）
	 * @param [bool] {showWarning} 若没选中账号是否显示警告信息
	 * @author Weixun Luo
	 */
	var checkSelected = function(showWarning){
		var $accountLineCheckBox = $('input[type=checkbox][name=accountLineCheckBox]');
		var ids = [];
		var flag = false;
		if(showWarning === undefined){
			showWarning = true;
		}
		$.each($accountLineCheckBox, function(index, item) {
			var itemObject = $(item);
			if(itemObject.is(':checked')){
				ids.push(numberClean(itemObject.data('aid')));
				flag = true;
			}
		});
		if(flag){
			return {result: true, ids: ids};
		} else {
			if(showWarning){
				util.showTips('warning', '未选择账号记录!');
			}
			return {result: false};
		}
	};/* <--Check账号选中情况 end*/

	/**
	 * @desc 账号启用、禁用、删除基本操作初始化
	 * @param [object] {baseUrl} 若没选中账号是否显示警告信息
	 * @author Weixun Luo
	 */
	var initBaseOperation = function(baseUrl) {
		var $operationBtn = $('a[data-baseop]');
		$operationBtn.on('click', function(){
			var self = $(this);
			var ids = [];
			ids.push(self.data('aid'));
			if(typeof self.data('aid') === 'undefined'){
				var checkInfo = checkSelected();
				if(!checkInfo.result){
					return false;
				}
				ids = checkInfo.ids;
			}
			//操作类型为删除操作时，弹窗提示
			if (self.data('baseop') == 'delete') {
				var tips = confirm('确定删除？');
				if (!tips == true) {
					return;
				}
			}else{
				$(this).parent().parent().remove('tr');
			}
			// 请求处理操作
			$.get(baseUrl+'&op='+self.data('baseop'), {ids: ids}, function(data, status){
				if(status === 'success'){
					util.showTips(data.status ? 'success' : 'error', data.msg);
					if(data.status){
						setTimeout(function(){window.location.reload();}, 3000);
					}
					return true;
				}
				util.showTips('error', "操作失败，请重新尝试!");
				return false;
			});
		});
	};/* <--账号启用、禁用、删除基本操作初始化 end */

	return {
		initBaseOperation: initBaseOperation,
	};
});