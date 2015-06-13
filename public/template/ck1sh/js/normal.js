"use strict";
define(
	['moment', 'util', 'oms', 'order_details', 'shipping'],
	function(moment, util, oms, orderDetails, shipping){
		$(function(){
			// $(document).ready(function() {
			var global_info = {
				platform: util.numberClean($('#platform').val()), // 获取平台代码
				sign: 'normal',			// 查询类型标记
				filter: undefined,		// 查询类型
				conditions: undefined,	// 查询条件
				page: undefined,		// 分页页码
				pageSize: undefined,	// 分页大小
			}; // 全局信息变量

			// 首次加载订单列表
			listNormalOrder();
			// 初始化普通查询组件
			oms.initNormalSearchModule(global_info, listNormalOrder);
			// 初始化单条件查询组件
			oms.initSingleSearchModule(global_info, listNormalOrder);
			// 初始化高级查询组件
			oms.initAdvancedSearchModal(global_info, listNormalOrder);
			// 初始化"同步订单"组件
			oms.initSyncOrderModule(global_info, listNormalOrder);

			// [发货方式选择]按钮点击事件
			$('a[name=shippingTypeButton]').on('click', function(event) {
				var checkInfo = oms.checkOrderSelected();
				if(checkInfo.result){
					var service = $(this).data('service');
					shipping.go(global_info.platform, service, listNormalOrder);
				}
			});

			// [确认发货]按钮点击事件
			$('a[name=normalOrderShipping]').on('click', function(event) {
				shippingOrders();
			});

			// [撤销订单]按钮事件
			$('a[name=normalOrderDiscard]').on('click', function(event) {
				var $current = $(event.currentTarget);
				var type = util.numberClean($current.data('value'));
				discardOrders(type);
			});

			/*---------------------------------------------------------------------------------------*/
			/* 获取待发货订单数据列表--> */
			function listNormalOrder(pageInfo){
				if(pageInfo != undefined){
					global_info.page = pageInfo.page;
					global_info.pageSize = pageInfo.pageSize;
				}
				oms.listOrder(global_info, listNormalOrder, function(order){
					var template = '';
					template = '<tr data-oid="' + order.order_id + '">'
						+ '<td><input name="orderLineCheckBox" type="checkbox" data-oid="' + order.order_id + '"/></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.OrderID +'">'
						+ '<a name="orderEditButton" data-oid="' + order.order_id + '" href="javascript:;">' + (order.OrderID ? order.OrderID : '...')
							+ '</a>' + util.toBool(order.is_export, ' <span class="label label-info">已导出</span>', '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.paid_time ? moment.unix(order.paid_time).format('YYYY-MM-DD HH:mm') : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+(order.shop_nick ? order.shop_nick : '')+'">' + (order.shop_nick ? order.shop_nick : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+(order.buyer_email ? order.buyer_email : '')+'">' + (order.buyer_email ? order.buyer_email : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.country_name+'">'
							+ (order.country_code ? ('<span class="label label-info">' + order.country_code + '</span> ') : '')
							+ (order.country_name ? order.country_name : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.buyer_selected ? order.buyer_selected : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+order.service_name+'">' + (order.service_code ? ('<span class="label label-info">' + order.service_code + '</span> ') : '')
							+ (order.service_name ? order.service_name : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.tracking_sn ? order.tracking_sn : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.quantity ? order.quantity : '') + '</span></td>'
						+ '<td class="' + ((order.weight && order.weight > 0) ? '' : 'text-error') + '"><span class="limit-width">'
							+ (order.weight ? order.weight : '0.0') + '</span></td>'
						+ '<td class="' + ((order.declare_price && order.declare_price > 0) ? '' : 'text-error') + '"><span class="limit-width">'
							+ (order.declare_price ? order.declare_price : '0.0')
								+ (order.declare_currency ? (' <span class="label label-info">' + order.declare_currency + '</span>') : '') + '</span></td>'
						+ '<td class="' + (order.declare_name ? '' : 'text-error') + '"><span class="limit-width" data-toggle="tooltip" title="'+ order.declare_name +'">'
						+ (order.declare_name ? order.declare_name : '未填写') + '</span></td>'
						+ '<td><a name="orderEditButton" data-oid="' + order.order_id + '" href="javascript:;">编辑<i class="icon icon-pencil"></i></a></td></tr>';
					return template;
				}, function(){
					var $orderTableList = $('#orderDisplayTableList');
					// 绑定编辑按钮事件
					$orderTableList.find('a[name=orderEditButton]').on('click', function(event) {
						// 调用编辑框呈现方法
						var orderId = util.numberClean($(this).data('oid'));
						orderDetails.showOrderDetailsModal(global_info.sign, global_info.platform, orderId);
						// showEditWindows(global_info.platform, orderId, function(order){
						// 	var $orderLineItem = $("tr[data-oid="+orderId+"]");
						// });
					});
					// 绑定订单列表提示信息
					$orderTableList.find('[data-toggle=tooltip]').tooltip();
				});
			}/* <--获取待发货订单数据列表 */

			/* 确认发货--> */
			function shippingOrders(){
				var checkInfo = oms.checkOrderSelected();
				if(checkInfo.result){
					$.post('?r=oms/shorder/ComfirmBeforeShipping', {platform: global_info.platform, ids: checkInfo.ids},
						function(data){
							showSHShippingConfirmModal(data);
					});
				}
			}/* <--确认发货 */

			/* 展示CK1确认发货窗口--> */
			function showSHShippingConfirmModal(confirmData){
				var $imgLoading = $('#shShippingConfirmModal .img-loading');
				if(!confirmData.status){
					util.showTips('error', '操作不成功!');
				}
				var shShippingConfirmModal = $("#shShippingConfirmModal");
				if(shShippingConfirmModal.length > 0){
					shShippingConfirmModal.find("[name=unSelectCount]").text(confirmData.classify.none);  // 未选服务订单数
					shShippingConfirmModal.find("[name=overseaCount]").text(confirmData.classify.osea);  // 海外仓订单数
					shShippingConfirmModal.find("[name=expressCount]").text(confirmData.classify.exp);  // 直发订单数
					if(confirmData.classify.none > 0){
						// 有未选服务的订单，显示提醒信息
						shShippingConfirmModal.find("[name=unSelectCount]").parent().show();
					} else {
						shShippingConfirmModal.find("[name=unSelectCount]").parent().hide();
					}

					// 处理点选项加载
					var handleSites_temp = '';
					var $handleSitesSelect = shShippingConfirmModal.find("[name=handlerSites]");
					var i = 0;
					$.each(confirmData.handleSites, function(index, name){
						handleSites_temp += '<option ' + (i === 0 ? 'selected="selected"' : '') + 'value="' + index + '">' + name + '</option>';
						i++;
					});
					$handleSitesSelect.html(handleSites_temp);

					// 移除"生成订单"按钮原有事件
					if(confirmData.classify.exp === 0 && confirmData.classify.osea === 0){
						shShippingConfirmModal.find("[name=createOutsOrderButton]").addClass("disabled").unbind("click");
					} else {
						// 生成订单按钮点击事件
						shShippingConfirmModal.find("[name=createOutsOrderButton]").removeClass("disabled").unbind("click").on('click', function(event){
							$imgLoading.fadeIn();
							$(this).addClass("disabled").unbind("click");  // 禁用“确认发货”按钮
							var handle_site = $handleSitesSelect.children("option:selected").val();
							$.post('?r=oms/shorder/shipping', {platform: global_info.platform, handle_site: handle_site, ids: confirmData.ids},
								function(data){
									$imgLoading.fadeOut();
									var num = typeof data.num == "undefined" ? '成功发货' + 0 + '条' +  '<br>' : '成功发货' + data.num + '条' +  '<br>' ;
									var msg = num;
									for (var d in data) {
										if(d == 'num') continue;
										msg += typeof data[d].orders == "undefined" ? '' : '<br>' + data[d].orders;
										msg += typeof data[d].msg == "undefined" ? '' : '<br>' + data[d].msg;
									};
									msg = msg.replace(/包裹(\d)/g, '<br>包裹$1');
									util.showTipsX({extend: msg,confirm:true,delay:0});
									shShippingConfirmModal.modal('hide');
									listNormalOrder();
							});
						});
					}
					// 窗体呈现
					shShippingConfirmModal.modal({backdrop: true, show: true});
				} else {
					// 引入发货确认框模板
					$.get("public/template/ck1sh/order/shipping_confirm.html?_201501021010",
						function(component){
							$('body').append(component);
							showSHShippingConfirmModal(confirmData);
						});
				}
			}/* <--展示CK1确认发货窗口 */

			/* 撤销订单处理--> */
			function discardOrders(type){
				var checkInfo = oms.checkOrderSelected();
				if(checkInfo.result){
					// 有选中的订单
					// 调用后台，discard订单
					$.post('?r=oms/shorder/discard', {platform: global_info.platform, type: type, ids: checkInfo.ids},
						function(data){
							if(data.status){
								util.showTips('success', '操作成功!');
								// 刷新订单列表
								listNormalOrder();
							} else {
								util.showTips('error', '操作不成功!');
							}
					});
				}
			}/* <--撤销订单处理 */

			/* 导出订单--> */
			var $oExportOrdrer = $('#exportOrdrer');
			$("#normalOrderExport").on("click",function(){
				$oExportOrdrer.modal({backdrop: true, show: true});
				var str_allId = '';
				var ids = [];
				var flag = false;
				var $allCheckBox = $('.tabBodyCon tbody tr input[type=checkbox]:checked');
				for (var i = 0; i < $allCheckBox.length; i++) {
					str_allId += $allCheckBox.eq(i).parent().parent().attr('data-oid') + ','
				}
				$.ajax({
					url:"?r=oms/shorder/NotExportNumber&platform="+$("#platform").val()+'&type=normal',
					success:function(result){
						$("#labelAllOrder span").text("导出未导出订单("+result.quantity+"条)");
				}
				})
				var nStr_allId = str_allId.substr(0, str_allId.length - 1);
				if(nStr_allId.length ==0){
					$oExportOrdrer.attr('export-type',1);
					$("#explodeDelOrder").attr("checked",true);
					$("#explodeChooseOrder").attr("disabled",true);

				}else{
					$oExportOrdrer.attr('data-id',nStr_allId);
					$oExportOrdrer.attr('export-type',2);
					$("#explodeChooseOrder").attr("checked",true);
					$("#explodeChooseOrder").attr("disabled",false);
				}
			});/* <--导出订单 */

			/* 下载导出订单--> */
			$("#downExportOrder").on("click",function(){
				// 下载未导出订单与下载所选订单选
				if($("#explodeDelOrder").prop("checked")){
					$oExportOrdrer.attr('export-type',3);
				}else{
					$oExportOrdrer.attr('export-type',2);
				}

				var oids = $oExportOrdrer.attr('data-id');
				var exportType = $oExportOrdrer.attr('export-type');
				var platform = $('#platform').val();
				$(this).addClass('disabled');
				util.loading();
				$.ajax({
					type: 'POST',
					dataType: 'json',
					data: {platform: platform, ordertype: 'normal', type: exportType, ids: oids},
					url : '?r=oms/shorder/export',
					success :function(result){
						util.removeloading();
						util.uncheckBox();
						$('#downExportOrder').removeClass('disabled');
						if(!result.url){
							util.showTips('warning', '没有可以导出的订单');
							$oExportOrdrer.modal('hide');
						}else{
							//下载文件
							util.idownload(result.url);
							$oExportOrdrer.modal('hide');
						}
					}
				});
			});/* <--下载导出订单 */
		});
	});