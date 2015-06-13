<?php /* Smarty version 2.6.28, created on 2015-01-05 10:47:19
         compiled from ck1sh/aliSet.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />

	</head>

	<body downType="<?php echo $this->_tpl_vars['config']['downType']; ?>
" uploadType ="<?php echo $this->_tpl_vars['config']['uploadTracking']; ?>
" sku = "<?php echo $this->_tpl_vars['config']['sku']; ?>
"  skuPart = "<?php echo $this->_tpl_vars['config']['skuDivide']; ?>
" customPrintType ="<?php echo $this->_tpl_vars['config']['orderIdent']; ?>
">
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<div class="wrap">
			<p class="topNav"><a href="#">首页</a>></p>
			<div class="tabHead">
				<!--基本参数设置--start-->
				<div class="setBox" style="padding:15px;">
						<h3>基本参数设置</h3>
						<div class="setBoxBody">
							<p>
								<span>订单的获取方式：</span>
								<label><input type="radio" name="orderMode" value=1 id="orderauto">自动同步</label>
								<label><input type="radio" name="orderMode" value=2 id="orderupload">手动上传</label>
							</p>

							<p>
								<span>上传挂号方式：</span>
								<label><input type="radio" name="uploadtran" value=1 id="auto">自动上传挂号到速卖通  </label>
								<label><input type="radio" name="uploadtran" value=2 id="upload">手动上传 </label>
								<a href="http://www.chukou1.com/doc/sellinghelper/UploadAliexpressTrackingFilesForCK1.pdf" target="_blank">上传挂号帮助»</a>
							</p>
							<p>
								<span>SKU：</span>
								<select name="_ctl0:ContentPlace:Config_SKUSettings" id="Config_SKUSettings" class="input-xlarge">
									<option selected="selected" value="CustomLabelAll" sku-id=1>等于商品编码</option>
									<option value="CustomLabelPart1"  sku-id=2>是商品编码的一部分（使用分隔符）</option>
									<option value="CustomLabelPart2"  sku-id=3>是商品编码的一部分（前几位字符）</option>
								</select>
								<b class="help-inline">*</b>
								<a href="http://www.chukou1.com/doc/sellinghelper/SKUInfoMapping(AliExpress).pdf" target="_blank">SKU相关说明»</a>
							</p>
							<p style="display:none;" id ='skupart'>
								<span>分隔符号：</span>
								<input type="text" name="skuDivide" id="" />
								<b class="help-inline ">* 截取第一个分隔符之前的部分</b>
							</p>
							<p class='skuJudge' style="height:20px;text-align:right;font-size:12px;margin:0;padding:0px 45px;display:none"></p>
							<p>
								<span>直发订单自定义标识：</span>
								<label><input type="radio" value=1 name="CustomPrint">交易号</label>&nbsp;&nbsp;
								<label><input type="radio" value=2 name="CustomPrint">SKU</label>&nbsp;&nbsp;
								<label><input type="radio" value=3 name="CustomPrint">交易号+SKU</label>&nbsp;&nbsp;
								<label><input type="radio" value=4 name="CustomPrint">使用交易号+SKU</label>&nbsp;&nbsp;
								<label><input type="radio" value=5 name="CustomPrint">申报名称</label><br />
								<label><input type="radio" value=6 name="CustomPrint">交易号+申报名称</label>&nbsp;&nbsp;
								<label><input type="radio" value=7 name="CustomPrint">交易号+SKU+Seller</label>&nbsp;&nbsp;
								<label><input type="radio" value=8 name="CustomPrint">交易号+申报名称+Seller</label>&nbsp;&nbsp;
							</p>
							
							<input type="button" name="" value="保存" id="btnSave" class="btn btn-primary">
							<a href="?r=oms/SHOrder/normal&platform=102">返回上一级</a>
						</div>
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
			$(function(){

				//显示设置内容
				var uploadType = $(\'body\').attr(\'uploadType\');
				var downType = $(\'body\').attr(\'downType\');
				var sku = $(\'body\').attr(\'sku\');
				var skuPart =$(\'body\').attr(\'skuPart\');
				var customPrintType = $(\'body\').attr(\'customPrintType\');
				
				//订单的获取方式
				if(downType == 1){
					$(".setBoxBody input[id=orderauto]").prop("checked", true);
					$(".setBoxBody input[id=orderupload]").prop("checked", false);
				}
				else{
					$(".setBoxBody input[id=orderauto]").prop("checked", false);
					$(".setBoxBody input[id=orderupload]").prop("checked", true);
				}
					
				//绑定上传挂号方式
				if(uploadType == 1){
					$(".setBoxBody input[id=auto]").prop("checked", true);
					$(".setBoxBody input[id=upload]").prop("checked", false);
				}
				else{
					$(".setBoxBody input[id=auto]").prop("checked", false);
					$(".setBoxBody input[id=upload]").prop("checked", true);
				}

				//绑定SKU
				if(sku==2){
					$("#Config_SKUSettings option[value=CustomLabelPart1]").attr("selected","selected");
					$(\'#skupart span\').text("分隔符号");
					$(\'#skupart b\').text("* 截取第一个分隔符之前的部分")
					$(\'#skupart\').show();
					$(\'#skupart input\').val(skuPart);
					$(\'.skuJudge\').hide();
				}else if(sku == 3){
					$("#Config_SKUSettings option[value=CustomLabelPart2]").attr("selected","selected");
					$(\'#skupart span\').text("SKU长度");
					$(\'#skupart b\').text("* 截取固定长度的前面部分")
					$(\'#skupart\').show();
					$(\'#skupart input\').val(skuPart);
					$(\'.skuJudge\').hide();
				}else{
					$("#Config_SKUSettings option[value=CustomLabelAll]").attr("selected","selected");
				}
				//直发订单自定义标识
				$(\':radio[name="CustomPrint"]\').eq(customPrintType-1).prop("checked",true);
				//设置中选择sku
				$("#Config_SKUSettings").on("click",function(){
					if($(this).val()==\'CustomLabelPart1\'){
						$(\'#skupart span\').text("分隔符号");
						$(\'#skupart b\').text("* 截取第一个分隔符之前的部分")
						$(\'#skupart\').show();
						$(\'.skuJudge\').hide();
					}else if($(this).val()==\'CustomLabelPart2\'){
						$(\'#skupart span\').text("SKU长度");
						$(\'#skupart b\').text("* 截取固定长度的前面部分")
						$(\'#skupart\').show();
						$(\'.skuJudge\').hide();
					}else{
						$(\'#skupart\').hide();
						$(\'.skuJudge\').hide();
					}
				})
				
				//保存用户设置
				$(document).ready(function(){
					$(\'#btnSave\').bind(\'click\',saveSetup);
				});
				 function saveSetup(){
					var orderType = $(\'.setBox input[name="orderMode"]:checked\').attr(\'value\');
					var upload =$(\'.setBox input[name="uploadtran"]:checked\').attr(\'value\');
					
					var sku = $(\'select#Config_SKUSettings option:selected\').val();
					
					var skupart =$(\'#skupart input\').val();
					if(sku=="CustomLabelPart1" || sku =="CustomLabelPart2"){
						
						if (sku == "CustomLabelPart1"){
							if(!skupart){
								$(\'.skuJudge\').html(\'分隔符号不能为空,请输入！\');
								$(\'.skuJudge\').css(\'color\', \'#F78B8B\');
								$(\'.skuJudge\').show();
								return false;
							}
						}else {
							if(!skupart){
								$(\'.skuJudge\').html(\'SKU长度不能为空,请输入！\');
								$(\'.skuJudge\').css(\'color\', \'#F78B8B\');
								$(\'.skuJudge\').show();
								return false;
							}
						}
						
					}
					var skuKey = $(\'select#Config_SKUSettings option:selected\').attr(\'sku-id\');
					var cust = $(\'.setBox input[name="CustomPrint"]:checked\').attr(\'value\');
					var data = {\'orderType\':orderType,\'uploadType\':upload,\'sku\':skuKey,\'skuPart\':skupart,\'customPrintType\':cust};
					$.ajax({
							url :"?r=oms/SHALIExpress/SetOption",
							type:\'post\',
							data:data,
							success: function(result) {
								if(result != null && result instanceof Object){
									if (result.status == 0) {
										alert("操作失败！")
									} else {
										$(\'.topWarn\').html(\'保存成功！\');
										$(\'.topWarn\').fadeIn(400,function(){setTimeout(function(){ $(\'.topWarn\').fadeOut(400)},1000)});
										
									}
								}else{
									alert(\'返回数据为空\');
								}
							}
						});
				}

			})
		</script>
		'; ?>

	</body>