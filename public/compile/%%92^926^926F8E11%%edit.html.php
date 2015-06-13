<?php /* Smarty version 2.6.28, created on 2014-12-04 11:41:15
         compiled from ck1sh%5Corder%5Cedit.html */ ?>
<!--编辑（弹窗）start-->
<div class='editTC TCGB'>
	<div class='editCon TCCON'>
		<div class='editHead'>
			<?php $_from = $this->_tpl_vars['datao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
			<span class='sc'>[交易号：<?php echo $this->_tpl_vars['a']['ExternalTransactionID']; ?>
]</span>
			<?php endforeach; endif; unset($_from); ?>
			<a href='javascript:;' class='btn btn-warning backList' style='float:right;'>关闭</a>
		</div>
		<div class='editBody'>
			<!--包裹产品-->
			<div class='box1 editbox'>
				<h3>包裹商品</h3>
				<table id='' class='table table-striped table-bordered itemInfo'>
					<thead>
						<tr>
						<?php if ($this->_tpl_vars['platform'] == 100): ?>
							<th>ItemID</th>
							<th>ItemTitle</th>
							<th>eBay交易号</th>
							<th>SKU</th>
							<th>单个重量(g)</th>
							<th>数量</th>
							<th>产品规格 </th>
							<th>申报名称</th>
							<th>单个申报价值($)</th>
							<th width='80'>操作</th>
						<?php elseif ($this->_tpl_vars['platform'] == 101): ?>
						
						<?php endif; ?>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<?php if ($this->_tpl_vars['platform'] == 100): ?>
			<!--留言-->
			<div class='noteBox'>
				<h3>信息留言</h3>
				<table class="table table-striped table-bordered ">
					<thead>
						<tr><th>eBay留言</th><th>PayPal留言</th></tr>
					</thead>
					<tbody>
						<tr>
							<td>hello,ebay</td>
							<td>hello,paypal</td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php endif; ?>
			<!--地址信息--start-->
			<div class='box2 editbox' style="width:40%;float:left;">
				<table class='table table-striped table-bordered box2Table'>
					<tbody>
						<tr>
							<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>地址信息</b></td>	
						</tr>
						<tr>
							<td class=''>Name</td>
							<td><input name='' type='text' value='' class="BuyerName"></td>
						</tr>
						<tr>
							<td class=''>Address Line1</td>
							<td><input name='' type='text' value=''></td>
						</tr>
						<tr>
							<td class=''>Address Line2</td>
							<td><input name='' type='text'></td>
						</tr>
						<tr>
							<td class=''>City</td>
							<td><input name='' type='text' value=''></td>
						</tr>
						<tr>
							<td class=''>State/Province</td>
							<td><input name='' type='text' value=''></td>
						</tr>
						<tr>
							<td class=''>Post Code</td>
							<td><input name='' type='text' value=''></td>
						</tr>
						<tr>
							<td class=''>Country</td>
							<td valign='bottom'><input name='' type='text' value=''>
								<!--<input type='button' value='选择国家' class='J_selectCountryBtn btn' data-countrytargetid='CountryName'>-->
							</td>
						</tr>
						<tr>
							<td class=''>Phone</td>
							<td><input name='' type='text'></td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' name='' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--地址信息--end-->
			
			<!--申报信息--start-->
			<div class='box2 editbox' style="width:60%;float:right;">
				<table class='table table-striped table-bordered box2Table'>
					<tbody>
						<tr>
							<td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>申报信息</b></td>
						</tr>
						<tr>
							<td class=''>总重量(g)</td>
							<td><input name='' type='text' value=''><span>修改总重量，每个包裹产品重量将改为平均重量</span></td>
						</tr>
						<tr>
							<td class=''>包装规格(cm)</td>
							<td><input name='' type='text' value=''><span>长*宽*高</span></td>
						</tr>
						<tr>
							<td class=''>申报名称</td>
							<td><input name='' type='text' value=''><span>每个包裹产品申报名称将改为跟包裹申报名称一样</span></td>
						</tr>
						<tr>
							<td class=''>总申报价值($)</td>
							<td><input name='' type='text' value=''><span>每个包裹产品申报价值将改为平均申报价值</span></td>
						</tr>
						<tr>
							<td class=''>包裹备注</td>
							<td><input name='' type='text' value=''></td>
						</tr>
						<tr>
							<td class=''>包裹追踪号(挂号)</td>
							<td><input name='' type='text' value=''><span>包裹追踪号，20字符以内</span></td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' name='' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;"></td>
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
			<input type='button' name='' value='取消' class='btn btn-warning backList'>-->
			<span>注: 修改地址信息和包裹信息时才需要保存</span>
		</div>
	</div>
</div>
<!--编辑（弹窗）end-->