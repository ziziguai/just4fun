"use strict";
define(['util'], function(util){
	/**
	 * @desc 显示订单详情弹窗组件
	 * @params string sign 订单类型标记
	 * @params int platform 平台代码阿
	 * @params int orderId 订单ID
	 * @author Weixun Luo
	 * @date 2015-05-28
	 */
	var showOrderDetailsModal = function(sign, platform, orderId){
		var $orderDetailsModal = $('#orderDetailsModal');
		if($orderDetailsModal.length <= 0){
			// 加载模板
			$.get('public/template/ck1sh/order/order_details.html?_201505281530',
				function(component){
					$('body').append(component);
					return showOrderDetailsModal(sign, platform, orderId);
				});
		}
		// 加载数据
		$.get(
			'?r=oms/shorder/listdetails', 
			{sign: sign, platform: platform, oid: orderId}, 
			function(data, status){
				if(status === 'success' && data.status){
					$orderDetailsModal.find('[name=OrderID]').text(data.details.base.OrderID);
					$orderDetailsModal.modal({show: true, backdrop: true});
					// console.log(data.details);
				}
		});
	};

	return {
		showOrderDetailsModal: showOrderDetailsModal,
	};
});