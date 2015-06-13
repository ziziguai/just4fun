/**
 * @desc 各种初始化变量
 * @author likaipeng
 * @date 2015-04-03
 */
//申报信息内容改变变量
var declareChange = 0;
//地址信息
var addressChange = 0;
//商品信息的内容改变的变量
var itemsChange = 0;

// 下拉弹窗
var $detaliWindow = $("#editOrderWindow");

/*------判断申报信息是否修改--start---likaipeng------2015-04-03-------------------------------------------*/
$("[name=weight_total],[name=size_total],[name=declare_name],[name=declare_price_total],[name=remark],[name=tracking]").on('change',function(){
	declareChange = 1;
	var $this = $(this);
	$this.val($.trim($this.val()));
});
/*------判断地址信息是否修改--start---likaipeng------2015-04-03-------------------------------------------*/
$("[name=Name],[name=Address1],[name=Address2],[name=City],[name=Province],[name=Postcode],[name=Phone],[name=countrycode]").on('change',function(){
	addressChange = 1;
	var $this = $(this);
	$this.val($.trim($this.val()));
});
/*------判断商品信息是否修改--start---likaipeng------2015-04-03-------------------------------------------*/
$('.editbox').on('change','input[type=text]',function(){
	itemsChange = 1;
	var $this = $(this);
	$this.val($.trim($this.val()));
});


// 编辑窗口呈现
function showEditWindows(platform, orderId){
	$("#platform").val(platform);
	$("#orderId").val(orderId);

	// 绑定弹窗关闭按钮事件
	$("[name=closeEdit]").on('click', function(event) {
		$("#editOrderWindow").slideUp('fast');
	});
	// 刷新订单详细信息
	listOrderDetail(platform, orderId);
}

// 用户选中某个国家后执行的操作
var countrySelectedHandler = function(countryInfo){
	if(countryInfo == ''){
		return false;
	}
	$('#S_Country').val(countryInfo.en);
	$('#countrycode').attr('value',countryInfo.code);
};
// 绑定"选择国家"按钮事件
$detaliWindow.find("[name=selectCountryButton]").on('click', function(event){
	var currentCountryCode = $('#countrycode').attr('value');  // 当前选中国家
	oms.showCountryListModal(currentCountryCode, countrySelectedHandler);
});

