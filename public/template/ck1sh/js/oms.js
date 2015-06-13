"use strict";
define(
	['moment', 'util', 'sunshine/datetime'],
	function(moment, util, datetime){
		/**
		 * @desc 检查订单选中情况,没选中订单，返回false,否则返回选中订单id（数组）
		 * @param [bool] {showWarning} 若没选中订单是否显示警告信息
		 * @author Weixun Luo
		 */
		var checkOrderSelected = function(showWarning){
			var $orderLineCheckBox = $('input[type=checkbox][name=orderLineCheckBox]');
			var ids = [];
			var flag = false;
			if(showWarning === undefined){
				showWarning = true;
			}
			$.each($orderLineCheckBox, function(index, item) {
				var itemObject = $(item);
				if(itemObject.is(':checked')){
					ids.push(util.numberClean(itemObject.data('oid')));
					flag = true;
				}
			});

			if(flag){
				return {result: true, ids: ids};
			} else {
				if(showWarning){
					util.showTips('warning', '未选择订单记录!');
				}
				return {result: false};
			}
		};/* <--Check订单选中情况 */

		/**
		 * @desc 获取订单列表
		 * @param [obejct] {global_info} {
				platform: 获取平台代码,
				sign: 查询类型标记,
				filter: 查询类型,
				conditions: 查询条件,
				page: 分页页码,
				pageSize: 分页大小,
			}
		 * @param [function] {listHandler} 具体页面刷新订单列表的函数
		 * @param [function] {orderTemplateHandler} 具体页面的订单列表生成函数
		 * @param [function] {callback} 订单就爱在完成后的回调函数
		 * @author Weixun Luo
		 */
		var listOrder = function(global_info, listHandler, orderTemplateHandler, callback){
			if(global_info === undefined){
				return false;
			}
			var postData = {platform: global_info.platform, sign: global_info.sign};
			// 初始化默认值
			if(global_info.filter != undefined){
				postData.filter = global_info.filter;
			}
			if(global_info.conditions != undefined){
				postData.conditions = global_info.conditions;
			}
			if(global_info.page != undefined){
				postData.page = global_info.page;
			}
			if(global_info.pageSize != undefined){
				postData.pageSize = global_info.pageSize;
			}

			$.post('?r=oms/shorder/listOrder', postData,
				function(data){
					var orderDisplayTableList = $('#orderDisplayTableList');
					if(data.status){
						var orderArray = data.orderArray;
						var pageInfo = data.pageInfo;
						if(orderArray && orderArray.length > 0){
							orderDisplayTableList.empty();
							$.each(orderArray, function(index, order){
								// 订单模板
								var template = orderTemplateHandler(order);
								// 绑定一行订单数据
								orderDisplayTableList.append(template);
							});
						} else {
							// 显示数据空
							orderDisplayTableList.children('tr').remove();
							orderDisplayTableList.append('<tr><td colspan="' + $("#orderDisplayTableTitle").children("tr").children("th").length
								+ '" align="center">无数据</td></tr>');
						}
						// refresh 分页导航条
						refreshPaginationNavBar(pageInfo.page, pageInfo.pageSize, pageInfo.total, listHandler);
					} else{
						// 显示请求错误
						orderDisplayTableList.children("tr").remove();
						orderDisplayTableList.append('<tr><td colspan="' + $("#orderDisplayTableTitle").children("tr").children("th").length
							+ '" align="center"><span class="text-error">请求出错</span></td></tr>');
					}

					// 全选复选框重置，重新绑定事件
					$('.tabBodyCon table thead :checkbox').attr("checked", false);
						util.checkAllBoxes($('.tabBodyCon table thead :checkbox'), $('.tabBodyCon table tbody :checkbox'));
					// 加载订单列表后要执行的操作
					if(callback != undefined && (typeof callback === 'function')){
						callback();
					}
				});
		};/* <--获取订单列表 */

		/**
		 * @desc 获取订单详情信息
		 * @param [string] {sign} 订单类型
		 * @param [int] {platform} 平台代码
		 * @param [int] {orderId} 订单ID
		 * @author Weixun Luo
		 * @date 2015-04-03
		 */
		var listOrderDetails = function(sign, platform, orderId){
			if(!orderId){
				return false;
			}
			$.get('?r=oms/shorder/listDetails&sign='+sign+'&platform='+platform+'&oid='+orderId, function(data, status){
				if(status === 'success' && data.status){
					var $orderDetailModal = $('#orderDetailModal');
					if($orderDetailModal.length > 0){
						$orderDetailModal.modal({show: true, backdrop: false});
						return true;
					}
					// 详情页弹窗模板未加载
					$.get('public/template/ck1sh/order/order_details.html?_201504081200',
						function(component){
							$('body').append(component);
							$orderDetailModal.modal({show: true, backdrop: false});
						});
				}
				util.showTips('error', '网络连接出现错误,请重新尝试！')
				return false;
			});
		};

		/**
		 * @desc 初始化普通查询From组件
		 * @param [object] {global_info} 页面全局信息
		 * @param [function] {listOrder} 订单查询方法
		 * @param [function] {callback} 回调函数，用户点击普通查询组件的后续操作
		 * @author Weixun Luo
		 */
		var initNormalSearchModule = function(global_info, listOrder, callback){
			var $normalSearchBar = $('#normalSearchBar');	// 普通查询Bar
			var $normalSearchForm = $normalSearchBar.children('[name=normalSearchForm]');	// 普通查询Form
			var $normalSearchbutton = $normalSearchForm.find('[name=normalSearchButton]');	// 普通查询Button
			var $timeSelectorModule = $normalSearchBar.find('.time-selector');

			if($timeSelectorModule.length > 0){
				// 包含时间查询组件，初始化时间查询组件
				datetime.initDatetimePicker($timeSelectorModule);// (如果有时间选项)添加日期控件
				$timeSelectorModule.on('change', function(event) {
					// 将用户选择日期转换成
					var self = $(this);
					var keyname = self.data('keyname');
					self.next('[data-postkey='+keyname+']input').val(
						moment().isValid(self.val()) ? moment(self.val()).unix() : 0);
				});
			}

			// 查询Option组件初始化
			$.each($normalSearchBar.find('div.btn-group'), function(index, btnGroup) {
				var $btnGroup = $(btnGroup);
				// 选项组内选项元素添加视觉效果
				util.applyButGroup($btnGroup);

				// 查询按钮点击事件，设置对应的查询值
				$btnGroup.find('a[data-iname][data-value]').on('click', function(event) {
					var $current = $(this);
					var iName = $current.data('iname');
					var oValue = $current.data('value');
					// Set value
					$normalSearchForm.find('input[data-postkey][name='+iName+']').val(oValue);
				});
			});

			// 普通查询按钮点击事件
			$normalSearchbutton.on('click', function(event) {
				var self = $(this);
				global_info.filter = self.data("filter");

				// Reset conditions of global_info
				global_info.conditions = {};
				$.each($normalSearchBar.find('[data-postkey]'), function(index, inputItem){
					var $inputItem = $(inputItem);
					var postKey = $inputItem.data('postkey');
					var oValue = $inputItem.val();
					if(oValue){
						global_info.conditions[postKey] = oValue;
					}
				});

				// 重置分页页码
				global_info.page = undefined;
				// 刷新订单列表
				listOrder();
				// Reset单条件查询组件
				resetSingleSearchModule();
				// Reset高级查询组件
				resetAdvanceSearchModal();
				if(callback != undefined && (typeof callback === 'function')){
					callback();
				}
			});
			return true;
		};/* <--初始化普通查询From组件 end */

		/**
		 * @desc Reset普通查询From组件
		 * @author Weixun Luo
		 */
		var resetNormalSearchModule = function(){
			var $normalSearchBar = $('#normalSearchBar');
			if($normalSearchBar.length > 0){
				// Reset normal search bar conditions input value
				$normalSearchBar.find('input[data-postkey]').val('');
				// Reset normal search bar display name
				$.each($normalSearchBar.find('div.btn-group'), function(index, btnGroup){
					var $btnGroup = $(btnGroup);
					var $defaultOption = $btnGroup.find('ul>li').removeClass('active').first().addClass('active').children('[data-iname]');
					$btnGroup.find('[name=displayName]').text($defaultOption.text());
					// Set default option to value input
					var $optionValueInput = $normalSearchBar.find('input[name="' + $defaultOption.data('iname') + '"]');
					if($optionValueInput != undefined){
						$optionValueInput.val($defaultOption.data('value'));
					}
				});
				return true;
			}
			return false;
		};/* <--Reset普通查询From组件 end */

		/**
		 * @desc 初始化单条件查询组件
		 * @param [object] {global_info} 页面全局信息
		 * @param [function] {listOrder} 订单查询方法
		 * @param [function] {callback} 回调函数，用户点击普通查询组件的后续操作
		 * @author Weixun Luo
		 */
		var initSingleSearchModule = function(global_info, listOrder, callback){
			// 单条件查询点击事件
			$('a[name=singleSearchBtn]').on('click', function(event) {
				var self = $(this);
				// 单条件查询区域
				var $singleFilterOptionsForm = $('#singleFilterOptionsForm');
				var parentItem = self.parent('li');
				global_info.filter = self.data('filter');	// 设置查询类型
				global_info.conditions = {'filter_type': util.numberClean(self.data('cond'))};	// 设置查询条件
				global_info.page = undefined;	// 重置分页页码

				// 按钮选中效果
				$singleFilterOptionsForm.children('ul').children('li.active').removeClass('active');
				parentItem.addClass('active');

				// 刷新订单列表
				listOrder();
				// Reset普通查询From组件
				resetNormalSearchModule();
				// Reset高级查询组件
				resetAdvanceSearchModal();
				if(callback != undefined && (typeof callback === 'function')){
					callback();
				}
			});
			return true;
		};/* <--初始化单条件查询组件 end */

		/**
		 * @desc Reset单条件查询组件
		 * @author Weixun Luo
		 */
		var resetSingleSearchModule = function(){
			var $singleFOF = $('#singleFilterOptionsForm');
			if($singleFOF.length > 0){
				$singleFOF.children('ul').children('li.active').removeClass('active');
				return true;
			}
			return false;
		};/* <--Reset单条件查询组件 end */

		/**
		 * @desc 初始化高级查询组件
		 * @param [object] {global_info} 页面全局信息
		 * @param [function] {listOrder} 订单查询方法
		 * @param [function] {callback} 回调函数，用户点击普通查询组件的后续操作
		 * @author Weixun Luo
		 */
		var initAdvancedSearchModal = function(global_info, listOrder, callback){
			var $advSearchModal = $('#advanceSearchModal');
			if($advSearchModal.length <= 0){
				return false;
			}

			// [高级查询]按钮点击事件
			$('#advancedSearchBtn').on('click', function(event) {
				$advSearchModal.modal({backdrop: true, show: true});
			});

			var $advSearchBtn = $advSearchModal.find("[name=advSearchBtn]");
			// 高级查询弹窗中[查询]按钮点击事件
			$advSearchBtn.on('click', function(event) {
				var self = $(this);
				global_info.filter = self.data("filter");
				// Reset conditions of global_info
				global_info.conditions = {};
				//判断是否输入查询值标记
				var iFlag = 0;
				$.each($advSearchModal.find("[data-postkey]"), function(index, inputItem){
					var $inputItem = $(inputItem);
					var postKey = $inputItem.data('postkey');
					var oValue = $inputItem.val();
					if(oValue){
						global_info.conditions[postKey] = oValue;
						iFlag++;
					}
				});
				//查询项为空
				if (iFlag == 4) {
					util.showTips('warning','请选择查询项');
					return false;
				}

				// Reset pagination page number
				global_info.page = undefined;
				// Refresh order list
				listOrder();
				// Reset普通查询From组件
				resetNormalSearchModule();
				// Reset单条件查询组件
				resetSingleSearchModule();
				if(callback != undefined && (typeof callback === 'function')){
					callback();
				}
			});

			// 所有选项按钮绑定点击动作
			$.each($advSearchModal.find('div.btn-group'), function(index, btnGroup) {
				var $btnGroup = $(btnGroup);
				// 选项组内选项元素添加视觉效果
				util.applyButGroup($btnGroup);

				// 查询按钮点击事件，设置对应的查询值
				$btnGroup.find('a[data-iname][data-value]').on('click', function(event) {
					var self = $(this);
					var iName = self.data('iname');
					var oValue = self.data('value');
					// Set value
					$advSearchModal.find('input[data-postkey][name='+iName+']').val(oValue);
				});
			});
			return true;
		};/* <--初始化高级查询组件 end */

		/**
		 * @desc 重置高级查询组件
		 * @author Weixun Luo
		 */
		var resetAdvanceSearchModal = function(){
			var $advSearchModal = $('#advanceSearchModal');
			if($advSearchModal.length > 0){
				// Reset advance search bar conditions input value
				$advSearchModal.find('input[data-postkey]').val('');
				// Reset advance search bar display name
				$.each($advSearchModal.find('div.btn-group'), function(index, btnGroup){
					var $btnGroup = $(btnGroup);
					var $defaultOption = $btnGroup.find('ul>li').removeClass('active').first().addClass('active').children('[data-iname]');
					$btnGroup.find('[name=displayName]').text($defaultOption.text());
					// Set default option to value input
					var $optionValueInput = $advSearchModal.find('input[name="' + $defaultOption.data('iname') + '"]');
					if($optionValueInput != undefined){
						$optionValueInput.val($defaultOption.data('value'));
					}
				});
				return true;
			}
			return false;
		};/* <--重置高级查询组件 end */

		/**
		 * @desc 初始化同步订单组件
		 * @param [object] {global_info} 页面全局信息
		 * @param [function] {callback} 回调函数，用户点击普通查询组件的后续操作
		 * @author Weixun Luo
		 * @date 2015-03-24
		 */
		var initSyncOrderModule = function(global_info, callback){
			var $syncOrderModal = $('#syncOrderModal');
			if($syncOrderModal.length <= 0){
				return false;
			}
			datetime.initDatetimePicker($syncOrderModal.find('.time-selector'));
			// 绑定“同步订单”按钮点击事件
			$('#syncOrderBtn').on('click', function(){
				$syncOrderModal.find('input.time-selector').val('');
				// 初始化固定结束时间（个别平台）
				var $readonlyEndTime = $syncOrderModal.find('input[name=readonlyEndTime]');
				if($readonlyEndTime.length > 0){
					$readonlyEndTime.val(moment().format('YYYY-MM-DD HH:mm'));
				}
				$syncOrderModal.modal({backdrop: true, show: true});
			});

			// 绑定“同步订单” Modal中的确认按钮的点击事件
			$syncOrderModal.find('[name=confirmBtn]').on('click', function(){
				var postParams = {platform: global_info.platform};
				// 检查用户的时间输入
				var startTime = $syncOrderModal.find('input[name=startTime]').val();
				if(startTime === ''){
					util.showTips('warning', '请输入起始时间！');
					return false;
				}
				postParams.starttime = moment(startTime).unix();
				var $endTimeInput = $syncOrderModal.find('input[name=endTime]');
				if($endTimeInput.length > 0){
					var endTime = $endTimeInput.val();
					if(endTime === ''){
						util.showTips('warning', '请输入截止时间！');
						return false;
					}
					postParams.endtime = moment(endTime).unix();
				}
				$syncOrderModal.find('[name=runtimeTips]').fadeIn();
				// 请求服务器同步订单
				$.post("?r=oms/shorder/syncorder", postParams, function(data, status){
					$syncOrderModal.find('[name=runtimeTips]').fadeOut();
					if(status === 'success'){
						if(data.status){
							util.showTipsX({type: 'info', title: '处理结果', 
								extend: $.makeArray(data.msg).join('<br/>'), delay: 0, confirm: true});
							if(callback != undefined && (typeof callback === 'function')){
								callback();
							}
							$syncOrderModal.modal('hide');
							return true;
						}
						util.showTips('error', data.msg);
						$syncOrderModal.modal('hide');
						return false;
					}
					util.showTips('error', '请求出错，请重新尝试！');
					$syncOrderModal.modal('hide');
				});
			});
			return true;
		};

		/**
		 * @desc 刷新分页导航条
		 * @param [int] {page} 当前页码
		 * @param [int] {pageSize} 当前分页大小
		 * @param [int] {total} 查询总记录数
		 * @param [function] {eventHandler} 分页导航条的按钮点击时要调用的处理函数
		 * @author Weixun Luo
		 */
		var refreshPaginationNavBar = function(page, pageSize, total, eventHandler){
			var $paginationNavBar = $('#paginationNavBar');  // 分页导航条节点
			if(total === undefined || total === 0){
				$paginationNavBar.empty();return;
			}

			var frameSize = 5; // 定义分页导航条最多显示5页的按钮
			var pageSizeArray = [10,15,20,30,50,100,200]; // 定义页面大小选项
			var pageCount =  Math.ceil(total / pageSize); // 总页数
			var currentPage = page; // 当前页码
			var frameFirst = (Math.ceil(currentPage / frameSize) - 1) * frameSize + 1; // 当前frame的第一页
			var frameLast = frameFirst + frameSize - 1;  // 当前frame的最后一页
				frameLast = frameLast > pageCount ? pageCount : frameLast;  // 当前frame最后一页大于总页数，溢出
			var template = '';
			if(currentPage === 1){
				// 在第一页，禁用"首页"按钮,禁用"第一页"按钮
				template += '<ul><li class="disabled"><a>首页</a></li>'
					+ '<li class="disabled"><a>&lt;</a></li>';
			} else{
				// 不在第一页，"首页" = "第一页","<" = 当前页的前一页
				template += '<ul><li><a data-page="1" data-pagesize="' + pageSize + '">首页</a></li>'
					+ '<li><a data-toggle="tooltip" title="前1页" data-page="' + (currentPage - 1) +'" data-pagesize="' + pageSize + '">&lt;</a></li>';
			}
			if (frameFirst != 1){
				// 不在最前frame
				template += '<li><a data-toggle="tooltip" title="前' + frameSize + '页" data-page="'
					+ (frameFirst - 1) + '" data-pagesize="' + pageSize + '">&hellip;</a></li>';
			}
			for (var pageNumber = frameFirst; pageNumber <= frameLast; pageNumber++) {
				// 页码按钮
				template += '<li ' + (currentPage === pageNumber ? 'class="active"' : '')
					+ '><a data-page="' + pageNumber + '" data-pagesize="' + pageSize + '">' + pageNumber + '</a></li>';
			};
			if (frameLast != pageCount){
				// 不在最后frame
				template += '<li><a data-toggle="tooltip" title="后' + frameSize + '页" data-page="'
					+ (frameLast + 1) + '" data-pagesize="' + pageSize + '">&hellip;</a></li>';
			}
			if(currentPage >= pageCount){
				// 到了最后一页，没有下一页
				template += '<li class="disabled"><a>&gt;</a></li>'
					+ '<li class="disabled"><a>尾页</a></li>';
			} else {
				// 还未到最后一页，">" = 当前页的下一页
				template += '<li><a data-toggle="tooltip" title="后1页" data-page="' + (currentPage + 1) +'" data-pagesize="' + pageSize + '">&gt;</a></li>'
					+ '<li><a data-page="' + pageCount +'" data-pagesize="' + pageSize + '">尾页</a></li>';
			}
			template += '<li class="select-size"> 每页 <select data-pagesize data-page>';
			$.each(pageSizeArray, function(index, aSize){
				template += '<option ' + (aSize === pageSize ? 'selected="selected"' : '') + 'value="' + aSize + '">' + aSize + '</option>';
			});
			template += '</select> 条，共 ';
			template += '<strong>' + pageCount + '</strong> 页 ';
			template += '<strong>' + total + '</strong> 条</li>';
			$paginationNavBar.html(template).show();

			// 绑定按钮提示信息
			$paginationNavBar.find('[data-toggle=tooltip][data-page][data-pagesize]').tooltip();

			// 页码按钮绑定事件
			$('a[data-page][data-pagesize]').on('click', function(event) {
				var self = $(this);
				var selectedPage = util.numberClean(self.data('page'));
				var selectedPageSize = util.numberClean(self.data('pagesize'));
				if(eventHandler != undefined && (typeof eventHandler === 'function')){
					eventHandler({page: selectedPage, pageSize: selectedPageSize});
				}
			});

			// 分页Size按钮绑定事件
			$('select[data-page][data-pagesize]').change(function(event) {
				var selectedPage = undefined;
				var selectedPageSize = util.numberClean($(this).children('option:selected').val());
				if(eventHandler != undefined && (typeof eventHandler === 'function')){
					eventHandler({page: selectedPage, pageSize: selectedPageSize});
				}
			});
		};/* <--刷新分页导航条 */

		/**
		 * @desc 国家选择列表Modal模块
		 * @param [int] {countryCode} 当前选中或填充的国家代码
		 * @param [function] {callback} 用户点击选中国家后回调的处理函数（会把选中国家信息回传,回传数据格式{code: 国家代码,en: 国家英文名, cn: 国家中文名}）
		 * @author Weixun Luo
		 */
		var showCountryListModal = function(countryCode, callback){
			var $countryListModal = $('#countryListModal');
			if($countryListModal.length > 0){
				if(countryCode){
					// 选中传递过来的国家
					$countryListModal.find('input[type=checkbox][name=countryOption][data-code='+countryCode+']').prop('checked', true);
				}
				return $countryListModal.modal({backdrop: false, show: true});
			}

			// 国家列表Modal未加载,加载模板
			$.get('public/template/ck1sh/_partials/component/country_list.html?_201501021010',
				function(component){
					$('body').append(component);  // 加载国家列表Modal
					$countryListModal = $('#countryListModal');
					$.get("?r=oms/shorder/listCountry", function(data){
						if(!data.status){
							return false;
						}
						var countrys = data.countrys;
						var field_template = '';
						var usual_template = '';
						var lists_template = '';

						// 常用国家列表
						$.each(countrys.usual, function(code, names){
							usual_template += '<li><label data-toggle="tooltip" title="' + names.en + '(' + names.cn + ')">'
								+ '<input name="countryOption" type="checkbox" class="country" data-code="'
								+ code + '" data-cn="' + names.cn + '" data-en="' + names.en + '">' + names.en + '(' + names.cn + ')</label></li>';
						});

						// 分类的国家列表
						var listLen = countrys.lists.length;
						$.each(countrys.lists, function(field, countryList){
							listLen = (listLen - 1);
							field = field.toUpperCase();
							field_template += '<li> <a href="#countryFiled' + field + '" class="btn btn-mini btn-info">' + field + '</a> </li>';  // 快捷筛选项
							lists_template += '<div class="" id="countryFiled' + field + '"><h3>' + field + '</h3><ul>';  // 国家分类域
							$.each(countryList, function(code, names){
								// 国家选项
								lists_template += '<li><label data-toggle="tooltip" title="' + names.en + '(' + names.cn + ')">'
									+ '<input name="countryOption" type="checkbox" class="country" data-code="'
									+ code + '" data-cn="' + names.cn + '" data-en="' + names.en + '" />' + names.en + '(' + names.cn + ')</label></li>';
							});
							if(listLen <= 0){
								// 到了最后一条
								lists_template += '</ul></div>';
								return;
							}
							lists_template += '</ul><div class="clear"></div></div>';
						});

						// 绑定页面元素
						$countryListModal.find('[name=quickFilter]').html(field_template);
						$countryListModal.find('[name=usualCountry]').html(usual_template);
						$countryListModal.find('[name=countryClassifyList]').html(lists_template);
						$countryListModal.find('[data-toggle=tooltip]').tooltip({placement: 'top'});

						// 国家选项绑定点击事件
						$countryListModal.find('input[type=checkbox][name=countryOption]').on('click', function(event){
							var currentItem = $(this);
							$countryListModal.find('input[type=checkbox][name=countryOption]:checked').prop('checked', false);
							$countryListModal.modal('hide');
							var code = currentItem.data('code');
							var en = currentItem.data('en');
							var cn = currentItem.data('cn');
							if(callback){
								return callback({code: code, en: en, cn: cn});
							}
						});
						return showCountryListModal(countryCode);
					});
				});
		};/* <--国家选择列表Modal模块 end */

		return {
			checkOrderSelected: checkOrderSelected,
			listOrder: listOrder,
			listOrderDetails: listOrderDetails,
			initNormalSearchModule: initNormalSearchModule,
			initSingleSearchModule: initSingleSearchModule,
			initAdvancedSearchModal: initAdvancedSearchModal,
			initSyncOrderModule: initSyncOrderModule,
			refreshPaginationNavBar: refreshPaginationNavBar,
			showCountryListModal: showCountryListModal,
		};
	});