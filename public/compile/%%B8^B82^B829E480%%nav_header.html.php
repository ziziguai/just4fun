<?php /* Smarty version 2.6.28, created on 2014-11-24 09:31:01
         compiled from oms/nav_header.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>测试版OMS</title>
		<link rel="stylesheet" href="public/template/css/oms/index.css" />
		<link rel="stylesheet" href="public/template/css/oms/linpeiyan.css" />
		<link rel="stylesheet" href="public/template/css/oms/liangwenya.css" />
		<link rel="stylesheet" href="public/template/css/oms/super.css" />
		<script type="text/javascript" src="public/template/js/jquery-1.8.3.js" ></script>
		<script type="text/javascript" src="public/template/js/oms/index.js" ></script>
		<script type="text/javascript" src="public/template/js/oms/main.js" ></script>
	</head>

	<body>
		<div class="orderLiPopDet">
			<div class="OLPD_bor">
				<h3>订单详情<span id="OLPD_close" title="点击关闭窗口">关闭</span></h3>
				<div class="OLPD_con">
					<!--------------订单详情--------------------------->
					<div class="order_bor order_det_new">
						<h2>产品详情</h2>
						<div class="orderDetNewCon">
							<table cellpadding="0" cellspacing="0" width="99%" class="comInfo">
								<thead>
									<tr>
										<td>产品名称</td>
										<td>SKU</td>
										<td>库存编码</td>
										<td>数量</td>
										<td>重量(kg)</td>
										<td class="declareNone">申报名称<b class="redStar">*</b></td>
										<td class="declareNone">申报价格<b class="redStar">*</b></td>
										<!--<td width="5%">操作</td>-->
									</tr>
								</thead>
								<tbody>
									<tr data-id='1'>
										<!--<td width='5%'><input type='checkbox' /></td>-->
										<td>
											<input name='name' type='text' disabled>
										</td>
										<td>
											<input name='warehouse_sku' type='text'>
										</td>
										<td>
											<input name='stock_id' type='text' disabled>
										</td>
										<td>
											<input name='purchase_quantity' type='text'>
										</td>
										<td>
											<input name='kg' type='text' disabled>
										</td>
										<td class="declareNone">
											<input name='declareName' type='text' >
										</td>
										<td class="declareNone">
											<input name='declarePrice' type='text'>
										</td>
										<!--<td width='5%'><a href='#'>删除</a></td>-->
									</tr>
								</tbody>
							</table>
						</div>
						<div class="collect">
							<div class="colBtn">
								<!--<span class="batchDel">批量删除</span>
								<span class="addCom">添加商品</span>
								<span title="编辑完请点击此按钮" class="save">保存</span>-->
							</div>
							<div class="colNum">
								<span>总包数：<b class="purchase_quantity"></b></span>
								<span>总重量：<b>58</b>(KG)</span>
							</div>
						</div>
					</div>
					<!--------------收货人信息--------------------------->
					<div class="order_bor pInfo">
						<h2>

							<span>收货人信息</span>

							<span class="edit_btn h2_btn" title="编辑"></span>

							<span class="cancel h2_btn" title="取消"></span>

							<span class="finish h2_btn" title="保存"></span>

						</h2>
						<div class="pInfo_show">
							<p>
								<span name="buyername">林培雁</span>
							</p>
							<p>
								<span name="tel">15013228XXX</span>
							</p>
							<p>
								<span name="country_name">中国</span>
								<span name="province">广东省</span>
								<span name="city">广州市</span>
								<span name="street1">大观路</span>
								<span name="street2">新塘商贸园E座5楼</span>
								<span name="postal_code">510140</span>
							</p>

						</div>
						<!--------------编辑收货人信息--------------------------->
						<div class="pInfo_edit">
							<p>
								<span>收件人：</span>
								<input type="text" name="buyername">
							</p>
							<p>
								<span>联系电话：</span>
								<input type="text" name="tel">
							</p>
							<p>
								<span>国家：</span>
								<input type="text" name="country_name" class="country">
							</p>
							<p>
								<span>省份：</span>
								<input type="text" name="province" class="province">
							</p>
							<p>
								<span>城市:</span>
								<input type="text" name="city" class="city">
							</p>
							<p>
								<span>街道：</span>
								<input type="text" name="street1" class="street1">
							</p>
							<p>
								<span>邮编：</span>
								<input type="text" name="postal_code">
							</p>
							<p>
								<span>详细地址：</span>
								<input name="street2" type="text" class="" />
							</p>
							<div class="clear"></div>
						</div>
					</div>
					<!--------------PayPal--------------------------->
					<div class="order_bor pInfo">
						<h2>Paypal</h2>
						<p>
							<span name="">买家名称：</span><span name="sellername">林培雁</span>
						</p>
						<p>
							<span name="">收货人名称：</span><span name="Str_ShiptoName">林培雁</span>
						</p>
						<p>
							<span name="">联系号码：</span><span name="phone">150132285XXX</span>
						</p>
						<p>
							<span name="">地址：</span>
							<span name="Str_CountryCode">USA</span>
							<span name="Str_ShiptoState">广东</span>
							<span name="Str_ShiptoCity">广州</span>
							<span name="Str_ShiptoStreet">大观路</span>
							<span name="Str_ShiptoZip">55027</span>
						</p>
					</div>
					<div class="clear"></div>

					<div class="order_bor tabTC">
						<ul>
							<li class="tabAction">直发选项</li>
							<li>物流方式</li>
							<li>消息备注</li>
						</ul>

						<!--------------直发选项--------------------------->
						<div class="directOut">
							<div class="directLeft">
								<p>
									<span>重量(g)：</span>
									<input type="text" name="declareWeight" value=""><b class="redStar">*</b>
								</p>
								<p>
									<span>规格(L*W*H CM)：</span>
									<input type="text" name="declareSize" value=""><b class="redStar">*</b>
								</p>
								<p>
									<span>附注：</span>
									<input type="text" name="declareRemark" value=""><b class="redStar">*</b>
								</p>
								<p>
									<span>自定义标识：</span>
									<input type="text" name="declareMark" value=""><b class="redStar">*</b>
								</p>
								<p>
									<span>购买保价服务：</span>
									<input type="checkbox" name="" value="">
								</p>
								<p>
									<span>保价系数(1.0~3.0)：</span>
									<input type="text" name="">
								</p>
							</div>
						</div>
						<!--------------物流方式--------------------------->
						<div class="logistics">
							<select name=""></select>
						</div>
						<!--------------买家（卖家）留言------------------>
						<div class="remark">
							<div class="buyerNotes noter">
								<span>买家留言</span>
								<textarea name="notes" class="buyerNotesCon" disabled></textarea>
							</div>
							<div class="sellerNotes noter">
								<span>卖家备注</span>
								<textarea name="remark" class="sellerNotesCon"></textarea>
							</div>
						</div>

					</div>

				</div>
				<div class="OLPD_footer">
					<input type="submit" value="保存">
				</div>
			</div>

		</div>

		<!--  ==========  -->
		<!--  = 弹窗 =  -->
		<!--  ==========  -->

		<!--弹窗加载图片-->
		<div class="loader"></div>
		<!--弹窗加载图片 end-->
		<!--（新）弹窗风格的订单详情-->
		<!--（新）弹窗风格的订单详情 end-->
		<div class="index_wrap">
			<!--头部 start-->
			<div class="index_header">
				<h1 class="yahei"><a href="index.php" title="点击回到首页">订单管理系统</a></h1>
			</div>
			<!--主要内容区域-->
			<div class="main">
				<!--左边导航 start-->
				<div class="index_sidebar">
					<!--欢迎用户-->
					<p class="index_wel index_h3"><span class="user">你好&nbsp;<a href=""><?php echo $_SESSION['userInfo']['username']; ?>
</a>！</span> <span class="out"><a href="?r=oms/user/logout">退出</a></span>
					</p>
					<div class="side_nav">
						<div class="order_show">
							<h2><span class="h2_icon"></span>订单管理<span class="h2_icon_right"></span></h2>
							<ul class="nav_2f">
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/order/ListWaitingForShip&type=UK">已支付订单</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/shipping/ShowExpress">待发货订单(直发)</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/order/ListNormal&type=UK">待发货订单(海外仓)</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/order/GetDeliverGoods">已发货订单</a></h3>
								</li>
								<li id="manually_MML">
									<h3><span class="li_icon"></span>需人工处理订单<span class="li_icon_3f"></span></h3>
									<div class="nav_3f">
										<ul>
											<li><span class="li_icon"></span><a href="index.php?r=oms/order/OrderStockOut&statu=Stockout">缺货订单</a>
											</li>
											<li><span class="li_icon"></span><a href="index.php?r=oms/order/OrderNote&statu=HasUserRemark&type=E">带留言订单</a>
											</li>
											<li><span class="li_icon"></span><a href="index.php?r=oms/order/OrderNote&statu=AddressMissed&type=E">地址缺失订单</a>
											</li>
										</ul>
									</div>
								</li>
								<li>
									<h3><span class="li_icon"></span>异常订单<span class="li_icon_3f"></span></h3>
									<div class="nav_3f">
										<ul>
											<li><span class="li_icon"></span><a href="index.php?r=oms/AbnormalOrders/GetAbnormalOrders">不发货订单</a>
											</li>
											<li><span class="li_icon"></span><a href="index.php?r=oms/AbnormalOrders/Abnormal&statu=Arrearage&type=E">未付款订单</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
						<div>
							<h2><span class="h2_icon"></span>物流管理<span class="h2_icon_right"></span></h2>
							<ul class="nav_2f">
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/shipping/ShowOutStoreOrder">查看出库单</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/Warehouse/SelectStock">查看海外仓库存</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/shipping/ShowExpressOrder">海外直发</a></h3>
								</li>
							</ul>
						</div>
						<div>
							<h2><span class="h2_icon"></span>消息管理<span class="h2_icon_right"></span></h2>
							<ul class="nav_2f">
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/getmymessages/GetMessage&Type=">收件箱</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/getmymessages/GetMessage&Type=send">发件箱</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/getmymessages/GetMessage&Type=Emergency">紧急信息</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/getmymessages/GetMessage&Type=Dispose">待处理邮件</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/getmymessages/GetMessage&Type=ebay">eBay系统信息</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/getmymessages/GetMessage&Type=Star">加星标信息</a></h3>
								</li>
							</ul>
						</div>
						<div>
							<h2><span class="h2_icon"></span>系统设置<span class="h2_icon_right"></span></h2>
							<ul class="nav_2f">
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/shop/manage">店铺账号管理</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/seller/beforesearch">销售平台管理</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/User/OwnPeople">新增员工</a></h3>
								</li>
								<li>
									<h3><span class="li_icon"></span><a href="?r=oms/log/beforesearch">系统日志</a></h3>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--隐藏侧边按钮-->
				<div class="index_hide_btn">
					<div class="index_side_hide_btn" title="隐藏菜单"></div>
				</div>
				<!--右边内容显示区域 start-->
				<div class="index_content">
					<h3 class="index_bread index_h3"><span class="user">首页&nbsp;>&nbsp;

					<?php $_from = $this->_tpl_vars['name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>

					    <?php echo $this->_tpl_vars['name']; ?>


					<?php endforeach; endif; unset($_from); ?>

					</span></h3>
					<!--引用开始-->