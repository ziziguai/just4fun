/**
 * 各种初始化变量
 */
//申报信息内容改变变量
var declareChange = 0;
//商品信息的内容改变的变量
var itemsChange = 0;
//地址信息
var addressChange = 0;
//锁定listOrderDetail
var lockListOrderDetail = 0;

/**
 * 判断用户是否修改了申报信息
 * @return void
 */
$('#weight,#packageSize,#declare_name,#declare_price,#remark,#tracking').on('change', function() {
	declareChange = 1;
});

/**
 * 判断是否修改了商品的信息
 */
$('.editbox').on('change', 'input[type=text]', function() {
	itemsChange = 1;
});

/**
 * 判读是否修改了地址
 */
$('#BuyerName,#street1,#street2,#CityName,#StateOrProvince,#PostalCode,#BuyerPhone,#countrycode').on('change', function() {
	addressChange = 1;
});

//验证规则
var Rvalildate = {};
Rvalildate.weight_input = function(weight_input) {
	if (weight_input == 0 || isNaN(weight_input) || !/^\d+(\.\d{1,2})?$/.test(weight_input)) {
		return false;
	}
	return true;
}

Rvalildate.package_size_input = function(package_size_input) {
	if (!/^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/.test(package_size_input)) {
		return false;
	}
	return true;
}

Rvalildate.notNull = function(notNull) {
	if (!notNull) {
		return false;
	}
	return true;
}

Rvalildate.declare_price_input = function(declare_price_input) {
	if (declare_price_input == 0 || isNaN(declare_price_input) || !/^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/.test(declare_price_input)) {
		return false;
	}
	return true;
}

Rvalildate.tracking_input = function(tracking_input) {
	if (tracking_input.length > 20 || tracking_input.length < 0) {
		return false;
	}
	return true;
}

Rvalildate.int_input = function(int_input) {
	return /^[0-9]*[1-9][0-9]*$/.test(int_input);
}

//限制item和数量的格式输入，只允许输入数字
$(document).on("keyup", ".product_id_input,.product_count_input", function() {
	var value = $(this).val();
	//先清除class
	$(this).removeClass('redBorder');
	//有输入才判断
	if (value.length != 0) {
		if(value.indexOf(" ")>=0){
				$(this).val(value.replace(/\s/g, ""));
		}else if (!Rvalildate.int_input(value)) {
			$(this).addClass('redBorder');
		} else {
			$(this).removeClass('redBorder');
		}
	}
});

//统一 总重量、包装规格、申报名称、总申报价值 验证
$(document).on("keyup", ".validate", function() {
	var rule = $(this).attr('rule');
	var value = $(this).val();
	switch (rule) {
		case 'weight_input':
			if(value.indexOf(" ")>=0){
				$(this).val(value.replace(/\s/g, ""));
			}else if (!Rvalildate.weight_input(value)) {
				$(this).addClass('redBorder');
			} else {
				$(this).removeClass('redBorder');
			}
			break;

		case 'package_size_input':
			if (!Rvalildate.package_size_input(value)) {
				$(this).addClass('redBorder');
			} else {
				$(this).removeClass('redBorder');
			}
			break;

		case 'declare_name_input':
			if (!Rvalildate.notNull(value)) {
				$(this).addClass('redBorder');
			} else {
				$(this).removeClass('redBorder');
			}
			break;

		case 'declare_price_input':
			if(value.indexOf(" ")>=0){
				$(this).val(value.replace(/\s/g, ""));
			}else if (!Rvalildate.declare_price_input(value)) {
				$(this).addClass('redBorder');
			} else {
				$(this).removeClass('redBorder');
			}
			break;

		case 'tracking_input':
			if (!Rvalildate.tracking_input(value)) {
				$(this).addClass('redBorder');
			} else {
				$(this).removeClass('redBorder');
			}
			break;

		case 'int_input':
			if (!Rvalildate.int_input(value)) {
				$(this).addClass('redBorder');
			} else {
				$(this).removeClass('redBorder');
			}
			break;

		default:
			break;
	}
});

