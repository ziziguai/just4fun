//商品信息的内容改变的变量
var itemsChange = 0;
//地址信息内容改变的变量 0表示没有修改，1表示进行了修改
var addressChange = 0;
//申报信息内容改变变量
var declareChange = 0;
//添加商品的文本框的内容改变的变量
var addItemChange = 0;
// 编辑窗口呈现
function showEditWindows(platform,orderId){
	$('a').off('click',"**");
	// 下拉弹窗
	$("#wishOrderEditWindow").slideDown('fast');
	// 绑定弹窗关闭按钮事件
	$("[name=closeEdit]").on('click', function(event) {
		$("#wishOrderEditWindow").slideUp('fast');
	});
	//点击添加商品的按钮,显示添加框
	$('#addware').on('click',function(){
		$('#addItem').show(0);
		//初始化文本框清空里面原有的数据
		$('#addProductId').val('');
		$('#addTitle').val('');
		$('#addSku').val('');
		$('#addWeight').val('');
		$('#addSize').val('');
		$('#addDeclareName').val('');
		$('#addDeclareValue').val('');
		$('#addquantity').val('');
	});	
	//添加商品》取消按钮
	$('#cancel-btn').on('click',function(){
		$('#addItem').hide();
	});

	// 刷新订单详细信息
	listOrderDetail(platform,orderId);	
}

