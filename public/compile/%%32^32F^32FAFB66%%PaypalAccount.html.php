<?php /* Smarty version 2.6.28, created on 2014-12-05 10:08:54
         compiled from ck1sh/PaypalAccount.html */ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css" />

	</head>

	<body>
		<!--顶部警告框-->
		<div class="topWarn"></div>
		<!--添加Paypal账号弹窗-->
		<div class="addIdTC TCGB">
			<div class="addIdTCCon TCCON">
				<h2>
					<span>添加Paypal账户</span>
					<b class="TCCloseBtn">关闭</b>
				</h2>
				<div class="addIdTCConBody">
					<p style="margin:0;height:30px;">
						<span>API Username</span>
						<input type="text" class="userName" />
						<b>*</b>
					</p>
					<p class='userNameJudge' style="height:20px;text-align:right;font-size:12px;margin:0;padding:0px 45px;"></p>
					<!--<p style="font-size:12px;color:green;">用户名可用</p>-->
					<p>
						<span>API Password</span>
						<input type="text" class="pass" />
						<b>*</b>
					</p>
					<p>
						<span>API Signature</span>
						<input type="text" class="signa" />
						<b>*</b>
					</p>
				</div>
				<div class="addIdTCFooter TCFooter">
					<span style="color:red;float:left;"></span>
					<input type="button" value="添加" class="btn btn-primary addIdBtn" />
					<input type="button" value="保存" class="btn btn-primary saveBtn" />
					<input type="button" value="取消" class="btn TCCancelBtn" />
				</div>
			</div>
		</div>

		<div class="wrap">
			<p class="topNav"><a href="#">首页</a>></p>
			<div class="tabHead">
				<ul>
					
					<li><a href="?r=oms/SHEbay/eBayAccount">eBay账号</a>
					</li>
					<li><a href="?r=oms/SHPaypal/PaypalAccount" class="tabActive">Paypal账号</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="sel">
								<div class="selRight">
									<a href="http://paypal.ebay.cn/integrationcenter/list__resource_8.html" target="_blank">如何获取Paypal账号？</a>
									<input type="button" value="添加Paypal账号" class="btn btn-primary addpaypalIdBtn">
									<input type="button" value="启用账号" class="btn btn-warning startUser">
									<input type="button" value="停用账号" class="btn btn-warning stopUser">
									<input type="button" value="删除" class="btn btn-warning deleteUser">
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
										<th>APIUsername</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php if (( $this->_tpl_vars['account'] == null )): ?>
									<tr>
										<td colspan="13" align="center">无数据</td>
									</tr>
									<?php else: ?> <?php $_from = $this->_tpl_vars['account']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['i']):
?>
									<tr data-id="<?php echo $this->_tpl_vars['i']['paypal_id']; ?>
">
										<td>
											<input type="checkbox" />
										</td>
										<td class="userNameText"><?php echo $this->_tpl_vars['i']['Api_UserName']; ?>
