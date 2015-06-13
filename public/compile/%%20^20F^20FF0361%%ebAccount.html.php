<?php /* Smarty version 2.6.28, created on 2015-02-04 07:28:20
         compiled from ck1sh/setting/ebAccount.html */ ?>
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
		<!--添加eBay账号弹窗--start-->
			<div class="addEbayTCGB TCGB" id="account" style="display:none;">
				<div class="TCCON addEbayTCCon">
					<h2>
					<span>添加eBay账户</span> 
					<b class="TCCloseBtn" id="close">关闭</b>
				</h2>
				<div class="addEbayTCConBody">
					<div class="addIdFirst"  style="display:none;" id="bind" >
					<p>第一步：请输入您需要绑定的账号名和别名</p>
					<p><span>Ebay账号</span><input type="text" name="name" class="userName" id="accname" value = ""/><span id = "aname" style ="padding-left:5px; color:red; display:none">请输入Ebay帐号</span></p>
					<p><span>别&nbsp;&nbsp;&nbsp;&nbsp;名</span><input type="text" name="secondname" class="userName" id="accountname" value = "<?php echo $this->_tpl_vars['secondname']; ?>
"/><span id = "sname" style ="padding-left:5px; color:red; display:none">请输入Ebay别名</span>
					<input type="hidden" name="sessId" class="session" id="sessionid" value = ""/></p>
					</div>
					<div class="addIdThird" id="wait" >
					<p>第二步：授权等待中(请勿关闭当前窗口)</p>	
					<p><a href="#" class="btn btn-primary" name="time" style="cursor:default" id="twait"/>等待时间：<span class="countDown">10</span></a><a class="btn btn-primary" style="cursor:default;margin-left:20px;" id="empower"/>请重新授权</a></p>
					</div>
					<!--<div class="addIdFourth" style="display: none;">
					<p>第三步：请完成授权--(请勿关闭当前窗口)</p>
					<p><a class="btn btn-primary" />完成</a></p>
					</div>-->
				</div>
				<div class="addIdTCFooter TCFooter" id="xia" >
					<span style="color:red;float:left;"></span>
					<input type="button" value="下一步" class="btn btn-primary addIdBtn" id="next" />
				</div>
				</div>
			</div>
		<!--添加eBay账号弹窗--end-->
		<div class="wrap">
			<p class="topNav"><a href="?">首页</a></p>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/shebay/eBayAccount" class="tabActive">eBay账号</a></li>
					<li><a href="?r=oms/shpaypal/PaypalAccount">Paypal账号</a></li>
				</ul>
				<div class="tabHeadRight">
					<a href='?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
