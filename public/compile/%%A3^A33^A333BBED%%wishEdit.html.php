<?php /* Smarty version 2.6.28, created on 2015-01-15 15:38:28
         compiled from ck1sh/order/wishEdit.html */ ?>
<!--编辑（弹窗）start-->
<div class='editTC TCGB' id="wishOrderEditWindow">
	<div class='editCon TCCON'>
		<div class='editHead'>
			<span class='sc' id='page'>[订单号：<b id='transactionid'></b>]<input type="hidden" id="order_handle_id"></span>
			<a class="close btn btn-primary" name="closeEdit">关闭</a>
		</div>
		<div class='editBody'>
			<!--包裹产品-->
			<div class='box1 editbox'>
				<h3>包裹商品</h3>
				<table id='' class='table table-striped table-bordered itemInfo'>
					<thead>
						<tr>
						<?php if ($this->_tpl_vars['platform'] == 104): ?>
							<th>ItemID</th>
							<th>ItemTitle</th>
							<th>eBay交易号</th>
							<th>SKU</th>
							<th>单个重量(g)</th>
							<th>数量</th>
							<th>产品规格 </th>
							<th>申报名称</th>
							<th>单个申报价值($)</th>
							<th width='80px'>操作</th>
						<?php elseif ($this->_tpl_vars['platform'] == 100): ?>
						
						<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<tr name="addItem" data-oid="" id="addItem" style="display:none">
							<td style="display:none" ><input type="text" name="ItemID_g" id=""/></td>
							<td><input type="text" name="ItemID_g" id="addProductId" /></td>
							<td><input type="text" name="Title_g" id="addTitle" /></td>
							<td><input type="text" name="TransactionID_g" id="" /></td>
							<td><input type="text" name="SKU_g" id="addSku" class="addSKU_g" placeholder="请输入sku"/></td>
							<td><input type="text" name="weight_g_g" id="addWeight" /></td>
							<td><input type="text" name="QuantityPurchased_g" id="addquantity" /></td>
							<td><input type="text" name="size_g" id="addSize" /></td>
							<td><input type="text" name="declare_name_g" id="addDeclareName" /></td>
							<td><input type="text" name="declare_price_g" id="addDeclareValue" /></td>
							<td width='120px' id='adtr'>
								<p><a href="javascript:;" class="btn btn-primary" id="adddata" style="margin-right:3px;">添加</a><a href="javascript:;" class="btn" id="cancel">取消</a></p>
								</td>
						</tr>
					</tbody>
				</table>
				<a href="javascript:;" class="btn" style="float:right;" id="addware">添加商品</a>
			</div>
			<div class="clear"></div>
		<br>
			<!--地址信息--start-->
			<div class='box2' style="width:40%;float:left;">
				<table class='table table-striped table-bordered box2Table'>
					<tbody>
						<tr>
							<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>地址信息</b></td>	
						</tr>
						<tr>
							<td class=''>Name</td>
							<td><input name='Name' type='text' value='' class="BuyerName" id='BuyerName'></td>
						</tr>
						<tr>
							<td class=''>Address Line1</td>
							<td><input name='Address1' type='text' value='' id='street1'></td>
						</tr>
						<tr>
							<td class=''>Address Line2</td>
							<td><input name='Address2' type='text' id='street2'></td>
						</tr>
						<tr>
							<td class=''>City</td>
							<td><input name='City' type='text' value='' id='CityName'></td>
						</tr>
						<tr>
							<td class=''>State/Province</td>
							<td><input name='Province' type='text' value='' id='StateOrProvince'></td>
						</tr>
						<tr>
							<td class=''>Post Code</td>
							<td><input name='Postcode' type='text' value='' id='PostalCode'></td>
						</tr>
						<tr>
							<td class=''>Country</td>
							<td valign='bottom'><input name='Country' type='text' id='CountryName' value='' data-countryname = '' readonly>
								<input type='hidden' id='CountryCode'>
								<input type='button' value='选择国家' class='J_selectCountryBtn btn' data-countrytargetid='CountryName'>
							</td>
						</tr>
						<tr>
							<td class=''>Phone</td>
							<td><input name='Phone' type='text' id='BuyerPhone'></td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' name='' id='saveadd' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;"><input type="hidden" id='addressId'></td>
						</tr>
					</tbody>
						</table>
			</div>
			<!--地址信息--end-->
			
			<!--申报信息--start-->
			<div class='box2' style="width:58%;float:right;">
				<table class='table table-striped table-bordered box2Table'>
					<tbody>
						<tr>
							<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>申报信息</b></td>
						</tr>
						<tr>
							<td class=''>总重量(g)</td>
						<td><input name='weight_total' type='text' value='' id='totalweight' data-weight=''><b class="redStar">*</b><span>修改总重量，每个包裹产品重量将改为平均重量</span></td>
						</tr>
						<tr>
							<td class=''>包装规格(cm)</td>
							<td><input name='size_total' type='text' value='' id='totalsize'><b class="redStar">*</b><span>请重新输入规格，长*宽*高</span></td>
							</tr>
						<tr>
							<td class=''>申报名称</td>
							<td><input name='declare_name' type='text' value='' id='totalname' data-name=''><b class="redStar">*</b><span>每个包裹产品申报名称将改为跟包裹申报名称一样</span></td>
						</tr>
						<tr>
							<td class=''>总申报价值($)</td>
							<td><input name='declare_price_total' type='text' value='' id='totalprice' data-price=''><b class="redStar">*</b><span>每个包裹产品申报价值将改为平均申报价值</span></td>
						</tr>
						<tr>
							<td class=''>包裹备注</td>
							<td><input name='remark' type='text' value='' id='remark'></td>
						</tr>
						<tr>
							<td class=''>包裹追踪号(挂号)</td>
							<td><input name='tracking' type='text' value='' id='tracking'><span>包裹追踪号，20字符以内</span></td>
						</tr>
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
<script type="text/javascript" src="public/template/ck1sh/js/wish.js?_20150114"></script>