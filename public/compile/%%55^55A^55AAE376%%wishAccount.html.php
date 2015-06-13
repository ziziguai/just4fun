<?php /* Smarty version 2.6.28, created on 2015-01-21 02:24:11
         compiled from ck1sh/wishAccount.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />

	</head>

	<body client_no = <?php echo $this->_tpl_vars['account']['client_no']; ?>
>
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<!--添加账户弹-->
		<div class="addAccountTC TCGB">
			<div class="addIdTCCon TCCON">
				<h2>

					<span>添加账户</span>

					<b class="TCCloseBtn">关闭</b>

				</h2>
				<div class="addIdTCConBody">
					<p>
						<!--style="margin:0;height:30px;"-->
						<span>客户名称：</span>
						<input type="text" disabled class="userName" value="" />
					</p>
					<p style="margin:0;">
						<span>商户ID</span>
						<input type="text" class="userId"  style="margin:0;"/>
						<b>*</b>
					</p>
					<p class='userNameJudge' style="height:20px;text-align:right;font-size:12px;margin:0;margin-right:50px;padding:0px 45px;"></p>
					<p>
						<span>商户名称</span>
						<input type="text" class="soGoName" />
						<b>*</b>
					</p>
					<p>
						<span>商户联系人</span>
						<input type="text" class="soGoContact" />
					</p>
					<p>
						<span>账户邮箱</span>
						<input type="text" class="eMail" />
					</p>
					<p>
						<span>账户手机</span>
						<input type="text" class="phone" />
					</p>

					<p>
						<span>是否启用</span>
						<label>
							<input type="radio" name="start" class='yes' radioType='1' checked/><b>是</b>
						</label>
						<label>
							<input type="radio" name="start" class='no' radioType='0'/><b>否</b>
						</label>
					</p>
				</div>
				<div class="addIdTCFooter TCFooter">
					<span style="color:red;float:left;"></span>
					<input type="button" value="添加" class="btn btn-primary addIdBtn" id= "addId"/>
					<input type="button" value="保存" class="btn btn-primary saveIdBtn" id ="saveId" style='display:none;'/>
					<input type="button" value="取消" class="btn TCCancelBtn" id = 'cancelId'/>
				</div>
			</div>
		</div>
		<div class="wrap">
				<div class="tabHead">
					<ul>
					<li><a class="tabActive">Wish账号</a></li>
				</ul>
				<div class="tabHeadRight">
					<a href="?r=oms/shorder/normal&amp;platform=104" class="btn">返回</a>
				</div>
				<div class="clear"></div>
				</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="sel">
								<div class="selLeft" style="width:100%">
									<!--基本参数设置--start-->

								</div>
								<div class="selRight">
									<a href="?r=oms/shorder/normal&platform=104">返回上一级</a>
									<input type="button" value="添加账号" class="btn btn-primary wishAddUser">
									<input type="button" value="启用账号" class="btn btn-warning" id ="startUser">
									<input type="button" value="停用账号" class="btn btn-warning" id = "stopUser">
									<input type="button" value="删除" class="btn btn-warning" id ="delUser">

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
										<th>商户ID</th>
										<th>商户名称</th>
										<th>商户联系人</th>
										<th>客户编号</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php if (( $this->_tpl_vars['account']['data'] == null )): ?>	
										<tr>
						                   <td colspan="7" align="center">无数据</td> 
						                </tr>
									<?php else: ?>								
										<?php $_from = $this->_tpl_vars['account']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
											<tr data-id='<?php echo $this->_tpl_vars['i']['account_id']; ?>
'>
												<td>
													<input type="checkbox" />
												</td>
												<td class="merchant_id"><?php echo $this->_tpl_vars['i']['merchant_id']; ?>
</td>
												<td class="shop_name"><?php echo $this->_tpl_vars['i']['shop_name']; ?>
</td>
												<td class="shop_keeper"><?php echo $this->_tpl_vars['i']['shop_keeper']; ?>
</td>
												<td class="client_no"><?php echo $this->_tpl_vars['i']['client_no']; ?>
</td>
												<td class="account_statusBox">
												 	<span class="account_status"><?php echo $this->_tpl_vars['i']['account_status']; ?>
</span>
													<span style="display:none" class="phone"><?php echo $this->_tpl_vars['i']['phone']; ?>
</span>
													<span style="display:none" class="email"><?php echo $this->_tpl_vars['i']['email']; ?>
</span>
													<span style="display:none" class ="account_id"><?php echo $this->_tpl_vars['i']['account_id']; ?>
</span>
												</td>
												<td class="accountIdEdit"><a href="javascript:;">编辑</a>
												</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>
								</tbody>
							</table>

							<!--分页页数-->
							<div class="pagination pagination-right">
								<?php echo $this->_tpl_vars['account']['pageinfo']['html']; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
		<?php echo '
		<script>
		$(function() {
			$(\'body\').attr(\'id\', \'wishAccount\');
			var addEditNum=0;
			//新增帐号弹出帐号窗口
			$(\'.wishAddUser\').on(\'click\', function() {
				addEditNum = 1;
				$(\'.addAccountTC\').slideDown(200);
				var client_no = $(\'body\').attr(\'client_no\');
				$(\'.addIdTCCon .userName\').val(client_no);
					if(addEditNum){
					$(\'.addIdBtn\').show(0);
					$(\'.saveIdBtn\').hide(0);
				}
			})
			TCClose($(\'.addAccountTC .TCCloseBtn,.addAccountTC .TCCancelBtn\'), $(\'.addAccountTC\'));
			allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
			
			//获取弹窗里边表单
			var user_Id  = $(\'.addIdTCCon .userId\');//商户
			var soGoName =$(\'.addIdTCCon .soGoName\');
			var soGoContact =$(\'.addIdTCCon .soGoContact\');
			var userName = $(\'.addIdTCCon .userName\');//客户
			var eMail = $(\'.addIdTCCon .eMail\');
			var phone = $(\'.addIdTCCon .phone\');
			var thisEditId = 0;//帐号ID
			
			//当用户名表单失去焦点的时候判断用户是否已被注册--start
			user_Id.blur(function() {
					if (addEditNum) {
						var userIdVal = user_Id.val();
						if (userIdVal) {
							$.ajax({
								\'url\': "?r=oms/shwish/AccountCheck",
								\'type\':\'get\',
								\'data\':{\'userId\':userIdVal},
								success: function(data) {
									var jsonData = JSON.parse(data);
									if(jsonData != null && jsonData instanceof Object){
										if (jsonData.statu == 1) {
											$(\'.userNameJudge\').html(\'用户名已被注册，请重新输入！\');
											$(\'.userNameJudge\').css(\'color\', \'#F78B8B\');
										} else if(jsonData.statu == 0) {
											$(\'.userNameJudge\').html(\'用户名可用\');
											$(\'.userNameJudge\').css(\'color\', \'green\');
										}
									}else{
										showTips(\'error\',\'返回数据为空！！！\');
									}
								}
							});
						} else{
							$(\'.userNameJudge\').html(\'请输入用户名\')
						}
					}
				 else {
						return;
					}
				})
				//当用户名表单失去焦点的时候判断用户是否已被注册--end
				
			//点击添加按钮--start
			$(document).ready(function(){
				$(\'#addId\').bind(\'click\',insert);
			});
			function insert(){
				var userIdVal = user_Id.val();//商户
				var shopNameVal = soGoName.val();
				var shopKeeperVal = soGoContact.val();
				var clientNoVal = userName.val();//客户
				var emailVal = eMail.val();
				var phoneVal = phone.val();
				var radioType=$(\'.addIdTCCon input[type="radio"]:checked\').attr(\'radioType\');
				if (radioType != 1)
					radioType = 0;
				
					//判断表单是否为空
					if (!userIdVal || !shopNameVal) {
						$(\'.addIdTCFooter span\').html(\'请填写完整！\');
					} else {
						
						//ajax传值-start					
						var result = {\'merchant_id\':userIdVal,\'shopName\':shopNameVal,\'shopKeeper\':shopKeeperVal,\'client_no\':clientNoVal,\'email\':emailVal,\'phone\':phoneVal,\'radio\':radioType,\'type\':\'add\'};
						$.ajax({
								url: "?r=oms/Shwish/DealWishAccount",
								type:\'post\',
								data:result,
								success: function(data) {
									if(data != null && data instanceof Object){
									//判断用户名是否已被注册
										if (data.statu == 0) {
											$(\'.addIdTCFooter span\').html(\'抱歉，用户名已被注册，请重新输入！\');
										} else {
											showTips(\'success\',\'添加成功\');
											setTimeout(function() {
												window.location.reload();
											}, 400)
										}
									}else{
										showTips(\'error\',\'返回数据为空！！！\');
									}
								}
							});
						}
							//ajax传值-end
					}
				//点击添加按钮--end
			
			//删除账户
			wishUpdateAjax($(\'#delUser\'), "?r=oms/shwish/UpdateAccount&type=del&account_id=");
			//启用账户
			wishUpdateAjax($(\'#startUser\'), "?r=oms/shwish/UpdateAccount&type=enable&account_id=");
			//停用账户
			wishUpdateAjax($(\'#stopUser\'), "?r=oms/shwish/UpdateAccount&type=disable&account_id=");
			function wishUpdateAjax(obj, urlStr) {
				obj.on(\'click\', function() {
					var getAllId_str = getAllId($(\'.tabBodyCon tbody tr input[type=checkbox]:checked\'));
					if (getAllId_str.length == 0) {
						showTips(\'info\',\'未选择账号记录！\');
					} else {
						$.ajax({
							url: urlStr + getAllId_str + "&ccc=" + Math.random(),
							success: function(data) {
								if (data == 0) {
									showTips(\'error\',\'操作失败！\');
									window.location.reload();
								} else {
									$(\'.topWarn\').html(\'操作成功！\');
									$(\'.topWarn\').fadeIn(400);
									setTimeout(function() {
										window.location.reload();
									}, 400)
								}
							}
						});
					}
				})
			}				
			
			//编辑wish账号--弹窗--start
			//当前Id
			$(\'.accountIdEdit\').on(\'click\', function() {
				addEditNum = 0;
				$(\'.addAccountTC h2 span\').html(\'编辑账号\');
				$(\'.addAccountTC\').show(0);
				var merchant_id = $(this).siblings().filter(\'.merchant_id\').html();
				var shop_name = $(this).siblings().filter(\'.shop_name\').html();
				var shop_keeper = $(this).siblings().filter(\'.shop_keeper\').html();
				var client_no = $(this).siblings().filter(\'.client_no\').html();
				var account_status = $(this).siblings().filter(\'.account_statusBox\').find(\'.account_status\').text();
				var email = $(this).siblings().filter(\'.account_statusBox\').find(\'.email\').text();
				var phone = $(this).siblings().filter(\'.account_statusBox\').find(\'.phone\').text();
				ThisEditId =$(this).siblings().filter(\'.account_statusBox\').find(\'.account_id\').text();
				if(addEditNum==0){
					$(\'.addIdTCCon .userId\').val(merchant_id);
					$(\'.addIdTCCon .soGoName\').val(shop_name);
					$(\'.addIdTCCon .soGoContact\').val(shop_keeper);
					$(\'.addIdTCCon .userName\').val(client_no);
					$(\'.addIdTCCon .eMail\').val(email);
					$(\'.addIdTCCon .phone\').val(phone);					
					if(!addEditNum){
						$(\'.saveIdBtn\').show(0);
						$(\'.addIdBtn\').hide(0);
					}					
					if (account_status ==\'已启用\'){
						$(\'.yes\').prop(\'checked\', true);	
					} else {
						$(\'.no\').prop(\'checked\', true);	
					}
				}	
			})
			//编辑wish账号--弹窗--end
				
			//点击保存按钮--start
			$(document).ready(function(){
				$(\'#saveId\').bind(\'click\',save);
			});
			function save(){
				var userIdVal = user_Id.val();//商户
				var shopNameVal = soGoName.val();
				var shopKeeperVal = soGoContact.val();
				var clientNoVal = userName.val();//客户
				var emailVal = eMail.val();
				var phoneVal = phone.val();
				var radioType=$(\'.addIdTCCon input[type="radio"]:checked\').attr(\'radioType\');
				
				if (radioType != 1)
					radioType = 0;
					//判断表单是否为空
					if (!userIdVal || !shopNameVal) {
						$(\'.addIdTCFooter span\').html(\'请填写完整！\');
					} else {
						//ajax传值-start
						var result = {\'merchant_id\':userIdVal,\'shopName\':shopNameVal,\'shopKeeper\':shopKeeperVal,\'client_no\':clientNoVal,\'email\':emailVal,\'phone\':phoneVal,\'radio\':radioType,\'type\':\'edit\',\'account_id\':ThisEditId};
						$.ajax({
								url: "?r=oms/Shwish/DealWishAccount",
								type:\'post\',
								data:result,
								success: function(data) {
									if(data != null && data instanceof Object){
									//判断用户名是否已被注册
										if (data.statu == 0) {
											$(\'.addIdTCFooter span\').html(\'抱歉，用户名已被注册，请重新输入！\');
										} else {
											$(\'.addIdTCFooter span\').html(\'保存成功\');
											setTimeout(function() {
												window.location.reload();
											}, 400)
										}
									}else{
										showTips(\'error\',\'返回数据为空！！！\');
									}
						}
							});
						}

				}
			//点击保存按钮--end

			//关闭弹窗-并清除表单内容
			$(\'.TCCloseBtn,.TCCancelBtn\').on(\'click\', function() {
				$(\'.addIdTCCon input[type=text]\').val(\'\');
				$(\'.addIdTCFooter span,.addIdTCConBody .userNameJudge\').text(\'\');
				
			})
			
		})		
			</script>
		'; ?>

	</body>
</html>