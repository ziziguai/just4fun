<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:07
         compiled from ck1sh/order/normal.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>待发货订单</title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-extension.css?_201504021350" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css?_20150116" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-datetimepicker.min.css" />
	</head>
	<body>
		<div class="loading"></div>
		<input id="platform" value="<?php echo $this->_tpl_vars['platform']; ?>
" style="display: none;" />
		<!-- 导出订单弹窗 start-->
		<div id="exportOrdrer" class="exportOrderTC TCGB TC600">
			<div class="exportOrderTCCon TCCON">
				<h2>
					<span>导出订单信息</span>
					<b class="closeBtn">关闭</b>
				</h2>
				<div class="dowAddTagTCConBody TCBody">
				<p><a herf="#">自定义导出表格列»</a></p>
					<p>
						<form>
						<label id="labelAllOrder" style="margin-right:20px;"><input id="explodeDelOrder" type="radio" name="pageType" value="classic_a4" checked><span>下载未导出订单 </span></label>
						<label><input type="radio" id="explodeChooseOrder" name="pageType" value="classic_label">下载所选订单</label>
						<br/><br/>
						<p>注意：导出未导出订单时，一次只能导出4000条。如若超出请分次导出</p>
						</form>
					</p>
				</div>
				<div class="TCFooter">
				<span class="tagBtn">
					<a id="downExportOrder" class="btn btn-primary">下载</a>
				</span>
						<a class="closeBtn btn">取消</a>
				</div>
			</div>
		</div>
		<!-- 导出订单弹窗 end-->
		<div class="wrap">
		    <ul class="breadcrumb" style="background-color: transparent;">
			    <li><a href="http://demo.chukou1.cn/Client/Home/Home.aspx">首页</a>&nbsp;<span class="divider">/</span></li>
			    <li><a href="?r=oms/home">Selling Helper</a>&nbsp;<span class="divider">/</span></li>
			    <li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
"><?php echo $this->_tpl_vars['platformName']; ?>
</a>&nbsp;<span class="divider">/</span></li>
			    <li class="active">待发货订单</li>
		    </ul>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="tabActive">待发货订单</a></li>
					<li><a href="?r=oms/shorder/shipped&platform=<?php echo $this->_tpl_vars['platform']; ?>
">已发货订单</a></li>
					<li><a href="?r=oms/shorder/discarded&platform=<?php echo $this->_tpl_vars['platform']; ?>
">已撤销订单</a></li>
				</ul>
				<div class="tabHeadRight">
				    <?php if ($this->_tpl_vars['isAutoDownOrder']): ?>
				        <a class="btn btn-primary" id="syncOrderBtn" title="同步订单" href="javascript:;">同步订单</a>
			        <?php else: ?>
			    		<a href="?r=oms/shorder/uploadorder&platform=<?php echo $this->_tpl_vars['platform']; ?>
