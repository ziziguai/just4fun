<?php /* Smarty version 2.6.28, created on 2015-01-26 03:27:52
         compiled from ck1sh/setting/azSet.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
</head>
<body>
<div class="wrap">
  <!-- <p class="topNav"><a href="?">首页</a>&gt;</p> -->
  <p class="topNav"><a href="?r=oms/shorder/normal&platform=101">返回上一级</a></p>
  <!--基本参数设置--start-->
  <div class="setBox" style="padding:15px;">
    <h3>基本参数设置</h3>
    <div class="setBoxBody">
      <form id="nosubmit_form" onSubmit="return false;">
        <p> <span>订单的获取方式：</span>
          <label>
            <input name="ORDER_DOWN_STYLE" type="radio" value="100"<?php if ($this->_tpl_vars['data']['1'] == 100): ?> checked<?php endif; ?>>
            自动同步</label>
          <label>
            <input name="ORDER_DOWN_STYLE" type="radio" value="101"<?php if ($this->_tpl_vars['data']['1'] == 101): ?> checked<?php endif; ?>>
            手动上传</label>
        </p>
        <p> <span>上传挂号方式：</span>
          <label>
            <input name="TRACKING_UPLOAD_STYLE" type="radio" value="300"<?php if ($this->_tpl_vars['data']['3'] == 300): ?> checked<?php endif; ?>>
            自动上传挂号到<b>亚马逊</b></label>
          <label>
            <input name="TRACKING_UPLOAD_STYLE" type="radio" value="301"<?php if ($this->_tpl_vars['data']['3'] == 301): ?> checked<?php endif; ?>>
            手动上传<a href="http://www.chukou1.com/doc/sellinghelper/UploadAmazonTrackingFilesForCK1.pdf" target="_blank">上传挂号帮助»</a></label>
        </p>
        <p> <span>SKU：</span>
          <select name="SKU_MATCH_RULE">
            <option value="401"<?php if ($this->_tpl_vars['data']['4'] == 401): ?> selected<?php endif; ?>>等于商品编码</option>
            <option value="402"<?php if ($this->_tpl_vars['data']['4'] == 402): ?> selected<?php endif; ?>>是商品编码的一部分（使用分隔符）</option>
            <option value="403"<?php if ($this->_tpl_vars['data']['4'] == 403): ?> selected<?php endif; ?>>是商品编码的一部分（前几位字符）</option>
          </select>
          <b class="help-inline">*</b> <a href="http://www.chukou1.com/doc/sellinghelper/SKUInfoMapping(AliExpress).pdf" target="_blank">SKU相关说明»</a> </p>
        <!--skupart这一部分根据SKU选择框来决定显示或者隐藏-->
        <p id='skupart1' style="display:none;"><span>分隔符号：</span>
          <input name="SKU_SEPARATOR" type="text" value="<?php echo $this->_tpl_vars['data']['5']; ?>
" maxlength="16">
          <b class="help-inline">* 截取第一个分隔符之前的部分</b></p>
        <p id='skupart2' style="display:none;"><span>SKU长度：</span>
          <input name="SKU_PREV_LENGTH" type="text" value="<?php echo $this->_tpl_vars['data']['6']; ?>
" maxlength="16">
          <b class="help-inline">* 截取固定长度的前面部分</b></p>
        <p class='skuJudge' style="margin-left:150px;margin-top:-20px;color:red;display:none;">提示行-需要时显示：</p>
        <p> <span>直发订单自定义标识：</span>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='701'<?php if ($this->_tpl_vars['data']['7'] == 701): ?> checked<?php endif; ?>>
            交易号</label>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='702'<?php if ($this->_tpl_vars['data']['7'] == 702): ?> checked<?php endif; ?>>
            SKU</label>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='703'<?php if ($this->_tpl_vars['data']['7'] == 703): ?> checked<?php endif; ?>>
            交易号+SKU</label>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='704'<?php if ($this->_tpl_vars['data']['7'] == 704): ?> checked<?php endif; ?>>
            交易号+SKU+Seller</label>
        </p>
        <p> <span></span>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='705'<?php if ($this->_tpl_vars['data']['7'] == 705): ?> checked<?php endif; ?>>
            申报名称</label>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='706'<?php if ($this->_tpl_vars['data']['7'] == 706): ?> checked<?php endif; ?>>
            交易号+申报名称</label>
          <label>
            <input name="EXP_CUSTOM_MARKING" type="radio" value='707'<?php if ($this->_tpl_vars['data']['7'] == 707): ?> checked<?php endif; ?>>
            交易号+申报名称+Seller</label>
        </p>
        <p><span>确认发货：</span>
          <label>
            <input name="SHIPPING_MARK_STYLE" type="checkbox" value='200'<?php if ($this->_tpl_vars['data']['2'] == 200): ?> checked<?php endif; ?>>
            确认发货后系统自动在Amazon平台上确认发货 </label>
        </p>
        <div class="SetFooter">
          <input name="btn_save" type="button" class="btn btn-primary" value="保存" id="btn_save">
          <input name="btn_back" type="button" class="btn" value="返回" id="btn_back">
        </div>
      </form>
    </div>
  </div>
  <!--基本参数设置--end--> 
</div>
</body>
<?php echo '
<script src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
<script src="public/template/ck1sh/js/index.js"></script>
<script>
$(document).ready(function(e) {
	
	function alert(info,type){
		switch(type){
			case \'info\',1:
				type = \'info\';
				break;
			case \'warning\',2:
				type = \'warning\';
				break;
			case \'error\',3:
				type = \'error\';
				break;
			case \'success\',4:
				type = \'success\';
				break;
			default:
				type=\'info\';
		}
		showTips(type,info);
	}
	
	$("#nosubmit_form").submit(function(e) {
        e.preventDefault();
    });
    $("#btn_back").click(function(e) {
        history.back();
    });
	$("#btn_save").click(function(e) {
		$.post("index.php?r=oms/shaz/AzSaveSetup",$("#nosubmit_form").serialize(),
		function(data,status){
			if(status==\'success\'&&data>0){
				alert(\'保存成功！\',4);
			}else if(data==0){
				alert(\'数据没有改变！\');
			}else{
				alert(\'保存失败!\',3);
			}
		});
    });
	$("select[name=\'SKU_MATCH_RULE\']").change(function(e) {
        change_sh();
    });
	function change_sh(){
		if($("select[name=\'SKU_MATCH_RULE\']").val()==402){
			$("#skupart1").show();
			$("#skupart2").hide();
		}else if($("select[name=\'SKU_MATCH_RULE\']").val()==403){
			$("#skupart1").hide();
			$("#skupart2").show();
		}else{
			$("#skupart1,#skupart2").hide();
		}
	}
	change_sh();
});
</script>
'; ?>

</html>