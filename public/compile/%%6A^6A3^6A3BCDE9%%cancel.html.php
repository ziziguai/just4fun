<?php /* Smarty version 2.6.28, created on 2014-12-09 09:18:11
         compiled from ck1sh/order/cancel.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ck1sh/order/cancel.html', 103, false),)), $this); ?>
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
			<p class="topNav"><a href="#">首页</a></p>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
">待发货订单</a></li>
					<li><a href="?r=oms/shorder/shipped&platform=<?php echo $this->_tpl_vars['platform']; ?>
">已发货订单</a></li>
					<li><a href="?r=oms/shorder/canceled&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="tabActive">已取消订单</a></li>
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
						<div class="search">
							<div class="orderedTime floatLeft">
							<span>下单时间：</span>
							<input type="text" name="createtime" id="fromDate" class="input100" />&nbsp;~
							<input type="text" name="lastime" id="toDate" class="input100" />
							</div>
							<div class='btn-group left floatLeft'>
								<button class='btn'>发货方式</button>
								<button class='btn dropdown-toggle' data-toggle='dropdown'><span class='caret'></span>
								</button>
								<ul class='dropdown-menu'>
									<li><a href='#'>中国直发</a></li>
									<li><a href='#'>海外直发</a></li>
									<li><a href='#'>亚马逊渠道</a></li>
								</ul>
							</div>
							<form class="form-search floatLeft">
								<div class="input-append">
									<div class="btn-group">
										<button class="btn dropdown-toggle" data-toggle="dropdown">
											PayPal交易号
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a href='#'>PayPal交易号</a></li>
											<li><a href='#'>国家</a></li>
											<li><a href='#'>卖家</a></li>
											<li><a href='#'>买家</a></li>
											<li><a href='#'>SKU</a></li>
											<li><a href='#'>收货人</a></li>
										</ul>
									</div>
									<input type="text" class="">
									<button type="submit" class="btn btn-primary"> 查 询 </button>
								</div>
							</form>
						</div>
						<div class="sel">
							<div class="selRight">
								<input type="button" value="导出订单" class="btn btn-warning">
								<input type="button" value="还原" class="btn btn-warning">
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
									<th>订单号</th>
									<th>取消时间</th>
									<th>销售账号</th>
									<th>buyer</th>
									<th>buyer email</th>
									<th>国家</th>
									<th>买家选择物流</th>
									<th>数量</th>
									<th>重量(g)</th>
									<th>申报价值</th>
									<th>申报名称</th>
									<th>备注信息</th>
								</tr>
							</thead>
							<tbody>
								<?php if (( $this->_tpl_vars['orderArray'] == null )): ?>
								<tr><td colspan="13" align="center">无数据</td></tr>
								<?php else: ?> 
									<?php $_from = $this->_tpl_vars['datao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
									<tr>
										<td><input type="checkbox" /></td>
										<td><?php echo $this->_tpl_vars['order']['OrderID']; ?>
</td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['order']['cancel_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
										<td><?php echo $this->_tpl_vars['order']['selling_account']; ?>
</td>
										<td><?php echo $this->_tpl_vars['order']['buyer_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['order']['buyer_email']; ?>
</td>
										<td><?php echo $this->_tpl_vars['order']['country']; ?>
</td>
										<td><?php echo $this->_tpl_vars['order']['buyer_selected']; ?>
</td>
										<td><?php echo $this->_tpl_vars['order']['quantity']; ?>
</td>
										<?php if (( $this->_tpl_vars['order']['weight'] == null )): ?><td class="text-error">0</td><?php else: ?><td><?php echo $this->_tpl_vars['order']['weight']; ?>
</td><?php endif; ?> 
										<?php if (( $this->_tpl_vars['order']['declare_price'] == null )): ?><td class="text-error">0.00</td>
											<?php else: ?><td><?php echo $this->_tpl_vars['order']['declare_price']; ?>
(<?php echo $this->_tpl_vars['order']['declare_currency']; ?>
)</td><?php endif; ?>
										<?php if (( $this->_tpl_vars['order']['declare_name'] == null )): ?><td style="color:red">未填写</td><?php else: ?><td><?php echo $this->_tpl_vars['order']['declare_name']; ?>
</td><?php endif; ?>
										<td><?php echo $this->_tpl_vars['order']['remark']; ?>
</td>
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
			<script type="text/javascript" src="public/template/ck1sh/js/bootstrap.min.js"></script>
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