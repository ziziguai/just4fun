<?php /* Smarty version 2.6.28, created on 2014-12-02 15:53:25
         compiled from ck1sh/wishDeleted.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />

	</head>

	<body>
		<!--高级查询弹窗-->
		<div class="searchTC TCGB">
			<div class="searchTCCon TCCON">
				<h2>
					<span>高级查询</span>
					<b class="searchTCClose">关闭</b>
				</h2>
				<div class="searchTCBody">
					<p>
						<span>关键字</span>
						<select name="" id="">
							<option value="">关键字类型</option>
							<option value="">国家</option>
							<option value="">卖家</option>
							<option value="">买家</option>
							<option value="">Paypal交易号</option>
							<option value="">SKU</option>
							<option value="">收货人</option>
							<option value="">收货方式</option>
						</select>
						<input type="text" name="" id="" />
					</p>
					<p>
						<span>数量</span>
						<select name="" id="">
							<option value="">等于</option>
							<option value="">大于</option>
							<option value="">小于</option>
						</select>
						<input type="text" name="" id="" />
					</p>
					<p>
						<span>重量</span>
						<select name="" id="">
							<option value="">等于</option>
							<option value="">大于</option>
							<option value="">小于</option>
						</select>
						<input type="text" name="" id="" />
					</p>
					<p>
						<span>申报价值</span>
						<select name="" id="">
							<option value="">等于</option>
							<option value="">大于</option>
							<option value="">小于</option>
						</select>
						<input type="text" name="" id="" />
					</p>
					<p>
						<span>买家选择的发货方式</span>
						<select name="" id="">
							<option value="">买家物流选择</option>
						</select>
					</p>
				</div>
				<div class="searchTCFooter">
					<input type="button" value="查询" class="btn btn-primary" />
					<input type="button" value="取消" class="btn searchTCCancel" />
				</div>
			</div>
		</div>

		<!--编辑（弹窗）-->
		<div class="editTC TCGB">
			<div class="editCon TCCON">
				<div class="editHead">
					<span class="sc">[交易号：5RE97229GE3419356]</span>
					<a href="javascript:;" class="btn btn-warning backList" style="float:right;">返回列表</a>
				</div>
				<div class="editBody">
					<!--包裹产品-->
					<div class="box1 editbox">
						<h3>包裹产品</h3>
						<table id="tbItem" class="table table-striped table-bordered">
							<tbody>
								<tr>
									<th>
										ItemID
									</th>
									<th>
										ItemTitle
									</th>

									<th>
										eBay交易号
									</th>

									<th>
										SKU
									</th>

									<th>
										单个重量(g)
									</th>
									<th>
										数量
									</th>
									<th>
										申报名称
									</th>
									<th>
										单个申报价值($)
									</th>

									<th>
										Action
									</th>

								</tr>


								<tr class="d">
									<td>221077011450</td>
									<td>2 x Air Purifier PLUG-IN OZONE GENERATOR Kill Odor Sterilizer Anion Ion Ozonizer</td>
									<td></td>
									<td></td>
									<td>0.00</td>
									<td>2</td>
									<td></td>
									<td>0.00</td>
									<td><a href="javascript:void(0);" class="J_ItemEdit" data-id="0">编辑</a> <a href="javascript:void(0);" class="J_ItemDelete" data-id="0">删除</a>
									</td>
								</tr>
								<tr id="trAction" style="display: none;">
									<td>
										<input type="hidden" id="hidID" value="">
										<input type="hidden" id="hidPacking" value="">
										<input type="text" id="txtItemID" class="input-small">
									</td>
									<td>
										<input type="text" id="txtItemTitle" class="input-big">
									</td>

									<td>
										<input type="text" id="txteBayTranId" class="input-small">
									</td>

									<td>
										<input type="text" id="txtItemCode" class="input-small">
									</td>

									<td>
										<input type="text" id="txtWeight" class="input-small">
									</td>
									<td>
										<input type="text" id="txtQuantity" class="input-small">
									</td>
									<td>
										<input type="text" id="txtDeclareName" class="input-small">
									</td>
									<td>
										<input type="text" id="txtDeclareValue" class="input-small">
									</td>
									<td>

										<a href="javascript:void(0);" id="btnItemSave">确定</a> <a href="javascript:void(0);" id="btnItemCancel">取消</a>


									</td>
								</tr>

								<tr id="trAddNew">
									<td colspan="8">
									</td>
									<td>
										<a href="javascript:void(0);" id="btnItemAddNew">添加产品</a>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<!--地址信息-->
					<div class="box2 editbox">
						<h3>详细信息</h3>
						<table class="table table-striped table-bordered">
							<tbody>
								<!--<tr>
									<td colspan="2" style="font-size:20px;text-align:center;background:#24748C;color:#fff;"><b>地址信息</b></td>
									<td colspan="2" style="font-size:20px;text-align:center;background:#24748C;color:#fff;"><b>申报信息</b></td>
								</tr>-->
								<tr>
									<td class="lb">
										Name
									</td>
									<td>
										<input name="" type="text" value="sam baxter" id="txtToName">
									</td>
									<td class="lb">
										总重量(g)
									</td>
									<td>
										<input name="" type="text" value="74562" id="txtPWeight"><span>修改总重量，每个包裹产品重量将改为平均重量</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										Address Line1
									</td>
									<td>
										<input name="" type="text" value="broadlawn lower row holt lane holt" id="txtToStreet">
									</td>
									<td class="lb">
										包装规格(cm)
									</td>
									<td>
										<input name="" type="text" value="74562" id="txtPWeight"><span>长*宽*高</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										Address Line2
									</td>
									<td>
										<input name="" type="text" id="txtToStreet2">
									</td>
									<td class="lb">
										申报名称
									</td>
									<td>
										<input name="" type="text" value="74562" id="txtPWeight"><span>每个包裹产品申报名称将改为跟包裹申报名称一样</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										City
									</td>
									<td>
										<input name="" type="text" value="wimborne" id="txtToCity">
									</td>
									<td class="lb">
										总申报价值($)
									</td>
									<td>
										<input name="" type="text" value="74562" id="txtPWeight"><span>每个包裹产品申报价值将改为平均申报价值</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										State/Province
									</td>
									<td>
										<input name="" type="text" value="Dorset" id="txtToState">
									</td>
									<td class="lb">
										包裹备注
									</td>
									<td>
										<input name="" type="text" value="bh21 7dz" id="txtZIP">
									</td>
								</tr>
								<tr>


									<td class="lb">
										Post Code
									</td>
									<td>
										<input name="" type="text" value="bh21 7dz" id="txtZIP">
									</td>
									<td class="lb">
										包裹追踪号(挂号)
									</td>
									<td>
										<input name="" type="text" value="74562" id="txtPWeight"><span>包裹追踪号，20字符以内</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										Country
									</td>
									<td valign="bottom">
										<input name="" type="text" value="United Kingdom" id="CountryName">
										<!--<input type="button" value="选择国家" class="J_selectCountryBtn btn" data-countrytargetid="CountryName">-->
									</td>
									<td class="lb">eBay留言</td>
									<td><input name="" type="text" value="hello eBAY" id="CountryName" disabled="disabled"></td>
								</tr>

								<tr>
									<td class="lb">
										Phone
									</td>
									<td>
										<input name="" type="text" id="txtPhone">
									</td>
									<td class="lb">PayPal留言</td>
									<td><input name="" type="text" value="hello paypal" id="CountryName" disabled="disabled"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--edit save 尾部-->
				<div class="editFooter">
					<input type="submit" name="" value="保存" id="btnSave" class="btn btn-primary">
					<input type="button" name="" value="取消" id="btnSave" class="btn btn-warning backList">
					<span>注: 修改地址信息和包裹信息时才需要保存</span>
				</div>

			</div>
		</div>


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
										<th>wish订单号</th>
										<th>删除时间</th>
										<th>付款时间</th>
										<th>seller</th>
										<th>buyer</th>
										<th>SKU</th>
										<th>国家</th>
										<th>发货方式</th>
										<th>重量(g)</th>
										<th>申报价值(USD)</th>
										<th>申报名称</th>
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
										<td><?php echo $this->_tpl_vars['i']['transaction_id']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['delete_time']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['order_create_time']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['merchant_id']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['BuyerName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['tracking_number']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['countryName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['shipping_provider']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['weight']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['declare_name']; ?>
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