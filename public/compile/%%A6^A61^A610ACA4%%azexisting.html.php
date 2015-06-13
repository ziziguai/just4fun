<?php /* Smarty version 2.6.28, created on 2015-01-22 08:58:45
         compiled from ck1sh/azexisting.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>
    <link rel="stylesheet" type="text/css" href="public/template/ck1sh/css/bootstrap.css" /><?php echo '
    <style>
        .wrap{padding:20px;}
        .conBox {
            padding: 20px;
            border: 1px solid #ddd;
            margin: 15px;
            border-radius: 8px;
        }
        table {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }
        p button {
            margin-left: 15px;
        }
    </style>
    '; ?>

</head>
<body>
    <div class="wrap" id="hide">
        <p><a href="javascript:;">首页</a>
        </p>
        <div class="conBox">
            <p>上传订单成功！</p>
            <p>含有已导入过的订单，请选择是否更新订单信息</p>
            <table class="table table-striped table-condensed table-hover">
                <thead name="">
                    <tr>
                        <th>
                            <input type="checkbox" id = "selectAll"/>
                        </th>
                        <th>操作</th>
                        <th>交易号</th>
                        <th>ItemId</th>
                        <th>seller</th>
                        <th>buyer</th>
                        <th>buyer email</th>
                        <th>SKU</th>
                        <th>国家</th>
                    </tr>
                </thead>
                <tbody name="">
                    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a'] => $this->_tpl_vars['i']):
?>
                    <tr data-id='<?php echo $this->_tpl_vars['i']['orderHandle']['AmazonOrderId']; ?>
'>
                        <td id='<?php echo $this->_tpl_vars['i']['orderHandle']['AmazonOrderId']; ?>
'>
                            <input type="checkbox" class = "checkBoxSelect" name = "checkbox" id = 'cb'/>
                        </td>
                        <td>更新</td>
                        <td><?php echo $this->_tpl_vars['i']['orderHandle']['AmazonOrderId']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['items']['OrderItemId']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['SellerID']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['orderHandle']['BuyerName']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['orderHandle']['BuyerEmail']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['items']['SellerSKU']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['i']['orderAddress']['CountryCode']; ?>
</td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
            <p>
                <button class="btn btn-primary" id= "UpdateOrder">更新订单</button>
                <button class="btn" id="return">返回</button>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="public/template/ck1sh/js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="public/template/ck1sh/js/index.js"></script>
    <?php echo '
        <script>
        	$(document).ready(function(){
        		//页面跳转
        		$(\'#return\').click(function(){
        			location.href = \'?r=oms/shorder/normal&platform=101\';
        		});
        		
        		//全选
                $(\'#selectAll\').click(function(){
                    allCheckBox($(\'#selectAll\'),$(".checkBoxSelect"));
                });

                function allCheckBox(obj1, obj2) {
                    obj1.on("change", function() {
                        obj2.prop("checked", $(this).prop("checked"));
                    });
                }
        		
        		$(\'#UpdateOrder\').click(function(){
        			var isChecked = $(\'#cb\').is(":checked");
        			if(!isChecked){
        				alert(\'请选择要更新的订单\');
        			}else{   
                        var a = getsId($(\'.conBox table tbody tr input[type=checkbox]:checked\'));
                        $.ajax({                    
                            url:\'index.php?r=oms/Shaz/ShowExcel&azid=\'+a,                          
                            success:function(data){                             
                                if(data){
                                    if(confirm(\'更新成功！是否跳转\')){
                                        location.href = \'?r=oms/shorder/normal&platform=101\';
                                    }
                                }else{
                                    alert(\'更新失败\');
                                }
                            }
                        });     				
        			} 
        		});


                //获取复选框值
                 function getsId(obj) { //参数为被勾选的复选框，即带有checked属性的复选框
                    var str_allId = \'\';
                    var allCheckBox = obj; //例：$(\'.address-label table tbody tr input[type=checkbox]:checked\');
                    if (allCheckBox.length == 0) {
                        return \'\';
                    }
                    for (var i = 0;i<allCheckBox.length; i++) {
                        str_allId += allCheckBox.eq(i).parent().parent().attr(\'data-id\') + \',\'
                    }
                    var nStr_allId = str_allId.substr(0, str_allId.length - 1);
                    return nStr_allId;
                } 

        	});
        </script>
    '; ?>

</body>

</html>