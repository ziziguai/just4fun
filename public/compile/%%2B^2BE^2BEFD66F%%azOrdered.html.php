<?php /* Smarty version 2.6.28, created on 2014-12-08 11:44:26
         compiled from ck1sh/azOrdered.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
		<link rel="stylesheet" href="public/template/ck1sh/css/bootstrap-datetimepicker.min.css" />
	</head>

	<body>
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<div class="wrap">
			<p class="topNav"><a href="#">首页</a>></p>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/SHOrder/AzAwaitOrder&s=waitShipped">待发货订单</a>
					</li>
					<li><a href="?r=oms/SHOrder/AzAwaitOrder&s=Shipped" class="tabActive">已发货订单</a>
					</li>
					<li><a href="?r=oms/SHOrder/AzAwaitOrder&s=Deleted">已删除</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
                        <form action="index.php?r=oms/SHOrder/AzAwaitOrder&s=Shipped" method="get">
<input name="r" type="hidden" value="oms/SHOrder/AzAwaitOrder">
<input name="s" type="hidden" value="Shipped">
						  <div class="search">
							  <p>
								  <span>下单时间：</span>
<input name="fromDate" type="text" value="<?php echo $this->_tpl_vars['data']['input']['fromDate']; ?>
" data-date-format="dd-mm-yyyy"/> - <input name="toDate" type="text" value="<?php echo $this->_tpl_vars['data']['input']['toDate']; ?>
"/>
							  </p>
<select name="KeyType" title="关键字类型" >
    <option value="7"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 7): ?> selected<?php endif; ?>>出口易处理号</option>
    <option value="1"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 1): ?> selected<?php endif; ?>>亚马逊交易号</option>
    <option value="2"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 2): ?> selected<?php endif; ?>>国家</option>
    <option value="3"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 3): ?> selected<?php endif; ?>>买家</option>
    <option value="4"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 4): ?> selected<?php endif; ?>>买家邮箱</option>
    <option value="8"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 8): ?> selected<?php endif; ?>>卖家</option>
    <option value="5"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 5): ?> selected<?php endif; ?>>SKU</option>
    <option value="6"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 6): ?> selected<?php endif; ?>>收货人</option>
    <option value="9"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 9): ?> selected<?php endif; ?>>发货方式</option>
</select>

<input type="text" name="keyword" title="关键字" value="<?php echo $this->_tpl_vars['data']['input']['keyword']; ?>
" />

<select name="status" title="Mark Shipped">
    <option value="0"<?php if ($this->_tpl_vars['data']['input']['status'] == 0): ?> selected<?php endif; ?>>发货状态</option>
    <option value="1"<?php if ($this->_tpl_vars['data']['input']['status'] == 1): ?> selected<?php endif; ?>>未标记</option>
    <option value="2"<?php if ($this->_tpl_vars['data']['input']['status'] == 2): ?> selected<?php endif; ?>>已标记</option>
</select>

<select name="syncStatus" title="GetTrackingNo">
    <option value="">同步状态</option>
    <option value="0"<?php if ($this->_tpl_vars['data']['input']['syncStatus'] == 0): ?> selected<?php endif; ?>>未同步</option>
    <option value="1"<?php if ($this->_tpl_vars['data']['input']['syncStatus'] == 1): ?> selected<?php endif; ?>>已同步</option>
    <option value="5"<?php if ($this->_tpl_vars['data']['input']['syncStatus'] == 5): ?> selected<?php endif; ?>>已导出</option>
</select>

<select name="shippingType" title="发货方式">
    <option value="">发货方式</option>
    <option value="1"<?php if ($this->_tpl_vars['data']['input']['shippingType'] == 1): ?> selected<?php endif; ?>>中国直发</option>
    <option value="2"<?php if ($this->_tpl_vars['data']['input']['shippingType'] == 2): ?> selected<?php endif; ?>>海外仓储</option>
</select>


                            <input type="submit" value="搜索" class="btn btn-primary" />
                            <br />
                            
                        </div>
                        </form>
                        <div class="sel">
                            <div class="selRight">
                                <input type="button" value="下载地址标签" class="btn btn-warning">
                                <input type="button" value="下载捡货清单" class="btn btn-warning">
                                <input type="button" value="下载挂号" class="btn btn-warning">
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
											<input type="checkbox" id="checkall" />
										</th>
										<th>出口易处理号</th>
										<th>seller</th>
										<th>buyer</th>
										<th>buyer email</th>
										<th>国家</th>
										<th>发货方式</th>
										<th>物流商</th>
										<th>挂号</th>
										<th>同步状态</th>
										<th>SKU</th>
										<th>数量</th>
										<th>重量</th>
										<th>申报价值</th>
										<th>申报名称</th>
										<th>标记发货</th>
									</tr>
								</thead>
								<tbody>
                                <!-- <?php $_from = $this->_tpl_vars['data']['list']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?> -->
									<tr>
										<td>
											<input name="id[]" class="ids" type="checkbox" tid="<?php echo $this->_tpl_vars['i']['order_id']; ?>
" />
										</td>
										<td><?php echo $this->_tpl_vars['i']['package_sn']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['SellerID']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['BuyerName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['BuyerEmail']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['CountryCode']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['ShipServiceLevel']; ?>
*</td>
										<td><?php echo $this->_tpl_vars['i']['ShipServiceLevel']; ?>
*</td>
										<td><?php echo $this->_tpl_vars['i']['tracking_sn']; ?>
</td>
										<td>T110</td>
										<td>1</td>
										<td>600</td>
										<td>225.00</td>
										<td>225.00</td>
										<td>kitty shouji</td>
										<td>否</td>
									</tr>
                                <!-- <?php endforeach; endif; unset($_from); ?> -->
								</tbody>
							</table>
							<!--页数-->
<div class="pagination pagination-right">
    <!--<div class="group">
        <input type="button" class="btn" id="btnResend" value="重新发货">
    </div>-->
    <?php echo $this->_tpl_vars['data']['list']['pageinfo']['html']; ?>

</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script>
			$('body').attr('id','edOrdered');
		</script>
		<script src="public/template/ck1sh/js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/bootstrap-datetimepicker.zh-CN.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
		<!--<script type="text/javascript" src="public/template/ck1sh/js/az.js"></script>-->
	</body>
</html>