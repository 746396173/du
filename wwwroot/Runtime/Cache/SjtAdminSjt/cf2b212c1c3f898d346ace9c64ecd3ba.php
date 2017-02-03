<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="/Public/SjtAdminSjt/css/css.css" />
<script type="text/javascript" src="/Public/User/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#jj").change(function(e) {
        if($(this).val() == "-1"){
			$("#lr").show();
		}else{
			$("#lr").hide();
		}
    });
});
function clearNoNum(obj)
	{
		//先把非数字的都替换掉，除了数字和.
		obj.value = obj.value.replace(/[^\d.]/g,"");
		//必须保证第一个为数字而不是.
		obj.value = obj.value.replace(/^\./g,"");
		//保证只有出现一个.而没有多个.
		obj.value = obj.value.replace(/\.{2,}/g,".");
		//保证.只出现一次，而不能出现两次以上
		obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	}

</script>
<style type="text/css">
#listuser{
	margin-top:10px;
	}
#listuser tr td{
	height:40px;
	vertical-align:middle;
	}	
</style>
</head>
<base target="_self" />
<body>
<form name="Form1" method="post" action="/SjtAdminSjt_ShangHu_xgjejj.html">
<div style="width:100%; margin:0px auto; margin-top:10px; text-align:center; height:auto; font-size:20px; font-weight:bold;">【 <span style="color:#03F"><?php echo ($UserName); ?></span>&nbsp;账上未提现金额：<span style="font-weight:bold; color:#F00"><?php echo ($Money); ?></span> 元 】<br><br>
</div>
<table cellpadding="0" cellspacing="0" border="0" id="listuser">
<tr>
<td style="text-align:left; padding-left:20px;">
请选择修改类型：
<select name="jj" id="jj">
<option value="-1">减少</option>
<option value="1">增加</option>
</select>
<input type="hidden" value="<?php echo ($_GET['UserID']); ?>" name="UserID">
</td>
</tr>
<tr>
<td style="text-align:left; padding-left:20px;">
请选择修改金额：
<input type="text" size="20" name="money" onkeyup="clearNoNum(this)">&nbsp;&nbsp;
<select name="lr" id="lr">
<option value="0">利润</option>
<option value="1">冻结</option>
</select>
</td>
</tr>
<tr>
<td style="text-align:left; padding-left:20px; height:100px;">
修改备注说明：
<textarea name="content" style="width:300px; height:100px;"></textarea>
</td>
</tr>
<tr>
<td colspan="2" style="text-align:center;">
   <input type="submit" value="确认修改">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重 置">
</td>
</tr>
</table>

</form>
</body>
</html>