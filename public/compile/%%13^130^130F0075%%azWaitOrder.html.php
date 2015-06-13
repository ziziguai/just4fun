<?php /* Smarty version 2.6.28, created on 2014-12-16 11:04:03
         compiled from ck1sh/azWaitOrder.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
</head>

<body>
<!--高级查询弹窗-->
<div class="searchTC TCGB">
  <div class="searchTCCon TCCON">
    <h2> <span>高级查询</span> <b class="searchTCClose">关闭</b> </h2>
    <div class="searchTCBody">
      <p> <span>关键字</span>
        <select name="" id="">
          <option value="">关键字类型</option>
          <option value="">国家</option>
          <option value="">卖家</option>
          <option value="">买家</option>
          <option value="">Paypal交易号</option>
          <option value="">SKU</option>
          <option value="">收货人</option>
          <option value="">收货方式</option>
        </select>
        <input type="text" name="" id="" />
      </p>
      <p> <span>数量</span>
        <select name="" id="">
          <option value="">等于</option>
          <option value="">大于</option>
          <option value="">小于</option>
        </select>
        <input type="text" name="" id="" />
      </p>
      <p> <span>重量</span>
        <select name="" id="">
          <option value="">等于</option>
          <option value="">大于</option>
          <option value="">小于</option>
        </select>
        <input type="text" name="" id="" />
      </p>
      <p> <span>申报价值</span>
        <select name="" id="">
          <option value="">等于</option>
          <option value="">大于</option>
          <option value="">小于</option>
        </select>
        <input type="text" name="" id="" />
      </p>
      <p> <span>买家选择的发货方式</span>
        <select name="" id="">
          <option value="">买家物流选择</option>
        </select>
      </p>
    </div>
    <div class="searchTCFooter">
      <input type="button" value="查询" class="btn btn-primary" />
      <input type="button" value="取消" class="btn searchTCCancel" />
    </div>
  </div>
</div>
<div class="wrap">
  <p class="topNav"><a href="#">首页</a>&gt;</p>
  <div class="tabHead">
    <ul>
      <li><a href="index.php?r=oms/SHOrder/AzAwaitOrder&s=waitShipped" class="tabActive">待发货订单</a> </li>
      <li><a href="?r=oms/shorder/shipped&platform=101">已发货订单</a> </li>
      <li><a href="?r=oms/shorder/discarded&platform=101">已删除</a> </li>
    </ul>
    <div class="clear"></div>
  </div>
  <div class="content">
    <div class="tabBody">
      <div class="tabBody1">
        <form method="GET" action="index.php?r=oms/SHOrder/AzAwaitOrder&s=waitShipped">
          <div class="tabBodyHead">
            <div class="search">
              <input name="r" type="hidden" value="oms/SHOrder/AzAwaitOrder">
              <input name="s" type="hidden" value="waitShipped">
              <select name="KeyType" title="关键字类型" >
                <option value="1"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 1): ?> selected<?php endif; ?>>亚马逊交易号</option>
                <option value="2"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 2): ?> selected<?php endif; ?>>国家</option>
                <option value="3"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 3): ?> selected<?php endif; ?>>买家</option>
                <option value="4"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 4): ?> selected<?php endif; ?>>买家邮箱</option>
                <option value="8"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 8): ?> selected<?php endif; ?>>卖家</option>
                <option value="5"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 5): ?> selected<?php endif; ?>>SKU</option>
                <option value="6"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 6): ?> selected<?php endif; ?>>收货人</option>
                <option value="9"<?php if ($this->_tpl_vars['data']['input']['KeyType'] == 9): ?> selected<?php endif; ?>>发货方式</option>
              </select>
              <input type="text" name="keyword" title="关键字" value="<?php echo $this->_tpl_vars['data']['input']['keyword']; ?>
" />
              <select name="ShipSelected" title="买家物流选择" >
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == ""): ?>selected <?php endif; ?>value="">买家物流选择</option>
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == 'Exp Cont US Street Addr'): ?>selected <?php endif; ?>value="Exp Cont US Street Addr">Exp Cont US Street Addr</option>
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == 'Standard'): ?>selected <?php endif; ?>value="Standard">Standard </option>
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == 'Std Cont US Street Addr'): ?>selected <?php endif; ?>value="Std Cont US Street Addr">Std Cont US Street Addr</option>
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == 'Std Europe'): ?>selected <?php endif; ?>value="Std Europe">Std Europe</option>
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == 'Std UK Dom'): ?>selected <?php endif; ?>value="Std UK Dom">Std UK Dom</option>
                <option <?php if ($this->_tpl_vars['data']['input']['ShipSelected'] == 'Std UK Europe 1'): ?>selected <?php endif; ?>value="Std UK Europe 1">Std UK Europe 1</option>
              </select>
              <select name="status" title="状态">
                <option value="0"<?php if ($this->_tpl_vars['data']['input']['status'] == 0): ?> selected<?php endif; ?>>状态</option>
                <option value="1"<?php if ($this->_tpl_vars['data']['input']['status'] == 1): ?> selected<?php endif; ?>>未选服务</option>
                <option value="2"<?php if ($this->_tpl_vars['data']['input']['status'] == 2): ?> selected<?php endif; ?>>已选服务</option>
              </select>
              <select name="shippingType" title="发货方式" >
                <option value="" <?php if ($this->_tpl_vars['data']['input']['shippingType'] == ''): ?> selected<?php endif; ?>>发货方式</option>
                <option value="1"<?php if ($this->_tpl_vars['data']['input']['shippingType'] == '1'): ?> selected<?php endif; ?>>中国直发</option>
                <option value="2"<?php if ($this->_tpl_vars['data']['input']['shippingType'] == '2'): ?> selected<?php endif; ?>>海外仓储</option>
              </select>
              <input type="submit" value="查询" class="btn btn-primary" style="margin-left:20px;" />
            </div>
            <div><img src="images/0_174bef.png" width="893" height="41"></div>
            <div class="sel">
              <div class="selLeft">
                <label>
                  <input name="listtype" type="radio" value="0"<?php if ($this->_tpl_vars['data']['input']['listtype'] < 1): ?> checked<?php endif; ?>>
                  <span>显示全部 </span> </label>
                <label>
                  <input name="listtype" type="radio" value="1"<?php if ($this->_tpl_vars['data']['input']['listtype'] == 1): ?> checked<?php endif; ?>>
                  <span>显示最新上传 </span> </label>
                <label>
                  <input name="listtype" type="radio" value="2"<?php if ($this->_tpl_vars['data']['input']['listtype'] == 2): ?> checked<?php endif; ?>>
                  <span>显示有错误 </span> </label>
                <label>
                  <input name="listtype" type="radio" value="3"<?php if ($this->_tpl_vars['data']['input']['listtype'] == 3): ?> checked<?php endif; ?>>
                  <span>显示申报价值过高</span> </label>
              </div>
              <div class="selRight"> 
                <!--<a href="#"></a>
<input type="button" value="下载订单" />
<select name="" id="">
<option value="">选择发货方式</option>
<option value="">中国直发</option>
<option value="">海外仓库</option>
<option value="">取消服务</option>
</select>
<input type="button" value="确认发货" />
<input type="button" value="导出订单" />-->
                
                <label><a style="padding:4px 10px;" href="http://docs.chukou1.cn/index.php?title=%E4%BA%9A%E9%A9%AC%E9%80%8A%E8%AE%A2%E5%8D%95" target="_blank">亚马逊订单帮助</a>&nbsp;&nbsp;</label>
                <div class="btn-group" id="selectType2Tips" data-toggle="popover" data-placement="top" data-content="请在此选择发货方式" title="选择发货方式"> <a class="btn">选择发货方式</a>
                  <button class="btn dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="text-align: left;">
                    <li><a href="javascript:;" class="J_SelectType2" data-value="1">中国直发</a></li>
                    <li><a href="javascript:;" class="J_SelectType2" data-value="2">海外仓储</a></li>
                    <li><a href="javascript:;" class="J_SelectType2" data-value="3">亚马逊英国专线</a></li>
                    <li><a href="javascript:;" class="J_SelectType2" data-value="0">取消服务</a></li>
                  </ul>
                </div>
                <input id="createOrder" type="button" value="确认发货" class="btn btn-primary J_SelectedCheck">
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </form>
        <div class="tabBodyCon">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th> <input type="checkbox" id="checkall" />
                </th>
                <th>亚马逊交易号</th>
                <th>付款时间</th>
                <th>seller</th>
                <th>buyer</th>
                <th>buyer email</th>
                <th>SKU</th>
                <th>国家</th>
                <th>买家物流选择</th>
                <th>发货方式</th>
                <th>挂号</th>
                <th>数量</th>
                <th>重量(g)</th>
                <th>申报价值(s)</th>
                <th>申报名称</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <?php $_from = $this->_tpl_vars['data']['list']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?> -->
              <tr>
                <td><input name="id[]" class="ids" type="checkbox" tid="<?php echo $this->_tpl_vars['i']['order_id']; ?>
" /></td>
                <td><?php echo $this->_tpl_vars['i']['AmazonOrderId']; ?>
</td>
                <th>/</th>
                <td><?php echo $this->_tpl_vars['i']['account_id']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['BuyerName']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['BuyerEmail']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['SellerSKU']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['CountryCode']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['ShipServiceLevel']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['ShipSelected']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['tracking_sn']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['QuantityOrdered']; ?>
</td>
                <?php if (( $this->_tpl_vars['a']['weight'] == null )): ?>
                <td style="color:red">0</td>
                <?php else: ?>
                <td><?php echo $this->_tpl_vars['i']['weight']; ?>
</td>
                <?php endif; ?>
                <?php if (( $this->_tpl_vars['a']['declare_price'] == '' )): ?>
                <td style="color:red">0</td>
                <?php else: ?>
                <td><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
                <?php endif; ?>
                <?php if (( $this->_tpl_vars['a']['declare_name'] == '' )): ?>
                <td style="color:red">0</td>
                <?php else: ?>
                <td><?php echo $this->_tpl_vars['i']['declare_name']; ?>
</td>
                <?php endif; ?>
                <td class="editList"><a href="javascript:;" class="edit_btn" tid="<?php echo $this->_tpl_vars['i']['order_id']; ?>
">编辑</a></td>
              </tr>
              <!-- <?php endforeach; endif; unset($_from); ?> -->
            </tbody>
          </table>
          <!--页数-->
          <div class="pagination pagination-right" style="position:relative;">
            <div class="group" style=" position:absolute; top:8px; left:60px;">
              <input type="button" class="btn" id="btnDeleteOrders" value="删除">
            </div>
            <?php echo $this->_tpl_vars['data']['list']['pageinfo']['html']; ?>
 </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script> 
<!--<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>--> 
<script type="text/javascript" src="public/template/ck1sh/js/az.js"></script> 
<script>$('body').attr('id', 'waitOrder');</script>
</body>
</html>