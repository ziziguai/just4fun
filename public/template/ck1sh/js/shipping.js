"use strict";
define(['util', 'oms'], function(util, oms){
	/* 选择发货方式按钮点击事件Hnadler */
	var go = function(platform, service, callbackAfterSucceed){
		switch(service){
			case 'express': goExpress(platform, callbackAfterSucceed);break;
			case 'oversea': goOversea(platform, callbackAfterSucceed);break;
			case 'amazon' : goAmazon(platform, callbackAfterSucceed);break;
			case 'cancel' : cancelShipping(platform, callbackAfterSucceed);break;
		}
	};

	/* 直发服务Handler */
	function goExpress(platform, callbackAfterSucceed){
		$.get('?r=oms/shorder/ListExpressServices', function(data){
			if(data.status){
				return showExpressShippingConfirmModal(platform, data.services, callbackAfterSucceed);
			}
			util.showTips('error', '获取直发服务列表失败，请重新尝试!');
		});
	}

	/* 展示直发服务选择Modal */
	function showExpressShippingConfirmModal(platform, services, callbackAfterSucceed){
		var $expressConfirmModal = $('[name=expressConfirmModal]');
		if($expressConfirmModal.length <= 0){
			// 取消发货方式确认Modal未加载
			$.get('public/template/ck1sh/order/express_confirm.html?_201501021011',
				function(component){
					$('body').append(component);	// 加载取消发货方式确认Modal
					$expressConfirmModal = $('[name=expressConfirmModal]');
					// 选项效果渲染
					$expressConfirmModal.find('[name=expressServiceOptions]').change(function(event) {
						$expressConfirmModal.find('[name=expressServiceOptionsCode]').text($(this).val());
					});
					// 绑定确定按钮点击事件
					$expressConfirmModal.find('[name=confirmButton]').on('click', function(event){
						var service = $expressConfirmModal.find('[name=expressServiceOptions]>option:selected').val();
						var serviceInfo = {type: 'express', service: service};
						setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed);
					});
					return showExpressShippingConfirmModal(platform, services, callbackAfterSucceed);
				});
		}
		var services_template = '';
		// Build option template
		$.each(services, function(index, service) {
			if(index === 0){
				$expressConfirmModal.find('[name=expressServiceOptionsCode]').text(service.code);
			}
			services_template += '<option value="' + service.code + '">' + service.code + ' - ' + service.name + '</option>';
		});
		$expressConfirmModal.find("[name=expressServiceOptions]").html(services_template);
		$expressConfirmModal.modal('show');
	}

	/* 海外仓储服务Handler */
	function goOversea(platform, callbackAfterSucceed){
		$.post('?r=oms/shorder/ListOverseaServices',
			function(data){
				if(data.status){
					showOverseaShippingConfirmModal(platform, data, callbackAfterSucceed);
				}
		});
	}

	/* 呈现海外仓发货选择Modal */
	function showOverseaShippingConfirmModal(platform, data, callbackAfterSucceed){
		var $overseaConfirmModal = $('[name=overseaConfirmModal]');
		if($overseaConfirmModal.length <= 0){
			// 取消发货方式确认Modal未加载
			$.get('public/template/ck1sh/order/oversea_confirm.html?_201505181420', 
				function(component){
					$('body').append(component);  // 加载取消发货方式确认Modal
					$overseaConfirmModal = $('[name=overseaConfirmModal]');
					var $overseaWarehouseOptions = $overseaConfirmModal.find('[name=overseaWarehouseOptions]');
					var $overseaServiceOptions = $overseaConfirmModal.find('[name=overseaServiceOptions]');
					var $overseaServiceOptionsCode = $overseaConfirmModal.find('[name=overseaServiceOptionsCode]');
					// 选项效果渲染
					$overseaServiceOptions.live('change', function(event) {
						$overseaServiceOptionsCode.text($(this).val());
					});
					// 仓库选择变更事件
					$overseaWarehouseOptions.live('change', function(event) {
						var wh_code = $(this).val();
						$.post('?r=oms/shorder/ListOverseaServices', {wh: wh_code}, function(data){
							if(data.status){
								var services_template = '';
								$.each(data.services, function(index, service) {
									if(index === 0){
										$overseaServiceOptionsCode.text(service.code);
									}
									services_template += '<option value="' + service.code + '">' + service.code + ' - ' + service.name + '</option>';
								});
								$overseaServiceOptions.html(services_template);
							}
						});
					});
					// 绑定确定按钮点击事件
					$overseaConfirmModal.find('[name=confirmButton]').on('click', function(event){
						var wh_code = $overseaWarehouseOptions.val();
						var service = $overseaServiceOptions.val();
						var serviceInfo = {type: 'oversea', wh: wh_code, service: service};
						setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed);
					});
					return showOverseaShippingConfirmModal(platform, data, callbackAfterSucceed);
				});
		}
		if(data.whs != undefined && data.wh_code != undefined){
			// 仓库绑定
			var warehouse_template = '';
			$.each(data.whs, function(index, warehouse) {
				warehouse_template += '<option value="' + warehouse.code + '">' + warehouse.code + ' - ' + warehouse.name + '</option>';
			});
			$overseaConfirmModal.find('[name=overseaWarehouseOptions]').html(warehouse_template).val(data.wh_code);
		}
		// 服务绑定
		var services_template = '';
		$.each(data.services, function(index, service) {
			if(index === 0){
				$overseaConfirmModal.find('[name=overseaServiceOptionsCode]').text(service.code);
			}
			services_template += '<option value="' + service.code + '">' + service.code + ' - ' + service.name + '</option>';
		});
		$overseaConfirmModal.find('[name=overseaServiceOptions]').html(services_template);
		$overseaConfirmModal.modal('show');
	}

	/* 亚马逊英国直发服务Handler */
	function goAmazon(platform, callbackAfterSucceed){
		var checkInfo = oms.checkOrderSelected();
		$.post('?r=oms/shorder/AZServiceConfirm', {platform: platform, ids: checkInfo.ids}, 
			function(data){
				if(data.status){
					if(data.isOver){
						// 有订单超过了申报价值
						return showAZShippingConfirmModal(platform, data.count, callbackAfterSucceed);
					}
					var serviceInfo = {type: 'amazon', fix: false};
					return setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed);
				}
		});
	}

	/* 展示亚马逊专线发货服务确认Modal */
	function showAZShippingConfirmModal(platform, count, callbackAfterSucceed){
		var $amazonShippingConfirmModal = $("[name=amazonShippingConfirmModal]");
		if($amazonShippingConfirmModal.length <= 0){
			// 取消发货方式确认Modal未加载
			$.get("public/template/ck1sh/order/amazon_confirm.html?_201501021010", 
				function(component){
					$("body").append(component);  // 加载亚马逊英国直发服务确认Modal
					$amazonShippingConfirmModal = $("[name=amazonShippingConfirmModal]");
					// 绑定"修改并确认（修正申报价格）"确定按钮点击事件
					$amazonShippingConfirmModal.find("[name=fixPriceButton]").on('click', function(event){
						var serviceInfo = {type: 'amazon', fix: true};
						setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed);
					});
					// 绑定"直接确认（不修正申报价格）"确定按钮点击事件
					$amazonShippingConfirmModal.find("[name=normalSetButton]").on('click', function(event){
						var serviceInfo = {type: 'amazon', fix: false};
						setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed);
					});
					return showAZShippingConfirmModal(platform, count, callbackAfterSucceed);
				});
		}
		// 设置显示超过报价的订单数
		$amazonShippingConfirmModal.find("[name=overOrderCount]").text(count);
		// 显示亚马逊发货服务确认弹框
		$amazonShippingConfirmModal.modal('show');
	}

	/* 取消发货服务Handler */
	function cancelShipping(platform, callbackAfterSucceed){
		var $cancelShippingConfirmModal = $("[name=cancelShippingConfirmModal]");
		if($cancelShippingConfirmModal.length <= 0){
			// 取消发货方式确认Modal未加载
			$.get("public/template/ck1sh/order/cancel_shipping_confirm.html?_201501021010", 
				function(component){
					$("body").append(component);  // 加载取消发货方式确认Modal
					$cancelShippingConfirmModal = $("[name=cancelShippingConfirmModal]");
					// 绑定确定按钮点击事件
					$cancelShippingConfirmModal.find("[name=confirmButton]").on('click', function(event){
						var serviceInfo = {type: 'cancel'};
						setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed);
					});

					// 返回处理进程,显示弹窗
					return cancelShipping(platform, callbackAfterSucceed);
				});
		}
		// 显示取消确认弹框
		$cancelShippingConfirmModal.modal('show');
	}

	function setShippingServiceToOrder(platform, serviceInfo, callbackAfterSucceed){
		var checkInfo = oms.checkOrderSelected();
		$.post('?r=oms/shorder/SetShippingService', 
			{platform: platform, serviceInfo: serviceInfo, ids: checkInfo.ids}, 
			function(data){
				if(data.status){
					util.showTips('success', serviceInfo.type != 'cancel' ? '设置发货服务成功!' : '取消发货服务成功!');
					if(callbackAfterSucceed != undefined){
						callbackAfterSucceed();
					}
				} else {
					util.showTips('error', serviceInfo.type != 'cancel' ? '设置发货服务不成功!' : '取消发货服务成功!');
				}
		});
	}

	return {
		go: go,
	};
});