/*-------------------------------------------------------------*/
//获取订单编辑的详细信息
function listOrderDetail(platform,dataId)
{
	order_id = dataId;
	$('.editTC').slideDown(200);
	$.ajax({
		url: "?r=oms/Shwish/SelectItem&order_id=" + dataId + "&c=" + Math.random(),
		success: function(datas) {
			var transactionid = datas.transactionid;
			var json_datas = datas;
			var address = json_datas.add;
			var declare = json_datas.declare;
			var totalinfo = json_datas.total;			
			//显示交易号
			$('#transactionid').text(transactionid[0]['transaction_id']);
			//绑定订单号
			$('#order_handle_id').val(order_id);
			
			/*-----------------------地址信息start--------------------------------*/	
			//初始化地址信息
			$('#BuyerName').val('');
			$('#street1').val('');
			$('#street2').val('');
			$('#CityName').val('');
			$('#StateOrProvince').val('');
			$('#PostalCode').val('');
			$('#CountryName').val('');
			$('#BuyerPhone').val('');
			$('#addressId').val('');			
			//显示地址信息
			if(address[0]){
				$('#BuyerName').val(address[0].BuyerName);
				$('#street1').val(address[0].street1);
				$('#street2').val(address[0].street2);
				$('#CityName').val(address[0].CityName);
				$('#StateOrProvince').val(address[0].StateOrProvince);
				$('#PostalCode').val(address[0].PostalCode);
				$('#CountryName').val(address[0].CountryName);
				$('#CountryName').attr('data-countryname',address[0].CountryName);
				$('#CountryCode').val(address[0].CountryCode);
				$('#BuyerPhone').val(address[0].BuyerPhone);
				$('#addressId').val(address[0].address_id);		
			}			
			//显示申报信息
			if(declare[0]){
				$('#totalweight').val(declare[0].weight);
				$('#totalsize').val(declare[0].package_size);
				$('#totalname').val(declare[0].declare_name);
				$('#totalprice').val(declare[0].declare_price);
				$('#remark').val(declare[0].remark);
				$('#tracking').val(declare[0].tracking_number);				
				//修改申报信息的的文本框的属性
				$('#totalweight').attr('data-weight',declare[0].weight);
				$('#totalname').attr('data-name',declare[0].declare_name);
				$('#totalprice').attr('data-price',declare[0].declare_price);				
			}
			
			/*------商品信息--start----------------------------------------------------*/
			//商品数据变量
			var detailData = json_datas.detail;
			var $itemTr_str = '';
			if (detailData) {
				for (var i = 0; i < detailData.length; i++) {
					//显示商品
					$itemTr_str += "<tr class='editTableCon' data-id=" + detailData[i].tr_id + ">" +
						"<td><span class='itemId'>" + detailData[i].product_id + "</span><input type='text' class='remove' readonly id='product_id" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='itemTitle'>" + detailData[i].product_name + "</span><input type='text' id='product_name" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='sku'>" +  detailData[i].product_sku + "</span><input type='text' class='changeSKU' data-sku='" + detailData[i].product_sku + "' id='product_sku" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='singleWeight'>" + detailData[i].weight + "</span><input type='text' class='itemsWeight' id='weight" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='quantity'>" + detailData[i].quantity + "</span><input type='text' class='changeQuantity' id='quantity" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='itemSize'>" + detailData[i].size + "</span><input type='text' class='changeSize' id='size" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='declareName'>" + detailData[i].declare_name + "</span><input type='text' class='itemsname' id='declare_name" + detailData[i].tr_id + "'/></td>" +
						"<td><span class='declarePrice'>" + detailData[i].declare_price + "</span><input type='text' class='itemsprice' id='declare_price" + detailData[i].tr_id + "'/></td>" +
						"<td width='80'>" +
						"<p class='editBtnBox'><a href='javascript:;' class='itemEdit btn'>编辑</a><a href='javascript:;' class='btn itemDel'>删除</a></p>" +
						"<p class='saveBtnBox'><a href='javascript:;' class='saveItemEdit btn btn-primary' data-id="+detailData[i].tr_id+" onclick='saveItem("+detailData[i].tr_id+",this,"+order_id+")'>确定</a> <a href='javascript:;' class='cancelItemEdit btn'>取消</a></p>" +
						"</td>" +
						"</tr>";
				}				
				$('.itemDel').on('click',function(){
					var aaaa=$(this).parent().siblings();
					var itemID=aaaa.find('').val();
					var itemID=aaaa.find('');
					var itemID=aaaa.find('');
					var itemID=aaaa.find('');
				})
				$('.editTC #addItem').siblings().remove();
				$('.editTC #addItem').before($itemTr_str);
											
				//点击编辑窗口里边编辑商品按钮
				$('.editTC').on('click','.itemEdit', function() {
					    $('#addProductId').remove('input');
					    $('#product_id'+$(this).parents('tr').attr('data-id')).hide();
						$(this).parent().parent().siblings().find('input').css('width', '80%');
						$(this).parent().hide();
						$(this).parent().siblings().show();
						$(this).parent().parent().siblings().find('span').hide();
						$(this).parent().parent().siblings().find('input').show();

						var itemSpanText = $(this).parent().parent().siblings().find('span');
						var itemId = itemSpanText.filter('.itemId').text();
						var itemTitle = itemSpanText.filter('.itemTitle').text();
						var sku = itemSpanText.filter('.sku').text();
						var singleWeight = itemSpanText.filter('.singleWeight').text();
						var quantity = itemSpanText.filter('.quantity').text();
						var itemSize = itemSpanText.filter('.itemSize').text();
						var declareName = itemSpanText.filter('.declareName').text();
						var declarePrice = itemSpanText.filter('.declarePrice').text();

						itemSpanText.filter('.itemId').next().val(itemId);
						itemSpanText.filter('.itemTitle').next().val(itemTitle);
						itemSpanText.filter('.sku').next().val(sku); 
						itemSpanText.filter('.singleWeight').next().val(singleWeight);
						itemSpanText.filter('.quantity').next().val(quantity);
						itemSpanText.filter('.itemSize').next().val(itemSize);
						itemSpanText.filter('.declareName').next().val(declareName);
						itemSpanText.filter('.declarePrice').next().val(declarePrice);
					})
				//删除商品				
				$('.editTC').off('click','.itemDel');				
				$('.editTC').on('click','.itemDel', function() {
					var ensure=confirm("你确定要从包裹中删除这件商品吗");
					
					if(ensure){
						var trr = $(this).parents('tr');
						var thisId = trr.attr('data-id');
						var transcationid = $('#transactionid').text();

						$.ajax({
							url: "?r=oms/Shwish/DeleteItems&id=" + thisId + "&orderid=" + order_id + "&transactionid=" + transcationid,
							success: function(data) {
								//如果只有一条数据不给删除
								if(data['deleteIems'] == 2){
									util.showTips('error','一个包裹中至少要有一件商品！！！');
									return;
								}
								if(data['deleteIems'] == 1){
									//将删除的商品信息所在的行删除
									trr.remove();	
									if(data.updateDeclare['updateDeclares'] == true){
										//修改申报信息的显示
										$('#totalweight').val(data.declare['totalweight']);
										$('#totalsize').val(data.declare['maxsize']);
										$('#totalname').val(data.declare['totalname']);
										$('#totalprice').val(data.declare['totalprice']);
										//修改申报信息的的文本框的属性
										$('#totalweight').attr('data-weight',data.declare['totalweight']);
										$('#totalname').attr('data-name',data.declare['totalname']);
										$('#totalprice').attr('data-price',data.declare['totalprice']);
									}
									util.showTips('success','删除成功！！！');
								}else{
									util.showTips('error','删除失败！！！');
								}
							}
						});
					}					
				})	
			
				//编辑窗口》商品编辑》取消
				$('.editTC').on('click','.cancelItemEdit', function() {
					$(this).parent().parent().siblings().find('input').css('width', '80%');
					$(this).parent().hide();
					$(this).parent().siblings().show();
					$(this).parent().parent().siblings().find('span').show();
					$(this).parent().parent().siblings().find('input').hide();
				})
			} else {
				$('.editTC .itemInfo tbody').html("<tr><td colspan='10'>无数据</td></tr>");
			}
			/*------商品信息-end-----------------------------------------------------*/
		}
	});	
	
	/**
	 * 判断输入框是否为有空格、非数字、小于0
	 * @param obj-$(this);
	 * author 林培雁
	 * date 2015-5-13
	 */
	function numFun(obj){
		var $this=obj;
		var thisV=$this.val();
		if(thisV.indexOf(" ")>=0){
			$this.val(thisV.replace(/\s/g, ""));
		}else if(isNaN(thisV) || thisV == '' || thisV == 0){
			$this.addClass('redBorder');
		}else{
			$this.removeClass('redBorder');
		}
	}
	//判断用户对否对地址信息进行修改
	$('#BuyerName,#street1,#street2,#CityName,#StateOrProvince,#PostalCode,#BuyerPhone').on('change',function(){
		addressChange = 1;
		var $this = $(this);
		$this.val($.trim($this.val()));
	});
	//验证添加商品时输入的数量
	$('.editbox').on('keyup','#addquantity,.changeQuantity',function(){
		numFun($(this));
	});
	
	//验证添加商品时输入的重量
	$('.editbox').on('keyup','#addWeight,.itemsWeight',function(){
		numFun($(this));
	});
	
	//验证添加商品时输入的申报价值
	$('.editbox').on('keyup','#addDeclareValue,.itemsprice',function(){
		numFun($(this));
	});
	
	//验证添加商品时输入的包装规格
	$('#addSize').on('keyup',function(){
		var sizeCheck = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
		var sizeValue = $(this).val();
		if(util.testSpec(sizeValue)){
			$(this).removeClass('redBorder');
		}else{
			$(this).addClass('redBorder');
			return;
		}
	});
	//验证添加商品时输入的申报名称
	$('#addDeclareName').on('keyup',function(){
		var $this=$(this);
		if($this.val() == ''){
			$this.addClass('redBorder');
		}else{
			$this.removeClass('redBorder');
		}
	});
	
	//验证添加商品是输入的sku
	$('#addSku').on('keyup',function(){
		var patrnSku=/^[^\'\"\<\>\&]*$/;
		var skuValue = $(this).val();
		if(!patrnSku.test(skuValue)){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
	//判断是否修改了商品的信息
	$('.editbox').on('change','input[type=text]',function(){
		itemsChange = 1;
		var $this = $(this);
		$this.val($.trim($this.val()));
	});	
	//判断是否都修改了添加的信息的文本框的内容
	$('.editbox').on('change','#addSku,#addquantity',function(){
		addItemChange = 1;
		var $this = $(this);
		$this.val($.trim($this.val()));
	});
	
	//点击添加按钮，添加商品
	$('#adddata').on('click',function(){
		//获取文本框输入的值
		var orderid = $('#order_handle_id').val();
		var transcationid = $('#transactionid').text();
		var addProductId = $('#addProductId').val();
		var addTitle = $('#addTitle').val();
		var addSku = $('#addSku').val();
		var addWeight = $('#addWeight').val();
		var addSize = $('#addSize').val();
		var addDeclareName = $('#addDeclareName').val();
		var addDeclareValue = $('#addDeclareValue').val();
		var addquantity = $('#addquantity').val();
		var patrnSku=/^[^\'\"\<\>\&]*$/;
		//判断添加的数量是否是数字是否为空为0
		if(isNaN(addquantity) || addquantity == ''){
			$('#addquantity').addClass('redBorder');
			return;
		}else if(addquantity == 0){
			$('#addquantity').addClass('redBorder');
			return;
		}else{
			$('#addquantity').removeClass('redBorder');
		}
		//判断重量是否为数字、为空、为0
		if(isNaN(addWeight) || addWeight == ''){
			$('#addWeight').addClass('redBorder');
			return;
		}else{
			$('#addWeight').removeClass('redBorder');
		}
		//判断申报价值是否是数字，是否为空，是否为0
		if(isNaN(addDeclareValue) || addDeclareValue == ''){
			$('#addDeclareValue').addClass('redBorder');
			return;
		}else if(addDeclareValue == 0) {
			$('#addDeclareValue').addClass('redBorder');
			return;
		}else{
			$('#addDeclareValue').removeClass('redBorder');
		}
		//判断申报名称是否为空
		if(addDeclareName){
			$('#addDeclareName').removeClass('redBorder');
		}else{
			$('#addDeclareName').addClass('redBorder');
			return;
		}
		//验证sku
		if(!patrnSku.test(addSku)){
			$(this).addClass('redBorder');
			util.showTips('error','sku不能输入特殊字符！！！');
			return;
		}else if(!addSku){
			$('#addSku').addClass('redBorder');
			util.showTips('error','sku不能为空！！！');
			return;
		}else{
			$(this).removeClass('redBorder');
		}		
		var datas = {"order_handle_id":orderid,"transaction_id":transcationid,"product_name":addTitle,"sku":addSku,"weight":addWeight,"size":addSize,"declare_name":addDeclareName,"declare_price":addDeclareValue,"quantity":addquantity};
		if(orderid && transcationid){
			//如果sku，数量等文本框的值改变了，也就是输入了值，发送ajax请求
			if(addItemChange == 1){				
				$.ajax({
					type:"POST",
					url:"?r=oms/Shwish/InsertItems",
					data:"order_handle_id=" + orderid + "&transaction_id=" + transcationid + "&product_name=" + addTitle + "&sku=" + addSku + "&weight=" + addWeight + "&size=" + addSize + "&declare_name=" + addDeclareName + "&declare_price=" + addDeclareValue + "&quantity=" + addquantity,
					success:function(result){
						//如果插入成功的同时也成功修改了申报信息
						if(result.data.updateDeclare['updateDeclares'] == true){
							//获取刚刚插入的商品信息产生的id
							var tr_id = result.data.id[0];
							var itemstring_tr = "<tr class='editTableCon' data-id=" + tr_id + ">" +
							"<td><span class='itemId'>" + addProductId + "</span><input type='text' readonly='readonly' id='product_id" + tr_id + "'/></td>" +
							"<td><span class='itemTitle'>" + addTitle + "</span><input type='text' id='product_name" + tr_id + "'/></td>" +
							"<td><span class='sku'>" +  addSku + "</span><input type='text' data-sku=" + addSku + " id='product_sku" + tr_id + "'/></td>" +
							"<td><span class='singleWeight'>" + addWeight + "</span><input type='text' class='itemsWeight' id='weight" + tr_id + "'/></td>" +
							"<td><span class='quantity'>" + addquantity + "</span><input type='text' class='changeQuantity' id='quantity" + tr_id + "'/></td>" +
							"<td><span class='itemSize'>" + addSize + "</span><input type='text' class='changeSize' id='size" + tr_id + "'/></td>" +
							"<td><span class='declareName'>" + addDeclareName + "</span><input type='text' class='itemsname' id='declare_name" + tr_id + "'/></td>" +
							"<td><span class='declarePrice'>" + addDeclareValue + "</span><input type='text' class='itemsprice' id='declare_price" + tr_id + "'/></td>" +
							"<td width='80'>" +
							"<p class='editBtnBox'><a href='javascript:;' class='itemEdit btn'>编辑</a><a href='javascript:;' class='btn itemDel'>删除</a></p>" +
							"<p class='saveBtnBox'><a href='javascript:;' class='saveItemEdit btn btn-primary' data-id="+tr_id+" onclick='saveItem("+tr_id+",this,"+orderid+")'>确定</a> <a href='javascript:;' class='cancelItemEdit btn'>取消</a></p>" +
							"</td>" +
							"</tr>";					
							//插入节点
							$('.editTC #addItem').before(itemstring_tr);					
							//隐藏输入框
							$('#addItem').hide();
							//修改申报信息的显示
							$('#totalweight').val(result.data.declare['totalweight']);
							$('#totalsize').val(result.data.declare['maxsize']);
							$('#totalname').val(result.data.declare['totalname']);
							$('#totalprice').val(result.data.declare['totalprice']);
							//修改申报信息的的文本框的属性
							$('#totalweight').attr('data-weight',result.data.declare['totalweight']);
							$('#totalname').attr('data-name',result.data.declare['totalname']);
							$('#totalprice').attr('data-price',result.data.declare['totalprice']);
							util.showTips('success','添加商品成功！！！');
						}else{
							util.showTips('error','添加商品失败！！！');
						}
					}
				});
				addItemChange = 0;
			}	
		}
	});
	
	//验证用户输入申报信息的总重量,总申报价值
	$('#totalweight,#totalprice').on('keyup',function(){
		var totalweight = $('#totalweight').val();
		var totalprice = $('#totalprice').val();
		if(isNaN(totalweight) || totalweight =='' || totalweight == 0){
			$('#totalweight').addClass('redBorder');
			return;
		}else{
			$('#totalweight').removeClass('redBorder');
		}
		if(isNaN(totalprice) || totalprice =='' || totalprice == 0){
			$('#totalprice').addClass('redBorder');
			return;
		}else{
			$('#totalprice').removeClass('redBorder');
		}
	});
	//验证用户输入的申报名称
	$('#totalname').on('keyup',function(){
		var totalname = $(this).val();
		if(totalname == '' || totalname == 0){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
	//验证用户在输入申报信息的包装规格
	$('#totalsize').on('keyup',function(){
		var sizeCheck = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
		var sizeValue = $(this).val();
		if(util.testSpec(sizeValue)){
			$(this).removeClass('redBorder');
		}else{
			$(this).addClass('redBorder');
			return;
		}
	});
	//验证用户输入的追踪挂号
	$('#tracking').on('keyup',function(){
		var value = $(this).val();
		if(value.length>20){
			$('#tracking').addClass('redBorder');
			return;
		}else{
			$('#tracking').removeClass('redBorder');
		}
	});
	//判断用户是否修改了申报信息
	$('#totalweight,#totalsize,#totalname,#totalprice,#remark,#tracking').on('change',function(){
		var $this = $(this);
		$this.val($.trim($this.val()));
		declareChange = 1;
	});

	//选择国家的按钮
	$('.J_selectCountryBtn').on('click',function(){	
		oms.showCountryListModal($("#CountryCode").val(),function(data){
			$("#CountryCode").val(data['code']);
			$("#CountryName").val(data['en']);
		});
	});
	
	//点击添加商品时输入sku动态匹配对应的sku 的商品的信息
	$('#addSku').on("focusout",function(){
		var sku = $('#addSku').val();
		var patrnSku=/^[^\'\"\<\>\&]*$/;		
		var thisObj = $(this);
		if(!patrnSku.test(sku)){
			thisObj.addClass('redBorder');
			return;
		}else{
			thisObj.removeClass('redBorder');
		}
		if(sku){
			$.ajax({
				url:"?r=oms/Shwish/SelectSku&sku="+sku,
				success:function(skuinfo){
					if(skuinfo['result'] == false){
						$('#addSku').val(sku);						
					}else{
						$('#addWeight').val(skuinfo['weight']);
						$('#addSize').val(skuinfo['packing']);
						$('#addDeclareName').val(skuinfo['declare_name']);
						$('#addDeclareValue').val(skuinfo['declare_price']);
						thisObj.removeClass('redBorder');
					}
				}
			});
		}
	});	
	
	//编辑商品信息，修改商品的sku同时匹配对应的商品的信息
	$('.editbox').on('focusout','.changeSKU',function(){
		var sku = $(this).val();
		var patrnSku=/^[^\'\"\<\>\&]*$/;		
		var data_sku = $(this).attr('data-sku');
		var tr_id = $(this).parents('tr').attr('data-id');
		var thisObj=$(this);
		//如果没有修改sku就直接返回
		if(sku == data_sku){
			return ;
		}else{
			if(sku == ''){
				$(this).addClass('redBorder');
				return ;
			}else{
				if(!patrnSku.test(sku)){
					thisObj.addClass('redBorder');
					return;
				}else{
					thisObj.removeClass('redBorder');
				}
				$.ajax({
					url:"?r=oms/Shwish/SelectSku&sku="+sku,
					success:function(skuinfo){
						if(skuinfo['result'] == false){
							thisObj.val(sku);
							thisObj.attr('data-sku',sku);							
						}else{
							$('#weight'+tr_id).val(skuinfo['weight']);
							$('#size'+tr_id).val(skuinfo['packing']);
							$('#declare_name'+tr_id).val(skuinfo['declare_name']);
							$('#declare_price'+tr_id).val(skuinfo['declare_price']);
							thisObj.removeClass('redBorder');
						}
					}
				});
			}
		}
	});
	
	//验证编辑商品时验证输入的包装规格
	$('.editbox').on('keyup','.changeSize',function(){
		var sizeCheck = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
		var sizeValue = $(this).val();
		if(util.testSpec(sizeValue)){
			$(this).removeClass('redBorder');
		}else{
			$(this).addClass('redBorder');
			return;
		}
	});	
	//验证编辑商品时输入的重量
	$('.editbox').on('keyup','.itemsWeight',function(){
		var weight = $(this).val();
		if(isNaN(weight) || weight == '' || weight == 0){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
	
	//验证编辑商品时输入的数量
	$('.editbox').on('keyup','.changeQuantity',function(){
		var changeQuantity = $(this).val();
		if(isNaN(changeQuantity) || changeQuantity == '' || changeQuantity == 0){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
	//验证编辑商品时输入的申报名称
	$('.editbox').on('keyup','.itemsname',function(){
		var itemsname = $(this).val();
		if(itemsname == ''){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
	//验证编辑商品时输入的申报价值
	$('.editbox').on('keyup','.itemsprice',function(){
		var itemsprice = $(this).val();
		if(itemsprice == '' || isNaN(itemsprice) || itemsprice == 0){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
	//验证编辑商品是输入的sku
	$('.editbox').on('keyup','.changeSKU',function(){
		var patrnSku=/^[^\'\"\<\>\&]*$/;
		var skuValue = $(this).val();
		if(!patrnSku.test(skuValue)){
			$(this).addClass('redBorder');
			return;
		}else{
			$(this).removeClass('redBorder');
		}
	});
}
//解决提示框消失快的bug
savepake()
saveadd();
//保存修改的地址信息
function saveadd(){
	$('#saveadd').on('click',function(){
		var phoneNum = /^(\(\d{3,8}\)|\d{3,8}-)?\d{3,15}$/; //电话号码正则
		var orderid = $('#order_handle_id').val();
		//获取地址信息
		var BuyerName = $('#BuyerName').val();
		var street1 = $('#street1').val();
		var street2 = $('#street2').val();
		var CityName = $('#CityName').val();
		var StateOrProvince = $('#StateOrProvince').val();
		var PostalCode = $('#PostalCode').val();
		var CountryName = $('#CountryName').val();
		var CountryCode = $('#CountryCode').val();
		var BuyerPhone = $('#BuyerPhone').val();
		var orderid = $('#order_handle_id').val();
		var datas = {"orderid":orderid,"BuyerName":BuyerName,"street1":street1,"street2":street2,"CityName":CityName,"StateOrProvince":StateOrProvince,"PostalCode":PostalCode,"CountryName":CountryName,"CountryCode":CountryCode,"BuyerPhone":BuyerPhone};
		//电话号码验证
		if (phoneNum.test(BuyerPhone) || !BuyerPhone) {
			if($('#CountryName').val() != $('#CountryName').attr('data-countryname')){
				addressChange = 1;
			}
			//判断用户是否对地址信息进行修改  addressChange==1表示用户已经对地址信息进行修改
			if(addressChange == 1){
				//获取地址表中的id，要是没有就为，后台判断为0的话就插入数据
				var addressId = $('#addressId').val();
				if(!addressId){
					addressId = 0;
				}
					$.ajax({
						type:"POST",
						url:"?r=oms/Shwish/UpdateAddress&id="+addressId,
						data:datas,
						success:function(res){
							if(res['result']){
								util.showTips('success','修改成功！！！');
								$('#BuyerName').val(BuyerName);
								$('#street1').val(street1);
								$('#street2').val(street2);
								$('#CityName').val(CityName);
								$('#StateOrProvince').val(StateOrProvince);
								$('#PostalCode').val(PostalCode);
								$('#CountryName').val(CountryName);
								$('#BuyerPhone').val(BuyerPhone);
								$('#CountryName').attr('data-countryname',CountryName);							
							}else{
								util.showTips('error','修改失败！！！');
							}
						}
					});
				//再次修改地址信息的状态
				addressChange = 0;
			}else{
				util.showTips('info','没有做任何修改！！！');
			}	
		}else{util.showTips('warning','"Phone"格式不对，请重新填写');}
	});
}

function savepake(){
	//修改申报信息，并保存
	$('#saveshen').on('click',function(){
		//如果用户没有修改申报信息就不往下执行
		if(declareChange == 0){
			util.showTips('info','没有做任何修改！！！','normal');
			return;
		}
		var sizeCheck = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
		var orderid = $('#order_handle_id').val();
		var tr_id = $('#transactionid').text();
		var totalweight = $('#totalweight').val();
		var sizes = $('#totalsize').val();
		var declare_names = $('#totalname').val();
		var totalPrices = $('#totalprice').val();
		var remarks = $('#remark').val();
		var trackid = $('#tracking').val();	
		//判断用户输入的是不是0
		if(isNaN(totalweight) || totalweight == 0 || totalweight == ''){
			util.showTips('error','总重量不能为0！！！');
			$('#totalweight').addClass('redBorder');
			return;
		}else{
			$('#totalweight').removeClass('redBorder');
		}
		if(totalPrices == 0){
			util.showTips('error','总价值不能为0！！！');
			$('#totalprice').addClass('redBorder');
			return;
		}else{
			$('#totalprice').removeClass('redBorder');
		}
		if(declare_names == 0 || declare_names == ''){
			util.showTips('error','申报名称不能为空且不能为0！！！');
			$('#totalname').addClass('redBorder');
			return;
		}else{
			$('#totalname').removeClass('redBorder');
		}
		//判断用户输入的尺寸是否符合规定
		if(util.testSpec(sizes)){
			$('#totalsize').removeClass('redBorder');
		}else{
			util.showTips('error','请输入正确的包装规格！！！');
			$('#totalsize').addClass('redBorder');
			return;
		}
		//判断用户是否修改了总重量的信息
		if($('#totalweight').val() == $('#totalweight').attr('data-weight')){
			totalweight =0;
		}
		//判断用户是否修改了申报名称
		if($('#totalname').val() == $('#totalname').attr('data-name')){
			declare_names = 0;
		}
		//判断用户是否修改了申报价值
		if($('#totalprice').val() == $('#totalprice').attr('data-price')){
			totalPrices = 0;
		}
		//判断输入的申报价值、重量是否是数字
		if(isNaN(totalweight)){
			$('#totalweight').addClass('redBorder');
			return;
		}else{
			$('#totalweight').removeClass('redBorder');
		}
		if(isNaN(totalPrices)){
			$('#totalprice').addClass('redBorder');
			return;
		}else{
			$('#totalprice').removeClass('redBorder');
		}
		//判断用户输入的追踪挂号的长度
		if(trackid.length > 20){
			$('#tracking').addClass('redBorder');
			util.showTips('error','追踪挂号只能输入20个字符！！！');
			return;
		}else{
			$('#tracking').removeClass('redBorder');
		}
		var datas = {"orderid":orderid,"trid":tr_id,"weight":totalweight,"size":sizes,"name":declare_names,"price":totalPrices,"remark":remarks,"trackid":trackid};
		if(orderid && tr_id){
			$.ajax({
				type:"POST",
				url:"?r=oms/Shwish/SaveDeclare",
				data:datas,
				success:function(res){
					if(res.result){
						//修改申报信息的显示
						$('#sizes').val(res.result['size']);
						$('#remarks').val(res.result['remark']);
						$('#trackid').val(res.result['trackid']);						
						//判断是否修改了总重量、总价格、申报名称，0表示没有修改，修改了同时修改对应的属性值，修改商品信息的显示
						if(res.result['price'] == 0){
							$('#totalPrices').val($('#totalprice').attr('data-price'));
						}else{
							$('#totalPrices').val(totalPrices);
							$('#totalprice').attr('data-price',totalPrices);
							$('.itemsprice').val(res.result['price']);
							$('.declarePrice').text(res.result['price']);
						}
						if(res.result['weight'] == 0){
							$('#totalweight').val($('#totalweight').attr('data-weight'));
						}else{
							$('#totalweight').val(totalweight);
							$('#totalweight').attr('data-weight',totalweight);
							$('.itemsWeight').val(res.result['weight']);
							$('.singleWeight').text(res.result['weight']);
						}
						if(res.result['name'] == 0){
							$('#declare_names').val($('#declare_names').attr('data-name'));
						}else{
							$('#declare_names').val(declare_names);
							$('#declare_names').attr('data-name',declare_names);
							$('.itemsname').val(res.result['name']);
							$('.declareName').text(res.result['name']);
						}
						util.showTips('success','修改成功！！！');
					}else{
						util.showTips('error','修改失败！！！');
					}
				}
			});
		}
		declareChange = 0;
	});
}

//编辑》确定    修改商品信息
function saveItem(trId,t,orderid){
	var quantity = $("#quantity"+trId).val();
	var sizeCheck = /^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
	var patrnSku=/^[^\'\"\<\>\&]*$/;
	if(trId){
		//获取文本框输入的值
		var product_id = $("#product_id"+trId).val();
		var product_name = $("#product_name"+trId).val();
		var product_sku = $("#product_sku"+trId).val();
		var weight = $("#weight"+trId).val();
		var quantity = $("#quantity"+trId).val();
		var size = $("#size"+trId).val();
		var declare_name = $("#declare_name"+trId).val();
		var declare_price = $("#declare_price"+trId).val();
		//判断输入的数量是否合法
		if(isNaN(quantity) || quantity == ''){
			$("#quantity"+trId).addClass('redBorder');
			return;
		}else if(quantity == 0){
			$("#quantity"+trId).addClass('redBorder');
			return;
		}else{
			$("#quantity"+trId).removeClass('redBorder');
		}
		//判断输入的重量是否合法
		if(isNaN(weight) || weight == ''){
			$("#weight"+trId).addClass('redBorder');
			return;
		}else if(weight == 0){
			$("#weight"+trId).addClass('redBorder');
			return;
		}else{
			$("#weight"+trId).removeClass('redBorder');
		}
		//判断输入的申报价值是否合法
		if(isNaN(declare_price) || declare_price == 0 || declare_price == ''){
			$("#declare_price"+trId).addClass('redBorder');
			return;
		}else{
			$("#declare_price"+trId).removeClass('redBorder');
		}
		//判断申报名称是否为空
		if(declare_name){
			$("#declare_name"+trId).removeClass('redBorder');
		}else{
			$("#declare_name"+trId).addClass('redBorder');
			return;
		}
		//验证包装规格
		if(util.testSpec(size)){
			$("#size"+trId).removeClass('redBorder');
		}else{
			$("#size"+trId).addClass('redBorder');
			return;
		}
		//验证输入的sku.
		if(!patrnSku.test(product_sku)){
			$("#product_sku"+trId).addClass('redBorder');
			util.showTips('error','sku不能输入特殊字符！！！');
			return;
		}else if(!product_sku){
			$("#product_sku"+trId).addClass('redBorder');
			util.showTips('error','sku不能为空！！！');
			return;
		}else{
			$("#product_sku"+trId).removeClass('redBorder');
		}
		var datas = {"product_id":product_id,"product_name":product_name,"product_sku":product_sku,"weight":weight,"quantity":quantity,"size":size,"declare_name":declare_name,"declare_price":declare_price};
		//如果修改了商品的信息，发送ajax请求
		var $oTr = $("#product_id"+trId).closest('tr');
		if(itemsChange == 1){
			$.ajax({
				type:"POST",
				url:"?r=oms/Shwish/UpdateProDetail&id="+trId+"&orderid="+orderid,
				data:datas,
				success:function(returnDate){	
					//修改成功后将修改后的信息显示在页面上
					if(returnDate['updateItem'] == 1){
						//改变当前操作的文本框的值，以免第二修改的时候值出错
						$("#product_id"+trId).val(product_id);
						$("#product_name"+trId).val(product_name);
						$("#product_sku"+trId).val(product_sku);
						$("#product_sku"+trId).attr('data-sku',product_sku);
						$("#weight"+trId).val(weight);
						$("#quantity"+trId).val(quantity);
						$("#size"+trId).val(size);
						$("#declare_name"+trId).val(declare_name);
						$("#declare_price"+trId).val(declare_price);
						
						$("#product_id"+trId).siblings().text(product_id);
						$("#product_name"+trId).siblings().text(product_name);
						$("#product_sku"+trId).siblings().text(product_sku);
						$("#weight"+trId).siblings().text(weight);
						$("#quantity"+trId).siblings().text(quantity);
						$("#size"+trId).siblings().text(size);
						$("#declare_name"+trId).siblings().text(declare_name);
						$("#declare_price"+trId).siblings().text(declare_price);
						util.showTips('success','修改成功！！！');
						
						//隐藏文本框和按钮
						$oTr.find('span').show();
						$oTr.find('input').hide();
						$oTr.find('p').filter('.saveBtnBox').hide();
						$oTr.find('p').filter('.editBtnBox').show();

					}else{
						util.showTips('info','没有做任何修改！！！');
						//隐藏文本框和按钮
						$oTr.find('span').show();
						$oTr.find('input').hide();
						$oTr.find('p').filter('.saveBtnBox').hide();
						$oTr.find('p').filter('.editBtnBox').show();
					}
					if(returnDate.updateDeclare['updateDeclares'] == true){
						//如果申报信息也改变了，修改申报信息的显示
						$('#totalweight').val(returnDate.declare['totalweight']);
						$('#totalsize').val(returnDate.declare['maxsize']);
						$('#totalname').val(returnDate.declare['totalname']);
						$('#totalprice').val(returnDate.declare['totalprice']);
						//修改申报信息的的文本框的属性
						$('#totalweight').attr('data-weight',returnDate.declare['totalweight']);
						$('#totalname').attr('data-name',returnDate.declare['totalname']);
						$('#totalprice').attr('data-price',returnDate.declare['totalprice']);
					}		
				}
			});
		}else{
			util.showTips('info','没有做任何修改！！！');
			//隐藏文本框和按钮
			$oTr.find('span').show();
			$oTr.find('input').hide();
			$oTr.find('p').filter('.saveBtnBox').hide();
			$oTr.find('p').filter('.editBtnBox').show();
		}
	}
	//改变商品信息内容改变的变量
	itemsChange = 0;
}
