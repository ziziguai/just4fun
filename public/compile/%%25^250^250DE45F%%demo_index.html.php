<?php /* Smarty version 2.6.28, created on 2015-04-07 03:50:13
         compiled from ck1sh/demo_index.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>出口易,专业海外仓储及配送服务提供商 </title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
		<!--[if lt IE 10]>
			<script src="http://res.chukou1.com/vendor/html5shiv/3.6/html5.js?t=20121019" ></script>
			<link href="http://res.chukou1.com/vendor/html5shiv/3.6/html5.css?t=d7d73" type="text/css" rel="stylesheet" />
		<![endif]-->
		<script async="" src="http://www.google-analytics.com/analytics.js"></script>
		<script src="http://res.chukou1.com/vendor/seajs/seajs/2.1.1/sea.js?t=20130814s"></script>
		<script src="http://res.chukou1.com/timestamp.js?t=20150119162401"></script>
		<script src="http://res.chukou1.com/vendor/seajs/seajs/2.1.1/plugin-timestamp.js?t=20130814"></script>
		<script src="http://res.chukou1.com/seajs_config.js?t=20150119162401"></script>
		<script src="http://demo.chukou1.cn/Store/js/common.js" type="text/javascript"></script>
		<script src="http://demo.chukou1.cn/Store/js/popup.js" type="text/javascript"></script>
		<script src="http://demo.chukou1.cn/Store/js/popup_helper.js" type="text/javascript"></script>
		<link href="http://res.chukou1.com/vendor/bootstrap/2.3.2/css/bootstrap.min.css?t=d7d73" type="text/css" rel="stylesheet">
		<link href="http://res.chukou1.com/yewu/comm/css/reset.css?t=d8835" type="text/css" rel="stylesheet">
		<link href="http://res.chukou1.com/yewu/client/index2014.css?t=7c619" type="text/css" rel="stylesheet">
		<link charset="utf-8" rel="stylesheet" href="http://res.chukou1.com/comm/widget/message_box.css?t=f021a">
	</head>
	<body>
		<div class="head row-fluid">
			<div class="logo-div span4">
				<a class="logo" href="http://demo.chukou1.cn/Client/Home/Home.aspx" target="main"></a>
				<span class="app-name">物流信息系统</span>
			</div>
			<div class="span8">
				<div class="welcome">
					<p class="textcss">
						<span id="UserTrueName">Guest</span>&nbsp;
						<a href="http://demo.chukou1.cn/Client/logout.aspx">退出</a> 客户经理： 未知用户 &nbsp;&nbsp; 客服： 朱扬谷
						<a target="_blank" href="http://www.chukou1.com/content/QQConsultation.aspx" title="联系客服">
							<img style="zoom: 72%; margin-right: 3px;" src="http://p1.ck1cdn.com/0/0_95580a.png">在线客服</a>
						<a href="http://docs.chukou1.cn/" target="_blank">
							<img src="http://p1.ck1cdn.com/0/0_6aa9d5.png" style="margin-right: 3px;">帮助中心</a>
						<a target="_blank" href="http://www.chukou1.com/" title="点击访问官网">出口易官网</a>
					</p>
				</div>
				<div class="quicks">
					<ul class="bannercontent">
						<li><a href="http://demo.chukou1.cn/Client/Orders/InStoreNew.aspx" target="main">新建入库订单</a></li>
						<li><a href="http://demo.chukou1.cn/Client/Orders/OutStoreBasic.aspx" target="main">新建出库订单</a></li>
						<li><a href="http://demo.chukou1.cn/Client/Orders/ExpressEdit.aspx" target="main">新建直发订单</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="wrap" id="wrap">
			<div id="navmenu" class="navmenu">
				<ul class="mainmenu">
					<li class="">
						<h3>仓储服务<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>入库订单</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/InStoreList2014.aspx" target="main">入库订单</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/ShippingSchedule.aspx" target="main">物流计划</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Orders/InStoreNew.aspx" target="main">新建入库订单</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Orders/InStoreNew.aspx?isFBA=true" target="main">新建FBA入库订单</a>
									</li>
								</ul>
							</li>
							<li>
								<h4>出库订单</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/OutStoreList.aspx" target="main">出库订单</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Report/OutStoreProduct.aspx?TBP=9%7C%7C%7C%7C%7C%7C%7C" target="main">出库未发</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Report/OutStoreProduct.aspx?active=out-store-list" target="main">出库产品表</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Orders/OutStoreBasic.aspx" target="main">新建出库订单</a></li>
								</ul>
							</li>
							<li>
								<h4>退件管理</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/OrderReturn/OrderReturnMgr.aspx" target="main">自有库存退件</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/OrderReturn/m2corderreturnmgr.aspx" target="main">Ｍ2C退件</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/OrderReturn/m2caftersales.aspx" target="main">厂家售后退件</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/OrderReturn/UnClaimedList.aspx" target="main">待补填信息</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/OrderReturn/OrderReturnAdd.aspx" target="main">申请退件</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>直发服务<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>直发服务</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/ExpressSearch.aspx" target="main">直发包裹</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/ExpressList.aspx" target="main">直发订单</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/ExpressPending.aspx" target="main">问题件</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/ExpressDeleted.aspx" target="main">已删除订单</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Orders/ExpressEdit.aspx" target="main">新建直发订单</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>仓<span class="gap"></span>库<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>仓库</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=GZ" target="main">广州仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=US" target="main">旧金山仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=AU" target="main">澳大利亚仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=UK" target="main">英国仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=DE" target="main">德国仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=NJ" target="main">新泽西仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/ShareList.aspx" target="main">共享库存</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=ES" target="main">西班牙仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=LA" target="main">洛杉矶仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=TO" target="main">加拿大仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=MO" target="main">俄罗斯仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=RI" target="main">拉脱维亚仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=HK" target="main">香港仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockList2014.aspx?storage=ON" target="main">安大略仓库</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/MyShareList.aspx" target="main">我的共享库存</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Product/GetStockCode.aspx" target="main">获取库存编码</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/StockWarmingReport.aspx" target="main">分析报表</a></li>
								</ul>
							</li>
							<li>
								<h4>SKU</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Product/ModelList.aspx?TBP=%E6%AD%A3%E5%B8%B8%7C%7C" target="main">SKU管理</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Product/ModelEdit.aspx" target="main">新建SKU</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>工<span class="gap"></span>具<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>工具</h4>
								<ul class="links">
									<li class=""><a href="?r=oms/shorder/normal&platform=100" target="main">eBay</a></li>
									<li class=""><a href="?r=oms/shorder/normal&platform=101" target="main">亚马逊</a></li>
									<li class=""><a href="?r=oms/shorder/normal&platform=102" target="main">速卖通</a></li>
									<li class=""><a href="?r=oms/shorder/normal&platform=104" target="main">Wish</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/SellingHelper/DHgateOrders.aspx" target="main">敦煌网</a></li>
									<li class=""><a href="?r=oms/shproduct/productsku" target="main">产品信息管理</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/SellingHelper/ShippingMap/ShippingMapIndex.aspx" target="main">发货方式设置</a></li>
									<li class=""><a href="?r=oms/shproduct/salesku" target="main">销售Sku设置</a></li>
								</ul>
							</li>
							<li>
								<h4>智能下单</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Tools/USOrderTool/OrderOutImport.aspx" target="main">数据导入</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Tools/USOrderTool/ImportLogList.aspx" target="main">导入日志</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>财<span class="gap"></span>务<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>我的钱包</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Billing/MyPurse.aspx" target="main">我的钱包</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Finance/Index.aspx" target="main">余额管理</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Finance/Recharge2Accounts.aspx" target="main">支付宝/网银充值</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Finance/Index.aspx" target="main">PayPal充值</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Finance/ApplyList.aspx" target="main">汇款充值确认</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Finance/Index.aspx" target="main">Payoneer充值</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Finance/RechargeHistory.aspx" target="main">充值历史</a></li>
								</ul>
							</li>
							<li>
								<h4>账务明细</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Billing/CurrentBalance.aspx" target="main">资金往来</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Billing/BizBillsSummary.aspx" target="main">业务往来</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Billing/EBills.aspx" target="main">电子账单</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Finance/List.aspx" target="main">应收应付</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>计价查询<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>计价查询</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/pric_admin/eBayCostAnalysis" target="main">计价分析</a></li>
									<li class=""><a href="http://demo.chukou1.cn/eBayCostAnalysis?type=sales" target="main">销售分析</a></li>
								</ul>
							</li>
							<li>
								<h4>我的报价</h4>
								<ul class="links">
									<li class=""><a href="http://store-zw.chukou1.cn/client_pricing/DirectExpressPricing/SpecialLine" target="main">直发报价</a></li>
									<li class=""><a href="http://store-zw.chukou1.cn/client_pricing/OutBoundPricing/OutBoundDeliveryCharge" target="main">海外仓报价</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>保险服务<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>保险</h4>
								<ul class="links">
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Insured/PiccPending.aspx" target="main">购买保险</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Insured/PiccSubmited.aspx" target="main">投保中</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Insured/PiccAccepted.aspx" target="main">已投保</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Insured/PiccApplyed.aspx" target="main">已索陪</a></li>
									<li class=""><a href="http://docs.chukou1.cn/index.php?title=%E4%BF%9D%E9%99%A9%E6%8C%87%E5%8D%97" target="main">保险服务指南</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>交<span class="gap"></span>货<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>上门收货</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/ReceivingGoods/ReceivingNoteList.aspx" target="main">预约管理</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/ReceivingGoods/MyAddressBook.aspx" target="main">地址管理</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/ReceivingGoods/AutoApplySetting.aspx" target="main">定期收货设置</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/ReceivingGoods/ReceivingNoteEdit.aspx" target="main">预约收货</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/ReceivingGoods/HomeReceivedNoteList.aspx" target="main">已收货清单</a></li>
								</ul>
							</li>
							<li>
								<h4>快递送货</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/ExpressReceiving/ExpressReceivingList.aspx" target="main">已收快递</a>
									</li>
								</ul>
							</li>
							<li>
								<h4>自送货</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/ReceivingGoods/ReceivedNoteList.aspx" target="main">自送货清单</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>包装材料<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>包装材料</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/PackingOrder.aspx" target="main">订单管理</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Orders/PackingCart.aspx" target="main">购物车</a></li>
									<li class="hignlight-menu"><a href="http://demo.chukou1.cn/Client/Orders/PackingList.aspx" target="main">订购包装材料</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="">
						<h3>账<span class="gap"></span>号<span class="arrow">&gt;</span></h3>
						<span class="borderfix"></span>
						<ul class="submenu">
							<li>
								<h4>账号</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Personal/Profile.aspx" target="main">基本资料</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Personal/Password.aspx" target="main">修改密码</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Personal/ProfileSet.aspx" target="main">服务设置</a></li>
								</ul>
							</li>
							<li>
								<h4>问题咨询</h4>
								<ul class="links">
									<li class=""><a href="http://demo.chukou1.cn/Client/Counselling/List.aspx" target="main">我的咨询</a></li>
									<li class=""><a href="http://demo.chukou1.cn/Client/Counselling/New.aspx" target="main">发起咨询</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="content">
				<iframe id="main" name="main" src="http://demo.chukou1.cn/Client/Home/Home.aspx" style="width: 100%; height: 800px; z-index: 1;" frameborder="0"></iframe>
			</div>
			<div class="clear"></div>
		</div>
		<div style="display: none;">
			<div id="welcomeDialog">
				<div class="welcome-bd">
					<p>，您好！欢迎使用出口易系统！您上次登录的时间是： </p>
					<div class="divide-line"></div>
					<div class="account-info">
						<div class="total-balance">
						</div>
					</div>
					<div class="order-status">
						<table>
							<tbody>
								<tr>
									<td><a href="http://demo.chukou1.cn/Client/Orders/OutStoreList.aspx?status=2" target="main">未提审&nbsp;&nbsp;出库单</a><span>（112）</span>
									</td>
									<td><a href="http://demo.chukou1.cn/Client/Orders/InStoreList.aspx?statusType=1" target="main">未提审&nbsp;&nbsp;入库单</a><span>（83）</span>
									</td>
								</tr>
								<tr>
									<td><a href="http://demo.chukou1.cn/Client/Orders/ExpressList.aspx?status=0" target="main">未提审&nbsp;&nbsp;专线订单</a><span>（221）</span>
									</td>
									<td><a href="http://demo.chukou1.cn/Client/Orders/ExpressSearch.aspx?TBP=0%7C%7C%7C%7C%7C" target="main">未提审&nbsp;&nbsp;专线包裹</a><span>（0）</span>
									</td>
								</tr>
								<tr>
									<td><a href="http://demo.chukou1.cn/Client/Report/OutStoreProduct.aspx?TBP=9%7C%7C%7C%7C%7C%7C%7C" target="main">出库单(7天)未发货产品</a><span>（0）</span>
									</td>
									<td><a href="http://demo.chukou1.cn/Client/Report/OutStoreProduct.aspx?TBP=10%7C%7C%7C%7C%7C%7C%7C" target="main">出库单(3个月)退货产品</a><span>（0）</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php echo '
		<script>
			seajs.use(["yewu/client/index2014.js", "ck1", "yewu/client/ad/popupAd.js"], function (page, ck1, popupAd) {
			            var hasComplateProfile = "False" === "True";
			        var showWelcomeMsg = "False" === "True";
			        var config = {};
			        config.showWelcome = showWelcomeMsg;
			        page.init(config);
			        if (hasComplateProfile) {
			            ck1.popupIframe({
			                url: "http://demo.chukou1.cn/Client/Personal/ComplateProfileForm.aspx",
			                width: 600,
			                heigtht: 350,
			                title: "完善用户资料"
			            });
			        }
			        popupAd.init({ clientCode: "TST" });
			    });
		</script>
		<script>
			(function (i, s, o, g, r, a, m) {
			            i[\'GoogleAnalyticsObject\'] = r; i[r] = i[r] || function () {
			                (i[r].q = i[r].q || []).push(arguments)
			            }, i[r].l = 1 * new Date(); a = s.createElement(o),
			            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
			        })(window, document, \'script\', \'//www.google-analytics.com/analytics.js\', \'ga\');
			        ga(\'create\', \'UA-43961864-3\', \'chukou1.cn\');
			        ga(\'send\', \'pageview\');
		</script>
		'; ?>

		<div id="messagebox_568493" class="modal modal-msgbox modal-dialog" style="position: fixed; top: 234.5px; left: 375.5px; visibility: visible; margin: 0px; display: none; z-index: 10003; width: 830px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>易商贷</h3>
			</div>
			<div class="modal-body">
				<a href="http://www.globalpcf.cn/serviceCenter/yishangdai?type=ck1" id="yishangdai" target="_blank">
					<img style="width:800px;height:235px" src="http://pic.chukou1.com/0/0_184b01.png">
				</a>
			</div>
			<div class="modal-footer"></div>
		</div>
		<div class="ck1Mask" style="display: none; position: absolute; z-index: 10001; top: 0px; left: 0px; width: 1920px; height: 603px; opacity: 0; background-color: rgb(255, 255, 255);"></div>
	</body>
</html>