</td>
										<?php if ($this->_tpl_vars['i']['Statu'] == 2): ?>
										<td>已停用</td>
										<?php else: ?>
										<td>已启用</td>
										<?php endif; ?>
										<td class="paypalIdEdit"><a href="javascript:;">编辑</a>
										</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
								</tbody>
							</table>
							<!--页数-->
							<div class="pagination pagination-right">
								<!--<div class="group" style="float: left;">
									<input type="button" class="btn" id="btnDeleteOrders" value="删除">
								</div>-->
								<ul id="Pager1">
									<li class="disabled"><a>首页</a>
									</li>
									<li class="disabled"><a>&lt;&lt;</a>
									</li>
									<li class="active"><a>1</a>
									</li>
									<li><a href="?Page=2&amp;psize=15">2</a>
									</li>
									<li><a href="?Page=3&amp;psize=15">3</a>
									</li>
									<li><a href="?Page=4&amp;psize=15">4</a>
									</li>
									<li><a href="?Page=5&amp;psize=15">5</a>
									</li>
									<li><a href="?Page=6&amp;psize=15">...</a>
									</li>
									<li><a href="?Page=2&amp;psize=15">&gt;&gt;</a>
									</li>
									<li><a href="?Page=68&amp;psize=15">尾页</a>
									</li>
									<li class="select-size">每页
										<select onchange="location.href=location.href + (location.href.indexOf('?') != -1 ? '&amp;' : '?') + 'psize=' + this.value">
											<option selected="selected" value="15">15</option>
											<option value="30">30</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="150">150</option>
											<option value="200">200</option>
											<option value="500">500</option>
										</select>
										条，共
										<strong>68</strong> 页
										<strong>1015</strong> 条
									</li>
								</ul>
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
				$(\'body\').attr(\'id\', \'PaypalAccount\');
				var addEditNum = 0;

				//弹窗--添加paypal账号按钮
				$(\'.addpaypalIdBtn\').on(\'click\', function() {
					$(\'.addIdTC h2 span\').html(\'添加账号\');
					$(\'.saveBtn\').hide(0);
					$(\'.addIdBtn\').show(0);
					$(\'.addIdTC\').show(0);
					addEditNum = 1;
				})

				//获取弹窗里边表单
				var userName = $(\'.addIdTCConBody .userName\');
				var pass = $(\'.addIdTCConBody .pass\');
				var signa = $(\'.addIdTCConBody .signa\');
				var hint = $(\'.addIdTCFooter span\');

				//当用户名表单失去焦点的时候判断用户是否已被注册--start
				userName.blur(function() {
						if (addEditNum) {
							var userNameVal = userName.val();
							if (userNameVal) {
								$.ajax({
									url: "?r=oms/SHPaypal/PaypalCheck&apiName=" + userNameVal,
									success: function(data) {
										var jsonData = JSON.parse(data);
										if (jsonData.statu == 1) {
											$(\'.userNameJudge\').html(\'用户名已被注册，请重新输入！\');
											$(\'.userNameJudge\').css(\'color\', \'#F78B8B\');
										} else {
											$(\'.userNameJudge\').html(\'用户名可用\');
											$(\'.userNameJudge\').css(\'color\', \'green\');
										}

									}
								})
							} else {
								$(\'.userNameJudge\').html(\'请输入用户名\')
							}
						} else {
							return;
						}
					})
					//当用户名表单失去焦点的时候判断用户是否已被注册--end


				//点击添加按钮--start
				$(\'.addIdBtn\').on(\'click\', function() {
						var userNameVal = userName.val();
						var apiPwdVal = pass.val();
						var signaVal = signa.val();

						//判断表单是否为空
						if (!userNameVal || !apiPwdVal || !signaVal) {
							$(\'.addIdTCFooter span\').html(\'请填写完整！\');
						} else {
							//ajax传值-start
							$.ajax({
									url: "?r=oms/SHPaypal/dealPaypalAccount&apiName=" + userNameVal + "&apiPwd=" + apiPwdVal + "&sign=" + signaVal + "&type=add",
									success: function(data) {
										var jsonData = JSON.parse(data);
										//判断用户名是否已被注册
										if (jsonData.statu == 0) {
											$(\'.addIdTCFooter span\').html(\'抱歉，用户名已被注册，请重新输入！\');
										} else {
											$(\'.addIdTCFooter span\').html(\'添加成功\');
											setTimeout(function() {
												window.location.reload();
											}, 400)
										}
									}

								})
								//ajax传值-end
						}
					})
					//点击添加按钮--end

				//删除账户
				eBaySSDAjax($(\'.deleteUser\'), "?r=oms/SHPaypal/UpdatePaypal&type=del&aid=");
				//启用账户
				eBaySSDAjax($(\'.startUser\'), "?r=oms/SHPaypal/UpdatePaypal&type=enable&aid=");
				//停用账户
				eBaySSDAjax($(\'.stopUser\'), "?r=oms/SHPaypal/UpdatePaypal&type=notenable&aid=");


				//编辑paypal账号--弹窗--start
				//当前Id
				var thisEditId = 0;
				$(\'.paypalIdEdit\').on(\'click\', function() {
						addEditNum = 0;
						var userNameText = $(this).siblings().filter(\'.userNameText\').html();
						thisEditId = $(this).parent().attr(\'data-id\');
						$(\'.addIdTCCon .userName\').val(userNameText);
						$(\'.addIdTC h2 span\').html(\'编辑账号\');
						$(\'.addIdBtn\').hide(0);
						$(\'.addIdTC\').show(0);
						$(\'.saveBtn\').show(0);

					})
					//编辑paypal账号--弹窗--end

				//保存编辑账户--start
				$(\'.addIdTC .saveBtn\').on(\'click\', function() {
						var userNameVal = userName.val();
						var apiPwdVal = pass.val();
						var signaVal = signa.val();
						//判断表单是否为空
						if (!userNameVal || !apiPwdVal || !signaVal) {
							$(\'.addIdTCFooter span\').html(\'请填写完整！\');
						} else {
							//ajax传值-start
							$.ajax({
									url: "?r=oms/SHPaypal/dealPaypalAccount&apiName=" + userNameVal + "&apiPwd=" + apiPwdVal + "&sign=" + signaVal + "&type=edit&aid=" + thisEditId,
									success: function(data) {
										var jsonData = JSON.parse(data);
										//判断用户名是否已被注册
										if (jsonData.statu == 0) {
											$(\'.addIdTCFooter span\').html(\'抱歉，用户名已被注册，请重新输入！\');
										} else {
											$(\'.addIdTCFooter span\').html(\'保存成功\');
											setTimeout(function() {
												window.location.reload();
											}, 400)
										}
									}
								})
								//ajax传值-end
						}
					})
					//保存编辑账户--end


				//复选框全选
				allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));

				//关闭弹窗-并清除表单内容
				$(\'.TCCloseBtn,.TCCancelBtn\').on(\'click\', function() {
					$(\'.addIdTC\').hide(0);
					userName.val(\'\');
					pass.val(\'\');
					signa.val(\'\');
					hint.html(\'\');
					$(\'.userNameJudge\').html(\'\');
				})
			})
		</script>
		'; ?>

	</body>

</html>