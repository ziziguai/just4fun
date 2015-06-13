<?php /* Smarty version 2.6.28, created on 2014-12-09 15:58:35
         compiled from ck1sh/wishOrdered.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />

	</head>

	<body>
		<!--下载地址标签弹窗--start-->
		<div class="dowAddTagTC TCGB">
			<div class="dowAddTagTCCon TCCON">
				<h2>
					<span>下载地址标签</span>
					<b class="closeBtn">关闭</b>
				</h2>
				<div class="dowAddTagTCConBody">
					<p>提示：下载地址标签只适用于中国直发的订单，可选择发货方式为中国直发进行查询</p>
					<hr />
					<p>已选择<b>1</b>个中国直发订单，其中<b>1</b>个订单已提审.</p>
					<p>只有已提审的订单可以打印地址标签</p>
					<p>
						<span>纸张：</span>
						<label style="margin-right:20px;"><input type="radio" name="pageType" checked="checked"/>A4</label>
						<label><input type="radio" name="pageType" id="" />标签纸</label>
					</p>
				</div>
				<div class='searchTCFooter TCFooter'>
					<span class="tagBtn">
						<a class='btn btn-primary'>地址标签</a>
						<a class='btn btn-primary'>报关单+地址标签</a>
						<a class='btn btn-primary'>报关单+地址标签(拆分)</a>
					</span>
					<b style="display:none;">你选择了多种直发服务，不支持同时打印不同类型的直发订单标签</b>
						<a class='btn'>取消</a>
					
				</div>
			</div>
		</div>
		<!--下载地址标签弹窗--end-->
		<!--下载检货清单--start-->
		<div class="PickGoodsTC TCGB">
			<div class="PickGoodsTCCon TCCON">
				<h2>
					<span>下载捡货清单</span>
					<b class="closeBtn">关闭</b>
				</h2>
				<div class="PickGoodsTCConBody">
					<p>提示：下载捡货清单只适用于中国直发的订单，可选择发货方式为中国直发进行查询</p>
					<hr />
					<p>已选择<b>1</b>个中国直发订单，其中<b>1</b>个订单已提审.</p>
					<p>
						<span>捡货清单类型：</span>
						<label style="margin-right:20px;"><input type="radio" name="pageType" id="" checked="checked"/>按订单捡货</label>
						<label><input type="radio" name="pageType" id="" />按SKU捡货</label>
					</p>
					<p><label><input type="checkbox" name="pageType" id="" />只打印已提审订单</label></p>
				</div>
				<div class='searchTCFooter TCFooter'>
					<a class='btn btn-primary'>确认</a>
					<a class='btn'>取消</a>
				</div>
			</div>
		</div>
		<!--下载检货清单--end-->
		<!--下载挂号--start-->
		<div class="registeredTC TCGB">
			<div class="registeredTCCon TCCON">
				<h2>
					<span>下载挂号</span>
					<b class="closeBtn">关闭</b>
				</h2>
				<div class="registeredTCConBody">
					<p><label><input type="radio" name="registeredType" />下载最新挂号(<b>0</b>条)</label></p>
					<p><label><input type="radio" name="registeredType" checked="checked"/>下载所选挂号</label></p>
					<p><label><input type="radio" name="registeredType" />下载最新出口处理号(<b>0</b>条)</label></p>
					<p><label><input type="radio" name="registeredType" />下载所选处理号</label></p>
				</div>
				<div class='searchTCFooter TCFooter'>
					<a class='btn btn-primary'>下载</a>
					<a class='btn'>取消</a>
				</div>
			</div>
		</div>
		<!--下载挂号--end-->
		
		<div class="wrap">
			<p class="topNav"><a href="#">首页</a>></p>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/SHwish/GetOrder&t=wait" class="tabActive">待发货订单</a>
					</li>
					<li><a href="?r=oms/SHwish/GetOrder&t=send">已发货订单</a>
					</li>
					<li><a href="?r=oms/SHwish/GetOrder&t=del">已删除</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="search">
								<select class='dealNum inp'>
									<option value="">wish交易号</option>
									<option value="">国家</option>
									<option value="">卖家</option>
									<option value="">买家</option>
									<option value="">SKU</option>
									<option value="">收货人</option>
									<option value="">收货方式</option>
								</select>
								<input type="text" name="" class="inp" />
								<input type="submit" value="查询" class="btn btn-primary" />
								<!--<select class='dealNum inp'>
									<option value="">状态</option>
									<option value="">未选服务</option>
									<option value="">已选服务</option>
								</select>
								<select class='dealNum inp'>
									<option value="">发货方式</option>
									<option value="">中国直发</option>
									<option value="">海外直发</option>
								</select>-->
							</div>
							<div class="sel">
								<div class="selLeft">
									<span class="selTitle">订单状态：</span>
									<label>
										<input type="radio" name="state" id="" /><span>待发货</span>
									</label>
									<label>
										<input type="radio" name="state" id="" /><span>已发货</span>
									</label>
									<label>
										<input type="radio" name="state" id="" /><span>已退款</span>
									</label>
									<span class="selTitle">发货方式：</span>
									<label>
										<input type="radio" name="DGWay" id="" /><span>中国直发 </span>
									</label>
									<label>
										<input type="radio" name="DGWay" id="" /><span>海外仓库</span>
									</label>
									<span class="selTitle">服务状态：</span>
									<label>
										<input type="radio" name="DGWay" id="" /><span>未选服务</span>
									</label>
									<label>
										<input type="radio" name="DGWay" id="" /><span>已选服务</span>
									</label>
									<span class="selTitle">显示类型：</span>
									<label>
										<input type="radio" name="show" /><span>显示全部</span>
									</label>
									<label>
										<input type="radio" name="show" /><span>显示有错误</span>
									</label>
								</div>
								<div class="selRight">
									<!--<a href="#"></a>
									<input type="button" value="下载订单" />
									<select name="" id="">
										<option value="">选择发货方式</option>
										<option value="">中国直发</option>
										<option value="">海外仓库</option>
										<option value="">取消服务</option>
									</select>
									<input type="button" value="确认发货" />
									<input type="button" value="导出订单" />-->
									<div class="btn-group" id="selectType2Tips" data-toggle="popover" data-placement="top" data-content="请在此选择发货方式" title="选择发货方式">
										<a class="btn btn-warning">选择发货方式</a>
										<button class="btn dropdown-toggle btn-warning" data-toggle="dropdown">
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="text-align: left;">
											<li>
												<a href="javascript:;" class="J_SelectType2" data-value="1">中国直发</a>
											</li>
											<li>
												<a href="javascript:;" class="J_SelectType2" data-value="2">海外仓储</a>
											</li>
											<li>
												<a href="javascript:;" class="J_SelectType2" data-value="0">取消服务</a>
											</li>
										</ul>
									</div>
									<input id="createOrder" type="button" value="确认发货" class="btn btn-warning J_SelectedCheck">
									<input id="exportOrder" type="button" value="删除" class="btn btn-warning">

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
										<th>seller</th>
										<th>buyer</th>
										<th>国家</th>
										<th>发货方式</th>
										<th>物流商</th>
										<th>挂号</th>
										<th>同步状态</th>
										<th>SKU</th>
										<th>重量(g)</th>
										<th>申报价值(USD)</th>
										<th>申报名称</th>
										<th>标记发货</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
						 		<?php $_from = $this->_tpl_vars['wishorder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
									<tr>
										<td>
											<input type="checkbox" />
										</td>
										<td><?php echo $this->_tpl_vars['i']['package_sn']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['merchant_id']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['BuyerName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['countryName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['shipping_type']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['shipping_company']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['tracking_number']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['tracking_upload_sign']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['sku']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['weight']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['declare_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['shiped_sign']; ?>
</td>
										<td class="editList"><a href="javascript:;">编辑</a></td>
									</tr>
								<?php endforeach; endif; unset($_from); ?>  
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
		<script>
			$('body').attr('id', 'wishWaitOrder');
		</script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
	</body>

</html>