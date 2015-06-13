<?php /* Smarty version 2.6.28, created on 2014-12-13 09:41:58
         compiled from ck1sh/order/shippingConfirm.html */ ?>
<div class="modal hide" id="shShippingConfirmModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>创建出口易订单</h3>
	</div>
	<div class="modal-body">
		<div class="alert alert-warning" style="display: none;">有
			&nbsp;<span class="text-error" style="font-weight: bolder; font-size: 18px;" name="unSelectCount">0</span>&nbsp;
			个订单未选择发货服务，将不会发货！
		</div>
		<p style="border-bottom:1px solid #e5e5e5;padding:10px;"></p>
		<div>
			<div style="float: left; border-right: 1px solid #e5e5e5; padding: 0 40px 0px 15px;">
				<div>有
					&nbsp;<span class="text-info" style="font-weight: bolder; font-size: 18px;" name="overseaCount">0</span>&nbsp;
					个国内包裹创建直发订单
				</div>
				<br />
				<div>
					<span>直发处理点</span>
					<select name="handlerSites" class="span2">
					</select>
				</div>
			</div>
			<div style="float: left; padding-left: 20px;">
				<div>有
					&nbsp;<span class="text-info" style="font-weight: bolder; font-size: 18px;" name="expressCount">0</span>&nbsp;
					个海外仓包裹创建出库单
				</div>
			</div>	
		</div>
	</div>
	<div class="modal-footer">
		<a class="btn btn-primary" name="createOutsOrderButton">生成订单</a>
		<a class="btn" data-dismiss="modal" aria-hidden="true">取消</a>
	</div>
</div>