<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
<title><?php echo ($youname); ?>的收款主页</title>
<link href="static/css/bootstrap.min.css" rel="stylesheet" /> 
<link href="static/css/index.min.css" rel="stylesheet" />
<script src="static/js/jquery.min.js" type="text/javascript"></script>
<script src="static/js/index.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/defaultcss.css" />
<script type="text/javascript" src="/Public/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/Public/js/mypayjs.js"></script>
<style type="text/css">
body{background:url(static/images/wallpaper7.jpg) repeat-y left top;}
.in-login{left:50%;margin-left:-160px;top:30%;}
</style>
</head>
<body>
<header>
<div class="logo">
  <a href="/"><img src="static/picture/logo.png" alt="我的网站"class="img-responsive" />
  </a>
        </div>
  <div class="hotline"> </div>
  <div class="menu-icon"> <a href="tel:0817-6686753" title="点击直拨"><span class="glyphicon glyphicon-earphone"></span></a> <span class="glyphicon glyphicon-th-large"></span> </div>
</header>
    <div class="welcome"></div>
    <div class="quality1">
  <div class="box">
    <div class="caption"> <i></i><span></span> <br class="clear" />
    </div>


</br>
</br>
</br>
</br>
</br>
</br>
</br>




<div id="mypaycontents">
    <div id="mypaytishi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注意：收款主页仅供个人收款使用，付款前请核实收款人信息</div>
    <div id="mypaycontent">
         <div class="mypaycontentleft">
             <div id="mypaynr">
                 <div class="mypaynr_class" style="margin-top:35px; font-size:30px;"><?php echo ($youname); ?>&nbsp;<img src="/Public/images/lzfrz.jpg" style="vertical-align:middle;"></div>
                 <div class="mypaynr_class" style="margin-top:70px;"><?php echo ($weburl); ?></div>
                 <div class="mypaynr_class" style="margin-top:105px;">注册时间：<?php echo ($RegDate); ?></div>
             </div>
         </div>
         <div class="mypaycontentright">
             <div id="mypayts">
             <div><span style="font-size:50px;">“</span><br>你好！我是<?php echo ($youname); ?><br>&nbsp;&nbsp;&nbsp;&nbsp;这是我的收款主页。您可以核对个人信息后向我付款，付款后我将自动收到通知，谢谢。 <br><span style="font-size:50px; margin-left:300px;">”</span></div>
             </div>
         </div>

    </div>

<form name="p" action="/Tpl/Home/Index/mypay/pay.php" method="post" >
<!--  <input type="hidden" name="faceValue" value="0.01" >-->
<input type="hidden" name="subject" value="111">
<input type="hidden" name="description" value="222">
<input type="hidden" name="cardId" value="">
<input type="hidden" name="notic" value="">
<input type="hidden" name="paytype" value="wxwap" id="wxwap">
<input type="hidden" name="pid" value="WXWAP" id="WXWAP">
  
    <div id="mypaycontentmypaycontent">
         <div class="mypay_a1">
             <img src="/Public/images/mypaybg.jpg" style="vertical-align:middle;">&nbsp;您是商户认证用户，可以使用网银、支付宝、微信、QQ钱包、财付通，进行收款。
         </div>
         <div class="mypay_a2">
            收款账户：<b><?php echo ($youname); ?></b>
         </div>
         <div class="mypay_a2">
         支付类型：<input type="radio" zy="b" id="b" name="Sjt_Paytype"><span style="cursor:pointer">在线支付</span>
         </div>



         <div class="mypay_a2">
            付款金额：<input type="text" name="faceValue" id="faceValue" style="font-size:18px; color:#F00; font-weight:bold; width:150px;" onkeypress="keyPress()">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999; font-size:13px;">请输入数字，必须为整数</span>
         </div>
          <div class="mypay_a2">
            付款说明：<input type="text" name="fksm" id="fksm" style="font-size:18px; width:350px;">
         </div>

         <div class="mypay_a2" style="font-size:13px; color:#CCC">
           <input type="checkbox" value="1" name="gx" id="gx" style="vertical-align:middle; margin-left:0px;" checked="checked">&nbsp;已核对<?php echo ($youname); ?>的身份，确认付款后不能退款。
           <input type="hidden" name="ActionName" id="ActionName" value="<?php echo ($ActionName); ?>">
         </div>

     <input type="submit" style="background:url('/Public/images/qrxxbfk.jpg') no-repeat;width:165px;height:45px;margin-left:150px; cursor:pointer;" class="mypaytj" id="mypayimgtj" value=" ">

         
         </form>

         <div class="mypay_a2">

         </div>

         </div>


         </div>




</body>
</html>