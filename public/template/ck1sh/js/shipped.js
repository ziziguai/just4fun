"use strict";
define(
	['moment', 'util', 'oms', 'order_details'],
	function(moment, util, oms, orderDetails){
		$(function(){
			var global_info = {
				'platform': util.numberClean($('#platform').val()), //获取平台代码
				'sign': 'shipped',		// 查询类型标记
				'filter': undefined,	// 查询类型
				'conditions': undefined,// 查询条件
				'page': undefined,		// 分页页码
				'pageSize': undefined,	// 分页大小
			}; // 全局信息变量

			// list订单数据
			listShippedOrder();
			// 初始化普通查询组件
			oms.initNormalSearchModule(global_info, listShippedOrder);
			// 初始化"同步订单"组件
			oms.initSyncOrderModule(global_info);

			/* 获取已发货订单数据列表 */
			function listShippedOrder(pageInfo){
				if(pageInfo != undefined){
					global_info.page = pageInfo.page;
					global_info.pageSize = pageInfo.pageSize;
				}
				oms.listOrder(global_info, listShippedOrder, function(order){
					var template = '';
					template = '<tr data-oid='+order.order_id+'>'
						+ '<td><input name="orderLineCheckBox" type="checkbox" data-sercode="' + order.service_code + '" data-oid="' + order.order_id + '"></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.OrderID+'"><a name="orderDetailBtn" data-oid="' + order.order_id + '" href="javascript:;">' + (order.OrderID ? order.OrderID : '...')
							+ '</a>' + util.toBool(order.is_export, ' <span class="label label-info">已导出</span>', '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.shipped_time ? moment.unix(order.shipped_time).format('YYYY-MM-DD HH:mm') : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.shop_nick+'">' + (order.shop_nick ? order.shop_nick : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.buyer_email+'">' + (order.buyer_email ? order.buyer_email : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.country_name+'">'
							+ (order.country_code ? ('<span class="label label-info">' + order.country_code + '</span> ') : '')
							+ (order.country_name ? order.country_name : '') + '</td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.shipping_company+'">' + (order.shipping_company ? order.shipping_company : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.service_name+'">' + (order.service_code ? ('<span class="label label-info">' + order.service_code + '</span> ') : '')
							+ (order.service_name? order.service_name : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.package_sn+'">' + (order.package_sn ? order.package_sn : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.tracking_sn+'">' + (order.tracking_sn ? order.tracking_sn : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.quantity ? order.quantity : '') + '</span></td>'
						+ '<td class="' + ((order.weight && order.weight != 0) ? '' : 'text-error') + '"><span class="limit-width">'
							+ ((order.weight && order.weight != 0) ? order.weight : '0.0') + '</span></td>'
						+ '<td class="' + ((order.declare_price && order.declare_price > 0) ? '' : 'text-error') + '"><span class="limit-width">'
							+ (order.declare_price ? order.declare_price : '0.0')
								+ (order.declare_currency ? (' <span class="label label-info">' + order.declare_currency + '</span>') : '') + '</span></td>'
						+ '<td class="' + (order.declare_name ? '' : 'text-error') + '"><span class="limit-width" data-toggle="tooltip" title="'+order.declare_name+'">'
						+ (order.declare_name ? order.declare_name : '未填写') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.shipping_mark_sign ? order.shipping_mark_sign : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.tracking_sign ? order.tracking_sign : '') + '</span></td></tr>';
					return template;
				}, function(){
					var $orderTableList = $('#orderDisplayTableList');
					// 绑定编辑按钮事件
					$orderTableList.find('a[name=orderDetailBtn]').on('click', function(event) {
						// 展示订单详情
						var orderId = util.numberClean($(this).data('oid'));
						oms.listOrderDetails(global_info.sign, global_info.platform, orderId);
					});
					// 绑定订单列表提示信息
					$orderTableList.find('[data-toggle=tooltip]').tooltip();
				});
			}

		 	/* 重新发货 start */
		    (function() {
		    	$('#reshipBtn').click(function() {
		    		// 判断是否选择订单
					var checkInfo = oms.checkOrderSelected();
					if(checkInfo.result) {
						var con = confirm('确定重新发货吗?');
						if (con == true) {
							var ids = checkInfo.ids;
							var platform = $('#platform').val(); //获取平台代码
							var $orderLineCheckBox = $('input[type=checkbox][name=orderLineCheckBox]:checked');
							var aOrderId = [];
							$orderLineCheckBox.each(function(index, item) {
								var $item = $(item);
								aOrderId.push($item.closest('tr').find('td:eq(1)').text());
							});
							console.log(aOrderId);
							$.post('?r=oms/shorder/Reship',{reship:ids,pf:platform,oid:aOrderId},function(data) {
								if (data.status) {
									util.showTips('success',data.msg);
								}else {
									util.showTips('error',data.msg);
								}
							});
						}
					} else {
						return;
					}
		    	})
		    })();/* 重新发货 end */

		 	var aPackageStatus = [];
			/* 下载地址标签 downAddressLabel */
			(function() {
				var checkInfo;
				var $oDownAdd = $('#downAdd');
				// 显示下载地址标签div
				$('#addressLabel').on('click',function() {
					// 判断是否选择订单
					checkInfo = oms.checkOrderSelected();
					if(checkInfo.result) {
						$oDownAdd.modal('show');
						$('.loading').show();
					} else {
						return;
					}

					// 获取直发数量
					var iEsCodeNum = getExpressCodeNum();
					$oDownAdd.find('.express-count #expressNum').html(iEsCodeNum);

					var $orderLineCheckBox = $('input[type=checkbox][name=orderLineCheckBox]:checked');
					var $serverNo = $orderLineCheckBox.eq(0).data('sercode');
					var oPackageSign = [];
					var isEqual = true;

					if ($orderLineCheckBox.length > 1) {
						$orderLineCheckBox.each(function(index, item) {
							var $item = $(item);
							oPackageSign.push($item.closest('tr').find('td:eq(8)').text());
							if ($serverNo !== $item.data('sercode')) {
								isEqual = false;
							}
						});

					}else {
						oPackageSign[0] = $orderLineCheckBox.closest('tr').find('td:eq(8)').text();
					}

					if (oPackageSign) {
						$.ajax({
							url: '?r=oms/shorder/CheckPackageStatus',
							data: {sn:oPackageSign},
							type: 'post',
							async: false,
							success: function(data) {
								aPackageStatus = data;
								util.uncheckBox();
								if (isEqual) {
									$.ajax({
										url: '?r=oms/shorder/ListExpressPrintOption&service=' + $serverNo,
										success: function(data) {
											// 判断显示哪些按钮
											if (aPackageStatus.length == 0) {
												$('#addressLabels').hide();
												$('#customsLabels').hide();
												$('#customsLabel').hide();

											}else if (+data.only_print_address && +data.split) {
												$('#addressLabels').show();
												$('#customsLabels').show();
												$('#customsLabel').show();

											} else if (+data.only_print_address) {
												$('#addressLabels').show();
												$('#customsLabels').hide();
												$('#customsLabel').hide();

											} else if (!+data.only_print_address && +data.split) {
												$('#addressLabels').hide();
												$('#customsLabels').show();
												$('#customsLabel').show();
											}  else {
												$('#addressLabels').hide();
												$('#customsLabels').hide();
												$('#customsLabel').hide();
											}

											if ($.trim(data) == '') {
												$('#downAdd .modal-footer').find('.tagBtn').hide().end().find('b').text('未找到服务').show();
											} else {
												$('#downAdd .modal-footer').find('.tagBtn').show().end().find('b').hide();
											}
										}
									});
								} else {
									$('#downAdd .modal-footer').find('.tagBtn').hide().end().find('b').text('您选择了不同发货方式的包裹，不支持同时打印不同类型的直发包裹标签').show();
								}
							}
						});
					}else {
						setTimeout(function() {
							$('.loading').hide();
						}, 1000);
						return false;
					}
					// 提审数量
					$oDownAdd.find('.express-count #submitAl').html(aPackageStatus.length);
					setTimeout(function() {
						$('.loading').hide();
					}, 1000);
				});

				var $imgLoading = $('#downAdd .img-loading');
				// 地址标签按钮
				$('#addressLabels').on('click',function(event) {
					$imgLoading.fadeIn();
					// 获取单选框的值
					var pageType = $('input[name=pageType]:checked').val();
					var printType = $('#addressLabels').attr('id');
					var dataArr = {'platform': global_info.platform, 'page': pageType, 'type': printType, 'ids': aPackageStatus};
					// 传参数到后台
					$.ajax({
						type: 'post',
						url: '?r=oms/shorder/DownAddressLabel',
						data: dataArr,
						success: function(data){
							$imgLoading.fadeOut();
							if(typeof(data)=='string') {
								window.open(data);
								$oDownAdd.modal('hide');
							}else {
								util.showTips('error',data.meta.description);
								$oDownAdd.modal('hide');
							}
						}
					})
				});

				// 地址标签+报关单按钮
				$('#customsLabels').on('click',function() {
					$imgLoading.fadeIn();
					// 获取单选框的值
					var pageType = $('input[name=pageType]:checked').val();
					var printType = $('#customsLabels').attr('id');
					var dataArr = {'platform': global_info.platform, 'page': pageType, 'type': printType, 'ids': aPackageStatus};
					// 传参数到后台
					$.ajax({
						type: 'post',
						url: '?r=oms/shorder/DownAddressLabel',
						data: dataArr,
						success: function(data){
							$imgLoading.fadeOut();
							if(typeof(data)=='string') {
								window.open(data);
								$oDownAdd.modal('hide');
							} else {
								util.showTips('error',data.meta.description);
							}
						}
					});
				});

				// 地址标签+报关单（拆分）按钮
				$('#customsLabel').on('click',function() {
					$imgLoading.fadeIn();
					// 获取单选框的值
					var pageType = $('input[name=pageType]:checked').val();
					var printType = $('#customsLabel').attr('id');
					var dataArr = {'platform': global_info.platform, 'page': pageType, 'type': printType, 'ids': aPackageStatus};
					// 传参数到后台
					$.ajax({
						type: 'post',
						url: '?r=oms/shorder/DownAddressLabel',
						data: dataArr,
						success: function(data){
							$imgLoading.fadeOut();
							if(typeof(data)=='string') {
								window.open(data);
							} else {
								util.showTips('error',data.meta.description);
							}
						}
					});
				});
			})();/* 下载地址标签 */

			/**
			 * @author Super
			 * @describe 获取选择列表的直发数量
			 */
			function getExpressCodeNum() {
				var aSerCode = [];
				var $oTBody = $('#orderDisplayTableList');

				$oTBody.find('[type=checkbox]:checked').each(function(index, item) {
					var $item = $(item);
					var sSerCode = $item.data('sercode') || '';
					if (sSerCode.length === 3) {
						aSerCode.push($item.data('oid'));
					}
				});
				return aSerCode.length;
			}

			var aPackageState = [];
			/* 下载捡货单 downPickOrder */
			(function() {
				var checkInfo;
				var $oPickGoods = $('#PickGoods');
				// 显示下载捡货单div
				$('#pickOrder').on('click',function() {
					// 判断是否选择订单
					checkInfo = oms.checkOrderSelected();
					if(checkInfo.result) {
						$oPickGoods.modal('show');
						$('.loading').show();
					}else {
						return;
					}

					var iEsCodeNum = getExpressCodeNum();
					$oPickGoods.find('.express-count #pickExNum').html(iEsCodeNum);

					var oPackageSn = [];
					var $orderCheckBox = $('input[type=checkbox][name=orderLineCheckBox]:checked');
					$orderCheckBox.each(function(index,item) {
						var $item = $(item);
						oPackageSn.push($item.closest('tr').find('td:eq(8)').text());
					});

					$.ajax({
						url: '?r=oms/shorder/CheckPackageStatus',
						data: {sn:oPackageSn},
						type: 'post',
						async: false,
						success: function(data) {
							util.uncheckBox();
							aPackageState = data;
						}
					});

					$oPickGoods.find('.express-count #pickSubNum').html(aPackageState.length);

					if (!iEsCodeNum || aPackageState.length == 0) {
						$('#pick').hide();
					} else {
						$('#pick').show();
					}
					setTimeout(function() {
						$('.loading').hide();
					}, 1000);
				});

				// 确认按钮
				$('#pick').on('click',function() {
					var pickType = $('input[name=pickType]:checked').val();
					var idString = aPackageState.join(',');
					var postData = '&platform='+global_info.platform+'&type='+pickType+'&ids='+idString;
					// excel格式
					if (+pickType === 3) {
						$.ajax({
							url: '?r=oms/shorder/DownLoadPick'+postData,
							success: function(url) {
								open(url);
								$oPickGoods.modal('hide');
							}
						});
					} else {
						window.open('?r=oms/shorder/DownLoadPick'+postData);
						$oPickGoods.modal('hide');
					}
				});
			})();/* 下载捡货单 */


			/* 下载挂号 */
			(function() {
				$('#downTracking').on('click', function() {
					$.ajax({
						url:'?r=oms/shorder/NewTDNumber&platform='+global_info.platform+'&downtype=1',
						success : function(result){
						if(result.quantity){
								$('#tranNumber b').text(result.quantity);
							}else{
								$('#tranNumber b').text(0);
							}
						}
					})

					$.ajax({
						url:'?r=oms/shorder/NewTDNumber&platform='+global_info.platform+'&downtype=2',
						success : function(result){
							if(result.quantity){
								$('#dealNumber b').text(result.quantity);
							}else{
								$('#dealNumber b').text(0);
							}
						}
					})

					// 获取选中的id
					var str_allId = '';
					var $allCheckBox = $('.tabBodyCon tbody tr input[type=checkbox]:checked');
					for (var i = 0; i < $allCheckBox.length; i++) {
						str_allId += $allCheckBox.eq(i).parent().parent().attr('data-oid') + ','
					}

					// 没有选择订单，禁止下载挂号
					if(str_allId.length ==0){
						$('#chooseTran input').attr('disabled',true);
						$('#chooseDeal input').attr('disabled',true);
					}else{
						$('#chooseTran input').attr('disabled',false);
						$('#chooseDeal input').attr('disabled',false);
					}

					var nStr_allId = str_allId.substr(0, str_allId.length - 1);
					if(nStr_allId.length >0){
						$('#trackingWindow').attr('ids',nStr_allId);
						$('#chooseTran input').attr('checked',true);
					}else{
						$('#tranNumber input').attr('checked',true);
					}
					$('#trackingWindow').modal('show');
				});
				$(this).addClass('disabled');
				// 下载挂号
				$('#downloadTracking').on('click',function(){
					var downtype = $('#trackingWindow p  input[name=registeredType]:checked').attr('downtype');
					var oids =  $('#trackingWindow').attr('ids');
					var exportUrl = '&platform='+global_info.platform+'&ordertype=shipped&type='+downtype+'&ids='+oids;
					$.ajax({
						url : '?r=oms/shorder/export'+exportUrl,
						success :function(result){
							$('#downTracking').removeClass('disabled');
							if(!result.url){
								if(downtype==4){
									util.showTips('warning', '没有最新的挂号可以导出');
								}else if(downtype==5){
									util.showTips('warning', '没有可以导出挂号的订单(挂号状态已同步才能导出)');
								}else if(downtype==6){
									util.showTips('warning', '没有最新的处理号可以导出');
								}else if(downtype==7){
									util.showTips('warning', '没有可以导出处理号的订单');
								}
								$('#trackingWindow').modal('hide');
							}else{
								// 下载文件
								util.idownload(result.url);
								$('#trackingWindow').modal('hide');
								return false;
							}
						}
					})
				});
			})();/* 下载挂号结束 */
		});
	});