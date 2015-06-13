<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:09
         compiled from ck1sh/order/shipped.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>已发货订单</title>
        <link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-extension.css?_201504021350" />
        <link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css?_20150114" />
        </head>
    <body>
        <input id="platform" value="<?php echo $this->_tpl_vars['platform']; ?>
" style="display: none;" />
        <!--下载地址标签弹窗 start-->
        <div id="downAdd" class="resetBootstrapHint modal hide fade" aria-hidden="true" data-backdrop="true">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">下载地址标签</h3>
            </div>
                <div class="modal-body">
                    <p>提示：下载地址标签只适用于中国直发的订单，可选择发货方式为中国直发进行查询</p>
                    <p>只有已提审的订单可以打印地址标签</p>
                    <p><span>纸张：</span>
                        <form>
                            <label style="margin-right:20px;"><input type="radio" name="pageType" value="classic_a4" checked>A4</label>
                            <label><input type="radio" name="pageType" value="classic_label">标签纸</label>
                        </form>
                    </p>
                    <p class="express-count">已选择<b></b>个中国直发订单，其中<b></b>个订单已提审.</p>
                    <img class="img-loading" src="public/template/ck1sh/img/loading.gif">
                </div>
                <div class='modal-footer'> 
                    <span class="tagBtn"> 
                        <a id="addressLabels" class='btn btn-primary'>地址标签</a> 
                        <a id="customsLabels" class='btn btn-primary'>报关单+地址标签</a>
                        <a id="customsLabel" class='btn btn-primary'>报关单+地址标签(拆分)</a> 
                     </span> 
                    <b style="display:none;">你选择了多种直发服务，不支持同时打印不同类型的直发订单标签</b> 
                    <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                </div>
        </div>
        <!--下载地址标签弹窗 end-->
        <!--下载检货清单 start-->
        <div id="PickGoods" class="resetBootstrapHint modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4> <span>下载捡货清单</span> </h4>
            </div>
                <div class="modal-body">
                    <p>提示：下载捡货清单只适用于中国直发的订单，可选择发货方式为中国直发进行查询</p>
                    </br>
                    <p>
                        <span>捡货清单类型：</span>
                        <label style="margin-right:20px;"><input type="radio" name="pickType" value="1" checked="checked"/>按订单捡货</label>
                        <label style="margin-right:20px;"><input type="radio" name="pickType" value="2"/>按SKU捡货</label>
                        <label><input type="radio" name="pickType" value="3"/>按SKU捡货(excel格式)</label>
                    </p>
                    <p class="express-count">已选择<b></b>个中国直发订单，其中<b></b>个订单已提审.</p>
                    </br>
                    <p><label><input type="checkbox" name="" disabled="true" checked/>只打印已提审订单</label></p>
                </div>
                <div class='modal-footer'> 
                    <a id="pick" class='btn btn-primary'>确认</a> 
                    <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button> 
                </div>
            </div>
        <!--下载检货清单 end-->
        <!--下载挂号 start-->
        <div id="tracking" class="resetBootstrapHint modal hide fade">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4> <span>下载挂号</span> </h4>
            </div>
            <div class="modal-body" ids=''>
                 <p><label  id="tranNumber"><input type="radio" downtype=4 name="registeredType" />下载最新挂号(<b>0</b>条)</label></p>
                 <p><label  id="chooseTran"><input type="radio" downtype=5 name="registeredType" checked="checked"/>下载所选挂号</label></p>
                 <p><label  id="dealNumber"><input type="radio" downtype=6 name="registeredType" />下载最新出口处理号(<b>0</b>条)</label></p>
                 <p><label  id="chooseDeal"><input type="radio" downtype=7 name="registeredType" />下载所选处理号</label></p>
            </div>
            <div class='modal-footer'> 
                 <a class='btn btn-primary'>下载</a> 
                 <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>  
            </div>
        </div>
        <!--下载挂号 end-->
        <div class="wrap">
            <ul class="breadcrumb" style="background-color: transparent;">
                <li><a href="http://demo.chukou1.cn/Client/Home/Home.aspx">首页</a>&nbsp;<span class="divider">/</span></li>
                <li><a href="?r=oms/home">Selling Helper</a>&nbsp;<span class="divider">/</span></li>
                <li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
"><?php echo $this->_tpl_vars['platformName']; ?>
</a>&nbsp;<span class="divider">/</span></li>
                <li class="active">已发货订单</li>
            </ul>
            <div class="tabHead">
                <ul>
                  <li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
">待发货订单</a></li>
                  <li><a href="?r=oms/shorder/shipped&platform=<?php echo $this->_tpl_vars['platform']; ?>
