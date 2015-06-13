<?php /* Smarty version 2.6.28, created on 2015-06-04 05:25:00
         compiled from ck1sh/error/bug_trace.html */ ?>
<!-- Page header -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/error/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- 暂时简单显示错误信息 -->
	<div>
		<h1><?php echo $this->_tpl_vars['error']['code']; ?>
 - <?php echo $this->_tpl_vars['error']['message']; ?>
</h1>
	</div>
	<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>	
<!-- Page footer -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ck1sh/error/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>