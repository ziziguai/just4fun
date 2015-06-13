<?php /* Smarty version 2.6.28, created on 2015-01-19 14:46:46
         compiled from ck1sh/pickorder.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ck1sh/pickorder.html', 14, false),)), $this); ?>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>pick_item</title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
	</head>
	<body id="pickorder" oid='<?php echo $this->_tpl_vars['type']; ?>
'>
		<div class="wrap">
			<!--*******************-->
			<!--*****按订单捡货 -start*****-->
			<div id="orderPickGoods">
				<h2 style="position:relative;">捡货单：<?php echo ((is_array($_tmp=$this->_tpl_vars['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %R') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %R')); ?>
 <a href="javascript:;"  class="btn" style="position:absolute;right:10px;top:15px;">打印</a></h2>
				<div>
				<?php if (( $this->_tpl_vars['pick'] == null )): ?>
					<label>无数据</label>
				<?php else: ?> <?php $_from = $this->_tpl_vars['pick']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
					<div class="box">
						<h3>
							<span>订单号：<b><?php echo $this->_tpl_vars['a']['OrderID']; ?>
</b></span>
							<span>处理号：<b><?php echo $this->_tpl_vars['a']['package_sn']; ?>
</b></span>
						</h3>
						<div class="boxBody">
							<!--地址内容显示-->
							<div class="left">
								<p title="" id=""><?php echo $this->_tpl_vars['a']['BuyerName']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['Street1']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['Street2']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['CityName']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['StateOrProvince']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['PostalCode']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['CountryCode']; ?>
</p>
								<p title="" id=""><?php echo $this->_tpl_vars['a']['BuyerPhone']; ?>
</p>
							</div>
							<!--商品内容-->
							<div class="right">
								<table style="width:100%;">
									<thead>
										<tr>
											<th>SKU</th>
											<th>Quantity</th>
											<th>ItemID</th>
											<th>ItemTitle</th>
										</tr>
									</thead>
									<?php $_from = $this->_tpl_vars['pick'][$this->_tpl_vars['k']]['product_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['b']):
?>
										<tbody>
											<tr>
												<td><?php echo $this->_tpl_vars['b']['warehouse_sku']; ?>
</td>
												<td><?php echo $this->_tpl_vars['b']['quantity']; ?>
</td>
												<td><?php echo $this->_tpl_vars['b']['product_id']; ?>
</td>
												<td><?php echo $this->_tpl_vars['b']['product_name']; ?>
</td>
											</tr>
										</tbody>
									<?php endforeach; endif; unset($_from); ?>
							</table>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
			</div>
				</div>
			<!--*****按订单捡货 -end*****-->

			<!--*****按SKU捡货 -start*****-->
			<div id="SKUPickGoods" style="display:none;">
				<h2 style="position:relative;">捡货单：<?php echo ((is_array($_tmp=$this->_tpl_vars['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %R') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %R')); ?>
<a href="javascript:;"  class="btn" style="position:absolute;right:10px;top:15px;">打印</a></h2>
				<div class="box">
					<div class="boxBody">
						<!--商品内容-->
						<table style="width:100%;">
							<thead>
								<tr>
									<th>SKU</th>
									<th>Quantity</th>
									<th>ItemID</th>
									<th>ItemTitle</th>
								</tr>
							</thead>
							<?php if (( $this->_tpl_vars['pick'] == null )): ?>
								<tr>
									<td colspan="4" align="center">无数据</td>
								</tr>
							<?php else: ?> <?php $_from = $this->_tpl_vars['pick']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
							<tbody>
								<tr>
									<td><?php echo $this->_tpl_vars['a']['warehouse_sku']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['quantity']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['product_id']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['product_name']; ?>
</td>
								</tr>
							</tbody>
							<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
						</table>
					</div>
				</div>
			</div>
			<!--*****按SKU捡货 -end*****-->
	
		</div>
		<?php echo '
			<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
			<script>
			$(function(){
				$(document).ready(function(){
				//获取捡货单类型
				var a=$(\'body\').attr(\'oid\');
				//按sku
				if(a==2){
					$(\'#SKUPickGoods\').show();
					$(\'#orderPickGoods\').hide();
				}else{
					//按订单
					$(\'#SKUPickGoods\').hide();
					$(\'#orderPickGoods\').show();
				}
				//打印
				$(\'.btn\').on(\'click\', function() {
					window.print();
				});
			})
		})
			</script>
		'; ?>

	</body>
</html>