" class="tabActive">已发货订单</a></li>
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
                        <div class="search"  id="normalSearchBar">
                            <!-- 下单时间选项框 start-->
                            <div class="pull-left">
                                <span>下单时间：</span>
                                <input class="span1-6 time-selector" type="text" placeholder="起始时间" data-postkey="from_time" />
                                &ndash;
                                <input class="span1-6 time-selector" type="text" placeholder="截止时间" data-postkey="to_time" />
                            </div>
                            <!-- 下单时间选项框 end-->
                            <!-- 确认发货标记状态框 start-->
                            <div class="btn-group pull-left" style="margin-left: 6px;">
                                <a class="btn span1" name="displayName" data-toggle="dropdown">发货确认</a>
                                <a class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="active">
                                        <a data-iname="shippingMarkOption" href="javascript:;" data-value="">发货确认</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['normalSearchSet']['shippingMarkOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
                                    <li>
                                        <a data-iname="shippingMarkOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ul>
                            </div>
                            <!-- 确认发货标记状态框 end-->
                            <!-- 挂号上传状态框 start-->
                            <div class="btn-group pull-left">
                                <a class="btn span1" name="displayName" data-toggle="dropdown">挂号状态</a>
                                <a class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="active">
                                        <a data-iname="trackingUploadOption" href="javascript:;" data-value="">挂号状态</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['normalSearchSet']['trackingUploadOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
                                    <li>
                                        <a data-iname="trackingUploadOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ul>
                            </div>
                            <!-- 挂号上传状态框 end-->
                            <!-- 发货服务选项框 start-->
                            <div class="btn-group pull-left">
                                <a class="btn span1" name="displayName" data-toggle="dropdown">发货服务</a>
                                <a class="btn dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="active">
                                        <a data-iname="shipServiceOption" href="javascript:;" data-value="">发货服务</a>
                                    </li>
                                    <?php $_from = $this->_tpl_vars['normalSearchSet']['shipServiceOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
                                    <li><a data-iname="shipServiceOption" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ul>
                            </div>
                            <!-- 发货服务选项框 end-->
                            <form class="search-form pull-left" name="normalSearchForm" action="javascript:;">
                                <div class="input-append" style='margin:0;'>
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
                                            <li class="<?php if (($this->_foreach['fun']['iteration'] <= 1)): ?>active<?php else: ?><?php endif; ?>">
                                                <a data-iname="normalSearchKey" href="javascript:;" data-value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a></li>
                                            <?php endforeach; endif; unset($_from); ?>
                                        </ul>
                                    </div>
                                    <!-- 普通查询关键词 end -->
                                    <input data-postkey="shipping_mark" name="shippingMarkOption" type="hidden" value="">
                                    <input data-postkey="tracking_upload" name="trackingUploadOption" type="hidden" value="">
                                    <input data-postkey="seller_selected" name="shipServiceOption" type="hidden" value="">
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
                                    <input data-postkey="keyword_value" type="text" class="search-query" value="">
                                    <a name="normalSearchButton" data-filter="<?php echo $this->_tpl_vars['normalSearchSet']['filter']; ?>
" class="btn btn-primary"> 查 询 </a>
                                </div>
                            </form>
                            <div class="clear"></div>
                        </div>
                        <div class="sel">
                            <div class="selRight">
                                <input type="button" value="下载地址标签" id="addressLabel" class="btn btn-warning" data-toggle="modal">
                                <input type="button" value="下载捡货清单" id="pickOrder" class="btn btn-warning">
                                <input type="button" value="下载挂号" id="downTracking" class="btn btn-warning">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tabBodyCon">
                        <table class="table table-striped table-condensed table-hover oms-order-table">
                            <thead id="orderDisplayTableTitle">
                                <tr>
                                    <th ><input type="checkbox" /></th>
                                    <th >订 单 号</th>
                                    <th >发货时间</th>
                                    <th >店 铺 名</th>
                                    <th >买家Email</th>
                                    <th >国 家</th>
                                    <th >发货物流商</th>
                                    <th >发货物流服务</th>
                                    <th >承运商处理号</th>
                                    <th >挂 号</th>
                                    <th >数 量</th>
                                    <th >重 量(g)</th>
                                    <th >申报价值</th>
                                    <th >申报名称</th>
                                    <th >发货状态</th>
                                    <th >挂号状态</th>
                                </tr>
                            </thead>
                            <tbody id="orderDisplayTableList">
                                <tr><td colspan='16' align='center'>&hellip;</td></tr>
                            </tbody>
                        </table>
                        <!-- 分页目录条 -->
                        <div class='pagination pagination-small pagination-right' id="paginationNavBar"> </div>
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
        <script type="text/javascript" src="public/template/ck1sh/js/shipped.js?_20150302"></script>
    </body>
</html>