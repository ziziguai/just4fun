<?php /* Smarty version 2.6.28, created on 2014-12-12 13:24:27
         compiled from ck1sh/azDeleted.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
</head>

<body>
<!--顶部警告框-->
<div class="topWarn"></div>
<div class="wrap">
  <p class="topNav"><a href="#">首页</a>></p>
  <div class="tabHead">
    <ul>
      <li><a href="?r=oms/SHOrder/AzAwaitOrder&s=waitShipped">待发货订单</a> </li>
      <li><a href="?r=oms/SHOrder/AzAwaitOrder&s=Shipped">已发货订单</a> </li>
      <li><a href="?r=oms/SHOrder/AzAwaitOrder&s=Deleted" class="tabActive">已删除</a> </li>
    </ul>
    <div class="clear"></div>
  </div>
  <div class="content">
    <div class="tabBody">
      <div class="tabBody1">
        <div class="tabBodyHead">
          <div class="search">
            <form action="index.php" method="get">
              <input name="r" type="hidden" value="oms/SHOrder/AzAwaitOrder">
              <input name="s" type="hidden" value="Deleted">
              <p>
                <select name="DateType" title="日期类型" style="width:120px;">
                  <option value="1">购买时间</option>
                  <option value="2">同步时间</option>
                  <option value="3">删除时间</option>
                </select>
                <input name="fromDate" type="text" value="<?php echo $this->_tpl_vars['data']['input']['fromDate']; ?>
" />
                -
                <input name="toDate" type="text" value="<?php echo $this->_tpl_vars['data']['input']['toDate']; ?>
" />
                <span>分类：</span>
                <select name="DelType" title="删除类别" style="width:120px;">
                  <option <?php if ($this->_tpl_vars['data']['input']['DelType'] == 0): ?>selected <?php endif; ?>value="0">全部</option>
                  <option <?php if ($this->_tpl_vars['data']['input']['DelType'] == 1): ?>selected <?php endif; ?>value="1">已取消</option>
                  <option <?php if ($this->_tpl_vars['data']['input']['DelType'] == 2): ?>selected <?php endif; ?>value="2">其他</option>
                </select>
              </p>
              <select name="KeyType" title="关键字类型" style="width:120px;">
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 1): ?>selected <?php endif; ?>value="1">亚马逊交易号</option>
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 2): ?>selected <?php endif; ?>value="2">国家</option>
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 3): ?>selected <?php endif; ?>value="3">买家</option>
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 4): ?>selected <?php endif; ?>value="4">买家邮箱</option>
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 8): ?>selected <?php endif; ?>value="8">卖家</option>
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 5): ?>selected <?php endif; ?>value="5">SKU</option>
                <option <?php if ($this->_tpl_vars['data']['input']['KeyType'] == 6): ?>selected <?php endif; ?>value="6">收货人</option>
              </select>
              <input name="keyword" type="text" value="<?php echo $this->_tpl_vars['data']['input']['keyword']; ?>
" />
              <input type="submit" value="搜索" class="btn btn-primary" />
            </form>
          </div>
          <div class="sel">
            <div class="selRight">
              <input id="ExportDeleteOrders" type="button" value="导出订单" class="btn btn-warning">
              <input id="btnActive" type="button" value="还原" class="btn btn-warning">
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="tabBodyCon">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th> <input type="checkbox" id="checkall" />
                </th>
                <th>亚马逊订单号</th>
                <th>删除时间</th>
                <th>seller</th>
                <th>buyer</th>
                <th>buyer email</th>
                <th>国家</th>
                <th>买家物流选择</th>
                <th>发货方式</th>
                <th>SKU</th>
                <th>数量</th>
                <th>重量</th>
                <th>申报价值</th>
                <th>申报名称</th>
              </tr>
            </thead>
            <tbody>
              <!-- <?php $_from = $this->_tpl_vars['data']['list']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?> -->
              <tr>
                <td><input name="id[]" type="checkbox" class="ids" tid="<?php echo $this->_tpl_vars['i']['order_id']; ?>
" /></td>
                <td><?php echo $this->_tpl_vars['i']['AmazonOrderId']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['delete_time']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['account_id']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['BuyerName']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['BuyerEmail']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['CountryCode']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['ShipServiceLevel']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['ShipSelected']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['SellerSKU']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['QuantityOrdered']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['weight']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
                <td><?php echo $this->_tpl_vars['i']['declare_name']; ?>
</td>
              </tr>
              <!-- <?php endforeach; endif; unset($_from); ?> -->
            </tbody>
          </table>
          <!--页数-->
          <div class="pagination pagination-right">
            <!--<div class="group">
              <input type="button" class="btn" id="btnActive" value="还原">
            </div>-->
            <?php echo $this->_tpl_vars['data']['list']['pageinfo']['html']; ?>
 </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script> 
<script>
$('body').attr('id','ebDeleted');
</script> 
<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script> 
<script type="text/javascript" src="public/template/ck1sh/js/az.js"></script>
</body>
</html>