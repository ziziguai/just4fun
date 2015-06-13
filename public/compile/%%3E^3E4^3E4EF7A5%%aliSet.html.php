<?php /* Smarty version 2.6.28, created on 2015-01-27 03:32:47
         compiled from ck1sh/setting/aliSet.html */ ?>
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
			<p class="topNav"><a href="?">首页</a>><a href="index.php?r=oms/shorder/normal&platform=102">速卖通  > 已发货订单</a></p>
			<div class="tabHead">
				<!--基本参数设置--start-->
				<div class="setBox" style="padding:15px;">
				 <form id="nosubmit_form" onSubmit="return false;">
						<h3>基本参数设置</h3>
						<div class="setBoxBody">
							<p>
								<span>订单的获取方式：</span>
								<label><input type="radio" name="ORDERDOWN" value="100" <?php if ($this->_tpl_vars['config']['1'] == 100): ?> checked <?php endif; ?> id="orderauto">自动同步</label>
								<label><input type="radio" name="ORDERDOWN" value="101" <?php if ($this->_tpl_vars['config']['1'] == 101): ?> checked <?php endif; ?> id="orderupload">手动上传</label>
							</p>

							<p>
								<span>上传挂号方式：</span>
								<label><input type="radio" name="UPLOAD_TRACKING" value="300" <?php if ($this->_tpl_vars['config']['3'] == 300): ?> checked <?php endif; ?> id="auto">自动上传挂号到速卖通  </label>
								<label><input type="radio" name="UPLOAD_TRACKING" value="301" <?php if ($this->_tpl_vars['config']['3'] == 301): ?> checked <?php endif; ?> id="upload">手动上传 </label>
								<a href="http://www.chukou1.com/doc/sellinghelper/UploadAliexpressTrackingFilesForCK1.pdf" target="_blank">上传挂号帮助»</a>
							</p>
							<p>
								<span>SKU：</span>
								<select name="SKU_PRINT" id="Config_SKUSettings" class="input-xlarge">
									<option value="401" <?php if ($this->_tpl_vars['config']['4'] == 401): ?> selected<?php endif; ?> class='CustomLabel'>等于CustomLabel</option>
									<option value="402" <?php if ($this->_tpl_vars['config']['4'] == 402): ?> selected<?php endif; ?> class='CustomLabel'>是CustomLabel的一部分（使用分隔符）</option>
									<option value="403" <?php if ($this->_tpl_vars['config']['4'] == 403): ?> selected<?php endif; ?> class='CustomLabel'>是CustomLabel的一部分（前几位字符）</option>
								</select>
								<b class="help-inline">*</b>
								<a href="http://www.chukou1.com/doc/sellinghelper/SKUInfoMapping(AliExpress).pdf" target="_blank">SKU相关说明»</a>
							</p>
							<p id='skupart1' style="display:none;"><span>分隔符号：</span>
					     		<input name="SKU_SEPARATOR" type="text" value="<?php echo $this->_tpl_vars['config']['5']; ?>
" maxlength="16">
					     		<b class="help-inline">* 截取第一个分隔符之前的部分</b>
							</p>
					
						     <p id='skupart2' style="display:none;"><span>SKU长度：</span>
						     	<input name="SKU_PREV_LENGTH" type="text" value="<?php echo $this->_tpl_vars['config']['6']; ?>
" maxlength="16">
						     	<b class="help-inline">* 截取固定长度的前面部分</b>
						     </p>
							<p class='skuJudge' style="height:20px;text-align:right;font-size:12px;margin:0;padding:0px 45px;display:none"></p>
							<p>
								<span>直发订单自定义标识：</span>
								<label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='702'<?php if ($this->_tpl_vars['config']['7'] == 702): ?> checked<?php endif; ?>>
					                                 交易号</label>
					          	<label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='703'<?php if ($this->_tpl_vars['config']['7'] == 703): ?> checked<?php endif; ?>>
					            	SKU</label>
					           	<label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='704'<?php if ($this->_tpl_vars['config']['7'] == 704): ?> checked<?php endif; ?>>
					            	交易号+SKU</label>
					          	<label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='707'<?php if ($this->_tpl_vars['config']['7'] == 707): ?> checked<?php endif; ?>>
					            	交易号+SKU+Seller</label>
							</p>
							<p>
								<span></span>
								<label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='705'<?php if ($this->_tpl_vars['config']['7'] == 705): ?> checked<?php endif; ?>>
					           		 申报名称</label>
					          <label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='706'<?php if ($this->_tpl_vars['config']['7'] == 706): ?> checked<?php endif; ?>>
					           		 交易号+申报名称</label>
					          <label>
					            <input name="DIRECT_SHIPMENTS_ORDER_MARK" type="radio" value='708'<?php if ($this->_tpl_vars['config']['7'] == 708): ?> checked<?php endif; ?>>
					            	交易号+申报名称+Seller</label>
							</p>
							<input type="button" name="" value="保存" id="saveconfig" class="btn btn-primary">
							<a href="?r=oms/shorder/normal&platform=102">返回上一级</a>
						</div>
						</form>
				</div>
				<!--基本参数设置--end-->
			</div>
		</div>
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script>
			$('body').attr('id', 'ebSet');
		</script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
		<?php echo '
		<script>
			$("#saveconfig").on("click",function(){
				$.post("index.php?r=oms/shaliexpress/setoption",$("#nosubmit_form").serialize(),
					function(data){
						if(data>0){
							if($("[name=SKU_SEPARATOR]").val()== \'\'){
								alert(\'请重新输入分隔符号\');
								return false;
							}
							if($("[name=SKU_PREV_LENGTH]").val()== \'\'){
								alert(\'请重新输入SKU长度\');
								return false;
							}
							showTips(\'success\',\'修改成功！！！\');
						}else if(data==0){
							showTips(\'info\',\'数据没有改变！\');
						}else{
							showTips(\'error\',\'修改失败！！！\');
						}
					});
			})
			$(\'#Config_SKUSettings\').click(function(){
				dis_cog();
			})
	
			function dis_cog(){
				if($("[name=SKU_PRINT]").val()==402){
					$(\'#skupart1\').show();
					$(\'#skupart2\').hide();
				}else if($("[name=SKU_PRINT]").val()==403){
					$(\'#skupart2\').show();
					$(\'#skupart1\').hide();
				}else{
					$(\'#skupart2,#skupart1\').hide();
				}
			}
			dis_cog();
	
	
			$(\'#return\').click(function(){
				history.back();
			})
		</script>
		'; ?>

	</body>