' class='btn'>返回</a>
				</div>
				<div class='clear'></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="sel">
								<div class="selRight">
									<input type="button" value="添加eBay账号" class="btn btn-primary" id = "addAccount">
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
										<th>账号</th>
										<th>账号代号</th>
										<th>状态</th>
										<th>创建时间</th>
										<th>重新授权</th>
									</tr>
								</thead>
								<tbody>
									<?php if (( $this->_tpl_vars['accountArray'] == null )): ?>
									<tr>
										<td colspan="13" align="center">无数据</td>
									</tr>
									<?php else: ?> 
									<?php $_from = $this->_tpl_vars['accountArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['i']):
        $this->_foreach['foo']['iteration']++;
?>
									<tr data-id="<?php echo $this->_tpl_vars['i']['account_id']; ?>
" >
										<td>
											<input type="checkbox" />
										</td>
										<td name="account"><?php echo $this->_tpl_vars['i']['account']; ?>
</td>
										<td name="nick_name"><?php echo $this->_tpl_vars['i']['nick_name']; ?>
</td>
										<?php if ($this->_tpl_vars['i']['status'] == 2): ?>
										<td>已停用</td>
										<?php else: ?>
										<td>已启用</td>
										<?php endif; ?>
										<td><?php echo $this->_tpl_vars['i']['created_time']; ?>
</td>
										<td><a href="##" name="grant">重新授权</a></td>
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
		$(function(){
			$.ajaxSetup({
				contentType: "application/x-www-form-urlencoded; charset=utf-8"
			});
			eBaySSDAjax($(\'#startAccount\'),\'?r=oms/shebay/UpdateEbay&type=enable&aid=\');
			eBaySSDAjax($(\'#stopAccount\'),\'?r=oms/shebay/UpdateEbay&type=notenable&aid=\');
			$(\'body\').attr(\'id\',\'eBayAccount\');
			//复选框全选
			allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
			//显示添加Ebay帐号
			$(\'#addAccount\').click(function(){
				$(\'#accname\').removeAttr(\'disabled\');
				$(\'#accname\').val(\'\')
				$(\'#accountname\').val(\'\')
				$(\'#account\').show();
				$(\'#bind\').show();
				$(\'#next\').show();
				$(\'#wait\').hide();
			})
			
			//删除账户
			$("#delAccount").on(\'click\',function(){
					
					var getAllId_str = getAllId($(\'.tabBodyCon tbody tr input[type=checkbox]:checked\'));
					if (getAllId_str.length == 0) {
						alert(\'请勾选复选框\');
					} else {
						var aa = confirm(\'确定删除？\');
						if (aa == true){
							$.ajax({
								url: \'?r=oms/shebay/UpdateEbay&type=del&aid=\' + getAllId_str + \'&cc=\' + Math.random(),
								success: function(data) {
									if(data){
										var jsonData = JSON.parse(data);
										if (data == 0) {
											alert(\'操作失败\');
											window.location.reload();
										} else {
											$(\'.topWarn\').html(\'操作成功！\');
											$(\'.topWarn\').fadeIn(400);
											setTimeout(function() {
												window.location.reload();
											}, 400)
										}
									}
								}
							});
						}
					}
			})
			
			//关闭Ebay帐号
			$(\'#close\').click(function(){
				$(\'#account\').hide(); 
			})
			
			//跳转到授权页面
			$(\'#empower\').click(function(){
				$(\'#bind\').show();
				$(\'#wait\').hide();
				$(\'#next\').show();
			})
			
			$(\'#next\').click(function(){
			})
			
			$(\'#accname\').val(\'\');
			$(\'#accountname\').val(\'\');
			$(\'#sessionid\').val(\'\');
			//判断输入
			var DownTime=10;
			$(\'#next\').click(function(){
			var name=$(\'#accname\').val();
			var namee=$(\'#accountname\').val();
			if(name==\'\' && namee==\'\' ){
				$(\'#aname\').show();
				$(\'#sname\').show();
				return false;
			}else{
				$(\'#aname\').hide();
				$(\'#sname\').hide();
			}
			if(name==\'\'){
				$(\'#aname\').show();
				return false;
			}else{
				$(\'#aname\').hide();
			}
			if(namee ==\'\'){
				$(\'#sname\').show();
				return false;
			}else{
				$(\'#sname\').hide();
			}
				$.ajax({
					url:\'?r=oms/shebay/AcquireEbay\',   //?r=auth/shebay/AcquireEbay
					type:\'post\',
					data:{\'name\':$(\'#accname\').val(),\'secondname\':$(\'#accountname\').val(),\'disabled\':$(\'#accname\').attr(\'disabled\')},
					success:function(data){
						var disabled = $(\'#accname\').attr(\'disabled\');
						if(disabled){
							window.open(data.url);
							$(\'#sessionid\').val(data.session);
							$(\'#accname\').val(data.name);
							$(\'#bind\').hide();
							$(\'#wait\').show();
							$(\'#next\').hide();
						}else{
							if(data.result == 1){
								alert(\'用户名已存在，请重新输入\');
								return false;
							}else{
								window.open(data.url);
								$(\'#sessionid\').val(data.session);
								$(\'#accname\').val(data.name);
								$(\'#bind\').hide();
								$(\'#wait\').show();
								$(\'#next\').hide();
						}
					}
				}
			});
					
					//授权等待倒记时
					
					var countDownFn=setInterval(function(){
						DownTime--;
						if(DownTime === 0){
							$("[name=time]a").html("授权成功");
						}
						$(\'.addEbayTCCon .countDown\').text(DownTime);
						if(!DownTime){
							clearInterval(countDownFn);
							$(\'.addEbayTCCon .countDown\').hide();
							
						}
						
					},1000)
				
			})
			
			$(\'#twait\').click(function(){
				if(DownTime) return;
				var accname = $(\'#accname\').val();
				var accountname = $(\'#accountname\').val();
				var sessionid = $(\'#sessionid\').val();
				var datar ={"name":accname, "secondname":accountname,
						"sessId":sessionid};
				$.ajax({
					url:\'?r=oms/Shebay/AcquireToken\',
                    type:"post",
					data:datar,
					success:function(data){
						if(data.result == \'返回失败\'){
							showTips(\'error\',\'授权失败，请重新授权\');
						}else{
							showTips(\'success\',\'授权成功\');
							window.location.reload()
						}
						$("#account").hide();
					}
				})
			})
			
			$(\'a[name=grant]\').on(\'click\',function(){
				var str_account=$(this).parent().parent().find("td[name=account]").text();
				var nick=$(this).parent().parent().find("td[name=nick_name]").text();
				$("#accname").val(str_account);
				$("#accountname").val(nick);
				$(\'#next\').show();
				$(\'#account\').show();
				$(\'#accname\').attr(\'disabled\',\'disabled\');
				$(\'#bind\').show();
				$(\'#wait\').hide();
			})
		})
		</script>
		'; ?>

	</body>
</html>