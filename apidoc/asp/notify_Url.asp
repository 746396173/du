<!--#include file="md532.asp"-->
<!--#include file="config.asp"-->
<%
UserId=request("P_UserId")
OrderId=request("P_OrderId")
CardId=request("P_CardId")
CardPass=request("P_CardPass")
FaceValue=formatnumber(request("P_FaceValue"),-1,true,false,false)
ChannelId=request("P_ChannelId")

subject=request("P_Subject")
description=request("P_Description") 
price=request("P_Price")
quantity=request("P_Quantity")
notic=request("P_Notic")
ErrCode=request("P_ErrCode")
PostKey=request("P_PostKey")
payMoney=request("P_PayMoney")

preEncodeStr=UserId&"|"&OrderId&"|"&CardId&"|"&CardPass&"|"&FaceValue&"|"&ChannelId&"|"&SalfStr

encodeStr=md5(preEncodeStr)


if PostKey=encodeStr then
	if ErrCode="0" then'֧���ɹ�
		'����Ϊ�ɹ������������ⶩ�����ظ�����
	else
		'֧��ʧ��
		response.write "err"
	end if
else
	response.write "���ݱ�����"
end if
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����֧�����ҳ��</title>
<style type="text/css">
body{
	font-size:12px;
	color:#FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {color: #2179DD}
.STYLE2 {color: #000000}
</style>
</head>
<body>
<table width="100%" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="34"><img src="img/pic_1.gif" width="69" height="60" /></td>
    <td width="100%" background="img/pic_3.gif" bgcolor="#2179DD"><img src="img/pic_4.gif" width="40" height="40" /> ���ٳ�ֵ</td>
    <td width="13" height="34"><img src="img/pic_2.gif" width="69" height="60" /></td>
  </tr>
</table>

<table width="864" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#5c9acf" class="mytable">
  <tr>
    <td width="100%" height="88" bgcolor="#FFFFFF"><br />
	
      	<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="table_main">
          <tr>
            <td width="178" height="25" align="right" class="STYLE1">�̻�ID��</td>
            <td width="315"><span class="STYLE2"><%=request("P_UserId")%></span></td>
          </tr>
          <tr>
            <td height="25" align="right" class="STYLE1">�����ţ�</td>
            <td><span class="STYLE2"><%=request("P_OrderId")%></span></td>
          </tr>
          <tr>
            <td height="25" align="right" class="STYLE1">��ֵ��</td>
            <td><span class="STYLE2"><%=request("P_FaceValue")%></span></td>
          </tr>
          <tr>
            <td height="25" align="right" class="STYLE1">ʵ�ʳ�ֵ��</td>
            <td><span class="STYLE2"><%=request("P_PayMoney")%></span></td>
          </tr>
          <tr>
            <td height="25" align="right" class="STYLE1">״̬��ʶ��</td>
            <td height="25"><span class="STYLE2"><%=request("P_ErrCode")%>(״̬Ϊ0��ʾ�ɹ�)</span></td>
          </tr>
      </table>
      <br /></td>
  </tr>
</table>
</body>
</html>
