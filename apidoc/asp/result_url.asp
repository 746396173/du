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
		response.write "errCode=0"
		'����Ϊ�ɹ�����,���ⶩ�����ظ�����
	else
		'֧��ʧ��
		response.write "err"
	end if
else
	response.write "���ݱ�����"
end if
%>