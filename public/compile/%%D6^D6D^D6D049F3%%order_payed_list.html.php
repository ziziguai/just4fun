<?php /* Smarty version 2.6.28, created on 2014-11-24 09:31:01
         compiled from oms/order_payed_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'oms/order_payed_list.html', 27, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "oms/nav_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="logistics_dispose">
          <div class="TabSearch">
            <ul>
                <li><a href="?r=oms/order/ListWaitingForShip&type=UK" data="UK">UK仓库</a></li>
                <li><a href="?r=oms/order/ListWaitingForShip&type=US" data="US">US仓库</a></li>
                <li><a href="?r=oms/order/ListWaitingForShip&type=DE" data="DE">DE仓库</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="content">
            <table class="tableStyle">
                <thead><tr><th style='display:none'><input type="checkbox" id="all_checked"><label for="all_checked"></label></th><th>OrderID</th><th>店铺名称</th><th>买家ID</th><th>发往国家</th><th>下单时间</th><th>下单金额</th><th>包数</th><th>物流方式</th><th>处理</th><th>操作</th></tr></thead>
                <tbody>
                <?php if (( $this->_tpl_vars['ShowPayed'] == null )): ?>
				    <tr>
					   <td colspan="13" align="center">无数据</td> 
					</tr>
				<?php else: ?>
				<?php $_from = $this->_tpl_vars['ShowPayed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['a']):
?>
					<tr  data-id="<?php echo $this->_tpl_vars['a']['order_id']; ?>
" >
                        <td style='display:none'><input type="checkbox" data-id="<?php echo $this->_tpl_vars['a']['order_id']; ?>
"></td>
                        <td><?php echo $this->_tpl_vars['a']['OrderID']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['a']['shop_name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['a']['BuyerUserID']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['a']['country_name']; ?>
</td>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['CreatedTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
                        <td><?php echo $this->_tpl_vars['a']['AmountPaid']; ?>
<?php echo $this->_tpl_vars['a']['currency']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['a']['purchase_quantity']; ?>
</td>
                        <td class='delivery_way' service_code=<?php echo $this->_tpl_vars['a']['service_code']; ?>
><?php echo $this->_tpl_vars['a']['delivery_way']; ?>
</td>
                        <td><a class="notSend" href="javascript:;">不可发货</a></td>
						<td><a class="btn-payed-edit" href="javascript:;">编辑</a></td>
                    </tr>
				<?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <script>
            document.body.setAttribute("id", "order_payed_list_page");
        </script>
        <script type="text/javascript" src="public/template/js/oms/orderManage.js" ></script>
    </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "oms/nav_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>