"use strict";
define(
	['moment', 'util', 'oms', 'order_details'],
	function(moment, util, oms, orderDetails){
		$(function(){
			var global_info = {
				'platform': util.numberClean($("#platform").val()), //获取平台代码
				'sign': 'discarded',	// 查询类型标记
				'filter': undefined,	// 查询类型
				'conditions': undefined,// 查询条件
				'page': undefined,		// 分页页码
				'pageSize': undefined,	// 分页大小
			}; // 全局信息变量

			// Load已丢弃订单
			listDiscardedOrder();
			// 初始化普通查询组件
			oms.initNormalSearchModule(global_info, listDiscardedOrder);
			// 初始化"同步订单"组件
			oms.initSyncOrderModule(global_info);

			/* 获取已撤销订单数据列表 */
			function listDiscardedOrder(pageInfo){
				if(pageInfo != undefined){
					global_info.page = pageInfo.page;
					global_info.pageSize = pageInfo.pageSize;
				}
				oms.listOrder(global_info, listDiscardedOrder, function(order){
					var template = '';
					template = '<tr data-oid="' + order.order_id + '">'
						+ '<td><input name="orderLineCheckBox" type="checkbox" data-oid="' + order.order_id + '"/></td>'
						+ '<td ><span class="limit-width" data-toggle="tooltip" title="'+ order.OrderID +'"><a name="orderDetailBtn" data-oid="' + order.order_id + '" href="javascript:;">' + (order.OrderID ? order.OrderID : '...')
							+ '</a>' + util.toBool(order.is_export, ' <span class="label label-info">已导出</span>', '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.discarded_time ? moment.unix(order.discarded_time).format('YYYY-MM-DD HH:mm') : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.discarded_type ? order.discarded_type : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+ order.shop_nick +'">' + (order.shop_nick ? order.shop_nick : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+ order.buyer_email +'">' + (order.buyer_email ? order.buyer_email : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+ order.country_name +'">'
							+ (order.country_code ? ('<span class="label label-info">' + order.country_code + '</span> ') : '')
							+ (order.country_name ? order.country_name : '') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+ order.buyer_selected +'">' + (order.buyer_selected ? order.buyer_selected : '') + '</span></td>'
						+ '<td><span class="limit-width">' + (order.quantity ? order.quantity : '') + '</span></td>'
						+ '<td class="' + ((order.weight && order.weight != 0) ? '' : 'text-error') + '"><span class="limit-width">'
							+ ((order.weight && order.weight != 0) ? order.weight : '0.0') + '</span></td>'
						+ '<td class="' + ((order.declare_price && order.declare_price > 0) ? '' : 'text-error') + '"><span class="limit-width">'
							+ (order.declare_price ? order.declare_price : '0.0')
								+ (order.declare_currency ? (' <span class="label label-info">' + order.declare_currency + '</span>') : '') + '</span></td>'
						+ '<td class="' + (order.declare_name ? '' : 'text-error') + '"><span class="limit-width" data-toggle="tooltip" title="'+ order.declare_name +'">'
						+ (order.declare_name ? order.declare_name : '未填写') + '</span></td>'
						+ '<td><span class="limit-width" data-toggle="tooltip" title="'+ order.remark +'">' + (order.remark ? order.remark : '') + '</span></td></tr>';
					return template;
				}, function(){
					// 绑定订单列表提示信息
					$('#orderDisplayTableList').find('[data-toggle=tooltip]').tooltip();
				});
			}

			/* 还原已删除的订单 */
			$('#restorebtns').on('click',function(){
				var checkInfo = oms.checkOrderSelected();
				if(checkInfo.result){
					$.post('?r=oms/shorder/restore',
						{platform: global_info.platform, ids: checkInfo.ids},
						function(data, status){
							if(status && data.result){
								util.showTips('success', '还原成功！');
								// 还原成功刷新列表
								listDiscardedOrder();
								return true;
							}
							util.showTips('error', '还原失败，请重新尝试！');
							return false;
						});
				}
			});

			/* 导出订单 按钮点击事件 */
			$("#exportOrder").on("click",function(){
				var str_allId = '';
				var ids = [];
				var flag = false;
				var $allCheckBox = $('.tabBodyCon tbody tr input[type=checkbox]:checked');
				for (var i = 0; i < $allCheckBox.length; i++) {
					str_allId += $allCheckBox.eq(i).parent().parent().attr('data-oid') + ','
				}
				$.ajax({
					url:"?r=oms/shorder/NotExportNumber&platform="+$("#platform").val()+'&type=discarded',
					success:function(result){
						$("#labelAllOrder span").text("导出所有已撤销订单("+result.quantity+"条)");
				}
				})
				var nStr_allId = str_allId.substr(0, str_allId.length - 1);
				if(nStr_allId.length ==0){
					$('#exportOrdrer').attr('export-type',1);
					$("#explodeDelOrder").attr("checked",true);
					$("#explodeChooseOrder").attr("disabled",true);

				}else{
					$('#exportOrdrer').attr('data-id',nStr_allId);
					$('#exportOrdrer').attr('export-type',2);
					$("#explodeChooseOrder").attr("checked",true);
					$("#explodeChooseOrder").attr("disabled",false);
				}
				$('#exportOrdrer').modal({backdrop: true, show: true});
			});

			// 导出订单 modal确定按钮点击事件
			$("#downOrder").on("click",function(){
				if($("#explodeDelOrder").prop("checked")){
					$('#exportOrdrer').attr('export-type',1);
				}else{
					$('#exportOrdrer').attr('export-type',2);
				}

				var oids = $('#exportOrdrer').attr('data-id');
				var exportType = $('#exportOrdrer').attr('export-type');
				var platform = $("#platform").val();
				var exportUrl = "&platform="+platform+"&ordertype=discarded&type="+exportType+"&ids="+oids;
				$(this).addClass("disabled");
				$.ajax({
					url : '?r=oms/shorder/export'+exportUrl,
					success :function(result){
						util.uncheckBox();
						$("#downOrder").removeClass("disabled");
						if(!result.url){
							util.showTips('warning', "没有可以导出的订单");
							$('#exportOrdrer').modal('hide');
						}else{
							// 下载文件
							util.idownload(result.url);
							$('#exportOrdrer').modal('hide');
						}
					}
				});
			});
		});
	});