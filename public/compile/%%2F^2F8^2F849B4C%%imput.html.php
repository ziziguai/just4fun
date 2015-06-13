<?php /* Smarty version 2.6.28, created on 2015-01-22 07:24:23
         compiled from ck1sh/imput.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
</head>
<body>
<p>亚马逊账户名
  <?php $_from = $this->_tpl_vars['azAccounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
  <label>
    <input class = 'btnchecked' type="radio" name="azAccount" value="<?php echo $this->_tpl_vars['it']['account_id']; ?>
" txt="<?php echo $this->_tpl_vars['it']['account_name']; ?>
"/>
    <?php echo $this->_tpl_vars['it']['account_name']; ?>
 </label>
  <?php endforeach; endif; unset($_from); ?>
  <label>
    <input type="radio" name="azAccount" value="0" txt="">
    新账户名 </label> </p>
<form action=''  method="post" enctype="multipart/form-data">
  <p>
    <input name="sellerID" type="text" value="">
    <input name="sellerIDID" type="hidden" value="">
    （此项能保证在amazon上传tracking的正确率）</p>
  <input name="filename" type="file" id="filename">
  <input type='submit' id="doCheck" name='submit' value='导入' class="btn btn-warning">
</form>
<hr>
<p>温馨提示</p>
<ul>
  <li>上传亚马逊订单是在出口易下单的第一步，上传的文件必须是在亚马逊系统上下载的订单txt文件或转换后的excel文件；</li>
  <li>上传成功的数据会显示在&ldquo;待下单&rdquo;；</li>
  <li>统一设置亚马逊SKU与出口易产品型号，为您自动匹配重量、申报价值等产品信息。<a href="http://www.chukou1.com/doc/sellinghelper/SKUInfoMapping(Amazon).pdf" target="_blank">操作说明文档</a></li>
</ul>
</body>
<?php echo '
<script src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
<script>
$("input[name=\'azAccount\']").each(function(index, element) {
    $(element).click(function(e) {
        $("input[name=\'sellerID\']").val($(this).attr(\'txt\'));
        $("input[name=\'sellerIDID\']").val($(this).val());
    });
});
$("body .btnchecked").eq(1).attr("checked","checked");
</script>
'; ?>

</html>