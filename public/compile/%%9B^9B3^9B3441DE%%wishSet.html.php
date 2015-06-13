<?php /* Smarty version 2.6.28, created on 2015-01-08 11:52:13
         compiled from ck1sh/wishSet.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
	</head>
	<body uploadType ="<?php echo $this->_tpl_vars['setup']['upload_type']; ?>
" sku = "<?php echo $this->_tpl_vars['setup']['sku']; ?>
" skuPart = "<?php echo $this->_tpl_vars['setup']['skupartchar']; ?>
" customPrintType ="<?php echo $this->_tpl_vars['setup']['CustomPrintType']; ?>
">
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<!--基本参数设置--start-->
				<div class="setBox" style="padding:15px;">
						<h3>基本参数设置</h3>
						<div class="setBoxBody">
							<p>
								<span>上传挂号方式：</span>
								<label><input type="radio" name="UploadTrackingType" id="auto" value ='1' checked="checked"/>自动上传挂号到Wish</label>
							</p>
							<p>
									<span></span>
									<label><input type="radio" name="UploadTrackingType" id="upload"  value ='2'/>手动上传</label>
							</p>
							<p>
								<span>SKU：</span>
								<select name="_ctl0:ContentPlace:Config_SKUSettings" id="Config_SKUSettings" class="input-xlarge">
									<option selected="selected" value="CustomLabelAll">等于商品编码</option>
									<option value="CustomLabelPart1">是商品编码的一部分（使用分隔符）</option>
									<option value="CustomLabelPart2">是商品编码的一部分（前几位字符）</option>
								</select>
								<b class="help-inline">*</b>
							</p>
							<p style="display:none;" id ='skupart'>
								<span>分隔符号：</span>
								<input type="text" name="" id="" />
								<b class="help-inline" id =''>* 截取第一个分隔符之前的部分</b>
							</p>
							<p class='skuJudge' style="height:20px;text-align:right;font-size:12px;margin:0;padding:0px 45px;display:none"></p>
							<p>
								<span>直发订单自定义标识：</span>
								<label><input type="radio" name="CustomPrint" value = '702' checked ="checked">交易号</label>
								<label><input type="radio" name="CustomPrint" value = '703'>SKU</label>
								<label><input type="radio" name="CustomPrint" value = '704'>交易号+SKU</label>
								<label><input type="radio" name="CustomPrint" value = '707'>交易号+SKU+Seller</label>
							</p>
							<p>
								<span></span>
								<label><input type="radio" name="CustomPrint" value = '705'>申报名称</label>
								<label><input type="radio" name="CustomPrint" value = '706'>交易号+申报名称</label>
								<label><input type="radio" name="CustomPrint" value = '708'>交易号+申报名称+Seller</label>
							</p>
							<input type="button" name="" value="保存" id="btnSave" class="btn btn-primary">
							<a href="?r=oms/shorder/normal&platform=104">返回上一级</a>
						
						</div>
				</div>
				<!--基本参数设置--end-->
				<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
				<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
			<?php echo '
		<script>
		$(function() {
			////显示设置内容
		
			var uploadType = $(\'body\').attr(\'uploadType\');
			var skuPrint = $(\'body\').attr(\'sku\');
			var skuPart =$(\'body\').attr(\'skuPart\');
			var customPrintType = $(\'body\').attr(\'customPrintType\');
			if(uploadType == \'1\'){
				$(".setBoxBody input[id=auto]").prop("checked", true);
				$(".setBoxBody input[id=upload]").prop("checked", false);
			}
			else{
				$(".setBoxBody input[id=upload]").prop("checked", true);
				$(".setBoxBody input[id=auto]").prop("checked", false);
			}
			var sku = \'\';
			switch (+skuPrint)
			{
			case 1:
				sku = "CustomLabelAll";
				break;
			case 2:
				sku = "CustomLabelPart1";
				break;
			case 3:
				sku = "CustomLabelPart2";
				break;
			}
			
			$(\'#Config_SKUSettings\').val(sku);
			if(sku	==\'CustomLabelPart1\'){
				$(\'#skupart span\').text("分隔符号");
				$(\'#skupart b\').text("* 截取第一个分隔符之前的部分");
				$(\'#skupart input\').val(skuPart);
				$(\'#skupart\').show();
				
			}else if(sku==\'CustomLabelPart2\'){
				$(\'#skupart span\').text("SKU长度");
				$(\'#skupart b\').text("* 截取固定长度的前面部分");
				$(\'#skupart input\').val(skuPart);
				$(\'#skupart\').show();
				
			}
			switch(+customPrintType)
			{
			case 702: 
				$(".setBoxBody input[name=CustomPrint][value=702]").prop("checked", true);
				break;
			case 703:
				$(".setBoxBody input[name=CustomPrint][value=703]").prop("checked", true);
				break;
			case 704:
				$(".setBoxBody input[name=CustomPrint][value=704]").prop("checked", true);
				break;
			case 705:
				$(".setBoxBody input[name=CustomPrint][value=705]").prop("checked", true);
				break;
			case 706:
				$(".setBoxBody input[name=CustomPrint][value=706]").prop("checked", true);
				break;
			case 707:
				$(".setBoxBody input[name=CustomPrint][value=707]").prop("checked", true);
				break;
			case 708:
				$(".setBoxBody input[name=CustomPrint][value=708]").prop("checked", true);
				break;
				
			}


			
					
			//设置中选择sku
			$(\'#Config_SKUSettings\').on(\'change\',function(){
			
				if($(this).val()==\'CustomLabelPart1\'){
					$(\'#skupart span\').text("分隔符号");
					$(\'#skupart b\').text("* 截取第一个分隔符之前的部分");
					$(\'#skupart\').show();
					$(\'.skuJudge\').hide();
				}else if($(this).val()==\'CustomLabelPart2\'){
					$(\'#skupart span\').text("SKU长度");
					$(\'#skupart b\').text("* 截取固定长度的前面部分");
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
				var upload =$(\'.setBox input[name="UploadTrackingType"]:checked\').attr(\'value\');
				var skuPrint = $(\'select#Config_SKUSettings option:selected\').val();
				var skupart =$(\'#skupart input\').val();
				if(skuPrint	==\'CustomLabelPart1\'){
					sku = \'2\';
				}else if(skuPrint==\'CustomLabelPart2\'){
					sku = \'3\';
				}else{
					sku = \'1\';		
				}
				if(skuPrint=="CustomLabelPart1" || skuPrint =="CustomLabelPart2"){
					
					if (skuPrint == "CustomLabelPart1"){
						if(!skupart){
							$(\'.skuJudge\').html(\'分隔符号不能为空,请输入！\');
							$(\'.skuJudge\').css(\'color\', \'#F78B8B\');
							$(\'.skuJudge\').show();
							return
						}
					}else {
						if(!skupart){
							$(\'.skuJudge\').html(\'SKU长度不能为空,请输入！\');
							$(\'.skuJudge\').css(\'color\', \'#F78B8B\');
							$(\'.skuJudge\').show();
							return 
						}
					}
					
				}
				var cust = $(\'.setBox input[name="CustomPrint"]:checked\').attr(\'value\');
				var data = {\'uploadType\':upload,\'sku\':sku,\'skuPart\':skupart,\'customPrintType\':cust};
				$.ajax({
						url :"?r=omsShwish/SaveSetup",
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
</html>