<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="/Public/SjtAdminSjt/css/css.css" />
<script type="text/javascript" src="/Public/User/js/jquery-1.7.2.js"></script>
<script type="text/javascript">

</script>
<style type="text/css">
#listuser{
	width:70%;
	margin-top:50px;
	}

#listuser tr td{
	height:50px;
	text-align:left;
	padding-left:20px;
	vertical-align:middle;
	color:#00F;
	font-weight:bold;
	}

#listuser input[type='text']{
    width:50px;
	vertical-align:middle;
	}	
</style>
</head>
<base target="_self">
<body>
<form name="Form1" method="post" action="/SjtAdminSjt_System_Diaodanedit.html">

<table cellpadding="0" cellspacing="0" border="0" id="listuser">

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td>
掉单开关：
<select name="Diaodan_OnOff" id="Diaodan_OnOff">
<option value="0">关闭</option>
<option value="1">正常</option>
</select>
<script type="text/javascript">
$("#Diaodan_OnOff").val(<?php echo ($vo["Diaodan_OnOff"]); ?>);
</script>
</td>
</tr>
<tr>
<td>
多少单后掉一单：<input type="text" name="Diaodan_Pinlv" id="Diaodan_Pinlv" value="<?php echo ($vo["Diaodan_Pinlv"]); ?>">
</td>
</tr>
<tr>
<td>
开始时间：
<select name="Diaodan_Kdate" id="Diaodan_Kdate">
<option value="1">1点整</option>
<option value="2">2点整</option>
<option value="3">3点整</option>
<option value="4">4点整</option>
<option value="5">5点整</option>
<option value="6">6点整</option>
<option value="7">7点整</option>
<option value="8">8点整</option>
<option value="9">9点整</option>
<option value="10">10点整</option>
<option value="11">11点整</option>
<option value="12">12点整</option>
<option value="13">13点整</option>
<option value="14">14点整</option>
<option value="15">15点整</option>
<option value="16">16点整</option>
<option value="17">17点整</option>
<option value="18">18点整</option>
<option value="19">19点整</option>
<option value="20">20点整</option>
<option value="21">21点整</option>
<option value="22">22点整</option>
<option value="23">23点整</option>
<option value="0">0点整</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;结束时间：
<select name="Diaodan_Sdate" id="Diaodan_Sdate">
<option value="1">1点整</option>
<option value="2">2点整</option>
<option value="3">3点整</option>
<option value="4">4点整</option>
<option value="5">5点整</option>
<option value="6">6点整</option>
<option value="7">7点整</option>
<option value="8">8点整</option>
<option value="9">9点整</option>
<option value="10">10点整</option>
<option value="11">11点整</option>
<option value="12">12点整</option>
<option value="13">13点整</option>
<option value="14">14点整</option>
<option value="15">15点整</option>
<option value="16">16点整</option>
<option value="17">17点整</option>
<option value="18">18点整</option>
<option value="19">19点整</option>
<option value="20">20点整</option>
<option value="21">21点整</option>
<option value="22">22点整</option>
<option value="23">23点整</option>
<option value="0">0点整</option>
</select>
<script type="text/javascript">
$("#Diaodan_Kdate").val(<?php echo ($vo["Diaodan_Kdate"]); ?>);
$("#Diaodan_Sdate").val(<?php echo ($vo["Diaodan_Sdate"]); ?>);
</script>
</td>
</tr>
<tr>
<td>
掉单最小金额：<input type="text" name="Diaodan_Kmoney" id="Diaodan_Kmoney" value="<?php echo ($vo["Diaodan_Kmoney"]); ?>">&nbsp;&nbsp;&nbsp;&nbsp;
掉单最大金额：<input type="text" name="Diaodan_Smoney" id="Diaodan_Smoney"  value="<?php echo ($vo["Diaodan_Smoney"]); ?>">
</td>
</tr>
<tr>
<td>
掉单类型：
<select name="Diaodan_Type" id="Diaodan_Type">
  <option value="1">不入商户的账，不返回状态</option>
 <!-- <option value="2">入商户的账，不返回状态</option>-->
  <option value="3">不入商户的账，返回状态</option>
 <!-- <option value="4">随机</option>-->
</select>
<script type="text/javascript">
$("#Diaodan_Type").val(<?php echo ($vo["Diaodan_Type"]); ?>);
</script>
</td>
</tr>
<tr style="display:none;">
<td>
掉后是否可以手动恢复：
<select name="Diaodan_huifu" id="Diaodan_huifu">
   <option value="0">否</option>
   <option value="1">是</option>
</select>
<script type="text/javascript">
$("#Diaodan_huifu").val(<?php echo ($vo["Diaodan_huifu"]); ?>);
</script>
</td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<div style="width:100%; margin:0px auto; margin-top:10px; text-align:center; height:auto; font-size:20px; font-weight:bold;">
<input type="submit" value="确认修改">
</div>
</form>
</body>
</html>