&type=upload" class="btn btn-primary">上传订单</a>
				    <?php endif; ?>
					<a href="?r=oms/shaccount/manage&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="btn">账号管理</a>
					<a href="?r=oms/shorder/setting&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="btn">设置</a>
					<a href="?r=oms/shorder/help&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="btn" target="_blank">帮助</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBodyHead">
						<!-- 普通搜索框组件 -->
						<div class="search" id="normalSearchBar">
							<!-- 发货服务选项框 start-->
							<div class="btn-group pull-left">
								<a class="btn span1" name="displayName" data-toggle="dropdown">发货服务</a>
								<a class="btn dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="active">
										<a data-iname="shipServiceOption" href="javascript:;" data-value="">发货服务</a></li>
									<?php $_from = $this->_tpl_vars['normalSearchSet']['shipServiceOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
									<li>
										<a data-iname="shipServiceOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
							</div>
							<!-- 发货服务选项框 end-->
							<?php if ($this->_tpl_vars['normalSearchSet']['buyerSelectedOptions']): ?>
							<!-- 买家选择物流 start-->
							<div class="btn-group pull-left">
								<a class="btn span2" name="displayName" data-toggle="dropdown" style="overflow:hidden;">买家选择物流</a>
								<a class="btn dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
                                    <li class="active">
                                    	<a data-iname="buyerSelectedOption" href="javascript:;" data-value="">买家选择物流</a></li>
                                    <?php $_from = $this->_tpl_vars['normalSearchSet']['buyerSelectedOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
									<li>
										<a data-iname="buyerSelectedOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
							</div>
							<!-- 买家选择物流 end-->
							<?php endif; ?>
							<form class="search-form pull-left" name="normalSearchForm" action="javascript:;">
								<div class="input-append">
									<!-- 普通查询关键词 start -->
									<div class="btn-group">
										<a class="btn span1-2 dropdown-toggle" data-toggle="dropdown">
											<!-- 取第一个 -->
											<?php $_from = $this->_tpl_vars['normalSearchSet']['normalSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fun'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fun']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['fun']['iteration']++;
?>
												<?php if (($this->_foreach['fun']['iteration'] <= 1)): ?>
												<span class="pull-left" name="displayName"><?php echo $this->_tpl_vars['name']; ?>
</span>
												<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
											<span class="caret pull-right"></span>
										</a>
										<ul class="dropdown-menu">
											<?php $_from = $this->_tpl_vars['normalSearchSet']['normalSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fun'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fun']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['fun']['iteration']++;
?>
											<li class="<?php if (($this->_foreach['fun']['iteration'] <= 1)): ?>active<?php endif; ?>">
												<a data-iname="normalSearchKey" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
											<?php endforeach; endif; unset($_from); ?>
										</ul>
									</div>
									<!-- 普通查询关键词 end -->
									<!-- 发货服务选中值，默认未选值为空 -->
									<input data-postkey="seller_selected" name="shipServiceOption" type="hidden" value="">
									<!-- 买家选择物流服务选中值，默认未选值为空 -->
									<input data-postkey="buyer_selected" name="buyerSelectedOption" type="hidden" value="">
									<!-- 查询关键词, 默认选中第一个 -->
									<?php $_from = $this->_tpl_vars['normalSearchSet']['normalSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['keyword'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['keyword']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['keyword']['iteration']++;
?>
										<?php if (($this->_foreach['keyword']['iteration'] <= 1)): ?>
										<input data-postkey="keyword" name="normalSearchKey" value="<?php echo $this->_tpl_vars['value']; ?>
" type="hidden" />
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
									<input data-postkey="keyword_value" type="text" value="" placeholder="查询关键字(选填)"/>
									<a href="javascript:;" name="normalSearchButton" data-filter="<?php echo $this->_tpl_vars['normalSearchSet']['filter']; ?>
" class="btn btn-primary"> 查 询 </a>
								</div>
							</form>
						</div>
						<!-- 高级搜索按钮 -->
						<div class="search">
							<a id="advancedSearchBtn" href="javascript:;" class="btn" style="margin-left:15px;">高级查询</a>
						</div>
						<div class="clear"></div>
						<!-- 单条件搜索按钮组 -->
						<div class="sel">
							<div class="pull-left" id="singleFilterOptionsForm">
								<ul class="nav nav-pills">
									<?php $_from = $this->_tpl_vars['singleFilterSet']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cond'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cond']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cond'] => $this->_tpl_vars['option']):
        $this->_foreach['cond']['iteration']++;
?>
									<li class="<?php if (($this->_foreach['cond']['iteration'] <= 1)): ?>active<?php endif; ?>"><!-- 默认选择显示全部订单 -->
										<a href="javascript:;" data-filter="<?php echo $this->_tpl_vars['singleFilterSet']['filter']; ?>
" data-cond="<?php echo $this->_tpl_vars['cond']; ?>
"
											name="singleSearchBtn"><?php echo $this->_tpl_vars['option']; ?>
</a></li>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
							</div>
							<div class="pull-right">
								<div class="btn-group" name="shippingTypeOptions" title="选择发货方式">
									<a class="btn span1-2 btn-warning" data-toggle="dropdown">选择发货服务</a>
									<a class="btn dropdown-toggle btn-warning" data-toggle="dropdown">
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="text-align: left;">
										<?php $_from = $this->_tpl_vars['shippingTypeOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['serviceType'] => $this->_tpl_vars['serviceName']):
?>
										<li><a href="javascript:;" name="shippingTypeButton" data-service="<?php echo $this->_tpl_vars['serviceType']; ?>
"><?php echo $this->_tpl_vars['serviceName']; ?>
</a></li>
										<?php endforeach; endif; unset($_from); ?>
									</ul>
								</div>
								<a name="normalOrderShipping" class="btn btn-warning" title="确认发货">确认发货</a>
								<a id="normalOrderExport" class="btn btn-warning" title="导出订单">导出订单</a>
								<div class="btn-group" title="撤销订单">
									<a class="btn btn-warning" data-toggle="dropdown">撤销订单</a>
									<a class="btn dropdown-toggle btn-warning" data-toggle="dropdown">
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="text-align: left; min-width: 120px;">
										<?php $_from = $this->_tpl_vars['orderDiscardOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
										<li><a href="javascript:;" name="normalOrderDiscard" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
										<?php endforeach; endif; unset($_from); ?>
										<li><a href="javascript:;">其他</a></li>
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="tabBodyCon">
						<table class="table table-striped table-condensed table-hover oms-order-table">
							<thead id="orderDisplayTableTitle">
								<tr>
									<th class="span0-2"><input type="checkbox" /></th>
									<th class="">订 单 号</th>
									<th class="">付款时间</th>
									<th class="">店 铺 名</th>
									<th class="">买家Email</th>
									<th class="">国 家</th>
									<th class="">买家选择物流</th>
									<th class="">发货物流服务</th>
									<th class="">挂 号</th>
									<th class="">数 量</th>
									<th class="">重 量(g)</th>
									<th class="">申报价值</th>
									<th class="">申报名称</th>
									<th class="">操 作</th>
								</tr>
							</thead>
							<tbody id="orderDisplayTableList">
								<tr><td colspan="14" align="center">&hellip;</td></tr>
							</tbody>
						</table>
						<!-- 分页目录条 -->
						<div class="pagination pagination-small pagination-right" id="paginationNavBar">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- advance search modal import start-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/order/advance_search.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<!-- advance search modal import end-->
		<!-- sync order modal import start-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/order/sync_order.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<!-- sync order modal import end-->
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
        <!-- 编辑（弹窗）【未整合，暂时hard code】 start-->
        <?php if ($this->_tpl_vars['platform'] == 100): ?>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/order/edit.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php elseif ($this->_tpl_vars['platform'] == 101): ?>
        	<script type="text/javascript" src="public/template/ck1sh/js/az2.js?_20150114"></script>
        <?php elseif ($this->_tpl_vars['platform'] == 102): ?>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/order/ali_edit.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php elseif ($this->_tpl_vars['platform'] == 104): ?>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/order/wish_edit.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
        <!-- 编辑（弹窗）end-->
        <script type="text/javascript" src="public/template/ck1sh/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/template/ck1sh/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="public/template/ck1sh/js/bootstrap-datetimepicker.zh-CN.js"></script>
        <script type="text/javascript" src="public/template/ck1sh/js/index.js?_20150313"></script>
        <script type="text/javascript" src="public/template/ck1sh/js/oms.js?_20150302"></script>
        <script type="text/javascript" src="public/template/ck1sh/js/normal.js?_20150311"></script>
        <script type="text/javascript" src="public/template/ck1sh/js/order_shipping.js?_20150114"></script>
	</body>
</html>