<?php /* Smarty version 2.6.28, created on 2014-12-04 11:41:19
         compiled from ck1sh/ebDeleted.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" href="public/template/ck1sh/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />

	</head>

	<body>
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<div class="wrap">
			<p class="topNav"><a href="#">首页</a>></p>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/SHOrder/GetWaitOrder&t=wait">待发货订单</a>
					</li>
					<li><a href="?r=oms/SHOrder/GetWaitOrder&t=send">已发货订单</a>
					</li>
					<li><a href="?r=oms/SHOrder/GetWaitOrder&t=del" class="tabActive">已删除</a>
					</li>
					<li><a href="?r=oms/SHEbay/eBayAccount">eBay账号</a>
					</li>
					<li><a href="?r=oms/SHPaypal/PaypalAccount">Paypal账号</a>
					</li>
					<li><a href="ebSet.html">设置</a>
					</li>
				</ul>
				<div class="tabHeadRight">
					<a href='?r=oms/SHPaypal/PaypalAccount' class='btn'>账号管理</a>
					<a href='' class='btn'>帮助</a>
					<a href='' class='btn'>设置</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody">
						<div class="tabBodyHead">
							<form action="?r=oms/SHOrder/GetWaitOrder&t=del" method="post">
								<div class="search">
									<select class='dealNum inp' name="timename">
										<option value="CreatedTime">购买时间 </option>
										<option value="">同步时间 </option>
										<option value="canceled_time">删除时间 </option>
									</select>
									<input type="text" name="createtime" id="fromDate" />&nbsp;~
									<input type="text" name="lastime" id="toDate" />
									<span>分类：</span>
									<select class='dealNum'>
										<option value="">全部</option>
										<option value="">已取消</option>
										<option value="">其他</option>
									</select>
									<select class='dealNum' name="typename">
										<option value="CountryName">国家</option>
										<option value="h.seller_id">店铺</option>
										<option value="BuyerName">买家</option>
										<option value="ExternalTransactionID">Paypal交易号</option>
										<option value="SKU">SKU</option>
									</select>
									<form class="form-search" style="float:left;">
										<div class="input-append">
											<input type="text" class="">
											<button type="submit" class="btn btn-primary"> 查 询 </button>
										</div>
									</form>
								</div>
								<div class="sel">
									<div class="selRight">
										<input id="createOrder" type="button" value="导出订单" class="btn btn-warning">
										<input id="createOrder" type="button" value="还原" class="btn btn-warning">

									</div>
									<div class="clear"></div>
								</div>

						</div>
						<div class="tabBodyCon">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>
											<input type="checkbox" />
										</th>
										<th>Paypal交易号</th>
										<th>删除时间</th>
										<th>店铺</th>
										<th>buyer</th>
										<th>buyer email</th>
										<th>国家</th>
										<th>eBay发货选择</th>
										<th>发货方式</th>
										<th>SKU</th>
										<th>数量</th>
										<th>重量</th>
										<th>申报价值</th>
										<th>申报名称</th>
									</tr>
								</thead>
								<tbody>
									<?php if (( $this->_tpl_vars['datao'] == null )): ?>
									<tr>
										<td colspan="14" align="center">无数据</td>
									</tr>
									<?php else: ?> <?php $_from = $this->_tpl_vars['datao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
									<tr>
										<td>
											<input type="checkbox" />
										</td>
										<td><?php echo $this->_tpl_vars['a']['ExternalTransactionID']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['canceled_time']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['seller_id']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['BuyerName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['BuyerEmail']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['CountryName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['ShippingService']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['actual_shipping_service']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['SKU']; ?>
</td>
										<td><?php echo $this->_tpl_vars['a']['QuantityPurchased']; ?>
</td>
										<?php if (( $this->_tpl_vars['a']['weight'] == null )): ?>
										<td style="color:red">0</td>
										<?php else: ?>
										<td><?php echo $this->_tpl_vars['i']['weight']; ?>
</td>
										<?php endif; ?>
										<?php if (( $this->_tpl_vars['a']['declare_price'] == '' )): ?>
										<td style="color:red">0</td>
										<?php else: ?>
										<td><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
										<?php endif; ?>
										<?php if (( $this->_tpl_vars['a']['declare_name'] == '' )): ?>
										<td style="color:red">0</td>
										<?php else: ?>
										<td><?php echo $this->_tpl_vars['i']['declare_name']; ?>
</td>
										<?php endif; ?>
									</tr>
									<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
								</tbody>
							</table>
							<!--页数-->
							<div class="pagination pagination-right">
								<!--<div class="group" style="float: left;">
									<input type="button" class="btn" id="btnDeleteOrders" value="删除">
								</div>-->
								<ul id="Pager1">
									<li class="disabled"><a>首页</a>
									</li>
									<li class="disabled"><a>&lt;&lt;</a>
									</li>
									<li class="active"><a>1</a>
									</li>
									<li><a href="?Page=2&amp;psize=15">2</a>
									</li>
									<li><a href="?Page=3&amp;psize=15">3</a>
									</li>
									<li><a href="?Page=4&amp;psize=15">4</a>
									</li>
									<li><a href="?Page=5&amp;psize=15">5</a>
									</li>
									<li><a href="?Page=6&amp;psize=15">...</a>
									</li>
									<li><a href="?Page=2&amp;psize=15">&gt;&gt;</a>
									</li>
									<li><a href="?Page=68&amp;psize=15">尾页</a>
									</li>
									<li class="select-size">每页
										<select onchange="location.href=location.href + (location.href.indexOf('?') != -1 ? '&amp;' : '?') + 'psize=' + this.value">
											<option selected="selected" value="15">15</option>
											<option value="30">30</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="150">150</option>
											<option value="200">200</option>
											<option value="500">500</option>
										</select>
										条，共
										<strong>68</strong> 页
										<strong>1015</strong> 条
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>



			</div>
		</div>
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script src="public/template/ck1sh/js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
		<?php echo '
		<script>
			$(function(){
				$(\'body\').attr(\'id\', \'ebDeleted\');
				//复选框全选
				allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
				//添加日期控件
				getDate($("#fromDate,#toDate"));
			})
		</script>
		'; ?>

	</body>

</html>