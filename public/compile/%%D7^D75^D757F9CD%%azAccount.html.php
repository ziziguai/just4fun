<?php /* Smarty version 2.6.28, created on 2015-02-06 07:43:46
         compiled from ck1sh/setting/azAccount.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ck1sh/setting/azAccount.html', 142, false),)), $this); ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>AZACCOUNT</title>
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

					<span>添加亚马逊账户</span>

					<b class="TCCloseBtn">关闭</b>

				</h2>
				<div class="addIdTCConBody">
					<p style="margin:0;height:30px;">
						<span>亚马逊账号名</span>
						<input type="text" class="userName" id="account_name"/>
						<input type="text" style="display:none" class="account_id" id="account_id"/>
						<b>*</b>
					</p>
					<p class='userNameJudge' style="height:20px;text-align:right;font-size:12px;margin:0;padding:0px 45px;"></p>
					<!--<p style="font-size:12px;color:green;">用户名可用</p>-->
					<p>
						<span>账号所属国家</span>
						
						<select style="width: 200px;" name="AmazonAccount_Country" id="Country">
							<option value="NULL">请选择</option>
							<option value="US">美国(United States)</option>
							<option value="CA">加拿大(Canada)</option>
							<option value="UK">英国(United Kingdom)</option>
							<option value="DE">德国(Germany)</option>
							<option value="ES">西班牙(Spain)</option>
							<option value="FR">法国(France)</option>
							<option value="IT">意大利(Italy)</option>
							<option value="IN">印度(India)</option>
							<option value="JP">日本(Japan)</option>
							<option value="CN">中国</option>
						</select>
						<b>*</b>
					</p>
					<p style="margin:0;height:30px;">
						<span>Seller ID</span>
						<input type="text" class="signa" id="SellerID"/>
						<b>*</b>
					</p>
					<p>
						<span>AWS Access Key ID</span>
						<input type="text" class="" id="AWSAccessKeyID"/>
						<b>*</b>
					</p>

					<p>
						<span>Secret Key</span>
						<input type="text" class="" id="SecretKey"/>
						<b>*</b>
					</p>
				</div>
				<div class="addIdTCFooter TCFooter">
					<span style="color:red;float:left;"></span>
					<input type="button" value="保存" class="btn btn-primary addIdBtn" id="addIdBtn"/>
					<input type="button" value="取消" class="btn TCCancelBtn "  id="TCCancelBtna"/>
				</div>
			</div>

		</div>

		<div class="wrap">
		<!--  	<p class="topNav"><a href="?">首页</a></p>-->
			<p class="topNav"><a href="?r=oms/shorder/normal&platform=101">返回上一级</a></p>
			<div class="tabHead">
				<ul>
					<li><a class="tabActive">亚马逊账号</a></li>
					</ul>
				<div class="tabHeadRight">
					<a href="?r=oms/shorder/normal&amp;platform=101" class="btn">返回</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBody1">
						<div class="tabBodyHead">
							<div class="sel">
								<div class="selRight">
									<a href="http://www.chukou1.com/doc/sellinghelper/GetBindingAccountInformation.pdf" target="_blank">如何增加Amazon账号？</a>
									<input type="button" value="添加Amazon账号" class="btn btn-primary addAZAccountIdBtn">
									<input type="button" value="启用账号" class="btn btn-warning startUser" id ="startUser">
									<input type="button" value="停用账号" class="btn btn-warning stopUser" id = "stopUser">
									<input type="button" value="删除" class="btn btn-warning deleteUser" id ="delUser">
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
										<th>国家</th>
										<th>账号名</th>
										<th>Seller ID</th>
										<th>状态</th>
										<th>绑定时间</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php if (( $this->_tpl_vars['data'] == null )): ?>
									<tr>
										<td colspan="13" align="center">无数据</td>
									</tr>
									<?php else: ?> <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
									<tr data-id="<?php echo $this->_tpl_vars['i']['account_id']; ?>
">
										<td>
											<input type="checkbox" />
										</td>
										<td class="country" id="country">

										  <?php echo $this->_tpl_vars['i']['Country']; ?>

										</td>
										<td class="userName" id="userName"><?php echo $this->_tpl_vars['i']['account_name']; ?>
</td>
										<td class="sellerId" id="sellerId"><?php echo $this->_tpl_vars['i']['SellerID']; ?>
</td>
										<?php if ($this->_tpl_vars['i']['status'] == 1): ?>
											<td class="state">已启用</td>
										<?php else: ?>
											<td class="state">已停用</td>
										<?php endif; ?>
										<td class="boundTime"><?php echo ((is_array($_tmp=$this->_tpl_vars['i']['CreateTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y/%m/%d') : smarty_modifier_date_format($_tmp, '%Y/%m/%d')); ?>
</td>
										<td class="azAccountEdit" id="azaccount"><a href="javascript:;">编辑</a>
										</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?> <?php endif; ?>
								</tbody>
							</table>
							<!--页数-->

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
				$(\'body\').attr(\'id\', \'azAccount\');
				//点击添加账户按钮 -弹窗y
				var onOff = 0;
				$(\'.addAZAccountIdBtn\').on(\'click\', function() {
					onOff = 1;
					$(\'.addAZAccountIdBtn\').show(0);
					$(".addIdTCConBody input").val(\'\');
					$(\'.userNameJudge\').html(\'\');
					$(\'.addIdTC\').slideDown(200);
				})
				
				//获取弹窗文本框里的值
                var	account_name = $("#account_name");
				var	Country = $("#Country");
                var	SellerID = $("#SellerID");
                var	AWSAccessKeyID = $("#AWSAccessKeyID");
                var	SecretKey = $("#SecretKey");
                //当用户名表单失去焦点的时候判断用户是否已被注册--start
                account_name.blur(function() {
						if (onOff) {
							var	account_name = $("#account_name").val();
							if (account_name) {
								$.ajax({
									url: "?r=oms/SHAz/AzCheck&account_name=" + account_name,
									success: function(data) {
										if (data.statu == 1) {
											$(\'.userNameJudge\').html(\'帐号名 已被注册，请重新输入！\');
											$(\'.userNameJudge\').css(\'color\', \'#F78B8B\');
											return;
										} else {
											$(\'.userNameJudge\').html(\'帐号名可用\');
											$(\'.userNameJudge\').css(\'color\', \'green\');
										}

									}
								})
							} else {
								$(\'.userNameJudge\').html(\'请输入帐号名\')
							}
						} else {
							return;
						}
					})
					//当用户名表单失去焦点的时候判断用户是否已被注册--end

				//点击保存添加 ---关闭弹窗
				TCClose($(\'.TCCloseBtn,.TCCancelBtn\'), $(\'#azAccount .addIdTC\'));
			
			
			//编辑
			//复选框全选
        		/*
				 * 处理火狐刷新bug
        		 */
            $(\'.tabBodyCon table :checkbox\').prop(\'checked\', false);
            
            allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));

			var thisEditId= 0;
			$(".azAccountEdit").on(\'click\',function(){
				$(\'.userNameJudge\').html(\'\');
				onOff=0;
				$(\'.addIdTC\').slideDown(200);				
				var thisEditId = $(this).parent().attr(\'data-id\');
				$.get("?r=oms/shaz/AzDetails&aid=" + thisEditId+"&ron="+Math.random(), function(data) {
                    $("#account_name").val(data.account_name);
                    $("#account_id").val(data.account_id);
                    $("#Country").val(data.Country);
                    $("#SellerID").val(data.SellerID);
                    $("#AWSAccessKeyID").val(data.AWSAccessKeyID);
                    $("#SecretKey").val(data.SecretKey);
				});
			})
			$("#addIdBtn").on(\'click\',function(){
				var	account_name = $("#account_name").val();
				var Country =$(\'#Country :selected\').attr(\'value\');
				if(Country == "NULL"){
					alert(\'请选择所属国家!\');
					return;
				}
                var	SellerID = $("#SellerID").val();
                var	AWSAccessKeyID = $("#AWSAccessKeyID").val();
                var	SecretKey = $("#SecretKey").val();
                var thisEditId = $("#account_id").val();
                
               	var result =\'\';
               	console.log(result);
				if(onOff<1){
					 result = {\'account_name\':account_name ,\'Country\':Country ,\'SellerID\':SellerID,\'AWSAccessKeyID\':AWSAccessKeyID,\'SecretKey\':SecretKey,\'type\':\'edit\',\'aid\':thisEditId};	
						 $.ajax({
						url: \'?r=oms/shaz/DealAzAccount\',
						type:\'post\',
						data:result,
						contentType:"application/x-www-form-urlencoded;charset=utf-8",
						success: function(data) {
							//判断用户名是否已被注册
								if (data.statu == 0) {
									$(\'.addIdTCFooter span\').html(\'抱歉，SellerID已被注册，请重新输入！\');
								} else {
									$(\'.addIdTCFooter span\').html(\'保存成功\');
									setTimeout(function() {
									window.location.reload();
									}, 400)
								}
	                		}
														
						}) 
					}else{
						//判断表单是否为空
						if (!account_name || !Country || !SellerID || !AWSAccessKeyID || !SecretKey) {
							$(\'.addIdTCFooter span\').html(\'请填写完整！\');
						} else {
							//ajax传值-start
							result = {\'account_name\':account_name ,\'Country\':Country ,\'SellerID\':SellerID,\'AWSAccessKeyID\':AWSAccessKeyID,\'SecretKey\':SecretKey,\'type\':\'add\',\'aid\':thisEditId};	
							$.ajax({
									url: \'?r=oms/shaz/DealAzAccount\',
									type:\'POST\',
									data:result,
									contentType:"application/x-www-form-urlencoded;charset=utf-8",
									success: function(data) {
										//判断用户名是否已被注册
										if (data.statu == 0) {
											$(\'.addIdTCFooter span\').html(\'抱歉，SellerID已被注册，请重新输入！\');
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
					
					
					}
				var	account_name = $("#account_name").val();
				var	Country = $(\'#Country :selected\').html();
                var	SellerID = $("#SellerID").val();
                var	AWSAccessKeyID = $("#AWSAccessKeyID").val();
                var	SecretKey = $("#SecretKey").val();
                var thisEditId = $("#account_id").val();
               
			})
			
			//启用账户
			azAjax($(\'#startUser\'), "?r=oms/shaz/UpdatesdAccount&type=enable&account_id=");
			//停用账户
			azAjax($(\'#stopUser\'), "?r=oms/shaz/UpdatesdAccount&type=disable&account_id=");
			//删除账户
			$("#delUser").on(\'click\',function(){
					var getAllId_str = getAllId($(\'.tabBodyCon tbody tr input[type=checkbox]:checked\'));
					result = {\'type\':\'del\',\'account_id\':getAllId_str}
					if (getAllId_str.length == 0) {
						alert(\'请勾选复选框\');
					} else {
						var aa = confirm(\'确定删除？\');
						if (aa == true){
							$.ajax({
								url:\'?r=oms/shaz/UpdatesdAccount\' ,
								data:result,
								success: function(data) {
									if (data == 0) {
										alert(\'操作失败\');
										window.location.reload();
									} else {
										$(\'.topWarn\').html(\'操作成功！\');
										$(\'.topWarn\').fadeIn(400);
										setTimeout(function() {
											window.location.reload();
										}, 400);
									}
								}
							});
						}
					}
			})
			function azAjax(obj, urlStr) {
				obj.on(\'click\', function() {
					var getAllId_str = getAllId($(\'.tabBodyCon tbody tr input[type=checkbox]:checked\'));
					if (getAllId_str.length == 0) {
						alert(\'请勾选复选框\');
					} else {
						$.ajax({
							url: urlStr + getAllId_str +"&ron="+Math.random(),
							success: function(data) {
								if (data == 0) {
									alert(\'操作失败\');
									window.location.reload();
								} else {
									$(\'.topWarn\').html(\'操作成功！\');
									$(\'.topWarn\').fadeIn(400);
									setTimeout(function() {
										window.location.reload();
									}, 400);
								}
							}
						});
					}
				})
			}
			
			//关闭弹窗-并清除表单内容   有点问题
			$(".TCCloseBtn,#TCCancelBtna").on(\'click\', function(){
				$(".addIdTCConBody input").val(\'\');
				$(\'.addIdTCFooter span,.userNameJudge\').text(\'\');
				$(\'#Country option\').eq(0).attr(\'selected\',\'selected\');				
			})
		})	
		</script>
		'; ?>

	</body>
</html>