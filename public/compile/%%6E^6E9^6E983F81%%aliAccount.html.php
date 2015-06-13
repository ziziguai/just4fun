<?php /* Smarty version 2.6.28, created on 2015-01-27 03:32:50
         compiled from ck1sh/aliAccount.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ck1sh/aliAccount.html', 106, false),)), $this); ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />
		<style>
			
		</style>
	</head>

	<body>
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<!--添加ali账号弹窗--start-->
			<div class="addEbayTCGB TCGB" id="account" style="display:none;">
				<div class="TCCON addEbayTCCon">
					<h2>
					<span>添加速卖通账户</span>
					<b class="TCCloseBtn" id="close">关闭</b>
				</h2>
				<div class="addEbayTCConBody">
					<div class="addIdFirst"  style="display:none;" id="bind" >
					<p>第一步：请输入您需要绑定的速卖通账号名 </p>
					<p><span>账号名</span><input type="text" class="userName" id="accname"/></p>
					<p class='userNameJudge' style="height:20px;text-align:right;font-size:12px;margin:0;padding:0px 45px;"></p>
					</div>
					<div class="addIdThird" id="wait" >
					<p>第二步：登录速卖通授权页面，进行授权 </p>	
					<p><a class="btn btn-primary" style="cursor:default;margin-left:20px;target:_blank;" target="_blank" id="empower"
					href = "<?php echo $this->_tpl_vars['auth']; ?>
"
					>登录</a></p>
					</div>
					<div class="addIdThird" id="over" >
					<p>第三步：授权成功，点击完成  </p>
					<p><input type="button" value="完成" class="btn btn-primary addIdBtn" id="accomplish"/></p>
					</div>					
				</div>				
				<div class="addIdTCFooter TCFooter" id="xia" >
					<span style="color:red;float:left;"></span>
					<input type="button" value="下一步" class="btn btn-primary addIdBtn" id="next" />
				</div>
				</div>
			</div>
		<!--添加ali账号弹窗--end-->
		<div class="wrap">
			<p class="topNav"><a href="?">首页&nbsp;>&nbsp;</a><a href = "?r=oms/shorder/shipped&platform=102">速卖通&nbsp;>&nbsp;已发货订单</a></p>
			<div class="tabHead">

				<ul>
					<li><a class="tabActive">速卖通账号</a></li>
				</ul>
				<div class="tabHeadRight">
					<a href="?r=oms/shorder/normal&amp;platform=102" class="btn">返回</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="sel">
								<div class="selRight">
								    <a href='?r=oms/shorder/normal&platform=102'><<<&nbsp;返回订单列表</a>&nbsp;&nbsp;   
									<input type="button" value="添加速卖通账号" class="btn btn-primary" id = "addAccount">
									<input type="button" value="启用账号" class="btn btn-warning" id = "startAccount">
									<input type="button" value="停用账号" class="btn btn-warning" id = "stopAccount">
									<input type="button" value="删除" class="btn btn-warning" id = "delAccount">

								</div>
								<div class="clear"></div>
							</div>

						</div>
						<div class="tabBodyCon">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>
											<input type="checkbox" />
										</th>
										<th>账号名</th>
										<th>SellerID</th>
										<th>创建时间</th>
										<th>更新时间</th>
										<th>是否过期</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
								<?php if (( $this->_tpl_vars['AccountsArray'] == null )): ?>
				                    <tr>
					                   <td colspan="8" align="center">无数据</td> 
					                </tr>
				                <?php else: ?>
			                        <?php $_from = $this->_tpl_vars['AccountsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['i']):
?>
									<tr data-id='<?php echo $this->_tpl_vars['i']['account_id']; ?>
'>
										<td  id = '<?php echo $this->_tpl_vars['i']['account_id']; ?>
'>
											<input type="checkbox"/>
										</td>
										<th><?php echo $this->_tpl_vars['i']['Account']; ?>
</th>
										<th><?php echo $this->_tpl_vars['i']['seller_id']; ?>
</th>
										<th><?php echo ((is_array($_tmp=$this->_tpl_vars['i']['CreateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</th>
										<th><?php echo ((is_array($_tmp=$this->_tpl_vars['i']['UpdateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</th>
										<?php if (( $this->_tpl_vars['i']['remainTime'] == 0 ) || ( $this->_tpl_vars['i']['remainTime'] < 0 )): ?>
										<th ><font color="#C0C0C0">未授权</font></th>
										<?php else: ?>
										<th>剩余 <?php echo $this->_tpl_vars['i']['remainTime']; ?>
 天</th>
										<?php endif; ?>
										<?php if (( $this->_tpl_vars['i']['Status'] == 1 )): ?>
										<th><font color="#C0C0C0">已停用</font></th>
										<?php elseif (( $this->_tpl_vars['i']['Status'] == 2 )): ?>
										<th><font color="#4F4F2F">已启用</font></th>
										<?php endif; ?>
										<th><input type="button" value="重新授权" class="btn againAccredit" id = "againAccount" ></th>
									</tr>
                                 <?php endforeach; endif; unset($_from); ?>
			                     <?php endif; ?> 
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
	
		<?php echo '
		<script>
		</script>
		<script>
		$(function() {	
			//用户选择删除时提醒
			AliAjax($(\'#startAccount\'),\'?r=oms/shaliexpress/updateali&type=2&aid=\');
			AliAjax($(\'#stopAccount\'),\'?r=oms/shaliexpress/updateali&type=3&aid=\');
			AliAjax($(\'#delAccount\'),\'?r=oms/shaliexpress/updateali&type=1&aid=\');			
			$(\'body\').attr(\'id\',\'aliAccount\');		
			function AliAjax(obj, urlStr) {
				obj.on(\'click\', function() {
					var getAllId_str = getAllId($(\'.tabBodyCon tbody tr input[type=checkbox]:checked\'));
					if (getAllId_str.length == 0) {
						alert(\'请勾选复选框\',2);
					} else {
						$.ajax({
							url: urlStr + getAllId_str + "&ccc=" + Math.random(),
							success: function(data) {															
									$(\'.topWarn\').html(\'操作成功！\');
									$(\'.topWarn\').fadeIn(400);
									setTimeout(function() {
										window.location.reload();
									}, 400)						
							}
						});
					}
				})
			}
			
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
			//复选框全选
			allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
			
			//添加速卖通帐号
			$(\'#addAccount\').click(function(){
				$(\'#accname\').removeAttr(\'disabled\');
				$(\'#accname\').val(\'\')
				$(\'#accountname\').val(\'\')
				$(\'#account\').show();
				$(\'#bind\').show();
				$(\'#next\').show();
				$(\'#wait\').hide();
				$(\'#over\').hide();
			});
			
			//关闭速卖通帐号
			$(\'#close\').click(function(){
				$(\'#account\').hide(); 
			});
			
			//判断输入			
			$(\'#next\').click(function(){
			var name=$(\'#accname\').val();
				if(name==\'\'){
					alert(\'账号名不能为空\',2);
				}else{
					$.ajax({
					url:\'?r=oms/shaliexpress/alicheck&name=\'+name,   
					type:\'get\',
					dataType:\'json\',
					cache : false,
					success:function(data){
						if(data.statu == 1){
							alert(\'您输入速卖通账号已经存在！\',2);
						}else{
							//window.open();
							$(\'#bind\').hide();
							$(\'#wait\').show();
							$(\'#next\').hide();
							$(\'#over\').hide();
						}				
					}
				});
					
				}
			});
			
			//点击登录  跳转页面时
			$(\'#wait\').click(function(){
				$(\'#bind\').hide();
				$(\'#wait\').hide();
				$(\'#next\').hide();
				$(\'#over\').show();
			})
			
			//点击完成时  
			$(\'#over\').click(function(){
				$(\'#account\').hide();
				window.location.reload();
			})
			
			//重新授权
			$(\'.againAccredit\').click(function(){
				var id = $(this).parents(\'tr\').attr(\'data-id\');
				$(\'#account\').show();
				$(\'#bind\').hide();
				$(\'#wait\').show();
				$(\'#next\').hide();
				$(\'#over\').hide();
				$.ajax({
					url:\'?r=oms/shaliexpress/receive&state=\'+id,   
					type:\'get\',
					dataType:\'json\',
					cache : false,
					success:function(data){				
					}
				});
				
			}); 
		});
		</script>
		'; ?>

	</body>

</html>