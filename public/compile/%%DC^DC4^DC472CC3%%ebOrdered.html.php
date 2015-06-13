<?php /* Smarty version 2.6.28, created on 2014-12-04 11:41:18
         compiled from ck1sh/ebOrdered.html */ ?>
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
		<div class="wrap">
			<p class="topNav"><a href="#">首页</a>></p>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/SHOrder/GetWaitOrder&t=wait">待发货订单</a>
					</li>
					<li><a href="?r=oms/SHOrder/GetWaitOrder&t=send" class="tabActive">已发货订单</a>
					</li>
					<li><a href="?r=oms/SHOrder/GetWaitOrder&t=del">已删除</a>
					</li>
					<li><a href="eBayAccount.html">eBay账号</a>
					</li>
					<li><a href="PaypalAccount.html">Paypal账号</a>
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
					<div class="tabBodyHead">
						<form action="?r=oms/SHOrder/GetWaitOrder&t=send" method="post">
							<div class="search" style="margin-bottom:10px;">
								<span>下单时间：</span>
								<input type="text" name="createtime" id="fromDate" class="input100" />&nbsp;~
								<input type="text" name="lastime" id="toDate" class="input100" />
								<select class='dealNum input100' name="statu">
									<option value="">发货状态</option>
									<option value="1">已选择发货</option>
									<option value="2">未选择发货</option>
								</select>
								<select class='dealNum input100' name="send">
									<option value="">发货方式</option>
									<option value="1">中国直发</option>
									<option value="2">海外直发</option>
									<option value="3">亚马逊渠道</option>
								</select>
								<select class='dealNum input100' name="typename">
									<option value="CountryName" name="typename">国家</option>
									<option value="h.shop_id" name="typename">店铺</option>
									<option value="BuyerName" name="typename">买家</option>
									<option value="" name="typename">出口处理号</option>
									<option value="ExternalTransactionID" name="typename">PayPal交易号</option>
									<option value="SKU" name="typename">SKU</option>
									<option value="sendway" name="typename">发货方式</option>
								</select>
								<form class="form-search" style="float:left;">
									<div class="input-append" style='margin:0;'>
										<input type="text" class="">
										<button type="submit" class="btn btn-primary"> 查 询 </button>
									</div>
								</form>
							</div>
						</form>
						<div class="sel">
							<div class="selRight">
								<input type="button" value="下载地址标签" class="btn btn-warning">
								<input type="button" value="下载捡货清单" class="btn btn-warning">
								<input type="button" value="上传挂号" class="btn btn-warning">
								<input type="button" value="重新发货" class="btn btn-warning">
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
									<th>出口易处理号</th>
									<th>店铺</th>
									<th>buyer</th>
									<th>buyer email</th>
									<th>国家</th>
									<th>发货方式</th>
									<th>物流商</th>
									<th>挂号</th>
									<th>发货状态</th>
									<th>SKU</th>
									<th>数量</th>
									<th>重量</th>
									<th>申报价值</th>
									<th>申报名称</th>
									<th>标记发货</th>
								</tr>
							</thead>
							<tbody>
								<?php if (( $this->_tpl_vars['datao'] == null )): ?>
								<tr>
									<td colspan="16" align="center">无数据</td>
								</tr>
								<?php else: ?> 
								<?php $_from = $this->_tpl_vars['datao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
								<tr>
									<td>
										<input type="checkbox" />
									</td>
									<td></td>
									<td><?php echo $this->_tpl_vars['a']['seller_id']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['BuyerName']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['BuyerEmail']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['CountryName']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['shipping_type']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['shipping_company']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['ActualShippingService']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['package_status']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['SKU']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['QuantityPurchased']; ?>
</td>
									<?php if (( $this->_tpl_vars['a']['weight'] == null )): ?>
										<td style="color:red">0</td>
									<?php else: ?>
										<td><?php echo $this->_tpl_vars['a']['weight']; ?>
</td>
									<?php endif; ?>
									<?php if (( $this->_tpl_vars['a']['declare_price'] == '' )): ?>
										<td style="color:red">0.00</td>
									<?php else: ?>
										<td><?php echo $this->_tpl_vars['a']['declare_price']; ?>
</td>
									<?php endif; ?>
									<?php if (( $this->_tpl_vars['a']['declare_name'] == '' )): ?>
										<td style="color:red">未填写</td>
									<?php else: ?>
										<td><?php echo $this->_tpl_vars['a']['declare_name']; ?>
</td>
									<?php endif; ?>
									<td><?php echo $this->_tpl_vars['a']['shipping_upload_sign']; ?>
</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?> 
								<?php endif; ?>
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
			<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
			<script src="public/template/ck1sh/js/bootstrap-datetimepicker.js"></script>
			<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
			<?php echo '
			<script>
				$(function() {
					$(\'body\').attr(\'id\', \'edOrdered\');
					//复选框全选
					allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
					//添加日期控件
					getDate($("#fromDate,#toDate"));
				})
			</script>
			'; ?>

	</body>

</html>