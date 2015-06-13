"use strict";
define(['util'], function(util){
	$(function(){
		$('#hide').hide();
		$('#dingdanshang').val('');
		$('#piliang').click(function(){
			if ($('#piliang').prop('checked')) {
				$('.wrap .setBox .www .yincang').show();
				$.ajax({
					url: '?r=oms/Shaliexpress/DefaultInfo',
					success: function(data) {
						$('#jiazhi').val(data.declare_price);
						$('#mingcheng').val(data.declare_name);
						$('#zhongliang').val(data.weight);
					}
				})
			}
			if (!$('#piliang')[0].checked) {
				$('.wrap .setBox .www .yincang').hide();
				$('#jiazhi').val('');
				$('#mingcheng').val('');
				$('#zhongliang').val('');
			}
		});

		// 验证导入数据
		$('#uploadBtn').click(function(){
			var file = $('#uploadFile').val();
			if(file === '' || file == null){
				util.showTips('warning', '请先选择文件！');
				return false;
			} else {
				var position = file.lastIndexOf('.');
				if(position<0){
					util.showTips('error', '上传文件并不是.xls或者.xlsx格式，无法处理！');
					return false;
				} else {
					var ext = file.substring(position+1, file.length);
					if(ext === 'xlsx' || ext === 'xls'){
						return true;
					} else {
						util.showTips('error', '上传文件并不是.xls或者.xlsx格式，无法处理！');
						return false;
					}
				}
			}
		});
	});
});