// 获取订单详细编辑信息
function listOrderDetail(platform,orderId){

	$.ajaxSetup({
		contentType: "application/x-www-form-urlencoded; charset=utf-8"
	});

	$.ajax({
		url: "?r=oms/shorder/Details&oid=" + orderId + '&platform=' + platform + '&cc=' + Math.random(),
		success: function(data) {
			$('.loading').hide();
			if(!data.status){
				util.showTips('error', data.msg || '网络原因，无法访问！');
				return false;
			}

			// 下拉弹窗
			$detaliWindow.slideDown('fast');
		    $('.editTC #addItem').siblings().remove();
		    var json_data = data;
			//  ==========
			/*------商品信息--start----------------------------------------------------*/
			/*------初始化地址数据---likaipeng---2015-04-03-----------------------------*/
		    $(".address").val('');
		    /*------初始化留言信息---likaipeng---2015-04-03-----------------------------*/
		    $(".message").text('');

			$('#S_Country').attr('disabled',true);
			//商品数据变量
			var detailData = json_data.orderInfo.detail;
			var addressData = json_data.orderInfo.address;
			
			//申报信息
			var packetdata = json_data.orderpacketdata.package;

			var max_size = json_data.orderpacketdata.max;
			var itemTr_str = '';
			if (detailData.length) {
				for (var i = 0; i < detailData.length; i++) {
					if(detailData[i].ItemID == 0){
						detailData[i].ItemID = '';
					}
					//显示商品
					itemTr_str += 	'<tr id="addata' + i + '" class="editTableCon" data-id=' + detailData[i].tran_id + ' data-oid=' + orderId + ' data-plat=' + 100 + '>' + '<form>' +
									  '<td><span class="itemId" name="itemId_d" id="itemId_d">' + detailData[i].ItemID + '</span><input type="text" name="itemId" id="itemId" disabled="disabled" style="background:#CCCCCC"/></td>' +
									  '<td><span class="itemTitle" name="itemTitle_d" id="itemTitle_d">' + detailData[i].Title + '</span><input type="text" name="Title" id="Title"/></td>' +
									  '<td><span class="sku" name="sku_d" id="sku_d">' + detailData[i].product_sku + '</span><input type="text" name="SKU" id="SKU" class="sku_input"/></td>' +
									  '<td><span class="singleWeight" name="singleWeight_d" id="singleWeight_d">' + detailData[i].weight_g + '</span><input type="text" name="weight_g" id="weight_g"/></td>' +
									  '<td><span class="quantity" name="quantity_d" id="quantity_d">' + detailData[i].fixed_quantity + '</span><input type="text" name="QuantityPurchased" id="QuantityPurchased"/></td>' +
									  '<td><span class="itemSize" name="itemSize_d" id="itemSize_d">' + detailData[i].size + '</span><input type="text" name="size" id="size"/></td>' +
									  '<td><span class="declareName" name="declareName_d" id="declareName_d">' + detailData[i].declare_name + '</span><input type="text" name="declare_nameo" id="declare_nameo"/></td>' +
									  '<td><span class="declarePrice" name="declarePrice_d" id="declarePrice_d">' + detailData[i].declare_price + '</span><input type="text" name="declare_priceo" id="declare_priceo"/></td>' +
									  '<td width="80">' +
									  '<p class="editBtnBox"><a href="javascript:;" class="itemEdit btn btn-small" style="margin-right: 3px;">编辑</a><a href="javascript:;" class="btn btn-small itemDel" name="deldata" >删除</a></p>' +
									  '<p class="saveBtnBox"><a href="javascript:;" class="saveItemEdit btn btn-small btn-primary savebutton" name="confirm" id = "confirm">确定</a> <a href="javascript:;" class="cancelItemEdit btn btn-small">取消</a></p>' +
									  '</td>' + '</form>' +
								  '</tr>';
				}
				$("#addItem").before(itemTr_str);
				$("[name=addItem]").attr("data-oid",orderId);
			} else {
				$(".editTC #addItem").before("<tr id='data_no'><td colspan='10'>无数据</td></tr>");
			}
			/*------商品信息-end-----------------------------------------------------*/
			//  ==========
			var OrderID = packetdata[0].OrderID;
			var tot_price = packetdata[0].declare_price;
			var tot_weight = packetdata[0].weight;
			var quantity = packetdata[0].quantity;
			var package_size = packetdata[0].package_size;
			var declare_name = packetdata[0].declare_name;
			var remark = packetdata[0].remark;
			var tracking_sn = packetdata[0].tracking_sn;
			$("[name=closeEdit]").prev().html('<span class="sc" id = "OrderID">[订单号：' + OrderID + ']</span>');
			$("[name=weight_total]").val(tot_weight);
			$("[name=declare_price_total]").val(tot_price);
			$("[name=size_total]").val(max_size);
			$("[name=declare_name]").val(declare_name);
			$("[name=tracking]").val(tracking_sn);
			$("[name=remark]").val(remark);

			/*--------------------------------显示留言信息 start-likaipeng--2015-04-03----*/
			/*--------------------------------显示paypal留言----------------------------*/
			var paypal_note = packetdata[0].paypal_message;
			if(paypal_note == ""){
				$("#paypaltext").text("无paypal留言");
			}else{
				$("#paypaltext").text(paypal_note);
			}

			/*--------------------------------显示eBay留言------------------------------*/
			var buyer_message = packetdata[0].buyer_message;
			if(buyer_message == ""){
				$("#ebaytext").text("无eBay留言");
			}else{
				$("#ebaytext").text(buyer_message);
			}

			/*--------------------------------显示留言信息 end-likaipeng--2015-04-03-----*/

			var as =$("[name=declare_name]").attr('data-id',$("[name=declare_name]").val());

			//清除添加数据
			$('#return').on('click',function(){
			    $("[name=ItemID_g]").val('');
				$("[name=Title_g]").val('');
				$("[name=SKU_g]").val('');
				$("[name=weight_g_g]").val('');
				$("[name=QuantityPurchased_g]").val('');
				$("[name=size_g]").val('');
				$("[name=declare_name_g]").val('');
				$("[name=declare_price_g]").val('');
			});

			/*--------------------------------sku匹配 start-likaipeng--2015-04-03----------------------------------*/
			$('.editTC').on('blur', '.sku_input',function(){
				var patrnSku=/^[^\'\"\<\>\&]*$/;
				var sku = $(this).val();
				$.ajax({
					url:'?r=oms/shorder/MatchSKU&sku='+sku,
					success:function(data){
						var this_sku = data.skuInfo.product_sku;
						var sale_sku = data.skuInfo.sale_sku;
						var weight = data.skuInfo.weight;
						var declare_name = data.skuInfo.declare_name;
						var declare_price = data.skuInfo.declare_price;
						var packing = data.skuInfo.packing;
						if (typeof(this_sku) === 'undefined'&&typeof(sale_sku)=== 'undefined') {
							util.showTips('warning', 'sku不存在,请重新输入');
							return false;
						} else if (this_sku === '') {
							util.showTips('warning', 'sku不能为空');
							return false;
						}else{
							$('.editTC .itemInfo tbody td input[name="weight_g"]').attr('value',weight);
							$('.editTC .itemInfo tbody td input[name="declare_nameo"]').attr('value',declare_name);
							$('.editTC .itemInfo tbody td input[name="declare_priceo"]').attr('value',declare_price);
							$('.editTC .itemInfo tbody td input[name="size"]').attr('value',packing);
						}
					}
				});
			});
			/*--------------------------------sku匹配 end-likaipeng--2015-04-03----------------------------------------*/

			//地址信息
			var addressdata = json_data.orderpacketdata.address;
			if(addressdata.length>0){
				var address_id = addressdata[0].address_id;
				var CityName = addressdata[0].CityName;
				var BuyerName = addressdata[0].BuyerName;
				var Street1 = addressdata[0].Street1;
				var Street2 = addressdata[0].Street2;
				var StateOrProvince = addressdata[0].StateOrProvince;
				var PostalCode = addressdata[0].PostalCode;
				var CountryName = addressdata[0].CountryName;
				var CountryCode = addressdata[0].CountryCode;
				var BuyerPhone = addressdata[0].BuyerPhone;
				var code = addressdata[0].CountryCode;
				$('#addressId').val(address_id);
				$("[name=City]").val(CityName);
				$("[name=Name]").val(BuyerName);
				$("[name=Address1]").val(Street1);
				$("[name=Address2]").val(Street2);
				$("[name=Province]").val(StateOrProvince);
				$("[name=Postcode]").val(PostalCode);
				$("[name=Country]").val(CountryName);
				$("[name=Phone]").val(BuyerPhone);
				$('#S_Country').attr('data-countryname',CountryName);
				$("[name=countrycode]").attr('value',code);
			}
		}
	});
	//编辑窗口》商品编辑》取消
	$('.editTC .editbox').on('click','.cancelItemEdit' ,function() {
		$(this).parent().parent().siblings().find('input').css('width', '80%');
		$(this).parent().hide();
		$(this).parent().siblings().show();
		$(this).parent().parent().siblings().find('span').show();
		$(this).parent().parent().siblings().find('input').hide();
	});

	//点击编辑窗口里边编辑商品按钮
	$('.editTC .editbox').on('click','.itemEdit', function() {
		$(this).parent().parent().siblings().find('input').css('width', '80%');
		$(this).parent().hide();
		$(this).parent().siblings().show();
		$(this).parent().parent().siblings().find('span').hide();
		$(this).parent().parent().siblings().find('input').show();

		var itemSpanText = $(this).parent().parent().siblings().find('span');
		var itemId = itemSpanText.filter('.itemId').text();
		var itemTitle = itemSpanText.filter('.itemTitle').text();
		var eBaDealNum = itemSpanText.filter('.eBaDealNum').text();
		var sku = itemSpanText.filter('.sku').text();
		var singleWeight = itemSpanText.filter('.singleWeight').text();
		var quantity = itemSpanText.filter('.quantity').text();
		var itemSize = itemSpanText.filter('.itemSize').text();
		var declareName = itemSpanText.filter('.declareName').text();
		var declarePrice = itemSpanText.filter('.declarePrice').text();

		itemSpanText.filter('.itemId').next().remove("input");
		itemSpanText.filter('.itemTitle').next().val(itemTitle);
		itemSpanText.filter('.eBaDealNum').next().val(eBaDealNum);
		itemSpanText.filter('.sku').next().val(sku);
		itemSpanText.filter('.singleWeight').next().val(singleWeight);
		itemSpanText.filter('.quantity').next().val(quantity);
		itemSpanText.filter('.itemSize').next().val(itemSize);
		itemSpanText.filter('.itemSize').next().removeClass('redBorder');
		itemSpanText.filter('.declareName').next().val(declareName);
		itemSpanText.filter('.declarePrice').next().val(declarePrice);      		

		/*------判断商品信息是否修改提示--start---likaipeng------2015-04-03-------------------------------------------*/			
		$("#confirm").click(function(){
			var self = $(this);
			//判断用户是否修改了商品信息
			if (itemsChange == 0){
				util.showTips('info','没有做任何修改！！！');
				//修改成功后，隐藏表单和确定/取消按钮，显示编辑/删除按钮
				self.parent().hide();
				self.parent().siblings().show();
				self.parents('td').siblings().find('input').hide();
				self.parents('td').siblings().find('span').show();
				return false;
			}
		});
		/*------判断商品信息是否修改提示--end---likaipeng------2015-04-03-------------------------------------------*/
		
		//产品信息字段处理
		$(".editTableCon td input").on('change',function(event){
			var $this = $(this);
			var patrnSku=/^[^\'\"\<\>\&]*$/;
			var patrnPack = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
			var patrnprice = /^([1-9]\d*|0)(\.\d{1,50})?$/;
			var item = $(this);
		
			switch(item.attr("name")){
				case "SKU":
					if (!patrnSku.test(item.val()) || item.val().length >= 50){

					}else{
						$this.attr('class','ee');
						$("[name=confirm]").removeAttr('disabled');
						$("[name=confirm]").attr('name', 'confirm');
						$("[name=confirm]").css('color','white');
					}
					break;
				case "declare_priceo":
					if (!$.isNumeric(item.val()) || item.val() <= 0 || !patrnprice.test(item.val())){
					}else{
						$this.attr('class','ee');
						$("[name=#]").attr('name', 'confirm');
						$("[name=confirm]").removeAttr('disabled');
						$("[name=confirm]").css('color','white');
					}
					break;
				case "weight_g":
					if (!$.isNumeric(item.val()) || item.val() <= 0){
					}else{
						$this.attr('class','ee');
						$("[name=#]").attr('name', 'confirm');
						$("[name=confirm]").removeAttr('disabled');
						$("[name=confirm]").css('color','white');
					}
					break;
				case "size":
					if (!patrnPack.test(item.val())){
					}else{
						$this.attr('class','ee');
						$("[name=#]").attr('name', 'confirm');
						$("[name=confirm]").removeAttr('disabled');
						$("[name=confirm]").css('color','white');
					}
					break;
				case "QuantityPurchased":
					if (!$.isNumeric(item.val()) || item.val() <= 0){
					}else{
						$this.attr('class','ee');
						$("[name=#]").attr('name', 'confirm');
						$("[name=confirm]").removeAttr('disabled');
						$("[name=confirm]").css('color','white');
					}
					break;
				default:
					break;
			}
		});
	});

	//添加按钮
	$('.editbox').on('click','#addware',function(){
		if(skuChange == 0){
			$('#data_no').remove();
		}
		$('#addware').hide();
		$("[name=addItem]").show();
		$("[name=addItem]").find('input').val('');
	});
	//取消添加
	$('.editbox').on('click','#cancel',function(){
		$(this).parents('tr').hide();
		$('#addware').show(0);
	});

	//申报信息匹配
	$("#shensave").find("input").on('blur',function(){
		var patrnSku=/^[^\'\"\<\>\&]*$/;
		var patrnPack = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
		var patrnprice = /^([1-9]\d*|0)(\.\d{1,50})?$/;
		var item = $(this);
		switch(item.attr("name")){
			case "declare_price_total":
				if (!$.isNumeric(item.val()) || item.val() <= 0 || !patrnprice.test(item.val())){
					item.addClass('redBorder');
				}else{
					item.removeClass('redBorder');
				}
				break;
			case "weight_total":
				if (!$.isNumeric(item.val()) || item.val() <= 0){
					item.addClass('redBorder');
				}else{
					item.removeClass('redBorder');
				}
				break;
			case "declare_name":
				if (item.val() == ''){
					item.addClass('redBorder');
				}else{
					item.removeClass('redBorder');
				}
				break;
			case "size_total":
				if (!patrnPack.test(item.val())){
					item.addClass('redBorder');
				}else{
					item.removeClass('redBorder');
				}
				break;
			case "tracking":
				if (item.val().length>20){
					item.addClass('redBorder');
				}else{
					item.removeClass('redBorder');
				}
				break;
			default:
				break;
		}

	});
    	//-----------为申报价值，数量 ，单个重量过滤空格-（林培雁2015-5-14）
	$('.editbox ').on('blur','input[name="weight_g"],input[name="QuantityPurchased"],input[name="declare_priceo"]',function(){
		$thisV=$(this).val();
		if($thisV.indexOf(" ")>=0){
			$(this).val($thisV.replace(/\s/g, ""))
		}
	})

	/*---------------------------产品信息验证-start--likaipeng--2015-04-03---------------------*/
	//定义修改常量
	var skuChange = 0;
	var declarePriceChange = 0;
	var weightChange = 0;
	var sizeChange = 0;
	var quantityChange = 0;

	$('.editbox').on('blur','#addItem input[type=text]',function(){
		var $this = $(this);
		var patrnSku=/^[^\'\"\<\>\&]*$/;
		var patrnPack = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
		var patrnprice = /^([1-9]\d*|0)(\.\d{1,50})?$/;;
		var item = $(this);
		switch(item.attr("name")){
			case "SKU_g":
				if (!patrnSku.test(item.val()) || item.val().length >= 50){
					util.showTips('warning','"SKU"格式不对，请重新填写！');
					$(this).addClass('redBorder');
					$('#adddata').attr('id', 'uu');
					skuChange = 1;
				}else{
					$(this).removeClass('redBorder');
				}
				break;
			case "declare_price_g":
				if (!$.isNumeric(item.val()) || item.val() <= 0 || !patrnprice.test(item.val())){
					util.showTips('warning','申报价值只能输入数字，请重新填写！');
					$(this).addClass('redBorder');
					$('#adddata').attr('id', 'uu');
					declarePriceChange = 1;
				}else{
					$(this).removeClass('redBorder');
				}
				break;
			case "weight_g_g":
				if (!$.isNumeric(item.val()) || item.val() <= 0){
					util.showTips('warning','单个重量只能输入数字，请重新填写！');
					$(this).addClass('redBorder');
					$('#adddata').attr('id', 'uu');
					weightChange = 1;
				}else{
					$(this).removeClass('redBorder');
				}
				break;
			case "size_g":
				if (!patrnPack.test(item.val()) || item.val() <= 0){
					util.showTips('warning','产品规格为 n*n*n格式，请重新填写！');
					$(this).addClass('redBorder');
					$('#adddata').attr('id', 'uu');
					sizeChange = 1;
				}else{
					$(this).removeClass('redBorder');
				}
				break;
			case "QuantityPurchased_g":
				if (!$.isNumeric(item.val()) || item.val() <= 0){
					util.showTips('warning','数量只能输入数字格式，请重新填写！');
					$(this).addClass('redBorder');
					$('#adddata').attr('id', 'uu');
					quantityChange = 1;
				}else{
					$(this).removeClass('redBorder');
				}
				break;
			default:
			break;
		}
		if(skuChange==0 && declarePriceChange==0 && weightChange==0 && sizeChange==0 && quantityChange==0){
			$('#uu').attr('id', 'adddata');
		}
	});
}
/*---------------------------产品信息验证-end----likaipeng--2015-04-03---------------------*/


var platform = $("#platform").val();
//添加数据
$('[name = "adddata"]').click(function(){
	var orderId = $("#orderId").val();
	$('#addItem').attr('data-oid',orderId);
	var order_oid = $('#addItem').attr('data-oid');
	var ItemID = $("[name=itemId_d]").val();
	var Title = $("[name=Title_g]").val();
	var SKU = $("[name=SKU_g]").val();
	var weight_g = $("[name=weight_g_g]").val();
	var QuantityPurchased = $("[name=QuantityPurchased_g]").val();
	var size = $("[name=size_g]").val();
	var declare_name = $("[name=declare_name_g]").val();
	var declare_price = $("[name=declare_price_g]").val();
	var itemTr_str = '';
	if(Title=='' && SKU=='' && weight_g=='' && QuantityPurchased=='' && size=='' && declare_name=='' && declare_price==''){
		util.showTips('warning','请勿添加空数据，请重新添加');
		return false;
	}else if(SKU == ''){
		util.showTips('warning','请输入sku');
		return false;
	}else if(weight_g == ''){
		util.showTips('warning','请输入单个重量');
		return false;
	}else if(QuantityPurchased == ''){
		util.showTips('warning','请输入单个数量');
		return false;
	}else if(size == ''){
		util.showTips('warning','请输入规格');
		return false;
	}else if(declare_name == ''){
		util.showTips('warning','请输入申报名称');
		return false;
	}else if(declare_price == '' || declare_price<=0){
		util.showTips('warning','请输入单个申报价值并且价值大于零');
		return false;
	}
	var additem ={"oid":orderId, "platform":platform,
			"declare_price":declare_price,"declare_name":declare_name,"size":size,
			"QuantityPurchased":QuantityPurchased,"weight_g":weight_g,"Title":Title,"product_sku":SKU};
	$.ajax({
		type:"post",
		url: "?r=oms/shorder/SaveItem",
		contentType:"application/x-www-form-urlencoded;charset=utf-8",
		data: additem,
		success: function(data) {
			if(data == null && data instanceof Object){
				return false;
			}
			var json_data =data;
			var tran_id = json_data.status.tran_id;
			itemTr_str = "<tr class='editTableCon' data-id=" + tran_id + " data-oid=" + orderId + ">" +
			             '<td><span class="itemId" name="itemId_d" id="itemId_d">' + ItemID + '</span><input type="text" name="Title" id="itemId" disabled="disabled" style="background:#CCCCCC"/></td>' +
					     "<td><span class='itemTitle' name='itemTitle_d' id='itemTitle_d'>" + Title + "</span><input type='text' name='Title' id='Title' disabled='disabled' style='background:#CCCCCC'/></td>" +
					     "<td><span class='sku' name='sku_d' id='sku_d'>" + SKU + "</span><input type='text' name='SKU' id='SKU' class='sku_input'/></td>" +
					     "<td><span class='singleWeight' name='singleWeight_d' id='singleWeight_d'>" + weight_g + "</span><input type='text' name='weight_g' id='weight_g'/></td>" +
					     "<td><span class='quantity' name='quantity_d' id='quantity_d'>" + QuantityPurchased + "</span><input type='text' name='QuantityPurchased' id='QuantityPurchased'/></td>" +
					     "<td><span class='itemSize' name='itemSize_d' id='itemSize_d'>" + size + "</span><input type='text' name='size' id='size'/></td>" +
					     "<td><span class='declareName' name='declareName_d' id='declareName_d'>" + declare_name + "</span><input type='text' name='declare_nameo' id='declare_nameo'/></td>" +
					     "<td><span class='declarePrice' name='declarePrice_d' id='declarePrice_d'>" + declare_price + "</span><input type='text' name='declare_priceo' id='declare_priceo'/></td>" +
					     "<td width='80'>" +
					     "<p class='editBtnBox'><a href='javascript:;' class='itemEdit btn'>编辑</a><a href='javascript:;' class='btn itemDel' name='deldata' >删除</a></p>" +
					     "<p class='saveBtnBox'><a href='javascript:;' class='saveItemEdit btn btn-primary savebutton' name='confirm' >确定</a> <a href='javascript:;' class='cancelItemEdit btn'>取消</a></p>" +
					     "</td>" +
					     "</tr>";
			var sizeddwe = data.status.package_size;
			var weig_g_g = data.status.weight_g;
			var decl_name_g = data.status.declare_name;
			var de_price_g = data.status.declare_price;
			$("[name=weight_total]").val(weig_g_g);
			$("[name=declare_name]").val(decl_name_g);
			$("[name=declare_price_total]").val(de_price_g);
			$("[name=size_total]").val(sizeddwe);
			$('#addItem').hide('');
			$('#addItem').before(itemTr_str);
	}
	});
	$(this).parents('tr').hide();
	$('#addware').show();
});

//删除商品
$('.editbox').on('click',"[name=deldata]",function(){
	var a = 0;
	var thisTr=$(this);
	var orderId = $("#orderId").val();
	if(confirm('你确定要删除吗？')){
	var thisId = $(this).parents('tr').attr('data-id');
	$.ajax({
		type:"post",
		contentType:"application/x-www-form-urlencoded;charset=utf-8",
		url: "?r=oms/shorder/DeleteItem&iid=" + thisId + '&platform=' + platform + '&oid=' + orderId,
		success: function(data) {
			if(data.status.num){
				util.showTips('warning','数据仅剩一条,请勿删除');
				return false;
			}else{
				if(data.status.del==1){
					if(a==0){
						$('#data_no').before();
					}
					var weig_g = data.status.total_weight;
					var decl_name = data.status.declare_name;
					var de_price = data.status.total_price;
					var sizeddw = data.status.size;
					$("[name=weight_total]").val(weig_g);
					$("[name=declare_name]").val(decl_name);
					$("[name=declare_price_total]").val(de_price);
					$("[name=size_total]").val(sizeddw);
					thisTr.parents('tr').remove();
					a=0;
				}else{
					util.showTips('error','删除失败，可能是网络问题，请重新删除');
				}
			}
		}
		});
	};
});

//修改申报信息
$('#saveshen').on('click',function(){
	$('.loading').show();
	var orderId = $("#orderId").val();
	var weight_v = $('#S_weight_total').attr('class');
	var size_total_v = $('#S_size_total').attr('class');
	var tracking_v = $('#S_tracking').attr('class');
	//新增保存追踪号判断
	var tracking = $("[name=tracking]").val();
		tracking+= '';
	if(tracking.length>20){
		util.showTips('error','包裹追踪号填写超出20字符，请重新输入');
		return;
	}
	var de_name = $('#S_declare_name').attr('class');
	var declare_price_total_v = $('#S_declare_price_total').attr('class');
	if(weight_v == 'redBorder' || size_total_v == 'redBorder' || declare_price_total_v == 'redBorder' || tracking_v == 'redBorder' || de_name == 'redBorder'){
		util.showTips('error','请重新输入');
		return false;
	}else{
		$('#ass').attr("id","saveshen");
	}
	if(declareChange == 1){
		var orderIdd = orderId;
		var weight = $("[name=weight_total]").val();
		var size = $("[name=size_total]").val();
		var declare_namey = $("[name=declare_name]").val();
		var declare_price = $("[name=declare_price_total]").val();
		var remark = $("[name=remark]").val();
		var tracking = $("[name=tracking]").val();
		var datary ={"oid":orderIdd, "weight_total":weight,
				"platform":platform,"size_total":size,"declare_name":declare_namey,"declare_price_total":declare_price,
				"remark":remark,"tracking_sn":tracking};
		$.ajax({
			type:"post",
			data: datary,
			contentType:"application/x-www-form-urlencoded;charset=utf-8",
			url: "?r=oms/shorder/SavePackage",
			success: function(data) {
				$('.loading').hide();
				if(data==''){
					util.showTips('error','修改失败');
				}else{
					util.showTips('success','修改成功');
				}
				var json_data = data;
				if(json_data.status.data.declare_price && json_data.status.data.declare_name && !json_data.status.data.weight_g){
					var de_price = json_data.status.data.declare_price;
					var de_name = json_data.status.data.declare_name;
					$("[name=declarePrice_d]").text(de_price);
					$("[name=declareName_d]").text(de_name);
				}else if(json_data.status.data.weight_g && json_data.status.data.declare_name && !json_data.status.data.declare_price){
					var weight_gg = json_data.status.data.weight_g;
					var de_name = json_data.status.data.declare_name;
					$("[name=singleWeight_d]").text(weight_gg);
					$("[name=declareName_d]").text(de_name);
				}else if(json_data.status.data.weight_g && json_data.status.data.declare_price && json_data.status.data.declare_name){
					var de_price = json_data.status.data.declare_price;
					var weight_gg = json_data.status.data.weight_g;
					var de_name = json_data.status.data.declare_name;
					$("[name=singleWeight_d]").text(weight_gg);
					$("[name=declareName_d]").text(de_name);
					$("[name=declarePrice_d]").text(de_price);
				}else if(!json_data.status.data.weight_g && !json_data.status.data.declare_price && json_data.status.data.declare_name){
					var de_name = json_data.status.data.declare_name;
					$("[name=declareName_d]").text(de_name);
				}else if(json_data.status.data.weight_g && json_data.status.data.declare_price && !json_data.status.data.declare_name){
					var de_price = json_data.status.data.declare_price;
					var weight_gg = json_data.status.data.weight_g;
					$("[name=singleWeight_d]").text(weight_gg);
					$("[name=declarePrice_d]").text(de_price);
				}else if(json_data.status.data.weight_g && !json_data.status.data.declare_price && !json_data.status.data.declare_name){
					var weight_gg = json_data.status.data.weight_g;
					$("[name=singleWeight_d]").text(weight_gg);
				}else if(!json_data.status.data.weight_g && json_data.status.data.declare_price && !json_data.status.data.declare_name){
					var de_price = json_data.status.data.declare_price;
					$("[name=declarePrice_d]").text(de_price);
				}
			}
		});
		declareChange = 0;
	}else{
		$('.loading').hide();
		util.showTips('warning','您未修改申报信息，请重新修改');
	}
});

//编辑窗口》商品编辑》确定
$('.editbox').on('click',"[name=confirm]",function(){
	var patrnSku=/^[^\'\"\<\>\&]*$/;
	var patrnPack = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
	var patrnprice = /^([1-9]\d*|0)(\.\d{1,50})?$/;
	var orderId = $("#orderId").val();
	var parentTd= $(this).parents('td').siblings();
	var tran_id = $(this).parents('tr').attr("data-id");
	var Title = parentTd.find("[name=Title]").val();
	var SKU = parentTd.find("[name=SKU]").val();
	var weight_g = parentTd.find("[name=weight_g]").val();
	var QuantityPurchased = parentTd.find("[name=QuantityPurchased]").val();
	var size =parentTd.find("[name=size]").val();
	var declare_name =parentTd.find("[name=declare_nameo]").val();
	var declare_price = parentTd.find("[name=declare_priceo]").val();
	var ad = QuantityPurchased * weight_g;
	if (!patrnSku.test(SKU) || SKU.length >= 50){
		util.showTips('warning','请重新输入sku');
		$(this).addClass('redBorder');
		return false;
	}else{
		$(this).removeAttr('redBorder');
	}
	if (!$.isNumeric(declare_price) || declare_price <= 0 || !patrnprice.test(declare_price)){
		util.showTips('warning','请重新输入单个价值，数量必须大于零或格式不对');
		$("[name=declare_priceo]").addClass('redBorder');
		return false;
	}else{
		$(this).removeAttr('redBorder');
	}
	if (!$.isNumeric(weight_g) || weight_g <= 0){
		util.showTips('warning','请重新输入重量，数量必须大于零或格式不对');
		$("[name=weight_g]").addClass('redBorder');
		return false;
	}else{
		$(this).removeAttr('redBorder');
	}
	if (!patrnPack.test(size)){
		util.showTips('warning','请重新输入规格');
		$("[name=size]").addClass('redBorder');
		return false;
	}else{
		$("[name=size]").removeAttr('redBorder');
	}
	if (!$.isNumeric(QuantityPurchased) || QuantityPurchased <= 0){
		util.showTips('warning','请重新输入数量，数量必须大于零或格式不对');
		$("[name=QuantityPurchased]").addClass('redBorder');
		return false;
	}else{
		$(this).removeAttr('redBorder');
	}
	if (declare_name == ''){
		util.showTips('warning','请重新申报名称');
		$("[name=declare_nameo]").addClass('redBorder');
		return false;
	}else{
		$(this).removeAttr('redBorder');
	}
	var data ={"oid":orderId, "platform":platform,
			"tran_id":tran_id,"declare_price":declare_price,"declare_name":declare_name,"size":size,
			"QuantityPurchased":QuantityPurchased,"weight_g":weight_g,"Title":Title,"product_sku":SKU};
	$.ajax({
		type:"post",
		data : data,
		url: "?r=oms/shorder/SaveItem",
		contentType:"application/x-www-form-urlencoded;charset=utf-8",
		success: function(data) {
			if(data){
				parentTd.find('#itemTitle_d').html(Title);
				parentTd.find('#sku_d').html(SKU);
				parentTd.find('#singleWeight_d').html(weight_g);
				parentTd.find('#quantity_d').html(QuantityPurchased);
				parentTd.find('#itemSize_d').html(size);
				parentTd.find('#declareName_d').html(declare_name);
				parentTd.find('#declarePrice_d').html(declare_price);
				var weight = data.info.weight;
				var declare_price = data.info.declare_price;
				var declare_name = data.info.declare_name;
				var package_size = data.info.package_size;
				$("[name=weight_total]").val(weight);
				$("[name=declare_price_total]").val(declare_price);
				$("[name=declare_name]").val(declare_name);
				$("[name=size_total]").val(package_size);
			}
		}
	});
		$(this).parent().hide();
		$(this).parent().siblings().show();
		parentTd.find('span').show();
		parentTd.find('input').hide();
});

//修改地址信息
$('#saveadd').click(function(){
	var phoneNum = /^(\(\d{3,8}\)|\d{3,8}-)?\d{3,15}$/; //电话号码正则
	var orderId = $("#orderId").val();
	var address_id =$('#addressId').val();
	var orderIdd = orderId;
	var Name = $("[name=Name]").val();
	var Address1 = $("[name=Address1]").val();
	var Address2 = $("[name=Address2]").val();
	var City = $("[name=City]").val();
	var Province = $("[name=Province]").val();
	var Postcode = $("[name=Postcode]").val();
	var Country = $("[name=Country]").val();
	var Phone = $("[name=Phone]").val();
	var CountryCode = $("[name=countrycode]").val();
	var datar ={"oid":orderIdd, "address_id":address_id,
				"BuyerName":Name,"platform":platform,"Street1":Address1,"Street2":Address2,"CityName":City,
				"StateOrProvince":Province,"PostalCode":Postcode,"CountryName":Country,"BuyerPhone":Phone,"CountryCode":CountryCode};
	if($('#S_Country').val() != $('#S_Country').attr('data-countryname')){
		addressChange = 1;
	}
	if (phoneNum.test(Phone) || !Phone) {
	if(addressChange == 1){
		$.ajax({
			type:"post",
			data : datar,
			contentType:"application/x-www-form-urlencoded;charset=utf-8",
			url: "?r=oms/shorder/SaveAddress",
			success: function(data) {
				if(data==''){
					util.showTips('success','修改失败');
				}else{
					addressChange = 0;
					util.showTips('success','修改成功');
				}
			}
		});		
	}else{
		util.showTips('warning','您未修改地址信息，请重新修改');
	}
	}else{util.showTips('warning','"Phone"格式不对，请重新填写');}
});