<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:07
         compiled from ck1sh/order/sync_order.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ck1sh/order/sync_order.html', 14, false),)), $this); ?>
<!-- "同步订单"弹窗 start-->
<div id="syncOrderModal" class="modal TCCONBorTop hide">
	<div class="modal-header">
		<a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
		<h4>立即同步&nbsp;[<?php echo $this->_tpl_vars['platformName']; ?>
]&nbsp;订单</h4>
	</div>
	<div class="modal-body">
		<div>
			<input class="span1-6 time-selector" type="text" name="startTime" value="" placeholder="起始时间" />
            &nbsp;&oline;&nbsp;
            <?php if ($this->_tpl_vars['syncOrderSet']['enableEndTime']): ?>
	            <input class="span1-6 time-selector" name="endTime" type="text" placeholder="截止时间" />
            <?php else: ?>
	            <input class="span1-6" readonly type="text" value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
">
		            <span class="help-inline"><span class="text-warning">截止时间默认为当前时间</span>
	            </input>
            <?php endif; ?>
		</div>
		<div>
	        <img class="img-loading hide" name="runtimeTips" height="30" width="30"  src="public/template/ck1sh/img/loading.gif">
			<span class="hide" name="runtimeTips">正在下载中...</span>
		</div>
	</div>
	<div class="modal-footer">
		<a name="confirmBtn" class="btn btn-primary">立即同步</a>
		<a data-dismiss="modal" aria-hidden="true" class="btn" >取消</a>
	</div>
</div>
<!-- "同步订单"弹窗 end-->