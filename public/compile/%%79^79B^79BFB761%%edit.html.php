<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:14
         compiled from ck1sh/order/edit.html */ ?>
<!--编辑（弹窗）start-->
<div class='editTC TCGB' id="editOrderWindow">
	<div class='editCon TCCON'>
		<div class='editHead'> <span class="sc" id = "OrderID"></span>
			<a name="closeEdit" class="close btn btn-primary">关闭</a>
		</div>
		<div class='editBody'>
			<!--包裹产品-->
			<div class='box1 editbox'>
				<input type="hidden" id="platform" value = ""/>
				<input type="hidden" id="orderId" value = ""/>
				<input type="hidden" id="addressId" value = ""/>
				<h3>包裹商品</h3>
				<form>
				<table id='' class='table table-striped table-bordered itemInfo'>
					<thead>
						<tr>
							<th>ItemID</th>
							<th>ItemTitle</th>
							<th>SKU</th>
							<th>单个重量(g)</th>
							<th>数量</th>
							<th>产品规格 </th>
							<th>申报名称</th>
							<th>单个申报价值($)</th>
							<th width='80px'>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr name="addItem" data-oid="" id="addItem" style="display:none" data-plat="100">							
							<td></td>
							<td><input type="text" name="Title_g" id="" /></td>
							<td><input type="text" name="SKU_g" id="SKU_g" class="SKU_g" /></td>
							<td><input type="text" name="weight_g_g" id="" /></td>
							<td><input type="text" name="QuantityPurchased_g" id="" /></td>
							<td><input type="text" name="size_g" id="" /></td>
							<td><input type="text" name="declare_name_g" id="" /></td>
							<td><input type="text" name="declare_price_g" id="" /></td>							
							<td width='120px' id='adtr'>
								<p>
								<a href="javascript:;" name="adddata" class="btn btn-primary btn-small" id="adddata" style="margin-right: 3px;">添加</a>
								<a href="javascript:;" class="btn btn-small" id="cancel">取消</a>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				</form>
				<a href="javascript:;" class="btn add_order_btn" style="float: right;" id="addware">添加商品</a>
			</div>
			<!--留言-->
			<div class='noteBox'>
				<h3>信息留言</h3>
				<table class="table table-striped table-bordered ">
					<thead>
						<tr>
							<th>eBay留言</th>
							<th>PayPal留言</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class= "message" id="ebaytext">hello,ebay</td>
							<td class= "message" id="paypaltext">hello,paypal</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--地址信息--start-->
			<div class='box2' style="width:40%;float:left;">
				<table class='table table-striped table-bordered box2Table'>

						<tbody>
							<form>
								<tr><td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>地址信息</b></td></tr>
								<tr>
									<td class='address'>Name</td>
									<td><input name='Name' id='S_Name' type='text' value='' class="BuyerName"></td>
								</tr>
								<tr>
									<td class='address'>Address Line1</td>
									<td><input name='Address1' id='S_Address1' type='text' value=''></td>
								</tr>
								<tr>
									<td class='address'>Address Line2</td>
									<td><input name='Address2' id='S_Address2' type='text'></td>
								</tr>
								<tr>
									<td class='address'>City</td>
									<td><input name='City' id='S_City' type='text' value=''></td>
								</tr>
								<tr>
									<td class='address'>State/Province</td>
									<td><input name='Province' id='S_Province' type='text' value=''></td>
								</tr>
								<tr>
									<td class='address'>Post Code</td>
									<td><input name='Postcode' id='S_Postcode' type='text' value=''></td>
								</tr>
							</form>
							<tr>
								<td class='address'>Country</td>
								<td valign='bottom'><input name='Country' id='S_Country' type='text'>
									<input name ="countrycode" id = "countrycode" style = "display: none;">
									<button name="selectCountryButton" class="btn btn-small">选择国家</button>
								</td>
							</tr>
							<tr>
								<td class='address'>Phone</td>
								<td><input name='Phone' id='S_Phone' type='text'></td>
							</tr>

							<tr>
								<td colspan='2'>
									<input type='submit' name='' id='saveadd' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;">
								</td>
							</tr>

						</tbody>
				</table>

			</div>
			<!--地址信息--end-->
			<!--申报信息--start-->

			<div class='box2' style="width:58%;float:right;">

				<table class='table table-striped table-bordered box2Table'>
					<tbody id="shensave">
						<form>
							<tr>
								<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>申报信息</b></td>
							</tr>
							<tr>
								<td class=''>总重量(g)</td>
							<td><input name='weight_total' id='S_weight_total' type='text' value=''><span id='weight_v' style="color:red; display:none">请重新输入重量</span><b class="redStar">*</b><span>修改总重量，每个包裹产品重量将改为平均重量</span></td>
							</tr>
							<tr>
								<td class=''>包装规格(cm)</td>
								<td><input name='size_total' id='S_size_total' type='text' value=''><span id='size_total_v' style="color:red; display:none">请重新输入规格</span><b class="redStar">*</b><span>请重新输入规格，长*宽*高</span></td>
							</tr>
							<tr>
								<td class=''>申报名称</td>
								<td><input name='declare_name' data-id='' id='S_declare_name' type='text' value=''><b class="redStar">*</b><span>每个包裹产品申报名称将改为跟包裹申报名称一样</span></td>
							</tr>
							<tr>
								<td class=''>总申报价值($)</td>
								<td><input name='declare_price_total' id='S_declare_price_total' type='text' value=''><span id='declare_price_total_v' style="color:red; display:none">请重新输入价值</span><b class="redStar">*</b><span>每个包裹产品申报价值将改为平均申报价值</span></td>
							</tr>
							<tr>
								<td class=''>包裹备注</td>
								<td><input name='remark' type='text' id='S_remark' value=''></td>
							</tr>

							<tr>
								<td class=''>包裹追踪号(挂号)</td>
								<td><input name='tracking' type='text' id='S_tracking' value=''><span id='tracking_v' style="color:red; display:none">包裹追踪号不能超过20字符</span><span>包裹追踪号，20字符以内</span></td>
							</tr>
							</form>
						<tr>
							<td colspan='2'><input type='submit' name='' id='saveshen' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;"></td>
						</tr>
					</tbody>
				</table>
			</div>

			<!--申报信息--end-->
			<div class="clear"></div>
		</div>
		<!--edit save 尾部-->
		<div class='editFooter'>
			<!--<input type='submit' name='' value='保存' class='btn btn-primary'>
			<input type='button' name='' value='取消' class='btn btn-warning backList'>
			<span>注: 修改信息后，需要点击相应栏目保存按钮才能完成修改。</span>-->
		</div>
	</div>
</div>
<!--编辑（弹窗）end-->

<!-- 订单详情编辑框js -->
<script type="text/javascript" src="public/template/ck1sh/js/order_edit.js?_20150114"></script>