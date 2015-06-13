"use strict";
define(
	['jquery'],
	function($){
		/**
		 * @method 显示警告信息弹窗
		 * @param [string] {type} 提示框类型{'info': 一般信息,'warning': 警告,'error': 错误,'success': 成功提示}
		 * @param [string] {msg} 信息内容
		 * @param [mixed] {delay} 延时{'fast': 1500,'normal': 2500,'slow': 5000,可自定义}，为0时不自动消失[默认normal]
		 * @param [mixed] {margintop} 提示框展示位置{'top': 0%, 'center': 35%,可自定义}
		 * @author Weixun Luo
		 * @date 2014-11-10
		 */
		var showTips = function(type, msg, delay, margintop){
			showTipsX({type: type, msg: msg, delay: delay, margintop: margintop});
		};

		/**
		 * @method 显示警告信息弹窗(加强版)
		 * @param [array] {params} 参数
		 *	{
		 *		type: 		提示框类型{'info': 一般信息,'warning': 警告,'error': 错误,'success': 成功提示}
		 *		title: 		自定义标题
		 *		msg: 		信息内容
		 *		delay: 		延时{'fast': 1500,'normal': 2500,'slow': 5000,'stay': 0,可自定义}，为0时不自动消失[默认normal]
		 *		margintop: 	提示框展示位置{'top': '0%', 'center': '35%',可自定义}
		 *		confirm: 	是否显示"确认"按钮{true: 显示, false: 不显示}[默认：false]
		 *		extend: 	扩展内容，自定义扩展html内容
		 *	}
		 * @author Weixun Luo
		 * @date 2014-11-10
		 */
		var showTipsX = function(params){
			var $shTipsModal = $('#shTipsModal');
			if($shTipsModal.length > 0){
				// 默认info提示
				if(params.type){
					params.type = params.type.toLowerCase();
				} else {
					params.type = 'info';
				}

				var title = '';
				var theme = {alertCSS: '', btnCSS: ''};
				switch(params.type){
					case 'info': title = '信息'; theme = {alertCSS: 'alert-info', btnCSS: 'btn-info'}; break;
					case 'warning': title = '警告'; theme = {alertCSS: 'alert-warning', btnCSS: 'btn-warning'}; break;
					case 'error': title = '错误'; theme = {alertCSS: 'alert-error', btnCSS: 'btn-danger'}; break;
					case 'success': title = '成功'; theme = {alertCSS: 'alert-success', btnCSS: 'btn-success'}; break;
					default: title = '信息'; theme = {alertCSS: 'alert-info', btnCSS: 'btn-info'}; break;
				}

				// tips model reset function
				var resetTipsModal = function(ms){
					$shTipsModal.animate({opacity: 0}, ms, function(){
						$shTipsModal.removeClass('alert-info alert-success alert-error alert-warning circle').css({top: '-25%', display: 'none'});
						$shTipsModal.children('[name=tipsTitle]').text('');
						$shTipsModal.children('[name=msgBox]').text('');
						$shTipsModal.children('[name=msgConfirmBtn]').removeClass('btn-info btn-success btn-danger btn-warning').css({'display': 'none'});
						$shTipsModal.children('[name=msgExtend]').html('');
					});
				}

				// tips delay hide function
				var delayHide = function(delay){
					setTimeout(function(){
						var now = $.now();
						var hideTime = $shTipsModal.children('[name=hideTime]').val();
						if(now >= hideTime){
							resetTipsModal(350);
						} else{
							delayHide(hideTime-now);
						}
					}, delay);
				}

				// Rest tips modal
				resetTipsModal(0);
				// 如果没有自定义title，怎用系统默认title
				if(!params.title){
					params.title = title;
				}

				// 提示框停留位置，默认top
				var topBorderRadius = '';
				if(params.margintop === undefined){params.margintop = 'top';}
				switch(params.margintop){
					case 'top': params.margintop = '0%'; break;
					case 'center': params.margintop = '35%'; topBorderRadius = 'circle'; break;
				}
				// 提示框停留时间，默认normal
				if(params.delay === undefined){params.delay = 'normal';}
				switch(params.delay){
					case 'normal': params.delay = 3300; break;
					case 'fast': params.delay = 1500; break;
					case 'slow': params.delay = 5000; break;
					case 'stay': params.delay = 0; break;
					default:
						var ms = parseInt(params.delay);
						if(isNaN(ms)) return false;
						params.delay = ms;
						break;
				}

				// 不渐隐而没有设置confirm时,默认confirm为true
				if(params.confirm === undefined && params.delay === 0){
					params.confirm = true;
				}

				// 添加标题
				$shTipsModal.children('[name=tipsTitle]').text(params.title);
				// 添加提示信息
				if(params.msg){
					$shTipsModal.children('[name=msgBox]').text(params.msg);
				}
				// 设置"确认"按钮样式
				$shTipsModal.children('[name=msgConfirmBtn]').addClass(theme.btnCSS).css({'display': params.confirm ? 'block' : 'none'});
				// 设置扩展内容
				$shTipsModal.children('[name=msgExtend]').css({'display': params.extend ? 'block' : 'none'}).html(params.extend ? params.extend : '');
				// 设置样式,弹出
				$shTipsModal.addClass(theme.alertCSS+' '+topBorderRadius).css({display: 'block'}).animate({opacity: 1, top: params.margintop}, 350);
				if(params.delay != 0){
					$shTipsModal.children('[name=hideTime]').val($.now()+params.delay);
					// 设置自动渐隐
					delayHide(params.delay);
				}
				return true;
			}
			// Tips框模板未加载
			$.get('public/template/ck1sh/_partials/component/tips.html?_201503251135',
				function(component){
					$('body').append(component);
					return showTipsX(params);
				});
		};

		// [封装]复选框全选-start
		var checkAllBoxes = function(obj1, obj2) {
			obj1.on("change", function() {
				obj2.prop("checked", $(this).prop("checked"));
			});
		};// [封装]复选框全选-end

		// [封装]关闭弹窗-start
		var TCClose = function(obj1, Obj2) {
			obj1.on('click', function() {
				Obj2.slideUp(200);
			});
		};// [封装]点击关闭按钮收起弹窗-end

		// [封装]启用账号、停用账号、删除AJAX同时封装--start
		var eBaySSDAjax = function(obj, urlStr) {
			obj.on('click', function() {
				var getAllId_str = getAllId($('.tabBodyCon tbody tr input[type=checkbox]:checked'));
				if (getAllId_str.length == 0) {
					showTips('warning', "请勾选复选框");
				} else {
					$.ajax({
						url: urlStr + getAllId_str + '&cc=' + Math.random(),
						success: function(data) {
							if(data){
								var jsonData = JSON.parse(data);
								if (data == 0) {
									showTips('error', "操作失败");
									setTimeout(function() {
										window.location.reload();
									}, 800);
								} else {
									showTips('success', "操作成功！");
									setTimeout(function() {
										window.location.reload();
									}, 800);
								}
							}else{
								showTips('warning', "请勿重新操作");
							}
						}
					});
				}
			})
		};// [封装]启用账号、停用账号、删除AJAX同时封装--end

		// [封装]获取被选中的复选框当前行的ID封装--start
		var getAllId = function(obj) { //参数为被勾选的复选框，即带有checked属性的复选框
			var str_allId = '';
			var $allCheckBox = obj; //例：$('.address-label table tbody tr input[type=checkbox]:checked');
			if ($allCheckBox.length == 0) {
				return '';
			}
			for (var i = 0; i < $allCheckBox.length; i++) {
				str_allId += $allCheckBox.eq(i).parent().parent().attr('data-id') + ','
			}
			var nStr_allId = str_allId.substr(0, str_allId.length - 1);
			return nStr_allId;
		};// [封装]获取被选中的复选框当前行的ID封装--start

		/* btn-group内选项元素的点击视觉效果 start */
		var applyButGroup = function($btnGroupItem){
			$btnGroupItem.find('ul>li>a').on('click', function(event) {
				var $current = $(event.currentTarget);
				var $currentGroup = $current.closest('.btn-group');

				// 选中，改变显示内容，填充选中值
				$currentGroup.find('[name=displayName]').text($current.text());
				$currentGroup.find('ul>li.active').removeClass('active');
				$current.parent('li').addClass('active');
			});
		};/*渲染btn-group元素的点击事件 end*/

		var date;

		// js过滤用户提交的数字数据
		var numberClean = function(source, defaultValue){
			if(typeof(defaultValue) === 'undefined'){
				// 默认值
				defaultValue = 0;
			}
			var result;
			if(source && source != undefined){
				if(isNaN(source)){
					result = source.replace(/[\D]/g, '');
				} else {
					result = source;
				}
			} else {
				result = defaultValue;
			}
			return result;
		};

		// js过滤用户提交的文本数据
		var wordClean = function(source, defaultValue){
			if(typeof(defaultValue) === 'undefined'){
				// 默认值
				defaultValue = '';
			}
			var pattern = new RegExp("[`~!#$^*()=|{}':;',\\[\\]<>/?！￥……*（）——|{} 【】‘；：”“'。，、？]");
			var result = '';
			if(source && source != undefined){
				result = source.replace(pattern, '');
			} else {
				result = defaultValue;
			}
			return result;
		};

		/**
		 * @method 将value进行Boolean判断，并返回相应内容
		 * @param [mixed] {value} 需要判断的值
		 * @param [mixed] {trueReturn} 判断为true时返回的内容
		 * @param [mixed] {falseReturn} 判断为false时返回的内容
		 * @return [mixed] 返回判断结果对应的参数，参数undefined则返回空} * @author Weixun Luo
		 * @date 2015-03-17
		 */
		var toBool = function(value, trueReturn, falseReturn){
			if(value == true){
				return trueReturn ? trueReturn : '';
			}
			return falseReturn ? falseReturn : '';
		};

		var idownload = function(url){
			var i = document.createElement('iframe');
			i.style.display = 'none';
			i.name = 'idownload_iframe';
			//i.onload = function() {i.parentNode.removeChild(i);};
			i.src = url;
			document.body.appendChild(i);
			setTimeout(function(){
				$("iframe[name='idownload_iframe']").remove();
			},5000);
		};

		var loading = function(){
			$("body").append("<div id='loading' style='display:none;'><div><img src='public/template/ck1sh/img/loader.gif'/></div></div>");
			$("#loading").click(function(e) {
		        $(this).remove();
		    });
			setTimeout(function(){
				$("#loading").fadeIn("fast");
			},500);
			return true;
		};

		var removeloading = function(){
			$("#loading").remove();
		};

		var htmlencode = function(s){
		    var div = document.createElement('div');
		    div.appendChild(document.createTextNode(s));
		    return div.innerHTML;
		};

		var htmldecode = function(s){
		    var div = document.createElement('div');
		    div.innerHTML = s;
		    return div.innerText || div.textContent;
		};

		/**
		 * 过滤输入框2边空格
		 * @param [array]  {aInput} 输入框数组
		 * @author super
		 */
		var fTrim = function($aInput) {
			$aInput.each(function(index, item) {
				var $item = $(item);
				$item.on('change', function() {
					$item.val($.trim($item.val()));
				});
			});
		};

		/**
		 * 产品规格过滤
		 * @param [string]  {str} 输入的产品规格字符串
		 * @author super
		 */
		var testSpec = function(str) {
		    var arr = str.split('*');
		    if (arr.length != 3) {
		        return false;
		    }

		    for (var a = 0; a < 3; a ++) {
		        var pf = parseFloat(arr[a]);
		        if (isNaN(pf)) {
		            return false;
		        }
		        if (pf === 0) {
		            return false;
		        }
		        if (('' + pf).length !== arr[a].length || ('' + pf).length > 8) {
		            return false;
		        }
		    }
		    return true;
		};

		/**
		 * @desc 当操作完成后清除已选择的复选框
		 * @param [bool] {showWarning} 若没选中订单是否显示警告信息
		 * @author likaipeng
		 */
		var uncheckBox = function(){
		    $(':checkbox').attr('checked', false);
		};

		return {
			showTips: showTips,
			showTipsX: showTipsX,
			checkAllBoxes: checkAllBoxes,
			TCClose: TCClose,
			eBaySSDAjax: eBaySSDAjax,
			getAllId: getAllId,
			applyButGroup: applyButGroup,
			// date: date,
			numberClean: numberClean,
			wordClean: wordClean,
			toBool: toBool,
			idownload: idownload,
			loading: loading,
			removeloading: removeloading,
			htmlencode: htmlencode,
			htmldecode: htmldecode,
			fTrim: fTrim,
			testSpec: testSpec,
			uncheckBox: uncheckBox,
		};
	});