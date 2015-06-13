<?php /* Smarty version 2.6.28, created on 2014-12-04 11:41:15
         compiled from ck1sh/ebWaitOrder.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title></title>
		<link rel='stylesheet' type='text/css' href='public/template/ck1sh/css/bootstrap.css' />
		<link rel='stylesheet' type='text/css' href='public/template/ck1sh/css/index.css' />
		<script type='text/javascript' src='public/template/ck1sh/js/jquery-1.8.3.js'></script>
		<script src='public/template/ck1sh/js/bootstrap.min.js'></script>
		
	</head>

	<body id='ebWaitOrder'>
		<!--顶部警告框-->
		<div class='topWarn'></div>
		<!--高级查询弹窗-->
		<div class='searchTC TCGB'>
			<form action='?r=oms/SHOrder/GetWaitOrder&t=wait' method='post'>
				<div class='searchTCCon TCCON'>
					<h2>
						<span>高级查询</span>
						<b class='searchTCClose'>关闭</b>
					</h2>
					<div class='searchTCBody'>
						<p>
							<span>关键字</span>
							<select name='typename' id=''>
								<option value=''>关键字类型</option>
								<option value='CountryName'>国家</option>
								<option value='shop_id'>店铺</option>
								<option value='BuyerName'>买家</option>
								<option value='ExternalTransactionID'>Paypal交易号</option>
								<option value='SKU'>SKU</option>
								<option value='sendway'>收货方式</option>
							</select>
							<input type='text' name='name' id='' />
						</p>
						<p>
							<span>数量</span>
							<select name='numsign' id=''>
								<option value='='>等于</option>
								<option value='>'>大于</option>
								<option value='<'>小于</option>
							</select>
							<input type='text' name='num' id='' />
						</p>
						<p>
							<span>重量</span>
							<select name='weightsign' id=''>
								<option value='='>等于</option>
								<option value='>'>大于</option>
								<option value='<'>小于</option>
							</select>
							<input type='text' name='weight' id='' />
						</p>
						<p>
							<span>申报价值</span>
							<select name='valuesign' id=''>
								<option value='='>等于</option>
								<option value='>'>大于</option>
								<option value='<'>小于</option>
							</select>
							<input type='text' name='value' id='' />
						</p>
						<p>
							<span>买家选择的发货方式</span>
							<select name='' id=''>
								<option value=''>买家物流选择</option>
							</select>
						</p>
					</div>
					<div class='searchTCFooter TCFooter'>
						<input type='submit' value='查询' class='btn btn-primary' />
						<input type='button' value='取消' class='btn searchTCCancel' />
					</div>
				</div>
			</form>
		</div>

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh\order\edit.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div class='wrap'>
			<p class='topNav'><a href='#'>首页</a>></p>
			<div class='tabHead'>
				<ul>
					<li><a href='?r=oms/SHOrder/GetWaitOrder&t=wait' class='tabActive'>待发货订单</a>
					</li>
					<li><a href='?r=oms/SHOrder/GetWaitOrder&t=send'>已发货订单</a>
					</li>
					<li><a href='?r=oms/SHOrder/GetWaitOrder&t=del'>已删除</a>
					</li>
					<li><a href='?r=oms/SHEbay/eBayAccount'>eBay账号</a>
					</li>
					<li><a href='?r=oms/SHPaypal/PaypalAccount'>Paypal账号</a>
					</li>
					<li><a href='ebSet.html'>设置</a>
					</li>
				</ul>
				<div class="tabHeadRight">
					<a href='?r=oms/SHPaypal/PaypalAccount' class='btn'>账号管理</a>
					<a href='' class='btn'>帮助</a>
					<a href='' class='btn'>设置</a>
				</div>
				<div class='clear'></div>
			</div>
			<div class='content'>
				<div class='tabBody'>
					<div class='tabBodyHead'>
						<div class='search'>
							<div class='searchLeft'>
								<div class='btn-group' id='deliverServe'>
									<button class='btn'>发货服务</button>
									<button class='btn dropdown-toggle' data-toggle='dropdown'><span class='caret'></span>
									</button>
									<ul class='dropdown-menu'>
										<li><a href='#'>发货服务</a>
										</li>
										<li><a href='#'>未选服务</a>
										</li>
										<li class='dropdown-submenu'>
											<a tabindex='-1' href='#'>已选服务</a>
											<ul class='dropdown-menu'>
												<li><a href='#'>所有</a>
												</li>
												<li><a href='#'>中国直发</a>
												</li>
												<li><a href='#'>海外仓储</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
								<select>
									<option value=''>买家选择物流</option>
									<option value=''>Standard</option>
									<option value=''>Exp Cont US Street Addr</option>
									<option value=''>Std Europe</option>
									<option value=''>Std UK Dom</option>
								</select>
								<select class='dealNum'>
									<option value=''>PayPal交易号</option>
									<option value=''>国家</option>
									<option value=''>卖家</option>
									<option value=''>买家</option>
									<option value=''>Paypal交易号</option>
									<option value=''>SKU</option>
									<option value=''>收货人</option>
									<option value=''>收货方式</option>
								</select>
								<form class='form-search' style='float:left;'>
									<div class='input-append'>
										<input type='text' class='search-query'>
										<button type='submit' class='btn btn-primary'> 查 询 </button>
									</div>
								</form>
								<a href='javascript:;' class='advancedSearch btn' style='margin-left:15px;'>高级查询</a>
							</div>
							<div class='clear'></div>
						</div>
						<div class='sel'>
							<div class='selLeft'>
								<ul class='nav nav-pills'>
									<li class='active'><a href='#'>全部订单</a>
									</li>
									<li><a href='#'>带留言</a>
									</li>
									<li><a href='#'>商品信息缺失</a>
									</li>
									<li><a href='#'>申报价值过高</a>
									</li>
									<li><a href='#'>未选服务</a>
									</li>
									<li><a href='#'>已选服务</a>
									</li>
									<li><a href='#'>中国直发</a>
									</li>
									<li><a href='#'>海外仓储</a>
									</li>
								</ul>
							</div>
							<div class='selRight'>
								<label><a style='padding: 4px 10px;' href='http://docs.chukou1.cn/index.php?title=Ebay%E8%AE%A2%E5%8D%95' target='_blank'>eBay订单帮助</a>&nbsp;&nbsp;</label>

								<a class='btn btn-warning J_PopupIframe' title='下载订单' href='#' data-width='520' data-height='340'>下载订单</a>

								<div class='btn-group' id='deliveryWay' title='选择发货方式'>
									<a class='btn btn-warning'>选择发货方式</a>
									<button class='btn dropdown-toggle btn-warning' data-toggle='dropdown'>
										<span class='caret'></span>
									</button>
									<ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu' style='text-align: left;'>
										<li>
											<a href='javascript:;' class='J_SelectType2' data-value='1'>中国直发</a>
										</li>
										<li>
											<a href='javascript:;' class='J_SelectType2' data-value='2'>海外仓储</a>
										</li>
										<li>
											<a href='javascript:;' class='J_SelectType2' data-value='0'>取消服务</a>
										</li>
									</ul>
								</div>
								<input id='createOrder' type='button' value='确认发货' class='btn btn-warning J_SelectedCheck'>
								<input type='button' value='导出订单' class='btn btn-warning'>
								<input type='button' value='删除' class='btn btn-warning'>.
							</div>
							<div class='clear'></div>
						</div>
					</div>
					<div class='tabBodyCon'>
						<table class='table table-striped table-hover'>
							<thead>
								<tr>
									<th>
										<input type='checkbox' />
									</th>
									<th>Paypal交易号</th>
									<th>店铺</th>
									<th>buyer</th>
									<th>buyer email</th>
									<th>国家</th>
									<th>eBay发货选择</th>
									<th>发货方式</th>
									<th>重量(g)</th>
									<th>申报价值(s)</th>
									<th>申报名称</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if (( $this->_tpl_vars['datao'] == null )): ?>
								<tr>
									<td colspan='14' align='center'>无数据</td>
								</tr>
								<?php else: ?> <?php $_from = $this->_tpl_vars['datao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
								<tr data-id=<?php echo $this->_tpl_vars['a']['order_id']; ?>
>
									<td>
										<input type='checkbox' />
									</td>
									<td><?php echo $this->_tpl_vars['a']['ExternalTransactionID']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['seller_id']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['BuyerName']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['BuyerEmail']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['CountryName']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['ActualShippingService']; ?>
</td>
									<td><?php echo $this->_tpl_vars['a']['ShippingService']; ?>
</td>
									<?php if (( $this->_tpl_vars['a']['weight'] == null )): ?>
									<td style="color:red">0</td>
									<?php else: ?>
									<td><?php echo $this->_tpl_vars['a']['weight']; ?>
</td>
									<?php endif; ?> 
									<?php if (( $this->_tpl_vars['a']['declare_price'] == null )): ?>
									<td style="color:red">0.00</td>
									<?php else: ?>
									<td><?php echo $this->_tpl_vars['a']['declare_price']; ?>
</td>
									<?php endif; ?> 
									<?php if (( $this->_tpl_vars['a']['declare_name'] == null )): ?>
									<td style="color:red">未填写</td>
									<?php else: ?>
									<td><?php echo $this->_tpl_vars['a']['declare_name']; ?>
</td>
									<?php endif; ?>
									<td class='editList'><a href='javascript:void(0);' onclick='editOrder(<?php echo $this->_tpl_vars['a']['order_id']; ?>
)'>编辑</a>
									</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
							</tbody>
						</table>
						<!--页数-->
						<div class='pagination pagination-right'>
							<!--<div class='group' style='float: left;'>
									<input type='button' class='btn' id='btnDeleteOrders' value='删除'>
								</div>-->
							<ul id='Pager1'>
								<li class='disabled'><a>首页</a>
								</li>
								<li class='disabled'><a>&lt;&lt;</a>
								</li>
								<li class='active'><a>1</a>
								</li>
								<li><a href='?Page=2&amp;psize=15'>2</a>
								</li>
								<li><a href='?Page=3&amp;psize=15'>3</a>
								</li>
								<li><a href='?Page=4&amp;psize=15'>4</a>
								</li>
								<li><a href='?Page=5&amp;psize=15'>5</a>
								</li>
								<li><a href='?Page=6&amp;psize=15'>...</a>
								</li>
								<li><a href='?Page=2&amp;psize=15'>&gt;&gt;</a>
								</li>
								<li><a href='?Page=68&amp;psize=15'>尾页</a>
								</li>
								<li class='select-size'>每页
									<select onchange='location.href=location.href + (location.href.indexOf(' ? ') != -1 ? '&amp; ' : '? ') + 'psize=' + this.value'>
										<option selected='selected' value='15'>15</option>
										<option value='30'>30</option>
										<option value='50'>50</option>
										<option value='100'>100</option>
										<option value='150'>150</option>
										<option value='200'>200</option>
										<option value='500'>500</option>
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
		<script type='text/javascript' src='public/template/ck1sh/js/index.js'></script>
		<?php echo '
		<script>
			$(function() {
				//$(\'body\').attr(\'id\', \'ebWaitOrder\');
				//高级查询（弹窗）
				$(\'.advancedSearch\').on(\'click\', function() {
					$(\'#ebWaitOrder .searchTC\').slideDown(200);
				})
				//关闭弹窗
				TCClose($(\'.searchTCClose,.searchTCCancel\'), $(\'#ebWaitOrder .searchTC\'));

				//复选框全选
				allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
				//返回列表按钮--关闭弹窗
				TCClose($(\'.editTC .backList\'), $(\'.editTC\'));
				/*编辑弹窗--end*/
				//编辑窗口》添加产品-（新增一行表单）
				$(".trAddNew").on(\'click\', function() {
					$(\'#trAction\').show();
				})
					//编辑窗口》添加产品-（关闭新增的编辑表单）
				$(\'.cancelItemAdd\').on(\'click\', function() {
					$(\'#trAction\').hide();
				})
			})
		
			/**
			* 订单编辑
			**/
			function editOrder(dataId)
			{
				$(\'.editTC\').slideDown(200);
				//获取当前行数据的ID
				//var dataId = $(this).parent().attr(\'data-id\');
				$.ajax({
					url: "?r=oms/SHOrder/GetDetail&id=" + dataId,
					success: function(data) {
						console.log("?r=oms/SHOrder/GetDetail&id=" + dataId);
						var json_data = JSON.parse(data);

						//  ==========
						/*------商品信息--start----------------------------------------------------*/

						//商品数据变量
						var detailData = json_data.detail;
						var $itemTr_str = \'\';
						if (detailData) {
							for (var i = 0; i < detailData.length; i++) {
								//显示商品
								$itemTr_str += "<tr class=\'editTableCon\' data-id=" + detailData[i].tran_id + ">" +
									"<td><span class=\'itemId\'>" + detailData[i].ItemID + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'itemTitle\'>" + detailData[i].Title + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'eBaDealNum\'>" + detailData[i].TransactionID + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'sku\'>" + detailData[i].weight_g + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'singleWeight\'>" + detailData[i].QuantityPurchased + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'quantity\'>" + detailData[i].size + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'itemSize\'>" + detailData[i].size + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'declareName\'>" + detailData[i].declare_name + "</span><input type=\'text\'/></td>" +
									"<td><span class=\'declarePrice\'>" + detailData[i].declare_price + "</span><input type=\'text\'/></td>" +
									"<td width=\'80\'>" +
									"<p class=\'editBtnBox\'><a href=\'javascript:;\' class=\'itemEdit btn\'>编辑</a><a href=\'javascript:;\' class=\'btn itemDel\'>删除</a></p>" +
									"<p class=\'saveBtnBox\'><a href=\'javascript:;\' class=\'saveItemEdit btn btn-primary\'>确定</a> <a href=\'javascript:;\' class=\'cancelItemEdit btn\'>取消</a></p>" +
									"</td>" +
									"</tr>";
							}
							$(\'.editTC .itemInfo tbody\').html($itemTr_str);
							//点击编辑窗口里边编辑商品按钮
							$(\'.editTC .itemEdit\').on(\'click\', function() {
									$(this).parent().parent().siblings().find(\'input\').css(\'width\', \'80%\');
									$(this).parent().hide();
									$(this).parent().siblings().show();
									$(this).parent().parent().siblings().find(\'span\').hide();
									$(this).parent().parent().siblings().find(\'input\').show();

									var itemSpanText = $(this).parent().parent().siblings().find(\'span\');
									var itemId = itemSpanText.filter(\'.itemId\').text();
									var itemTitle = itemSpanText.filter(\'.itemTitle\').text();
									var eBaDealNum = itemSpanText.filter(\'.eBaDealNum\').text();
									var sku = itemSpanText.filter(\'.sku\').text();
									var singleWeight = itemSpanText.filter(\'.singleWeight\').text();
									var quantity = itemSpanText.filter(\'.quantity\').text();
									var itemSize = itemSpanText.filter(\'.itemSize\').text();
									var declareName = itemSpanText.filter(\'.declareName\').text();
									var declarePrice = itemSpanText.filter(\'.declarePrice\').text();

									itemSpanText.filter(\'.itemId\').next().val(itemId);
									itemSpanText.filter(\'.itemTitle\').next().val(itemTitle);
									itemSpanText.filter(\'.eBaDealNum\').next().val(eBaDealNum);
									itemSpanText.filter(\'.sku\').next().val(sku);
									itemSpanText.filter(\'.singleWeight\').next().val(singleWeight);
									itemSpanText.filter(\'.quantity\').next().val(quantity);
									itemSpanText.filter(\'.itemSize\').next().val(itemSize);
									itemSpanText.filter(\'.declareName\').next().val(declareName);
									itemSpanText.filter(\'.declarePrice\').next().val(declarePrice);
								})
							//编辑窗口》商品编辑》确定
							//编辑窗口》商品编辑》取消
							$(\'.cancelItemEdit\').on(\'click\', function() {
								$(this).parent().parent().siblings().find(\'input\').css(\'width\', \'80%\');
								$(this).parent().hide();
								$(this).parent().siblings().show();
								$(this).parent().parent().siblings().find(\'span\').show();
								$(this).parent().parent().siblings().find(\'input\').hide();
							})

							//删除商品
							$(\'.editTC .itemDel\').on(\'click\', function() {
								var thisId = $(this).parents(\'tr\').attr(\'data-id\');
								$.ajax({
									url: "?r=oms/SHOrder/DelAddressDetail&id=" + thisId,
									success: function(data) {
										console.log(data);
									}
								});
							})
						} else {
							$(\'.editTC .itemInfo tbody\').html("<tr><td colspan=\'10\'>无数据</td></tr>");
						}
						/*------商品信息-end-----------------------------------------------------*/
						//  ==========
					}
				});
			}
		</script>
		'; ?>

	</body>

</html>