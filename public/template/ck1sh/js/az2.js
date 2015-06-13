function showEditWindows(platform,orderid){
	// 重写alert
	function alert(info,type){
		switch(type){
			case 'info',1:
				type = 'info';
				break;
			case 'warning',2:
				type = 'warning';
				break;
			case 'error',3:
				type = 'error';
				break;
			case 'success',4:
				type = 'success';
				break;
			default:
				type='info';
		}
		util.showTips(type,info);
	}

	// 加载编辑窗口
	$.get("index.php?r=oms/shorder/AzEdit&id="+orderid+"&action=getwindow&_rnd="+Math.random()+util.loading(),function(data,status){
		// 将窗口代码附加在body尾部
		$("body").append(data);
		// 窗口出现的效果,谁觉得不好看就去改@linpeiyan
		$(".editCon.TCCON").hide(function(){
			$(".editTC").fadeIn('fast',function(){
				util.removeloading();
				$(".editCon.TCCON").slideDown('fast');
			});
		});

		// 显示添加表单
		$("#addnew_btn").click(function(e) {
			$('#addItem input[name="OrderItemId"]').attr('value','');
			$('#addItem input[name="Title"]').attr('value','');
			$('#addItem input[name="SKU"]').attr('value','');
			$('#addItem input[name="weight_g"]').attr('value','');
			$('#addItem input[name="fixed_quantity"]').attr('value','');
			$('#addItem input[name="package_size"]').attr('value','');
			$('#addItem input[name="declare_name"]').attr('value','');
			$('#addItem input[name="declare_price"]').attr('value','');
			$("#addItem").show();
			$(this).hide();
			$(this).parent().scrollTop(9999);
			$(this).closest(".editCon").scrollTop(0);
			// 绑定获取SKU信息事件，不会重复绑定
			bind_sku_get();
		});

		// 取消显示添加表单
		$("#addnew_form_cancel").click(function(e) {
			$("#addItem").hide();
			$("#addnew_btn").show();
		});

		$("input[name='weight_g'],input[name='declare_price'],input[name='weight'],input[name='fixed_quantity']").blur(function(e) {
			var numZ=/[^0-9.]/g;
			if($(this).val().indexOf(" ")>=0){
				$(this).val($(this).val().replace(/\s/g, ""));
			}else if(numZ.test($(this).val())){
				$(this).addClass('redBorder');
				util.showTips('warning','格式错误，请重新输入！');
			}else{
				$(this).removeClass('redBorder');
			}
		});
		//-----------为申报价值，数量 ，单个重量过滤空格-（林培雁2015-5-14）
		$('.editbox ').on('blur','input[name="declare_price"],input[name="weight_g"],input[name="fixed_quantity"]',function(){
			$thisV=$(this).val();
			if($thisV.indexOf(" ")>=0){
				$(this).val($thisV.replace(/\s/g, ""))
			}
		})
		
		
		// 提交item添加按钮事件绑定
		$("#addnew_form_submit").click(function(e) {
			// 简单前端验证
			if($("#addItem input[name='SKU']").val() == ""){
				util.showTips('warning','SKU不能为空！');
				$("#addItem input[name='SKU']").focus();
				return;
			}
			if($("#addItem input[name='weight_g']").val() <=0 ){
				util.showTips('warning','单个重量(g)必须大于0！');
				$("#addItem input[name='weight_g']").focus();
				return;
			}
			if($("#addItem input[name='fixed_quantity']").val() <=0 ){
				util.showTips('warning','数量必须大于0！');
				$("#addItem input[name='fixed_quantity']").focus();
				return;
			}
			var objReg=/^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
			if(!objReg.test($("#addItem input[name='package_size']").val())){
				util.showTips('warning','产品格式必须是长*宽*高！');
				$("#addItem input[name='package_size']").focus();
				return;
			}
			if($("#addItem input[name='declare_name']").val() == ""){
				util.showTips('warning','申报名称不能为空！');
				$("#addItem input[name='declare_name']").focus();
				return;
			}
			if($("#addItem input[name='declare_price']").val() <=0){
				util.showTips('warning','申报价值必须大于0！');
				$("#addItem input[name='declare_price']").focus();
				return;
			}

			// 将表单内的数据链接组合
			var data='';
			$("tr#addItem input").each(function(index, element) {
				if(data==''){
					data =(    $(element).attr("name")+'='+$(element).val());
				}else{
					data+=('&'+$(element).attr("name")+'='+$(element).val());
				}
			});
			// post提交后台保存
			$.post("index.php?r=oms/shorder/AzEdit&action=addnew"+"&_rnd="+Math.random()+util.loading(), data, function(data,status){
				util.removeloading();
				obj = data;
				if(status === 'success' && obj.code === 1){
					$('<tr class="d editTableCon" az_order_item_id="'+obj.row.az_order_item_id+'">'
					+'<td lv="1">'+obj.row.OrderItemId+'</td>'
					+'<td lv="2">'+obj.row.Title+'</td>'
					+'<td lv="3">'+obj.row.SKU+'</td>'
					+'<td lv="4">'+obj.row.weight_g+'</td>'
					+'<td lv="5">'+obj.row.fixed_quantity+'</td>'
					+'<td lv="8">'+obj.row.package_size+'</td>'
					+'<td lv="6">'+obj.row.declare_name+'</td>'
					+'<td lv="7">'+obj.row.declare_price+'</td>'
					+'<td width="90px">'
					+'<p class="editBtnBox">'
					+'<a href="javascript:;" class="btn J_ItemEdit">编辑</a> '
					+'<a href="javascript:;" class="btn J_ItemDelete">删除</a></p>'
					+'<p class="saveBtnBox">'
					+'<a href="javascript:;" class="saveItemEdit btn btn-primary">确定</a> '
					+'<a href="javascript:;" class="cancelItemEdit btn">取消</a></p></td>'
					+'</tr>').insertBefore("#addItem");
					// 隐藏表单
					$("#addItem").hide();
					// 显示“添加商品”按钮
					$("#addnew_btn").show();
					// 绑定删除事件
					delete_do_and_bind();
					// 绑定编辑事件
					edit_do_and_bind();
					// 申报信息更新
					handle_view();
					util.showTips('success','添加成功！');
				}else{
					util.showTips('warning','添加失败！');
				}
			});
		});

		// 绑定商品删除事件的方法
		function delete_do_and_bind(){
			$('.J_ItemDelete').each(function(index, element) {
				// 判断是否绑定过防止重复绑定
				if($(element).attr("z")!=1){
					// 标记已经绑定了
					$(element).attr("z",1);
					// 绑定单击事件
					$(element).click(function(e) {
						// 判断是否为最后一个商品否则不给删除
						if($('.J_ItemDelete').length>1){
							if(confirm('你确定要删除吗？')){
								// 提交删除
								$.get("index.php?r=oms/shorder/AzEdit&id="+$(this).closest("tr").attr('az_order_item_id')+"&action=delete&_rnd="+Math.random()+util.loading(),function(data,status){
									util.removeloading();
									// obj = eval('(' + data + ')');
									obj = data;
									if(status === 'success' && obj.code === 1){
										// 前端删除
										$(element).closest('tr.d').remove();
										// sku信息更新
										handle_view();
									}else{
										util.showTips('warning','删除失败，请稍后重试！');
									}
								});
							}
						}else{
							util.showTips('warning','最后一条记录无法删除！');
						}
					});
				}
			});
		}
		
		// 绑定首次加载的商品行的删除按钮事件
		delete_do_and_bind();

		// 绑定编辑按钮事件
		function edit_do_and_bind(){
			$(".J_ItemEdit").each(function(index, element) {
				// 判断是否已经绑定
				if($(element).attr("z")!=1){
					$(element).attr("z",1);// 已绑定事件的标志
					$(element).click(function(e) {
						// 从后台来获取商品信息用来编辑获取
						$.get("index.php?r=oms/shorder/AzEdit&id="+$(this).closest("tr").attr('az_order_item_id')+"&action=getinfo&_rnd="+Math.random()+util.loading(),function(data,status){
							util.removeloading();
							obj = data;
							if(status === 'success' && obj.code === 1){
								// 显示(替换为)编辑表单
								oo=$(element).closest("tr.d");
								oo.children("td[lv=1]").html('<input name="OrderItemId" 	type="hidden" value="'+obj.row.OrderItemId+'" style="display:none;"/>');
								oo.children("td[lv=2]").html('<input name="Title"			type="text" value="'+obj.row.Title+'" />');
								oo.children("td[lv=3]").html('<input name="SKU"				type="text" value="'+obj.row.SKU+'" />');
								oo.children("td[lv=4]").html('<input name="weight_g"		type="text" value="'+obj.row.weight_g+'" />');
								oo.children("td[lv=5]").html('<input name="fixed_quantity"	type="text" value="'+obj.row.fixed_quantity+'" />');
								oo.children("td[lv=8]").html('<input name="package_size"	type="text" value="'+obj.row.package_size+'" />');
								oo.children("td[lv=6]").html('<input name="declare_name"	type="text" value="'+obj.row.declare_name+'" />');
								oo.children("td[lv=7]").html('<input name="declare_price"	type="text" value="'+obj.row.declare_price+'" />'
								+'<input name="order_id" type="hidden" value="'+obj.row.order_id+'" />'
								+'<input name="AmazonOrderId" type="hidden" value="'+obj.row.AmazonOrderId+'" />');
								// 显示保存按钮
								oo.find("input,.saveBtnBox").show();
								// 隐藏编辑和删除
								oo.find(".editBtnBox").hide();
								// 保存原始值
								oo.find("input").each(function(index, element) {
									$(element).attr("ss",$(element).val());//保存原始值
								});
								// 更新sku信息，好像是的
								bind_sku_get();
							}else{
								util.showTips('warning','网络似乎出了点小问题，稍后再试！');
							}
						});
					});
				}
			});

			$(".saveItemEdit").each(function(index, element) {
				// 判断是否已经绑定过事件
				if($(element).attr("z")!=1){
					$(element).attr("z",1);// 已绑定事件的标志
					$(element).click(function(e) {
						// 简单前端验证
						if($(this).closest("tr").find("input[name='SKU']").val() == ""){
							util.showTips('warning','SKU不能为空！');
							$(this).closest("tr").find("input[name='SKU']").focus();
							return;
						}
						if($(this).closest("tr").find("input[name='weight_g']").val() <=0 ){
							util.showTips('warning','单个重量(g)必须大于0！');
							$(this).closest("tr").find("input[name='weight_g']").focus();
							return;
						}
						if($(this).closest("tr").find("input[name='fixed_quantity']").val() <=0 ){
							util.showTips('warning','数量必须大于0！');							
							$(this).closest("tr").find("input[name='fixed_quantity']").focus();
							return;
						}
						var objReg=/^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
						if(!objReg.test($(this).closest("tr").find("input[name='package_size']").val())){
							util.showTips('warning','产品格式必须是长*宽*高！');														
							$(this).closest("tr").find("input[name='package_size']").focus();
							return;
						}
						if($(this).closest("tr").find("input[name='declare_name']").val() == ""){
							util.showTips('warning','申报名称不能为空！');							
							$(this).closest("tr").find("input[name='declare_name']").focus();
							return;
						}
						if($(this).closest("tr").find("input[name='declare_price']").val() <=0){
							util.showTips('warning','申报价值必须大于0！');								
							$(this).closest("tr").find("input[name='declare_price']").focus();
							return;
						}

						// 组合商品ID 和 表单内的信息
						var data='az_order_item_id='+$(this).closest("tr").attr('az_order_item_id');
						$(this).closest("tr").find("input").each(function(index, element) {
							data+=('&'+$(element).attr("name")+'='+$(element).val());
						});
						// 提交后台保存
						$.post("index.php?r=oms/shorder/AzEdit&action=update"+"&_rnd="+Math.random()+util.loading(), data, function(data,status){
							util.removeloading();
							obj = data;
							if(status === 'success' && (obj.code === 0 || obj.code === 1)){
								// 保存成功后替换tr显示数据行
								$(element).closest("tr").replaceWith('<tr class="d editTableCon" az_order_item_id="'+obj.row.az_order_item_id+'">'
								+'<td lv="1">'+obj.row.OrderItemId+'</td>'
								+'<td lv="2">'+obj.row.Title+'</td>'
								+'<td lv="3">'+obj.row.SKU+'</td>'
								+'<td lv="4">'+obj.row.weight_g+'</td>'
								+'<td lv="5">'+obj.row.fixed_quantity+'</td>'
								+'<td lv="8">'+obj.row.package_size+'</td>'
								+'<td lv="6">'+obj.row.declare_name+'</td>'
								+'<td lv="7">'+obj.row.declare_price+'</td>'
								+'<td width="90px">'
								+'<p class="editBtnBox">'
								+'<a href="javascript:;" class="btn J_ItemEdit">编辑</a> '
								+'<a href="javascript:;" class="btn J_ItemDelete">删除</a></p>'
								+'<p class="saveBtnBox">'
								+'<a href="javascript:;" class="saveItemEdit btn btn-primary">确定</a> '
								+'<a href="javascript:;" class="cancelItemEdit btn">取消</a></p></td>'
								+'</tr>');
								// 隐藏确定和和取消按钮
								oo.find(".saveBtnBox").hide();
								// 显示编辑和删除按钮
								oo.find(".editBtnBox").show();
								// 绑定删除按钮事件
								delete_do_and_bind();
								// 绑定编辑按钮事件
								edit_do_and_bind();
								// 更新sku显示,大概
								handle_view();
								util.showTips('success','保存成功！');}else{
								util.showTips('warning','编辑失败，请稍后重试！');
								
							}
						});
					});
				}
			});

			// 绑定取消商品编辑事件
			$(".cancelItemEdit").each(function(index, element) {
				// 判断是否已经绑定
				if($(element).attr("z")!=1){
					$(element).attr("z",1);// 已绑定事件的标志
					$(element).click(function(e) {
						// 取消编辑时回写原始值
						for(var i=1;i<=8;i++){
							o = $(this).closest("tr.d").children("td[lv="+i+"]");
							o.html(o.children("input").attr('ss'));
						}
						// 隐藏确定和取消按钮
						$(this).closest("td").children(".saveBtnBox").hide();
						// 显示编辑和删除按钮
						$(this).closest("td").children(".editBtnBox").show();
					});
				}
			});

		}

		// 首次绑定编辑按钮事件
		edit_do_and_bind();

		// 关闭编辑框事件绑定
		$("a[name='closeEdit']").click(function(e) {
			//remove
			$("div[id2='edit_box']").remove();
		});

		// 保存申报信息按钮事件绑定
		$("#saveshen").click(function(e) {
			// 组合需要保存的信息
			var data='';
			$("#tb_shenbao input").each(function(index, element) {
				if($(element).attr("ischange")==1){//判断是否改变了值
					if(data==''){
						data=($(element).attr("name")+'='+$(element).val());
					}else{
						data+=('&'+$(element).attr("name")+'='+$(element).val());
					}
				}
			});

			// 判断总重量是否合法
			var weight=($("#tb_shenbao").find("input[name='weight']").val());
			if(weight<=0){
				util.showTips('warning','总重量必须大于0！');
				return;
			}

			// 判断申报名称是否合法
			var declare_name=($("#tb_shenbao").find("input[name='declare_name']").val());
			if(declare_name == ""){
				util.showTips('warning','申报名称不能为空！');
				return;
			}

			// 判断总申报价值是否合法
			var declare_price=($("#tb_shenbao").find("input[name='declare_price']").val());
			if(declare_price<=0){
				util.showTips('warning','总申报价值必须大于0！');
				return;
			}

			// 判断包装规格是否合法
			var objReg=/^\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?\*\d+(\.\d{1,2})?$/;
			if(!objReg.test($("#tb_shenbao").find("input[name='package_size']").val())){
				util.showTips('warning','包装规格格式错误！');
				return;
			}

			// 判断包裹追踪号是否合法
			var tracking_sn = ($("#tb_shenbao").find("input[name = 'tracking_sn']").val());
			if (tracking_sn.length > 20 ||tracking_sn.length < 0 ){
				util.showTips('warning','包裹追踪号需20字符以内！');
				return;
			}

			// 提交到后台保存申报信息
			$.post("index.php?r=oms/shorder/AzEdit&action=updateasbinfo"+"&_rnd="+Math.random()+util.loading(), data, function(data,status){
				util.removeloading();
				obj = data;
				if(status === 'success' && (obj.code === 0 || obj.code === 1 || obj.code === -1)){
					if(obj.code!=-1){
						// 把平均后的申报信息写到商品行
						$("#tbItem>tbody>tr.d").each(function(index, element) {
							$(this).children("td[lv=4]").html(obj.sku.sku_items[index].weight_g);
							$(this).children("td[lv=6]").html(obj.sku.sku_items[index].declare_name);
							$(this).children("td[lv=7]").html(obj.sku.sku_items[index].declare_price);
						});
					}
					util.showTips('success','保存成功！');
				}else{
					util.showTips('warning','保存失败，请稍后重试！');
				}
			});
		});

		// 保存添加按钮事件绑定
		$("#saveadd").click(function(e) {
			var phoneNum = /^(\(\d{3,8}\)|\d{3,8}-)?\d{3,15}$/; //电话号码正则
			var BuyerPhone = $('input[name="BuyerPhone"]').val();
			if (phoneNum.test(BuyerPhone)) {
				// 组合数据
				var data='';
				$("#tb_address input").each(function(index, element) {
					if(data==''){
						data=($(element).attr("name")+'='+$(element).val());
					}else{
						data+=('&'+$(element).attr("name")+'='+$(element).val());
					}
				});
	
				// 保存地址信息，无则添加
				$.post("index.php?r=oms/shorder/AzEdit&action=updateaddress"+"&_rnd="+Math.random()+util.loading(), data, function(data,status){
					util.removeloading();
					obj = data;
					if(status === 'success' && (obj.code === 0 || obj.code === 1)){
						util.showTips('success','保存成功！');
					}else{
						util.showTips('warning','保存失败，请稍后重试！');
					}
				});
			}else{util.showTips('warning','"Phone"格式不对，请重新填写');}
		});

		// 回写申报信息(总)
		function handle_view(){
			$("#tb_shenbao input[name=weight]").val(obj.sku.sku_handle.weight);
			$("#tb_shenbao input[name=declare_name]").val(obj.sku.sku_handle.declare_name);
			$("#tb_shenbao input[name=declare_price]").val(obj.sku.sku_handle.declare_price);
			$("#tb_shenbao input[name=package_size]").val(obj.sku.sku_handle.package_size);
		}

		// 用一个标记，标记是否改变了值,一旦值改变则this attr ischange=1
		$("div[id2=edit_box] input").each(function(index, element) {
			$(element).change(function(e) {
				$(element).attr('ischange',1);
			});
			// 判断数据是否有更改
			if($(element).attr('type')=='hidden'){
				$(element).attr('ischange',1);
			}
		});
		
		//获取选择的国家
		$("input.J_selectCountryBtn").click(function(e) {
			oms.showCountryListModal($("input[name=CountryName]").val(),function(contryInfo){
				$("input[name=CountryCode]").val(contryInfo['en']);
			})
		});

		// 绑定input的chuange事件获取SKU信息回写
		function bind_sku_get(){
			$("#tbItem input[name='SKU']").each(function(index, element) {
				// 判断是否已经绑定
				if($(element).attr("b")!=1){
					// change绑定
					$(element).change(function(e) {
						sku_get(element);
					});
					// 标记已经绑定
					$(element).attr("b",1);
				}
			});
		}

		// 根据sku获取sku信息
		function sku_get(element){
			var sku = $(element).val();
			if(sku!=''){
				// 后台获取
				$.get("index.php?r=oms/shorder/GetSKUinfo&sku="+sku+"&_rnd="+Math.random()+util.loading(),function(data,status){
					util.removeloading();
					_obj = $(element).closest("tr");
					// 回显获取后的sku信息
					if(data.result==false){
						$('#addItem input[name="weight_g"]').val();
						$('#addItem input[name="package_size"]').val();
						$('#addItem input[name="declare_name"]').val();
						$('#addItem input[name="declare_price"]').val();
					}else {
						_obj.find("input[name='weight_g']").val(data.weight);
						_obj.find("input[name='package_size']").val(data.packing);
						_obj.find("input[name='declare_name']").val(data.declare_name);
						_obj.find("input[name='declare_price']").val(data.declare_price);
					}
				});
			}
		}

		$("form").submit(function(e) {
			e.preventDefault();
		});

		// 这个是@linpeiyan写的
		/*编辑窗口关闭按钮（滚动条滚动时关闭按钮跟着滚动）*/
		$('.editCon').scroll(function(){
			var editScrollTop=$('.editCon').scrollTop();
			if(editScrollTop >= 38){
				$('.editHead').addClass('editHeadActive');
			}else if(editScrollTop == 0){
				$('.editHead').removeClass('editHeadActive');
			}
		});

	});
	
}
