<?php /* Smarty version 2.6.28, created on 2015-02-17 06:23:15
         compiled from ck1sh/order/azEdit.html */ ?>
<div class="editTC TCGB" id2="edit_box"> 
  <!--编辑（弹窗）-->
  <div class="editCon TCCON">
    <div class="editHead"> <span class="sc">[订单号：<?php echo $this->_tpl_vars['data']['h']['AmazonOrderId']; ?>
]</span> <a class="close btn btn-primary" name="closeEdit">关闭</a>
      <div class="clear"></div>
    </div>
    <div class="editBody"> 
      <!--包裹产品--start-->
      <div class="box1 editbox">
        <h3>包裹产品</h3>
        <form action="" method="get">
          <table id="tbItem" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ItemID</th>
                <th>ItemTitle</th>
                <th>SKU</th>
                <th>单个重量(g)</th>
                <th>数量</th>
                <th>申报名称</th>
                <th>单个申报价值($)</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <?php $_from = $this->_tpl_vars['data']['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?> -->
              <tr class="d editTableCon" az_order_item_id="<?php echo $this->_tpl_vars['i']['az_order_item_id']; ?>
">
                <td lv="1"><?php echo $this->_tpl_vars['i']['OrderItemId']; ?>
</td>
                <td lv="2"><?php echo $this->_tpl_vars['i']['Title']; ?>
</td>
                <td lv="3"><?php echo $this->_tpl_vars['i']['SKU']; ?>
</td>
                <td lv="4"><?php echo $this->_tpl_vars['i']['weight_g']; ?>
</td>
                <td lv="5"><?php echo $this->_tpl_vars['i']['fixed_quantity']; ?>
</td>
                <td lv="6"><?php echo $this->_tpl_vars['i']['declare_name']; ?>
</td>
                <td lv="7"><?php echo $this->_tpl_vars['i']['declare_price']; ?>
</td>
                <td width="90px"><p class='editBtnBox'> <a href="javascript:;" class="btn btn-primary J_ItemEdit">编辑</a> <a href="javascript:;" class="btn J_ItemDelete">删除</a></p>
                  <p class='saveBtnBox'> <a href='javascript:;' class='saveItemEdit btn btn-primary'>确定</a> <a href='javascript:;' class='cancelItemEdit btn'>取消</a></p></td>
              </tr>
              <!-- <?php endforeach; endif; unset($_from); ?> --> 
              <!--添加商品行-->
              <tr name="addItem" data-oid="" id="addItem"  style="display:none">
                <td><input type="text" name="OrderItemId" id="" /></td>
                <td><input type="text" name="Title" id="" /></td>
                <td><input type="text" name="SKU" id="" /></td>
                <td><input type="text" name="weight_g" id="" /></td>
                <td><input type="text" name="fixed_quantity" id="" /></td>
                <td><input type="text" name="declare_name" id="" /></td>
                <td><input type="text" name="declare_price" id="" /></td>
                <td width='90px' id=''><p>
                    <input name="order_id" type="hidden" value="<?php echo $this->_tpl_vars['data']['h']['order_id']; ?>
" />
                    <input name="AmazonOrderId" type="hidden" value="<?php echo $this->_tpl_vars['data']['h']['AmazonOrderId']; ?>
" />
                    <a href="javascript:;" class="btn btn-primary" id="addnew_form_submit">确定</a> <a href="javascript:;" class="btn" id="addnew_form_cancel">取消</a> </p></td>
              </tr>
            </tbody>
          </table>
        </form>
        <a href="javascript:;" class="btn add_order_btn" style="float:right;" id="addnew_btn">添加商品</a> </div>
      <div class="clear"></div>
      <!--包裹产品--end--> 
      <!--留言--start--><br />
      <!--<div class='noteBox'>
      <h3>信息留言</h3>
      <table class="table table-striped table-bordered ">
        <thead>
          <tr>
            <th>eBay留言</th>
            <th>PayPal留言</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td id="ebaytext">hello,ebay</td>
            <td id="paypaltext">hello,paypal</td>
          </tr>
        </tbody>
      </table>
    </div>--> 
      <!--留言--end--> 
      <!--地址信息--start-->
      <div class='box2' style="width:40%;float:left;">
        <form action="" method="get">
          <table class='table table-striped table-bordered box2Table' id="tb_address">
            <tbody>
              <tr>
                <td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>地址信息</b></td>
              </tr>
              <tr>
                <td class=''>Name
                  <input name="address_order_id" type="hidden" value="<?php echo $this->_tpl_vars['data']['h']['order_id']; ?>
" /></td>
                <td><input name="BuyerName" type="text" value="<?php echo $this->_tpl_vars['data']['address']['BuyerName']; ?>
" /></td>
              </tr>
              <tr>
                <td class=''>Address Line1</td>
                <td><input name="Street1" type="text" value="<?php echo $this->_tpl_vars['data']['address']['Street1']; ?>
" /></td>
              </tr>
              <tr>
                <td class=''>Address Line2</td>
                <td><input name="Street2" type="text" value="<?php echo $this->_tpl_vars['data']['address']['Street2']; ?>
" /></td>
              </tr>
              <tr>
                <td class=''>City</td>
                <td><input name="CityName" type="text" value="<?php echo $this->_tpl_vars['data']['address']['CityName']; ?>
" /></td>
              </tr>
              <tr>
                <td class=''>State/Province</td>
                <td><input name="ShipState" type="text" value="<?php echo $this->_tpl_vars['data']['address']['ShipState']; ?>
" /></td>
              </tr>
              <tr>
                <td class=''>Post Code</td>
                <td><input name="PostalCode" type="text" value="<?php echo $this->_tpl_vars['data']['address']['PostalCode']; ?>
" /></td>
              </tr>
              <tr>
                <td class=''>Country</td>
                <td valign='bottom'><input name="CountryCode" type="text" value="<?php echo $this->_tpl_vars['data']['address']['CountryCode']; ?>
" />
                  <input type='button' value='选择国家' class='J_selectCountryBtn btn' data-countrytargetid='CountryName'></td>
              </tr>
              <tr>
                <td class=''>Phone</td>
                <td><input name="BuyerPhone" type="text" value="<?php echo $this->_tpl_vars['data']['address']['BuyerPhone']; ?>
"></td>
              </tr>
              <tr>
                <td colspan='2'><input type='submit' name='' id='saveadd' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;"></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <!--地址信息--end--> 
      
      <!--申报信息--start-->
      <div class='box2' style="width:58%;float:right;">
        <form action="" method="get">
          <table class='table table-striped table-bordered box2Table' id="tb_shenbao">
            <tbody>
              <tr>
                <td colspan='2' style='font-size:20px;text-align:center;background:#2C89A5;color:#fff;'><b>申报信息</b></td>
              </tr>
              <tr>
                <td class=''>总重量(g)</td>
                <td><input name="weight" type="text" id="txtPWeight" value="<?php echo $this->_tpl_vars['data']['h']['weight']; ?>
">
                  <b class="redStar">*</b> <span>修改总重量，每个包裹产品重量将改为平均重量</span></td>
              </tr>
              <tr>
                <td class=''>包装规格(cm)</td>
                <td><input name="package_size" type="text" value="<?php echo $this->_tpl_vars['data']['h']['package_size']; ?>
" id="txtPWeight">
                  <b class="redStar">*</b> <span>请重新输入规格，长*宽*高</span></td>
              </tr>
              <tr>
                <td class=''>申报名称</td>
                <td><input name="declare_name" type="text" id="txtPWeight" value="<?php echo $this->_tpl_vars['data']['h']['declare_name']; ?>
">
                  <b class="redStar">*</b> <span>每个包裹产品申报名称将改为跟包裹申报名称一样</span></td>
              </tr>
              <tr>
                <td class=''>总申报价值($)</td>
                <td><input name="declare_price" type="text" value="<?php echo $this->_tpl_vars['data']['h']['declare_price']; ?>
" id="txtPWeight">
                  <b class="redStar">*</b> <span>每个包裹产品申报价值将改为平均申报价值</span></td>
              </tr>
              <tr>
                <td class=''>包裹备注</td>
                <td><input name="package_note" type="text" value="<?php echo $this->_tpl_vars['data']['h']['package_note']; ?>
"></td>
              </tr>
              <tr>
                <td class=''>包裹追踪号(挂号)</td>
                <td><input name="tracking_sn" type="text" value="<?php echo $this->_tpl_vars['data']['h']['tracking_sn']; ?>
" maxlength="20" />
                  <span>包裹追踪号，20字符以内</span></td>
              </tr>
              <tr>
                <td colspan='2'><input type='submit' name='' id='saveshen' value='保存' class='btn btn-primary' style="float:right;margin-right:20px;">
                  <input name="sbinfo_order_id" type="hidden" value="<?php echo $this->_tpl_vars['data']['h']['order_id']; ?>
" /></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <!--申报信息--end-->
      <div class="clear"></div>
    </div>
    <!--edit save 尾部--> 
    <!--<div class="editFooter">
<input type="submit" name="" value="保存" id="btnSave" class="btn btn-primary address_save_btn">
<input type="button" name="" value="取消" id="btnSave" class="btn btn-warning backList" id2="backList">
<span>注: 修改地址信息和包裹信息时才需要保存</span> </div>--> 
  </div>
</div>