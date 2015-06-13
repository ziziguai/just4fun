<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:07
         compiled from ck1sh/order/advance_search.html */ ?>
<!--高级查询弹窗-->
<div class="modal TCCONBorTop hide" id="advanceSearchModal" style="width: 450px;">
	<div class="modal-header">
		<a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
		<h4>高级查询</h4>
	</div>
	<div class="modal-body" style="height: 350px;">
		<!-- Search options groups start-->
	    <div class="control-group">
			<!-- Search options groups: shipping services start-->
	    	<div class="btn-group">
				<a class="btn span1" name="displayName" data-toggle="dropdown">发货服务</a>
				<a class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="active">
						<a data-iname="shipServiceOption" href="javascript:;" data-value="">发货服务</a></li>
					<?php $_from = $this->_tpl_vars['advSearchSet']['shipServiceOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
					<li>
						<a data-iname="shipServiceOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
				<!-- 发货服务选中值，默认未选值为空 -->
				<input data-postkey="seller_selected" name="shipServiceOption" type="hidden" value="">
			</div>
			<!-- Search options groups: shipping services end-->
			<?php if ($this->_tpl_vars['advSearchSet']['buyerSelectedOptions']): ?>
			<!-- Search options groups: buyer selected services start-->
			<div class="btn-group">
				<a class="btn span2" name="displayName" data-toggle="dropdown" style="overflow:hidden;">买家选择物流</a>
				<a class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
				<ul class="dropdown-menu">
                    <li class="active">
                    	<a data-iname="buyerSelectedOption" href="javascript:;" data-value="">买家选择物流</a></li>
                    <?php $_from = $this->_tpl_vars['advSearchSet']['buyerSelectedOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
					<li>
						<a data-iname="buyerSelectedOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
				<!-- 买家选择物流服务选中值，默认未选值为空 -->
				<input data-postkey="buyer_selected" name="buyerSelectedOption" type="hidden" value="">
			</div>
			<!-- Search options groups: buyer selected services end-->
			<?php endif; ?>
		</div>
		<!-- Search options groups end-->
		<!-- Search condition: keywords. start-->
	    <div class="input-prepend">
		    <div class="btn-group">
			    <a class="btn dropdown-toggle span2" data-toggle="dropdown">
				    <!-- 取第一个 -->
					<?php $_from = $this->_tpl_vars['advSearchSet']['advSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['keyword'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['keyword']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['keyword']['iteration']++;
?>
						<?php if (($this->_foreach['keyword']['iteration'] <= 1)): ?>
						<span class="pull-left" name="displayName"><?php echo $this->_tpl_vars['name']; ?>
</span>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				    <span class="caret pull-right"></span>
			    </a>
			    <ul class="dropdown-menu">
			    	<?php $_from = $this->_tpl_vars['advSearchSet']['advSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['keyword'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['keyword']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['keyword']['iteration']++;
?>
					<li class="<?php if (($this->_foreach['keyword']['iteration'] <= 1)): ?>active<?php endif; ?>">
						<a data-iname="advSearchKey" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
		    </div>
		    <!-- 查询关键词, 默认选中第一个 -->
			<?php $_from = $this->_tpl_vars['advSearchSet']['advSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['keyword'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['keyword']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['keyword']['iteration']++;
?>
				<?php if (($this->_foreach['keyword']['iteration'] <= 1)): ?>
				<input data-postkey="keyword" name="advSearchKey" value="<?php echo $this->_tpl_vars['value']; ?>
" type="hidden" />
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<!-- 查询关键词内容, 默认未填为空 -->
		    <input class="span2-2" data-postkey="keyword_value" type="text"  value="" placeholder="查询关键字(选填)">
	    </div>
		<!-- Search condition: keywords. end-->
		<!-- Search condition: item quantity of order. start-->
	    <div class="input-prepend input-append">
		    <div class="btn-group">
			    <a class="btn dropdown-toggle span2" data-toggle="dropdown">
				    <span class="pull-left">数量</span>
				    <span class="caret pull-right" style="margin-left: 8px;"></span>
				    <?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['cmpOP']['iteration']++;
?>
						<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>
					    <span class="pull-right" name="displayName"><?php echo $this->_tpl_vars['name']; ?>
</span>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
			    </a>
			    <ul class="dropdown-menu">
			    	<?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['opKey'] => $this->_tpl_vars['opName']):
        $this->_foreach['cmpOP']['iteration']++;
?>
			    	<li class="<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>active<?php endif; ?>">
						<a href="javascript:;" data-iname="quantityOpOption" data-value="<?php echo $this->_tpl_vars['opKey']; ?>
">&nbsp;
							<span class="pull-right"><?php echo $this->_tpl_vars['opName']; ?>
</span></a></li>
			    	<?php endforeach; endif; unset($_from); ?>
				</ul>
		    </div>
		    <!-- 数量比较符, 默认未选为空 -->
		    <?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['cmpOP']['iteration']++;
?>
				<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>
			    <input data-postkey="quantity_op" type="hidden" value="<?php echo $this->_tpl_vars['name']; ?>
" name="quantityOpOption">
			    <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		    <!-- 数量比较值, 默认未填为空 -->
		    <input class="span2-2" data-postkey="quantity_value" type="text"  value="" placeholder="0(选填)">
		    <span class="add-on">&nbsp;&nbsp;包&nbsp;&nbsp;</span>
	    </div>
		<!-- Search condition: item quantity of order. end-->
	    <!-- Search condition: weight of order. start-->
	    <div class="input-prepend input-append">
		    <div class="btn-group">
			    <a class="btn dropdown-toggle span2" data-toggle="dropdown">
				    <span class="pull-left">重量</span>
				    <span class="caret pull-right" style="margin-left: 8px;"></span>
				    <?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['cmpOP']['iteration']++;
?>
						<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>
					    <span class="pull-right" name="displayName"><?php echo $this->_tpl_vars['name']; ?>
</span>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
			    </a>
			    <ul class="dropdown-menu">
					<?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['opKey'] => $this->_tpl_vars['opName']):
        $this->_foreach['cmpOP']['iteration']++;
?>
			    	<li class="<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>active<?php endif; ?>">
						<a href="javascript:;" data-iname="weightOpOption" data-value="<?php echo $this->_tpl_vars['opKey']; ?>
">&nbsp;
							<span class="pull-right"><?php echo $this->_tpl_vars['opName']; ?>
</span></a></li>
			    	<?php endforeach; endif; unset($_from); ?>
				</ul>
		    </div>
		    <!-- 重量比较符, 默认未选为空 -->
		    <?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['cmpOP']['iteration']++;
?>
				<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>
			    <input data-postkey="weight_op" type="hidden" value="<?php echo $this->_tpl_vars['name']; ?>
" name="weightOpOption">
			    <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		    <!-- 重量比较值, 默认未填为空 -->
		    <input class="span2-2" data-postkey="weight_value" type="text"  value="" placeholder="0.00(选填)">
		    <span class="add-on">&nbsp;&nbsp;克&nbsp;&nbsp;</span>
	    </div>
		<!-- Search condition: weight of order. end-->
		<!-- Search condition: declare value of order. start-->
	    <div class="input-prepend input-append">
		    <div class="btn-group">
			    <a class="btn dropdown-toggle span2" data-toggle="dropdown">
				    <span class="pull-left">申报价值</span>
				    <span class="caret pull-right" style="margin-left: 8px;"></span>
				    <?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['cmpOP']['iteration']++;
?>
						<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>
					    <span class="pull-right" name="displayName"><?php echo $this->_tpl_vars['name']; ?>
</span>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
			    </a>
			    <ul class="dropdown-menu">
					<?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['opKey'] => $this->_tpl_vars['opName']):
        $this->_foreach['cmpOP']['iteration']++;
?>
			    	<li class="<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>active<?php endif; ?>">
						<a href="javascript:;" data-iname="declareOpOption" data-value="<?php echo $this->_tpl_vars['opKey']; ?>
">&nbsp;
							<span class="pull-right"><?php echo $this->_tpl_vars['opName']; ?>
</span></a></li>
			    	<?php endforeach; endif; unset($_from); ?>
				</ul>
		    </div>
		    <!-- 申报价值比较符, 默认未选为空 -->
			<?php $_from = $this->_tpl_vars['advSearchSet']['cmpOPCN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmpOP'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmpOP']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name']):
        $this->_foreach['cmpOP']['iteration']++;
?>
				<?php if (($this->_foreach['cmpOP']['iteration'] <= 1)): ?>
			    <input data-postkey="declare_op" type="hidden" value="<?php echo $this->_tpl_vars['name']; ?>
" name="declareOpOption">
			    <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		    <!-- 申报价值比较值, 默认未填为空 -->
		    <input class="span2-2" data-postkey="declare_value" type="text"  value="" placeholder="0.00(选填)">
		    <span class="add-on">USD</span>
	    </div>
		<!-- Search condition: declare value of order. end-->
	</div>
	<div class="modal-footer">
		<a data-dismiss="modal" aria-hidden="true" name="advSearchBtn" data-filter="<?php echo $this->_tpl_vars['advSearchSet']['filter']; ?>
" class="btn btn-primary">查询</a>
		<a data-dismiss="modal" aria-hidden="true" class="btn" >取消</a>
	</div>
</div>