<?php /* Smarty version 2.6.28, created on 2015-01-22 09:24:05
         compiled from ck1sh/azUpload.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Insert title here</title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" /> <?php echo '
		<style type="text/css">
			* {padding: 0;margin: 0;}
			ul,li {list-style: none;}
			.wrap {padding: 15px;border: 1px solid #ddd;margin: 15px;border-radius: 10px;width: 50%;}
			p {height: 30px;}
			label {display: inline-block;margin-right: 15px;}
			input[type="radio"] {margin-top: -3px;}
		</style>
		'; ?>

	</head>

	<body>
		<div class="wrap">
			<form action='' method="post" enctype="multipart/form-data">
				<p>亚马逊账户名： <?php $_from = $this->_tpl_vars['azAccounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
					<label>
						<input  class = 'btnchecked' type="radio" name="azAccount" value="<?php echo $this->_tpl_vars['it']['account_id']; ?>
" txt="<?php echo $this->_tpl_vars['it']['account_name']; ?>
"> <?php echo $this->_tpl_vars['it']['account_name']; ?>

					</label>
					<?php endforeach; endif; unset($_from); ?>
					<label>
						<input type="radio" name="azAccount" value="0" txt=""> 新账户名
					</label>
					<input name="sellerID" type="text" value="">
					<input name="sellerIDID" type="hidden" value="">
				</p>
				<p>(注：上面选项能保证在amazon上传tracking的正确率)</p>
				<p>
					<input name="filename" type="file" id="filename">
					<input type='submit' id="doCheck" name='submit' value='导入' class="btn btn-warning">
				</p>
			</form>
			<hr>
			<p>温馨提示</p>
			<ul>
				<li>上传亚马逊订单是在出口易下单的第一步，上传的文件必须是在亚马逊系统上下载的订单txt文件或转换后的excel文件；</li>
				<li>上传成功的数据会显示在&ldquo;待下单&rdquo;；</li>
				<li>统一设置亚马逊SKU与出口易产品型号，为您自动匹配重量、申报价值等产品信息。<a href="http://www.chukou1.com/doc/sellinghelper/SKUInfoMapping(Amazon).pdf" target="_blank">操作说明文档</a>
				</li>
			</ul>
		</div>
	</body>
	<?php echo '
	<script src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
	<script>
	$("body .btnchecked").eq(0).attr("checked","checked");
	$("input[name=\'sellerID\']").val($("body .btnchecked").eq(0).attr(\'txt\'));
	$("input[name=\'sellerIDID\']").val($("body .btnchecked").eq(0).val());

		$("input[name=\'azAccount\']").each(function(index, element) {
			$(element).click(function(e) {
				$("input[name=\'sellerID\']").val($(this).attr(\'txt\'));
				$("input[name=\'sellerIDID\']").val($(this).val());
			});
		});
	</script>
	'; ?>


</html>