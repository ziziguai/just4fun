<?php /* Smarty version 2.6.28, created on 2014-12-21 09:46:47
         compiled from ck1sh/wishWaitOrder.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

</body>
</html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>

	</head>

	<body>
		<!--顶部警告框-->
		<div class="topWarn"></div>

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
						<h3>包裹商品</h3>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ItemID</th>
									<th width="40%">ItemTitle</th>
									<th>SKU</th>
									<th>单个重量(g)</th>
									<th>数量</th>
									<th>申报名称</th>
									<th>单个申报价值($)</th>
									<th width="7%">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr class="d">
									<td>221077011450</td>
									<td width="40%">2 x Air Purifier PLUG-IN OZONE GENERATOR Kill Odor Sterilizer Anion Ion Ozonizer</td>
									<td></td>
									<td>0.00</td>
									<td>2</td>
									<td></td>
									<td>0.00</td>
									<td width="7%"><a href="javascript:void(0);" class="J_ItemEdit" data-id="0">编辑</a>&nbsp;|&nbsp;<a href="javascript:void(0);" class="J_ItemDelete" data-id="0">删除</a>
									</td>
								</tr>
								
								
								<!--后台人员请注意--以下内容请不要包裹在数据循环里边-->
								<tr class="editInp" style="display:none">
									<td>
										<input type="text" class="">
									</td>
									<td>
										<input type="text" class="">
									</td>

									<td>
										<input type="text" class="">
									</td>

									<td>
										<input type="text" class="">
									</td>

									<td>
										<input type="text" class="">
									</td>
									<td>
										<input type="text" class="">
									</td>
									<td>
										<input type="text" class="">
									</td>
									<td>
										<input type="text" class="">
									</td>
									<td>
										<a href="javascript:void(0);">确定</a>&nbsp;|&nbsp;<a href="javascript:void(0);" id="btnItemCancel">取消</a>
									</td>
								</tr>

								<tr id="trAddNew">
									<td colspan="8">
									</td>
									<td>
										<a href="javascript:void(0);">添加产品</a>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<!--地址信息-->
					<div class="box2 editbox">
						<!--<h3>详细信息</h3>-->
						<table class="table table-striped table-bordered box2Table">
							<tbody>
								<tr>
									<td colspan="2" style="font-size:20px;text-align:center;background:#2C89A5;color:#fff;"><b>地址信息</b></td>
									<td colspan="2" style="font-size:20px;text-align:center;background:#2C89A5;color:#fff;"><b>申报信息</b></td>
								</tr>
								<tr>
									<td class="lb">
										Name
									</td>
									<td>
										<input name="" type="text" value="sam baxter">
									</td>
									<td class="lb">
										总重量(g)
									</td>
									<td>
										<input name="" type="text" value="74562"><span>修改总重量，每个包裹产品重量将改为平均重量</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										Address Line1
									</td>
									<td>
										<input name="" type="text" value="broadlawn lower row holt lane holt">
									</td>
									<td class="lb">
										包装规格(cm)
									</td>
									<td>
										<input name="" type="text" value="74562"><span>长*宽*高</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										Address Line2
									</td>
									<td>
										<input name="" type="text">
									</td>
									<td class="lb">
										申报名称
									</td>
									<td>
										<input name="" type="text" value="74562"><span>每个包裹产品申报名称将改为跟包裹申报名称一样</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										City
									</td>
									<td>
										<input name="" type="text" value="wimborne">
									</td>
									<td class="lb">
										总申报价值($)
									</td>
									<td>
										<input name="" type="text" value="74562"><span>每个包裹产品申报价值将改为平均申报价值</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										State/Province
									</td>
									<td>
										<input name="" type="text" value="Dorset">
									</td>
									<td class="lb">
										包裹备注
									</td>
									<td>
										<input name="" type="text" value="bh21 7dz">
									</td>
								</tr>
								<tr>


									<td class="lb">
										Post Code
									</td>
									<td>
										<input name="" type="text" value="bh21 7dz">
									</td>
									<td class="lb">
										包裹追踪号(挂号)
									</td>
									<td>
										<input name="" type="text" value="74562"><span>包裹追踪号，20字符以内</span>
									</td>
								</tr>
								<tr>
									<td class="lb">
										Country
									</td>
									<td valign="bottom">
										<input name="" type="text" value="United Kingdom">
										<!--<input type="button" value="选择国家" class="J_selectCountryBtn btn" data-countrytargetid="CountryName">-->
									</td>
									<td class="lb">eBay留言</td>
									<td><input name="" type="text" value="hello eBAY" disabled="disabled"></td>
								</tr>

								<tr>
									<td class="lb">
										Phone
									</td>
									<td>
										<input name="" type="text">
									</td>
									<td class="lb">PayPal留言</td>
									<td><input name="" type="text" value="hello paypal" disabled="disabled"></td>
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

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh\wishOrderEdit.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
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
				<!--	<li><a href="?r=oms/SHEbay/eBayAccount">eBay账号</a>
					</li>
					<li><a href="?r=oms/SHPaypal/PaypalAccount">Paypal账号</a>
					</li>
					<li><a href="ebSet.html">设置</a>
					</li>-->
				</ul>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="search">
								<select class='dealNum inp'>
									<option value="">Wish订单号</option>
									<option value="">国家</option>
									<option value="">卖家</option>
									<option value="">买家</option>
									<option value="">SKU</option>
									<option value="">收货人</option>
									<option value="">收货方式</option>
								</select>
								<input type="text" name="input" class="inp" />
								<input type="submit" value="查询" class="btn btn-primary" />
								<!--<a href="javascript:;" class="advancedSearch">高级查询</a>-->

							<!--	<select class='dealNum inp'>
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
									<span class="selTitle">状态选择：</span>
									<label>
										<input type="radio" name="state" /><span>未选服务 </span>
									</label>
									<label>
										<input type="radio" name="state" /><span>已选服务 </span>
									</label>
									<span class="selTitle">发货方式：</span>
									<label>
										<input type="radio" name="DGWay" /><span>中国直发 </span>
									</label>
									<label>
										<input type="radio" name="DGWay" /><span>海外直发</span>
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
									<select name="">
										<option value="">选择发货方式</option>
										<option value="">中国直发</option>
										<option value="">海外仓库</option>
										<option value="">取消服务</option>
									</select>
									<input type="button" value="确认发货" />
									<input type="button" value="导出订单" />-->

									<label><a style="padding: 4px 10px;" href="http://docs.chukou1.cn/index.php?title=Ebay%E8%AE%A2%E5%8D%95" target="_blank">eBay订单帮助</a>&nbsp;&nbsp;</label>

									<a class="btn btn-warning J_PopupIframe" title="下载订单" href="#" data-width="520" data-height="340">下载订单</a>

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
									<a href="?r=oms/SHwish/ShowAccount&t=link" class='btn btn-warning'>绑定帐号</a>
									<input id="createOrder" type="button" value="确认发货" class="btn btn-warning J_SelectedCheck">
									<input id="exportOrder" type="button" value="导出订单" class="btn btn-warning">
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
										<th>Wish订单号</th>
										<th>付款时间</th>
										<th>Wish订单状态</th>
										<th>seller</th>
										<th>buyer</th>
										<th>SKU</th>
										<th>国家</th>
										<th>发货方式</th>
                                        <th>挂号</th>
                                        <th>数量</th>
										<th>重量(g)</th>
										<th>申报价值(USD)</th>
										<th>申报名称</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
								<?php $_from = $this->_tpl_vars['orderArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
									<tr>
										<td>
											<input type="checkbox" />
										</td>
										<td><?php echo $this->_tpl_vars['i']['OrderID']; ?>
</td>
										<th><?php echo $this->_tpl_vars['i']['order_create_time']; ?>
</th>
										<td><?php echo $this->_tpl_vars['i']['order_status']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['merchant_id']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['BuyerName']; ?>
</td>
										<td>good</td>
										<td><?php echo $this->_tpl_vars['i']['countryName']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['actual_shipping_service']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['tracking_number']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['quantity']; ?>
</td>
										<td><?php echo $this->_tpl_vars['i']['weight']; ?>
</td>
                                        <td><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
                                        <td><?php echo $this->_tpl_vars['i']['declare_name']; ?>
</td>
										<!--<td class="noteTd">
											<span title=""><b>【PayPal】</b>couldnt do both it asap for a birthday present ! thankell</span>
											<hr />
											<span title=""><b>【-eBay-】</b>sadflkj lasdkjf</span>
											-->
										</td>
										<td class="editList"><a href='javascript:void(0);' onclick='editOrder(<?php echo $this->_tpl_vars['i']['OrderID']; ?>
)'>编辑</a>
										</td>
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

			var order_id = 0;
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
				order_id = dataId;
				$(\'.editTC\').slideDown(200);
				//获取当前行数据的ID
				//var dataId = $(this).parent().attr(\'data-id\');
				$.ajax({
					url: "?r=oms/SHWish/SelectItem&order_id=" + dataId,
					success: function(data) {
						var json_data = data;
						var address = json_data.add;
						/*-----------------------地址信息start--------------------------------*/
						
						$(\'#BuyerName\').val(address[0].BuyerName);
						$(\'#street1\').val(address[0].street1);
						$(\'#street2\').val(address[0].street2);
						$(\'#CityName\').val(address[0].CityName);
						$(\'#StateOrProvince\').val(address[0].StateOrProvince);
						$(\'#PostalCode\').val(address[0].PostalCode);
						$(\'#CountryName\').val(address[0].CountryName);
						$(\'#BuyerPhone\').val(address[0].BuyerPhone);
						$(\'#addressId\').val(address[0].address_id);
						
						//  ==========
						/*------商品信息--start----------------------------------------------------*/
						
						//商品数据变量
						
						//$("#BuyerName").val(""++"");
						var detailData = json_data.detail;
						var $itemTr_str = \'\';
						//总重量
						var totalWeight = 0;
						//总价值
						var totalPrice = 0;
						//申报名称
						var declareName = \'\';
						//包装规格
						var sizemask = \'\';
						//
						if (detailData) {
							for (var i = 0; i < detailData.length; i++) {
								//显示商品
								$itemTr_str += "<tr class=\'editTableCon\' data-id=" + detailData[i].tr_id + ">" +
									"<td><span class=\'itemId\'>" + detailData[i].product_id + "</span><input type=\'text\' id=\'product_id" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'itemTitle\'>" + detailData[i].product_name + "</span><input type=\'text\' id=\'product_name" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'eBaDealNum\'>" + "</span><input type=\'text\' id=\'eBaDealNum" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'sku\'>" +  detailData[i].warehouse_sku + "</span><input type=\'text\' id=\'warehouse_sku" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'singleWeight\'>" + detailData[i].weight + "</span><input type=\'text\' id=\'weight" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'quantity\'>" + detailData[i].quantity + "</span><input type=\'text\' id=\'quantity" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'itemSize\'>" + detailData[i].size + "</span><input type=\'text\' id=\'size" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'declareName\'>" + detailData[i].declare_name + "</span><input type=\'text\' id=\'declare_name" + detailData[i].tr_id + "\'/></td>" +
									"<td><span class=\'declarePrice\'>" + detailData[i].declare_price + "</span><input type=\'text\' id=\'declare_price" + detailData[i].tr_id + "\'/></td>" +
									"<td width=\'80\'>" +
									"<p class=\'editBtnBox\'><a href=\'javascript:;\' class=\'itemEdit btn\'>编辑</a><a href=\'javascript:;\' class=\'btn itemDel\'>删除</a></p>" +
									"<p class=\'saveBtnBox\'><a href=\'javascript:;\' class=\'saveItemEdit btn btn-primary\' data-id="+detailData[i].tr_id+" onclick=\'saveItem("+detailData[i].tr_id+",this)\'>确定</a> <a href=\'javascript:;\' class=\'cancelItemEdit btn\'>取消</a></p>" +
									"</td>" +
									"</tr>";
									totalWeight += detailData[i].weight * detailData[i].quantity;
									totalPrice += detailData[i].declare_price * detailData[i].quantity;
									if(detailData[i].declare_name){
										declareName += detailData[i].declare_name + \'+\';
									}
									//size = detailData[i].size.split(\'*\');
									if(sizemask == 0 || sizemask < detailData[i].size){
										sizemask = detailData[i].size;
									}
							}
							
							$(\'.itemDel\').on(\'click\',function(){
								var aaaa=$(this).parent().siblings();
								var itemID=aaaa.find(\'\').val();
								var itemID=aaaa.find(\'\');
								var itemID=aaaa.find(\'\');
								var itemID=aaaa.find(\'\');
							})
							$(\'.editTC #addItem\').siblings().remove();
							$(\'.editTC #addItem\').before($itemTr_str);
														
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
								var trr = $(this).parents(\'tr\');
								var thisId = trr.attr(\'data-id\');
								$.ajax({
									url: "?r=oms/SHWish/DeleteItems&id=" + thisId,
									success: function(data) {
										if(data == 1){
											trr.remove();
										}else{
											alert(\'删除失败\');
										}
									}
								});
							})
						} else {
							$(\'.editTC .itemInfo tbody\').html("<tr><td colspan=\'10\'>无数据</td></tr>");
						}

						
						
						/*------商品信息-end-----------------------------------------------------*/
						//  ==========
						
						/****----------申报信息绑定start------------------****/
						var declarename;
						$(\'#totalweight\').val(totalWeight);
						$(\'#totalPrices\').val(totalPrice);
						//将变量后面多余的加号去掉
						declarename = declareName.substring(0,declareName.length-1);
						$(\'#declare_names\').val(declarename);
						$(\'#sizes\').val(sizemask);
					}
				});
			}
			
			//编辑窗口》商品编辑》确定
			function saveItem(trId,t){
				if(trId){
					//获取文本框输入的值
					var product_id = $("#product_id"+trId).val();
					var product_name = $("#product_name"+trId).val();
					var warehouse_sku = $("#warehouse_sku"+trId).val();
					var weight = $("#weight"+trId).val();
					var quantity = $("#quantity"+trId).val();
					var size = $("#size"+trId).val();
					var declare_name = $("#declare_name"+trId).val();
					var declare_price = $("#declare_price"+trId).val();
					
					//alert(product_name);
					$.ajax({
						type:"POST",
						url:"?r=oms/SHWish/UpdateProDetail&id="+trId,
						data:"product_id=" + product_id + "&product_name=" + product_name + "&warehouse_sku=" + warehouse_sku + "&weight=" + weight + "&quantity=" + quantity + "&size=" + size + "&declare_name=" + declare_name + "&declare_price=" + declare_price,
						success:function(returnDate){
							//修改成功后将修改后的信息显示在页面上
							if(returnDate == 1){
								//改变当前操作的文本框的值，以免第二修改的时候值出错
								$("#product_id"+trId).val(product_id);
								$("#product_name"+trId).val(product_name);
								$("#warehouse_sku"+trId).val(warehouse_sku);
								$("#weight"+trId).val(weight);
								$("#quantity"+trId).val(quantity);
								$("#size"+trId).val(size);
								$("#declare_name"+trId).val(declare_name);
								$("#declare_price"+trId).val(declare_price);
								
								$("#product_id"+trId).siblings().text(product_id);
								$("#product_name"+trId).siblings().text(product_name);
								$("#warehouse_sku"+trId).siblings().text(warehouse_sku);
								$("#weight"+trId).siblings().text(weight);
								$("#quantity"+trId).siblings().text(quantity);
								$("#size"+trId).siblings().text(size);
								$("#declare_name"+trId).siblings().text(declare_name);
								$("#declare_price"+trId).siblings().text(declare_price);
								$("#product_id"+trId).parents(\'tr\').find(\'span\').show();
								$("#product_id"+trId).parents(\'tr\').find(\'input\').hide();
								$("#product_id"+trId).parents(\'tr\').find(\'p\').filter(\'.saveBtnBox\').hide();
								$("#product_id"+trId).parents(\'tr\').find(\'p\').filter(\'.editBtnBox\').show();								
							}else{
								alert(\'修改失败\');
							}
							$(\'.editTC\').hide(0);
							editOrder(9);
						}
					});
				}
			}
			
			//修改地址信息
			function upAddress(){
				var addressId = $(\'#addressId\').val();
				if(addressId){
					//获取地址信息
					var BuyerName = $(\'#BuyerName\').val();
					var street1 = $(\'#street1\').val();
					var street2 = $(\'#street2\').val();
					var CityName = $(\'#CityName\').val();
					var StateOrProvince = $(\'#StateOrProvince\').val();
					var PostalCode = $(\'#PostalCode\').val();
					var CountryName = $(\'#CountryName\').val();
					var BuyerPhone = $(\'#BuyerPhone\').val();
					
					$.ajax({
						type:"POST",
						url:"?r=oms/SHWish/UpdateAddress&id="+addressId,
						data:"BuyerName=" + BuyerName + "&street1=" + street1 + "&street2=" + street2 + "&CityName=" + CityName + "&StateOrProvince=" + StateOrProvince + "&PostalCode=" + PostalCode + "&CountryName=" + CountryName + "&BuyerPhone=" +BuyerPhone,
						success:function(res){
							if(res == 1){
								$(\'#BuyerName\').val(BuyerName);
								$(\'#street1\').val(street1);
								$(\'#street2\').val(street2);
								$(\'#CityName\').val(CityName);
								$(\'#StateOrProvince\').val(StateOrProvince);
								$(\'#PostalCode\').val(PostalCode);
								$(\'#CountryName\').val(CountryName);
								$(\'#BuyerPhone\').val(BuyerPhone);
							}else{
								alert(\'修改失败\');
							}
						}
					});
				}
			}
			
			//修改申报信息
			function saveDeclare(){				
				var totalweight = $(\'#totalweight\').val();
				var sizes = $(\'#sizes\').val();
				var declare_names = $(\'#declare_names\').val();
				var totalPrices = $(\'#totalPrices\').val();
				var remarks = $(\'#remarks\').val();
				var trackid = $(\'#trackid\').val();				
				if(order_id){
					$.ajax({
						type:"POST",
						url:"?r=oms/SHWish/SaveDeclare&id="+order_id,
						data:"weight=" + totalweight + "&package_size=" + sizes + "&declare_name=" + declare_names + "&declare_price=" + totalPrices + "&remark=" + remarks + "&tracking_number=" + trackid,
						success:function(res){
							if(res == 1){
								$(\'#totalweight\').val(totalweight);
								$(\'#sizes\').val(sizes);
								$(\'#declare_names\').val(declare_names);
								$(\'#totalPrices\').val(totalPrices);
								$(\'#remarks\').val(remarks);
								$(\'#trackid\').val(trackid);		
							}else{
								alert(\'修改失败\');
							}
						}
					});
				}
			}
			
			//修改sku动态加载该sku对应的商品的信息
			$(\'.addSKU\').on("focusout",function(){
				var sku = $(\'.addSKU\').val();
				$.ajax({
					url:"?r=oms/SHWish/SelectSku&sku="+sku,
					success:function(skuinfo){
						skuinfos = skuinfo.skudata;
						$(\'#addProductId\').val(skuinfos[0][\'product_id\']);
						$(\'#addSku\').val(skuinfos[0][\'sku\']);
						$(\'#addWeight\').val(skuinfos[0][\'weight\']);
						$(\'#addSize\').val(skuinfos[0][\'PackingOriginal\']);
						$(\'#addDeclareName\').val(skuinfos[0][\'DeclareName\']);
						$(\'#addDeclareValue\').val(skuinfos[0][\'DeclareValue\']);
					}
				});
			});

		</script>
		'; ?>

	</body>

</html>