<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:09
         compiled from ck1sh/order/discarded.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>已撤销订单</title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-extension.css?_201504021350" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css?_20150114" />
	</head>
	<body>
		<input name="" type="hidden" id="platform" value="<?php echo $this->_tpl_vars['platform']; ?>
" />
		<!--导出订单弹窗 start-->
		<div id="exportOrdrer" class="exportOrderTC TCGB TC600"  data-id="" export-type="">
		  <div class="exportOrderTCCon TCCON">
		    <h2><span>导出订单信息</span><b class="closeBtn">关闭</b></h2>
		    <div class="dowAddTagTCConBody TCBody">
			    <p><a herf="#">自定义导出表格列»</a></p>
			    <p><form>
			        <label style="margin-right:20px;">
				        <input id="explodeDelOrder" type="radio" name="pageType" value="classic_a4" checked>导出所有已删除订单</label>
			        <label><input type="radio" id="explodeChooseOrder" name="pageType" alue="classic_label">下载所选订单</label>
					<p>注意：导出已删除订单，一次只能导出4000条。如若超出请分次导出</p>
		        </form></p>
		    </div>
		    <div class='TCFooter'>
			    <span class="tagBtn"><a id="downOrder" class='btn btn-primary'>下载</a></span>
		        <a class='closeBtn btn'>取消</a>
		    </div>
		  </div>
		</div>
		<div class="wrap">
			<ul class="breadcrumb" style="background-color: transparent;">
                <li><a href="http://demo.chukou1.cn/Client/Home/Home.aspx">首页</a>&nbsp;<span class="divider">/</span></li>
                <li><a href="?r=oms/home">Selling Helper</a>&nbsp;<span class="divider">/</span></li>
                <li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
"><?php echo $this->_tpl_vars['platformName']; ?>
</a>&nbsp;<span class="divider">/</span></li>
                <li class="active">已撤销订单</li>
            </ul>
			<div class="tabHead">
				<ul>
				  <li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
">待发货订单</a></li>
				  <li><a href="?r=oms/shorder/shipped&platform=<?php echo $this->_tpl_vars['platform']; ?>
">已发货订单</a></li>
				  <li><a href="?r=oms/shorder/discarded&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="tabActive">已撤销订单</a></li>
				</ul>
				<div class="tabHeadRight">
					<?php if ($this->_tpl_vars['isAutoDownOrder']): ?>
				        <a class="btn btn-primary" id="syncOrderBtn" title="同步订单" href="javascript:;">同步订单</a>
			        <?php else: ?>
			    		<a href="?r=oms/shorder/uploadorder&platform=<?php echo $this->_tpl_vars['platform']; ?>
&type=upload" class="btn btn-primary">上传订单</a>
				    <?php endif; ?>
					<a href='?r=oms/shaccount/manage&platform=<?php echo $this->_tpl_vars['platform']; ?>
' class='btn'>账号管理</a>
					<a href='?r=oms/shorder/setting&platform=<?php echo $this->_tpl_vars['platform']; ?>
' class='btn'>设置</a>
					<a href='?r=oms/shorder/help&platform=<?php echo $this->_tpl_vars['platform']; ?>
' class='btn' target="_blank">帮助</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBodyHead">
						<div class="search" id="normalSearchBar">
							<div class="pull-left">
						    	<span>撤销时间：</span>
						        <input class="span1-6 time-selector" type="text" placeholder="起始时间" data-postkey="from_time" />
                                &ndash;
						        <input class="span1-6 time-selector" type="text" placeholder="截止时间" data-postkey="to_time" />
							</div>
							<form class="search-form pull-left" name="normalSearchForm"  action="javascript:;">
								<div class="input-append">
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
									    	<li class="<?php if (($this->_foreach['fun']['iteration'] <= 1)): ?>active<?php else: ?><?php endif; ?>">
									          	<a data-iname="normalSearchKey" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a>
									      	</li>
										    <?php endforeach; endif; unset($_from); ?>
									    </ul>
									</div>
									<!-- 搜索关键词, 默认选中第一个 -->
									<?php $_from = $this->_tpl_vars['normalSearchSet']['normalSearchKeyOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fun'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fun']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
        $this->_foreach['fun']['iteration']++;
?>
									<?php if (($this->_foreach['fun']['iteration'] <= 1)): ?>
									<input data-postkey="keyword" name="normalSearchKey" value="<?php echo $this->_tpl_vars['value']; ?>
" type="hidden" />
									<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
									<input data-postkey="keyword_value" type="text" class="search-query" value="" />
									<a name="normalSearchButton" data-filter="<?php echo $this->_tpl_vars['normalSearchSet']['filter']; ?>
" class="btn btn-primary"> 查 询 </a>
								</div>
							</form>
						</div>
						<div class="sel">
							<div class="selRight">
								<input type="button" id="exportOrder" value="导出订单" class="btn btn-warning">
								<input type="button" value="还原" id='restorebtns' class="btn btn-warning">
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="tabBodyCon">
						<table class="table table-striped table-condensed table-hover oms-order-table">
							<thead id="orderDisplayTableTitle">
								<tr>
								  <th ><input type="checkbox" /></th>
								  <th >订单号</th>
								  <th >丢弃时间</th>
								  <th >丢弃原因</th>
								  <th >店 铺 名</th>
								  <th >买家Email</th>
								  <th >国家</th>
								  <th >买家选择物流</th>
								  <th >数量</th>
								  <th >重量(g)</th>
								  <th >申报价值</th>
								  <th >申报名称</th>
								  <th >备注信息</th>
								</tr>
							</thead>
							<tbody id="orderDisplayTableList">
								<tr><td colspan='13' align='center'>&hellip;</td></tr>
							</tbody>
						</table>
						<!-- 分页目录条 -->
						<div class='pagination pagination-small pagination-right' id="paginationNavBar"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- sync order modal import start-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/order/sync_order.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<!-- sync order modal import end-->
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/bootstrap-datetimepicker.zh-CN.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js?_20150114"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/oms.js?_20150302"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/discarded.js?_20150302"></script>
	</body>
</html>