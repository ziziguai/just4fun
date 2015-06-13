<?php /* Smarty version 2.6.28, created on 2015-02-04 05:51:14
         compiled from ck1sh/order/aliEdit.html */ ?>
<!--编辑（弹窗）start-->
<div class='editTC TCGB' id="editOrderWindow">
	<div class='editCon TCCON'>
		<div class='editHead '>
	  		<span class="sc" >[订单号：<b>54a216c10000000000000000</b>]</span>
		    <a class="close btn btn-primary" name="closeEdit">关闭</a>
		</div>
		<div class='editBody'>
			<!--包裹产品-->
			<div class='box1 editbox'>
				<h3>包裹商品</h3>
				<form id="declare_form" onsubmit="return false">
				<table id='productItem' class='table table-striped table-bordered itemInfo'>
					<thead>
						<tr>
							<th>ItemID</th>
							<th>ItemTitle</th>
							<th>SKU</th>
							<th>单个重量(g)</th>
							<th>数量</th>
							<th>产品规格</th>
							<th>申报名称</th>
							<th>单个申报价值($)</th>
							<th width='80px'>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr id="addItem" class="editTable" style="display:none;" data-orderId="" data-AliOrderId="">
							<td><input type="text" name="productId" id="add_productId" class="item_input" /></td>
							<td><input type="text" name="productName" id="add_productName" /></td>
							<td><input type="text" name="skuCode" id="add_skuCode" class="sku_input" /></td>
							<td><input type="text" name="weight_g" id="add_weight_g" class="validate" rule="weight_input" /></td>
							<td><input type="text" name="productCount" id="add_productCount" class="product_count_input" /></td>
							<td><input type="text" name="size" id="add_size" class="validate" rule="package_size_input" /></td>
							<td><input type="text" name="declare_name" id="add_declare_name" class="validate" rule="declare_name_input" /></td>
							<td><input type="text" name="declare_price" id="add_declare_price" class="validate" rule="declare_price_input" /></td>
							<td width='80px'>
								<p><a href="javascript:;" class="btn btn-primary" style="margin-right:3px;" id="confirm-add-btn">添加</a><a href="javascript:;" class="btn" id="rewrite">取消</a></p>
							</td>
						</tr>
					</tbody>
				</table>
				</form>
				<a href="javascript:;" class="btn add_order_btn" style="float:right;" id="addware">添加商品</a>
			</div>
				<!--<a href="javascript:;" class="btn add_order_btn" style="float:right;">添加商品</a>-->
			<?php if ($this->_tpl_vars['platform'] == 102): ?>
			<!--留言-->
			<div class='noteBox'>
				<h3>信息留言</h3>
				<table class="table table-striped table-bordered ">
					<!-- <thead>
						<tr><th>速卖通订单留言</th></tr>
					</thead> -->
					<tbody>
						<tr>
						    <td id="alitext" class='liuyan'></td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php endif; ?>
			<!--地址信息--start-->
			<div class='box2' style="width:40%;float:left;">
				<table class='table table-striped table-bordered box2Table'>
					<tbody>
						<tr>
						<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>地址信息</b></td>	
						</tr>
							<tr>
								<td class=''>Name</td><td><input name='' type='text' class="BuyerName" id='BuyerName'></td>
							</tr>
							<tr>
								<td class=''>Address Line1</td><td><input name='' type='text' id='street1' class="Line1"></td>
							</tr>
							<tr>
								<td class=''>Address Line2</td><td><input name='' type='text' id='street2' class="Line2"></td>
							</tr>
							<tr>
								<td class=''>City</td><td><input name='' type='text' id='CityName' class="City"></td>
							</tr>
							<tr>
								<td class=''>State/Province</td><td><input name='' type='text' id='StateOrProvince' class="Disctrict"></td>
							</tr>
							<tr>
								<td class=''>Post Code</td><td><input name='' type='text' id='PostalCode' class="PostalCode"></td>
							</tr>
							<tr>
								<td class=''>Country</td>
								<td valign='bottom'><input name='' type='text' value='' id='S_Country' class="Country" readonly>
								        <input name ="countrycode" id = "countrycode" style = "display:none">
										<button name="selectCountryButton" class="btn btn-small" data-countrytargetid="S_Country" id = "code">选择国家</button>					
								</td>
							</tr>
							<tr>
								<td class=''>Phone</td><td><input name='Phone' type='text' id='BuyerPhone' class="S_Phone"><input type="hidden" name="address_id" id="address_id"></td>
							</tr>
						<tr>
							<!--<td colspan='2' style="text-align:right;"><span>注: 修改地址信息时才需要保存</span><input type='submit' name='' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;" id="btn-save-address"></td>-->
							<td colspan='2'><input type='submit' name='' id='saveadd' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--地址信息--end-->
			
			<!--申报信息--start-->
			<div class='box2' style="width:58%;float:right;">
			<form id="declare_form" onsubmit="return false">
				<table class='table table-striped table-bordered box2Table' id="declare_table">
					<tbody>
						<tr>
							<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>申报信息</b></td>
						</tr>
						<tr>
							<td class=''>总重量(g)</td><td><input name='weight' type='text' class="weight validate" rule="weight_input" id="weight" data-weight=''><b class="redStar">*</b><span>请重新输入重量</span><span>修改总重量，每个包裹产品重量将改为平均重量</span></td>
						</tr>
						<tr>
							<td class=''>包装规格(cm)</td><td><input name='packageSize' type='text' class="packageSize validate" rule="package_size_input" id="packageSize"><b class="redStar">*</b><span>请重新输入规格</span><span>长*宽*高</span></td>
						</tr>
						<tr>
							<td class=''>申报名称</td><td><input name='declare_name' type='text' class="declare_name validate" rule="declare_name_input" id="declare_name"><b class="redStar">*</b><span>每个包裹产品申报名称将改为跟包裹申报名称一样</span></td>
						</tr>
						<tr>
							<td class=''>总申报价值($)</td><td><input name='declare_price' type='text' class="declare_price validate" rule="declare_price_input" id="declare_price"><b class="redStar">*</b><span>每个包裹产品申报价值将改为平均申报价值</span></td>
						</tr>
						<tr>
							<td class=''>包裹备注</td><td><input name='remark' type='text' class="remark" id="remark"></td>
						</tr>
						<tr>

							<!-- <td class=''>鍖呰９杩借釜鍙�鎸傚彿)</td><td><input name='' type='text' value='' class="package_sn"><span>鍖呰９杩借釜鍙凤紝20瀛楃浠ュ唴</span></td> -->

							<td class=''>包裹追踪号(挂号)</td><td><input name='tracking' type='text' class="logisticsNo validate" rule="tracking_input" id="tracking"><span>包裹追踪号，20字符以内</span></td>

						</tr>						
						<tr>
							<td colspan='2' style="text-align:right;"><span>注: 修改包裹信息时才需要保存</span><input type='submit' name='' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;" id="btn-save-declare"></td>
						</tr>
					</tbody>
				</table>
			</form>
			</div>
			<!--申报信息尾部--end-->
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

<!--订单详情编辑框js -->
<script type="text/javascript" src="public/template/ck1sh/js/aliEdit.js"></script>