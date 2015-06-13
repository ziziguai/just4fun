<?php /* Smarty version 2.6.28, created on 2015-04-07 05:27:50
         compiled from ck1sh/setting/eb_account.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap-extension.css?_201504021350" />
		<link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/index.css?_201503311835" />
	</head>
	<body>
		<!--添加eBay账号弹窗 start-->
		<div class="modal TCCONBorTop hide fade" style="width: 550px;" id="ebayAccountEditModal">
			<div class="modal-header">
				<a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
				<h4>添加eBay账号</h4>
			</div>
			<div class="modal-body">
				<div name="ebayEditStep1">
			        <div class="bordered rounded" style="border: 1px solid #cccccc; background-color: #fafafa; border-radius: 5px;">
			            <form action="javascript:;" style="width: 220px; margin: auto;">
			                <div class="control-group">
				                <h5>您的eBay账户代码:</h5>
			                    <div class="control">
				                    <input name="nickNameInput" class="span3" type="text" placeholder="不多于5个大写字母" />
			                        <span class="text-error" name="nickNameTips"></span>
				                    <input name="sessIDInput" type="hidden" value="" />
			                    </div>
			                    <a class="btn btn-block btn-middle btn-primary" name="getAuthUrlBtn" href="javascript:;">登录 eBay 授权</a>
			                </div>
			            </form>
			        </div>
					<div class="dashed-box">
			            <h6>注意:</h6>
			            <ol style="1">
			                <li>我们不会要求您提供您的eBay密码;</li>
			                <li>帐户代码,由于多个eBay帐号间会存在重复的订单编号(SRN),因此系统的订单编号统一采用eBay帐号代码+SRN的方式进行管理。</li>
			                <li>例如,帐号代码为AB,SRN为1088的订单,系统中将显示为AB-1088。</li>
			            </ol>
			        </div>
				</div>
				<div name="ebayEditStep2" class="hide">
				    <div class="alert alert-info">
			            如果浏览器没有自动打开eBay登陆验证页面,请
			            <a href="javascript:;" target="_blank" name="authUrlLink">【点这里】</a>打开。
			        </div>
					<div class="bordered rounded" style="border: 1px solid #cccccc; background-color: #fafafa; border-radius: 5px;">
			            <form action="javascript:;" style="width: 300px; margin: auto;">
			                <div class="control-group">
			                    <h5>请确保完成eBay帐户登录授权操作！</h5>
			                    <a class="btn btn-middle btn-primary" href="javascript:;" style="width: 100px;" name="finishAuthBtn">完成授权</a>
			                    <a class="btn btn-middle" href="http://ocsnext.ebay.com/ocs/home" style="width: 100px;">遇到问题</a>
			                </div>
			            </form>
			        </div>
					<div class="dashed-box">
			            <ol style="1">
			                <li>授权完成前请不要关闭此窗口;</li>
			                <li>授权成功后请根据您的情况选择点击上面的按钮。</li>
			            </ol>
			        </div>
				</div>
			</div>
		</div>
		<!--添加eBay账号弹窗 end-->
		<div class="wrap">
			<ul class="breadcrumb" style="background-color: transparent;">
                <li><a href="http://demo.chukou1.cn/Client/Home/Home.aspx">首页</a>&nbsp;<span class="divider">/</span></li>
                <li><a href="?r=oms/home">Selling Helper</a>&nbsp;<span class="divider">/</span></li>
                <li><a href="?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
"><?php echo $this->_tpl_vars['platformName']; ?>
</a>&nbsp;<span class="divider">/</span></li>
                <li class="active">账号管理</li>
            </ul>
			<div class="tabHead">
				<ul>
					<li><a href="?r=oms/shebay/manage" class="tabActive">eBay账号</a></li>
					<li><a href="?r=oms/shpaypal/manage">Paypal账号</a></li>
				</ul>
				<div class="tabHeadRight"><a href='?r=oms/shorder/normal&platform=<?php echo $this->_tpl_vars['platform']; ?>
' class='btn'>返回订单列表</a></div>
				<div class='clear'></div>
			</div>
			<div class="content">
				<div class="tabBody">
					<div class="tabBodyHead">
						<div class="sel">
							<div class="selRight">
								<a type="button" class="btn btn-primary" name="addAccount">添加eBay账号</a>
								<a type="button" class="btn btn-warning" data-baseop="enable">启用账号</a>
								<a type="button" class="btn btn-warning" data-baseop="ban">禁用账号</a>
								<a type="button" class="btn btn-warning" data-baseop="delete">删除账号</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="tabBodyCon">
						<table class="table table-striped table-hover table-condensed">
							<thead>
								<tr>
									<th class="span1"><input type="checkbox"/></th>
									<th class="span3">账号</th>
									<th class="span2">代码</th>
									<th class="span2">状态</th>
									<th class="span2">创建时间</th>
									<th class="span2">最近更新</th>
									<th class="span1-2">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if (( $this->_tpl_vars['accountArray'] == null )): ?>
									<tr><td colspan="13" align="center">无数据</td></tr>
								<?php else: ?>
									<?php $_from = $this->_tpl_vars['accountArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['account']):
?>
									<tr data-id="<?php echo $this->_tpl_vars['account']['account_id']; ?>
" >
										<td><input type="checkbox" data-aid="<?php echo $this->_tpl_vars['account']['account_id']; ?>
" name="accountLineCheckBox"/></td>
										<td><?php echo $this->_tpl_vars['account']['account']; ?>
</td>
										<td><span name="displayNickName"><?php echo $this->_tpl_vars['account']['nick_name']; ?>
</span>&nbsp;
											<input class="span2 hide" name="editInput" style="margin: -50px;" type="text" value="<?php echo $this->_tpl_vars['account']['nick_name']; ?>
"/>
											<a class="pull-right" href="javascript:;" name="editBtn"><icon class="icon icon-pencil"></icon></a>
											<a class="pull-right hide" href="javascript:;" name="editCancelBtn" style="margin-left: 10px;">
												<icon class="icon icon-remove"></icon></a>
											<a class="pull-right hide" href="javascript:;" name="editSaveBtn" data-aid="<?php echo $this->_tpl_vars['account']['account_id']; ?>
">
												<icon class="icon icon-ok"></icon></a>
										</td>
										<td><span <?php if (! $this->_tpl_vars['account']['status']): ?>class="text-error"<?php endif; ?>><?php echo $this->_tpl_vars['account']['dis_status']; ?>
</span></td>
										<td><?php echo $this->_tpl_vars['account']['created_time']; ?>
</td>
										<td><?php echo $this->_tpl_vars['account']['updated_time']; ?>
</td>
										<td>
											<a href="javascript:;" name="reFetch" style="margin-left: 10px;" data-aid="<?php echo $this->_tpl_vars['account']['account_id']; ?>
">
												重新授权<icon class="icon icon-bookmark"></icon></a>
											<!-- 暂时隐藏此功能 -->
											<!-- <a href="javascript:;" style="margin-left: 10px;">编辑<icon class="icon icon-pencil"></icon></a> -->
											<a href="javascript:;" style="margin-left: 10px;" data-baseop="enable" data-aid="<?php echo $this->_tpl_vars['account']['account_id']; ?>
">
												启用<icon class="icon icon-ok"></icon></a>
											<a href="javascript:;" style="margin-left: 10px;" data-baseop="ban" data-aid="<?php echo $this->_tpl_vars['account']['account_id']; ?>
">
												禁用<icon class="icon icon-ban-circle"></icon></a>
											<a href="javascript:;" style="margin-left: 10px;" data-baseop="delete" data-aid="<?php echo $this->_tpl_vars['account']['account_id']; ?>
">
												删除<icon class="icon icon-remove"></icon></a>
										</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
		<script type="text/javascript" src="public/template/ck1sh/js/account.js?_201503281723"></script>
		<?php echo '
		<script>
		$(function(){
			// 复选框全选
			allCheckBox($(\'.tabBodyCon table thead :checkbox\'), $(\'.tabBodyCon table tbody :checkbox\'));
			// 账号启用、禁用、删除基本操作初始化
			initAccountBaseOperation(\'?r=oms/shebay/base\');

			var $ebayAccountEditModal = $(\'#ebayAccountEditModal\');
			var $addAccountBtn = $(\'[name=addAccount]\');
			var $ebayEditStep1 = $ebayAccountEditModal.find(\'[name=ebayEditStep1]\');
			var $ebayEditStep2 = $ebayAccountEditModal.find(\'[name=ebayEditStep2]\');
			var $nickNameInput = $ebayEditStep1.find(\'[name=nickNameInput]\');
			var $sessIDInput = $ebayEditStep1.find(\'[name=sessIDInput]\');
			var $nickNameTips = $ebayEditStep1.find(\'[name=nickNameTips]\');
			var $finishAuthBtn = $ebayEditStep2.find(\'[name=finishAuthBtn]\');
			// 初始化账号编辑Modal
			(function initEbayAccountEditModal(){
				var countDown = 0;
				// 按钮倒计时函数
				function finishBtnCountDown(){
					if(countDown > 0){
						if(!$finishAuthBtn.hasClass(\'disabled\')){
							$finishAuthBtn.addClass(\'disabled\');
						}
						$finishAuthBtn.text(\'请稍候... \'+countDown+\'秒\');
						setTimeout(function(){finishBtnCountDown(--countDown);}, 1000);
						return;
					}
					$finishAuthBtn.text(\'完成授权\').removeClass(\'disabled\');
					return true;
				}; 
				// “添加账号”按钮点击事件
				$addAccountBtn.on(\'click\', function(){
					$nickNameInput.removeClass(\'error\');
					$ebayEditStep1.find(\'input\').val(\'\');
					$nickNameTips.text(\'\').hide();
					$ebayEditStep1.show();
					$ebayEditStep2.hide();
					countDown = 0;
					$ebayAccountEditModal.modal({backdrop: false, show: true});
				});
				// "登录 eBay 授权"按钮点击事件
				$ebayEditStep1.on(\'click\', \'[name=getAuthUrlBtn]\', function(event) {
					var nickNameValue = $nickNameInput.val();
					if(!nickNameValue){
						$nickNameInput.addClass(\'error\');
						$nickNameTips.text(\'请输入账号代码！\').show();
						return false;
					}
					if(!(/^[A-Z]+[0-9]*$/).test(nickNameValue)){
						$nickNameInput.addClass(\'error\');
						$nickNameTips.text(\'账号代码只能是大写英文字母或数字，而必须以字母开头！\').show();
						return false;
					}
					showTips(\'info\', \'请稍后...\', \'normal\', \'20%\');
					$.get(\'?r=oms/shebay/geturl\', function(data, status){
						if(status === \'success\' && data.status){
							window.open(data.url);
							$ebayEditStep1.hide();
							$ebayEditStep2.find(\'[name=authUrlLink]\').attr(\'href\', data.url);
							$sessIDInput.val(data.sessid);
							$ebayEditStep2.show();
							countDown = 10;
							finishBtnCountDown();
							return true;
						}
						showTips(\'error\', \'请求出错,请重新尝试！\');
						return false;
					});
				});
				// "完成授权"按钮点击事件
				$finishAuthBtn.on(\'click\', function(event) {
					if($finishAuthBtn.hasClass(\'disabled\')){
						return false;
					}
					var nickNameValue = $nickNameInput.val();
					var sessIdValue = $sessIDInput.val();
					if(!nickNameValue || !(/^[A-Z]+[0-9]*$/).test(nickNameValue) || !sessIdValue){
						$nickNameInput.addClass(\'error\');
						$nickNameTips.text(\'您的授权操作存在错误，请重新操作！\').show();
						return false;
					}
					$finishAuthBtn.text(\'数据同步中...\').addClass(\'disabled\');
					$.get(\'?r=oms/shebay/fetch\', {nick: nickNameValue, sessid: sessIdValue}, 
						function(data, status){
							if(status === \'success\'){
								if(data.status){
									$ebayAccountEditModal.modal(\'toggle\');
									showTips(\'success\', \'账号授权成功！\');
									setTimeout(function(){window.location.reload();}, 3000);
									return true;
								}
							}
							$finishAuthBtn.text(\'完成授权\').removeClass(\'disabled\');
							showTips(\'error\', \'操作失败,请重新尝试！\');
							return false;
					});
				});
			})();

			// 初始化账号代码快速编辑组件
			(function initEbaNickNameQuickEdit(){
				// 账号昵称“编辑”按钮
				$(\'[name=editBtn]\').on(\'click\', function(){
					var self = $(this);
					var parent = self.parent(\'td\');
					self.hide();
					parent.find(\'[name=displayNickName]\').hide();
					parent.find(\'[name=editInput]\').show();
					parent.find(\'[name=editSaveBtn]\').show();
					parent.find(\'[name=editCancelBtn]\').show();
				});

				// 账号昵称“取消”按钮
				$(\'[name=editCancelBtn]\').on(\'click\', function(){
					var self = $(this);
					var parent = self.parent(\'td\');
					var $editInput = parent.find(\'[name=editInput]\');
					var $displayNickName = parent.find(\'[name=displayNickName]\');
					self.hide();
					$displayNickName.show();
					parent.find(\'[name=editBtn]\').show();
					parent.find(\'[name=editSaveBtn]\').hide();
					$editInput.removeClass(\'error\').hide();
				});

				// 账号昵称“保存”按钮
				$(\'[name=editSaveBtn]\').on(\'click\', function(){
					var self = $(this);
					var parent = self.parent(\'td\');
					var $editInput = parent.find(\'[name=editInput]\');
					var $displayNickName = parent.find(\'[name=displayNickName]\');

					// Ajax请求处理
					var aid = self.data(\'aid\');
					var nickName = $editInput.val();
					// 若内容有改动,则提交保存
					if($displayNickName.text() === $editInput.val()){
						return showTips(\'warning\', \'没有任何更改!\');
					}
					$.post(\'?r=oms/shebay/update\', {aid: aid, nick: nickName}, 
						function(data, status){
							if(status === \'success\'){
								if(data.status){
									$displayNickName.text($editInput.val());
									// 渲染效果
									self.hide();
									$editInput.removeClass(\'error\').hide();
									$displayNickName.show();
									parent.find(\'[name=editCancelBtn]\').hide();
									parent.find(\'[name=editBtn]\').show();
								} else {
									$editInput.addClass(\'error\');
								}
								showTips(data.status ? \'success\' : \'error\', data.msg);
								return data.status;
							}
							showTips(\'error\', \'请求出错,请重新尝试！\');
							return false;
					});
				});
			})();
		});
		</script>
		'; ?>

	</body>
</html>