//sku匹配
$('.editTC').on('blur', '.sku_input', function() {
	var patrnSku = /^[^\'\"\<\>\&]*$/;
	var sku = $(this).val();
	var this_sku = $(this);

	$.ajax({
		url: '?r=oms/Shaliexpress/MatchSku&sku=' + sku,
		dataType: 'json',
		success: function(data) {
			var this_sku = data.product_sku;
			var sale_sku = data.sale_sku;
			var weight = data.weight;
			var declare_name = data.declare_name;
			var declare_price = data.declare_price;
			var packing = data.packing;
			if (typeof(this_sku) === 'undefined'&&typeof(sale_sku)=== 'undefined') {
				util.showTips('warning', 'sku不存在,请重新输入');
				return false;
			} else if (this_sku === '') {
				util.showTips('warning', 'sku不能为空');
				return false;
			} else {
				$('.editTC .itemInfo tbody td input[name="weight_g"]').attr('value', weight);
				$('.editTC .itemInfo tbody td input[name="declare_name"]').attr('value', declare_name);
				$('.editTC .itemInfo tbody td input[name="declare_price"]').attr('value', declare_price);
				$('.editTC .itemInfo tbody td input[name="size"]').attr('value', packing);
			}
		}
	});
});

//待下单订单编辑
function showEditWindows(platform, orderId) {
	// 下拉弹窗
	$('#editOrderWindow').slideDown('fast');
	// 绑定弹窗关闭按钮事件
	$('[name=closeEdit]').on('click', function(event) {
		$("#editOrderWindow").slideUp('fast');
	});

	// 用户选中某个国家后执行的操作
	var countrySelectedHandler = function(countryInfo) {
		if (countryInfo == '') {
			return false;
		}
		$('#S_Country').val(countryInfo.en);
		$('#countrycode').attr('value', countryInfo.code);
	};
	// 绑定"选择国家"按钮事件
	$("#editOrderWindow").find("[name=selectCountryButton]").on('click', function(event) {
		var currentCountryCode = $('#countrycode').attr('value'); // 当前选中国家
		oms.showCountryListModal(currentCountryCode, countrySelectedHandler);
	});

	// 刷新订单详细信息
	listOrderDetail(platform, orderId);
}

function listOrderDetail(platform, orderId) {
	//编辑页面数据绑定
	$.ajax({
		url: "index.php?r=oms/shaliexpress/EditBind&id=" + orderId + "&c=" + Math.random(),
		dataType: 'json',
		success: function(data) {
			$('.editTC .itemInfo #addItem').siblings().remove();
			//var ItemData = data.items;
			var AddressData = data.address;
			var DeclareData = data.declare;
			//显示头部交易号
			$('.editHead .sc').html('[订单号：' + DeclareData.AliOrderId + ']');
			//显示产品信息
			var $itemTr_str = '';
			if (data.items == '') {
				$itemTr_str = '<tr class="editTableCon no_item_data"><td colspan="9">没有相关产品数据</td></tr>';
				$('.editTC .itemInfo tbody').prepend($itemTr_str);
				$('#addItem').attr("data-orderId", DeclareData.order_id);
				$('#addItem').attr("data-AliOrderId", DeclareData.AliOrderId);
			} else {
				for (var i = 0; i < data.items.length; i++) {
					$itemTr_str += '<tr class="editTableCon editTable" data-id="' + data.items[i].order_item_id + '">' +
						'<td><span class="itemId">' + data.items[i].productId + '</span><input type="text" name="productId" class="edit_productId product_id_input" disabled="disabled" id="productId"/></td>' +
						'<td><span class="itemTitle">' + data.items[i].productName + '</span><input type="text" name="productName" class="edit_productName"/></td>' +
						'<td><span class="sku">' + data.items[i].sku + '</span><input type="text" name="skuCode" class="edit_skuCode sku_input"/></td>' +
						'<td><span class="singleWeight">' + data.items[i].weight_g + '</span><input type="text" name="weight_g" class="edit_weight_g validate" rule="weight_input" /></td>' +
						'<td><span class="quantity">' + data.items[i].fixed_quantity + '</span><input type="text" name="productCount" class="edit_productCount product_count_input"/></td>' +
						'<td><span class="itemSize">' + data.items[i].size + '</span><input type="text" name="size" class="edit_size validate" rule="package_size_input" /></td>' +
						'<td><span class="declareName">' + data.items[i].declare_name + '</span><input type="text" name="declare_name" class="edit_declare_name validate" rule="declare_name_input" /></td>' +
						'<td><span class="declarePrice">' + data.items[i].declare_price + '</span><input type="text" name="declare_price" class="edit_declare_price validate" rule="declare_price_input" /></td>' +
						'<td width="80">' +
						'<p class="editBtnBox"><a href="javascript:;" class="itemEdit btn" order_item_id="' + data.items[i].order_item_id + '">编辑</a><a href="javascript:;" class="btn itemDel" id="deleteOrder" source="' + data.items[i].source + '" data-oid="' + data.items[i].order_id + '">删除</a></p>' +
						'<p class="saveBtnBox"><a href="javascript:;" class="saveItemEdit btn btn-primary" orid="' + data.items[i].order_id + '" oiid="' + data.items[i].order_item_id + '" onclick=saveItem(this)>确定</a> <a href="javascript:;" class="cancelItemEdit btn">取消</a></p>' +
						'</td>' +
						'</tr>';
				}
				$('.editTC .itemInfo #addItem').before($itemTr_str);
				//order_id和AliOrderId为后面实现添加商品功能调用
				$('#addItem').attr("data-orderId", DeclareData.order_id);
				$('#addItem').attr("data-AliOrderId", DeclareData.AliOrderId);
			}

			/*--------------------------------显示留言信息--------------------*/
			$('.noteBox .table-bordered .liuyan').html('');
			if (DeclareData.order_msgList == '') {
				$('.noteBox .table-bordered .liuyan').html('无留言');
			} else {
				$('.noteBox .table-bordered .liuyan').html(DeclareData.order_msgList);
			}

			/*------------------------------显示地址信息--------------------*/
			$('#address_id').val();
			$('.box2 .box2Table').val('');
			$('#BuyerPhone').val('');
			$('#S_Country').val('');
			$('#S_Country').val('');
			$('#countrycode').val('');
			if (AddressData) {
				$('#address_id').val(AddressData.address_id);
				$('.box2 .box2Table .BuyerName').val(AddressData.BuyerName);
				$('.box2 .box2Table .Line1').val(AddressData.Street1);
				$('.box2 .box2Table .Line2').val(AddressData.Street2);
				$('.box2 .box2Table .City').val(AddressData.CityName);
				$('.box2 .box2Table .Disctrict').val(AddressData.StateOrProvince);
				$('.box2 .box2Table .PostalCode').val(AddressData.PostalCode);
				$('#BuyerPhone').val(AddressData.BuyerPhone);
				$('#S_Country').attr('data-countryname', AddressData.CountryName);
				$('#S_Country').val(AddressData.CountryName);
				$('#countrycode').val(AddressData.CountryCode);
			}

			/*--------------------------显示申报信息-------------------*/
			$('.box2 .box2Table').val('');
			if (DeclareData) {
				$('.box2 .box2Table .weight').val(DeclareData.weight);
				$('.box2 .box2Table .packageSize').val(DeclareData.package_size);
				$('.box2 .box2Table .declare_name').val(DeclareData.declare_name);
				$('.box2 .box2Table .declare_price').val(DeclareData.declare_price);
				$('.box2 .box2Table .remark').val(DeclareData.package_note);
				$('.box2 .box2Table .logisticsNo').val(DeclareData.logisticsNo);
			}
		}
	});

}

//编辑包裹产品信息
function editItemsData() {
	$('#productItem').on('click', '.itemEdit', function() {
		var self = $(this);
		var input_list = $(this).parents('td').siblings().find('span');

		$("[name='productId']").remove("input");
		//除去所有的redBorder class
		self.parents('td').siblings().find('input').removeClass('redBorder');

		//按钮的显示与隐藏
		$(this).parent().hide();
		$(this).parent().siblings().show();
		//数据的显示与隐藏
		$(this).parent().parent().siblings().find('span').hide();
		$(this).parent().parent().siblings().find('input').show();

		//获取该条商品的详细信息
		var productId = input_list.filter('.itemId').text();
		var productName = input_list.filter('.itemTitle').text();
		var skuCode = input_list.filter('.sku').text();
		var weight = input_list.filter('.singleWeight').text();
		var quantity = input_list.filter('.quantity').text();
		var itemSize = input_list.filter('.itemSize').text();
		var declareName = input_list.filter('.declareName').text();
		var declarePrice = input_list.filter('.declarePrice').text();

		//显示商品信息到表单
		input_list.filter('.itemId').next().attr("value", productId);
		input_list.filter('.itemTitle').next().attr("value", productName);
		input_list.filter('.sku').next().attr("value", skuCode);
		input_list.filter('.singleWeight').next().attr("value", weight);
		input_list.filter('.quantity').next().attr("value", quantity);
		input_list.filter('.itemSize').next().attr("value", itemSize);
		input_list.filter('.declareName').next().attr("value", declareName);
		input_list.filter('.declarePrice').next().attr("value", declarePrice);

		//取消编辑
		cancelItemEdit();
	});
}

/**
 * 取消编辑
 */
function cancelItemEdit() {
	//取消编辑
	$('#productItem').on('click', '.cancelItemEdit', function() {
		//隐藏按钮
		$(this).parent().siblings().show();
		$(this).parent().hide();
		//隐藏数据
		$(this).parents('td').siblings().find('input').hide();
		$(this).parents('td').siblings().find('span').show();
	});
}


/**
 * 添加商品
 */
function addItems(){
	//点击添加商品按钮，显示界面	
	$('.editbox .add_order_btn').on('click', function(){
		$('#addItem input').attr('value', '');
		$('.editTable').show();
		$('.no_item_data').hide();
	});
	
	//添加数据
	addItemData();
	}
	
/**
 * 添加数据
 */
function addItemData() {
	$('#confirm-add-btn').on('click', function() {
		var order_id = $('#addItem').attr('data-orderId');
		var AliOrderId = $('#addItem').attr('data-AliOrderId');
		var this_td = $(this).parents('td').siblings();
		var this_tr = $(this).parents('tr').siblings();
		var skuCode = this_td.find('#add_skuCode').val();
		var productId = this_td.find('#add_productId').val();
		var productCount = this_td.find('#add_productCount').val();
		var productName = this_td.find('#add_productName').val();
		var declare_name = this_td.find('#add_declare_name').val();
		var declare_price = this_td.find('#add_declare_price').val();
		var weight_g = this_td.find('#add_weight_g').val();
		var size = this_td.find('#add_size').val();
		var flag = true;

		//除去所有的错误提示
		$(this).parents('td').siblings('td').find('input').removeClass('redBorder');

		//直接数据验证
		if (!skuCode.length || /^[\'\"\<\>\&]*$/.test(skuCode)) {
			this_td.find('#add_skuCode').addClass('redBorder');
			util.showTips('error', 'sku格式不正确');
			return false;
		}
		if (!Rvalildate.weight_input(weight_g)) {
			this_td.find('#add_weight_g').addClass('redBorder');
			util.showTips('error', '重量必须是数字');
			return false;
		}
		if (!productCount) {
			this_td.find('#add_productCount').addClass('redBorder');
			util.showTips('error', '数量不能为空');
			return false;
		} else if (!Rvalildate.int_input(productCount)) {
			this_td.find('#add_productCount').addClass('redBorder');
			util.showTips('error', '数量必须是数字');
			return false;
		}
		if (!Rvalildate.package_size_input(size)) {
			this_td.find('#add_size').addClass('redBorder');
			util.showTips('error', '格式必须是 长*宽*高');
			return false;
		}
		if (!Rvalildate.notNull(declare_name)) {
			this_td.find('#add_declare_name').addClass('redBorder');
			util.showTips('error', '申报名称不能为空');
			return false;
		}
		if (!Rvalildate.declare_price_input(declare_price)) {
			this_td.find('#add_declare_price').addClass('redBorder');
			util.showTips('error', '申报价格格式不正确');
			return false;
		}


		//发送数据	
		var itemData = {
			order_id: order_id,
			AliOrderId: AliOrderId,
			productId: productId,
			productCount: productCount,
			productName: productName,
			declare_name: declare_name,
			declare_price: declare_price,
			weight_g: weight_g,
			size: size
		};
		$.ajax({
			url: "index.php?r=oms/shaliexpress/AddOrderItem&skuCode=" + skuCode,
			dataType: 'json',
			data: itemData,
			success: function(rs) {
				if (rs.status) {
					//input换成span显示
					var itemTr_str = '<tr class="editTableCon  editTable" data-id="' + itemData.order_id + '">' +
						'<td><span class="itemId" disabled = "true">' + itemData.productId + '</span><input type="text" name="productId" class="product_id_input" disabled="disabled" /></td>' +
						'<td><span class="itemTitle">' + itemData.productName + '</span><input type="text" name="productName"/></td>' +
						'<td><span class="sku">' + skuCode + '</span><input type="text" name="skuCode" class="sku_input" /></td>' +
						'<td><span class="singleWeight">' + itemData.weight_g + '</span><input type="text" name="weight_g" class="validate" rule="weight_input" /></td>' +
						'<td><span class="quantity">' + itemData.productCount + '</span><input type="text" name="productCount" class="product_count_input" /></td>' +
						'<td><span class="itemSize">' + itemData.size + '</span><input type="text" name="size" class="validate" rule="package_size_input" /></td>' +
						'<td><span class="declareName">' + itemData.declare_name + '</span><input type="text" name="declare_name" class="validate" rule="declare_name_input" /></td>' +
						'<td><span class="declarePrice">' + itemData.declare_price + '</span><input type="text" name="declare_price" class="validate" rule="declare_price_input" /></td>' +
						'<td width="80">' +
						'<p class="editBtnBox"><a href="javascript:;" class="itemEdit btn" order_item_id="' + rs.ItemId + '">编辑</a><a href="javascript:;" class="btn itemDel" source="1" id="deleteOrder" data-oid="' + itemData.order_id + '">删除</a></p>' +
						'<p class="saveBtnBox"><a href="javascript:;" class="saveItemEdit btn btn-primary" orid="' + itemData.order_id + '" onclick="saveItem(this)" oiid="' + rs.ItemId + '">确定</a> <a href="javascript:;" class="cancelItemEdit btn">取消</a></p>' +
						'</td></tr>';
					$('#addItem').before(itemTr_str);
					$('#addItem').hide();
					$('.no_item_data').hide();

					//更新申请表信息
					$('#weight').val(rs.data.weight);
					$('#packageSize').val(rs.data.package_size);
					$('#declare_name').val(rs.data.declare_name);
					$('#declare_price').val(rs.data.declare_price);
					//设置为未更改
					itemsChange = 0;
					util.showTips('success', '添加成功');
				} else {
					util.showTips('error', '添加失败');
				}
			}
		});
	});
}

/**
 * 取消添加商品
 */
function cancelAddItem() {
	$('#rewrite').on('click', function() {
		$('#addItem input').attr('value', '');
		$('#addItem input').removeClass('redBorder');
		$('#addItem').hide();
		$('.no_item_data').show();
	});
}

//添加数据
addItems();
//取消添加商品
cancelAddItem();
//删除商品
deleteItem();
//更新申报信息
updateDeclareData();
//更新地址信息
updateAddressData();
//编辑产品信息
editItemsData();

/**
 * 删除商品
 */
function deleteItem() {
	$('#productItem').on('click', '.itemDel', function() {
		var self = $(this);
		var source = self.attr('source'); //获取状态，0 来自平台，1 来自手动输入
		var itemId = self.siblings().attr('order_item_id');
		var orderId = self.attr('data-oid');
		if (confirm("确定要删除该条产品吗？")) {
			$.ajax({
				url: "index.php?r=oms/shaliexpress/DeleteOrderItem&itemId=" + itemId + "&source=" + source + "&orderId=" + orderId,
				dataType: 'json',
				success: function(rs) {
					if (rs.status) {
						//更新样式
						self.parents('tr').remove();
						//更新申请表信息
						$('#weight').val(rs.data.weight);
						$('#packageSize').val(rs.data.package_size);
						$('#declare_name').val(rs.data.declare_name);
						$('#declare_price').val(rs.data.declare_price);
						util.showTips('success', '删除成功！');
					} else if (rs.error) {
						util.showTips('info', rs.error);
					} else {
						util.showTips('error', '删除失败！');
					}
				}
			});
		}
	});
}

//更新地址信息
function updateAddressData() {
		$('#saveadd').on('click', function() {
				var phoneNum = /^(\(\d{3,8}\)|\d{3,8}-)?\d{3,15}$/; //手机号码正则
				var specialPlane = /^(0[0-9]{2,3}\-)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?$/ ;// 座机号码验证
				var order_id = $('#addItem').attr('data-orderId'); //获取order_id
				var address_id = $('#address_id').val();
				var addrArray = {
					BuyerName: $('.box2 .box2Table .BuyerName').val(),
					Street1: $('.box2 .box2Table .Line1').val(),
					Street2: $('.box2 .box2Table .Line2').val(),
					CityName: $('.box2 .box2Table .City').val(),
					StateOrProvince: $('.box2 .box2Table .Disctrict').val(),
					PostalCode: $('.box2 .box2Table .PostalCode').val(),
					CountryName: $('.box2 .box2Table .Country').val(),
					CountryCode: $('#countrycode').val(),
					BuyerPhone: $('#BuyerPhone').val()
				};
				//电话号码验证（速卖通包含座机，有可能是平台返回，通过上传订单上传，数据不规律。无法验证）
				if (addrArray.BuyerPhone) {
					if ($('#S_Country').val() != $('#S_Country').attr('data-countryname')) {
						addressChange = 1;
					}
	
					//是否修改地址
					if (addressChange == 0) {
						util.showTips('info', '没有做任何修改！！！');
						return false;
					}
	
					$.ajax({
						url: "index.php?r=oms/shaliexpress/updateAddress&id=" + order_id + "&address_id=" + address_id,
						data: addrArray,
						dataType: 'json',
						success: function(rs) {
							if (rs.status) {
								$('#S_Country').attr('data-countryname', $('.box2 .box2Table .Country').val());
								    addressChange = 0;
									util.showTips('success', '地址信息成功');
								} else {
									util.showTips('error', '地址信息修改失败');
								}
							}
						});
					}else{
						util.showTips('warning','"Phone"不能为空');
					}							
			});
		}

		/**
		 * 申报表单数据更新
		 *  @return json
		 */
		function updateDeclareData() {
			$('#btn-save-declare').click(function() {
				//判断用户是否修改了申报信息
				if (declareChange == 0) {
					util.showTips('info', '没有做任何修改！！！');
					return false;
				}

				// 验证申报表单数据
				if (!validateDeclareFormData()) {
					return false;
				}

				//修改申报信息的ajax显示
				var data = $('form#declare_form').serialize();
				var order_id = $('#addItem').attr('data-orderId'); //获取order_id
				$.ajax({
					'type': "POST",
					'url': "index.php?r=oms/shaliexpress/UpdateDeclare&id=" + order_id,
					'data': data,
					'dataType': 'json',
					success: function(rs) {
						if (rs.status) {
							//判断是否修改了总重量、总价格，修改了同时修改对应的属性值，修改商品信息的显示
							if (rs.changeWeight) {
								$('#productItem tr').each(function() {
									$('.itemsWeight').val(rs.changeWeight);
									$('.singleWeight').text(rs.changeWeight);
								});
							}
							if (rs.changePrice) {
								$('#productItem tr').each(function() {
									$('.itemsprice').val(rs.changePrice);
									$('.declarePrice').text(rs.changePrice);
								});
							}
							if (rs.changeName) {
								$('#productItem tr').each(function() {
									$('.itemsname').val(rs.changeName.replace(/\+/g, " "));
									$('.declareName').text(rs.changeName.replace(/\+/g, " "));
								});
							}
							util.showTips('success', '修改成功！');
							declareChange = 0;
						} else {
							util.showTips('error', '修改失败！');
						}
					}
				});
			});
		}


		/**
		 * 验证申报表单数据
		 * @return bool
		 */
		function validateDeclareFormData() {
			//申报信息表单 验证		
			var weight = $('#weight').val();
			var packageSize = $('#packageSize').val();
			var declare_name = $('#declare_name').val();
			var declare_price = $('#declare_price').val();
			var tracking = $('#tracking').val();
			var flag = true;

			//先判断是否有错误信息
			$('#declare_table tr').each(function() {
				if ($(this).find('input').hasClass('redBorder')) {
					flag = false;
				}
			});

			if (!flag) {
				if (!Rvalildate.weight_input(weight)) {
					util.showTips('error', '重量必须是数字');
					return false;
				}
				if (!Rvalildate.package_size_input(packageSize)) {
					util.showTips('error', '格式必须是 长*宽*高');
					return false;
				}
				if (!Rvalildate.notNull(declare_name)) {
					util.showTips('error', '申报名称不能为空');
					return false;
				}
				if (!Rvalildate.declare_price_input(declare_price)) {
					util.showTips('error', '申报价格格式不正确');
					return false;
				}
				if (!Rvalildate.tracking_input(tracking)) {
					util.showTips('error', '包裹追踪号，20字符以内');
					return false;
				}
			}
			return true;
		}


		/**
		 * 保存修改的商品信息
		 */
		function saveItem(obj) {
			var self = $(obj);
			var this_input = self.parents('td').siblings();
			var productId = this_input.find('input[name=productId]').val();
			var productName = this_input.find('input[name=productName]').val();
			var skuCode = this_input.find('input[name=skuCode]').val();
			var weight_g = this_input.find('input[name=weight_g]').val();
			var productCount = this_input.find('input[name=productCount]').val();
			var size = this_input.find('input[name=size]').val();
			var declare_name = this_input.find('input[name=declare_name]').val();
			var declare_price = this_input.find('input[name=declare_price]').val();
			var product_sku = '';
			var seller_sku = '';
			var source = self.parent().siblings('p').children('.itemDel').attr('source');

			//判断用户是否修改了申报信息
			if (itemsChange == 0) {
				util.showTips('info', '没有做任何修改！！！');
				//修改成功后，隐藏表单和确定/取消按钮，显示编辑/删除按钮
				self.parent().hide();
				self.parent().siblings().show();
				self.parents('td').siblings().find('input').hide();
				self.parents('td').siblings().find('span').show();
				return false;
			}

			//除去所有的错误提示
			self.parents('td').siblings('td').find('input').removeClass('redBorder');

			//数据验证
			if (!skuCode.length || /^[\'\"\<\>\&]*$/.test(skuCode)) {
				this_input.find('input[name=skuCode]').addClass('redBorder');
				util.showTips('error', 'sku格式不正确');
				return false;
			}
			if (!Rvalildate.weight_input(weight_g)) {
				this_input.find('input[name=weight_g]').addClass('redBorder');
				util.showTips('error', '重量必须是数字');
				return false;
			}
			if (!productCount) {
				this_input.find('input[name=productCount]').addClass('redBorder');
				util.showTips('error', '数量不能为空');
				return false;
			} else if (!Rvalildate.int_input(productCount)) {
				this_input.find('input[name=productCount]').addClass('redBorder');
				util.showTips('error', '数量必须是数字');
				return false;
			}
			if (!Rvalildate.package_size_input(size)) {
				this_input.find('input[name=size]').addClass('redBorder');
				util.showTips('error', '格式必须是 长*宽*高');
				return false;
			}
			if (!Rvalildate.notNull(declare_name)) {
				this_input.find('input[name=declare_name]').addClass('redBorder');
				util.showTips('error', '申报名称不能为空');
				return false;
			}
			if (!Rvalildate.declare_price_input(declare_price)) {
				this_input.find('input[name=declare_price]').addClass('redBorder');
				util.showTips('error', '申报价格格式不正确');
				return false;
			}

			//发送数据			
			var ItemArray = {
				productId: productId,
				productName: productName,
				skuCode: skuCode,
				weight_g: weight_g,
				productCount: productCount,
				size: size,
				declare_name: declare_name,
				declare_price: declare_price,
				source: source
			};
			$.ajax({
				url: "?r=oms/shaliexpress/UpdateOrderItem&id=" + self.attr('oiid') + "&order_id=" + self.attr('orid'),
				data: ItemArray,
				success: function(rs) {
					//修改成功后，隐藏表单和确定/取消按钮，显示编辑/删除按钮
					self.parent().hide();
					self.parent().siblings().show();
					self.parents('td').siblings().find('input').hide();
					self.parents('td').siblings().find('span').show();

					//改变span的值
					this_input.find('.sku').html(ItemArray.skuCode);
					this_input.find('.singleWeight').html(ItemArray.weight_g);
					this_input.find('.quantity').html(ItemArray.productCount);
					this_input.find('.itemSize').html(ItemArray.size);
					this_input.find('.declareName').html(ItemArray.declare_name);
					this_input.find('.declarePrice').html(ItemArray.declare_price);
					//this_input.find('.itemId').html(ItemArray.productId);
					this_input.find('.itemTitle').html(ItemArray.productName);

					//更新申报表
					if (rs.status) {
						$('#weight').val(rs.data.weight);
						$('#packageSize').val(rs.data.package_size);
						$('#declare_name').val(rs.data.declare_name);
						$('#declare_price').val(rs.data.declare_price);
						util.showTips('success', '修改成功');
						itemsChange = 0;
					} else {
						util.showTips('error', '修改失败');
					}
				}
			});
		}