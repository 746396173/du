<?
include_once("config.php");
$UserId=$_REQUEST["P_UserId"];
$OrderId=$_REQUEST["P_OrderId"];
$CardId=$_REQUEST["P_CardId"];
$CardPass=$_REQUEST["P_CardPass"];
$FaceValue=$_REQUEST["P_FaceValue"];
$ChannelId=$_REQUEST["P_ChannelId"];

$subject=$_REQUEST["P_Subject"];
$description=$_REQUEST["P_Description"]; 
$price=$_REQUEST["P_Price"];
$quantity=$_REQUEST["P_Quantity"];
$notic=$_REQUEST["P_Notic"];
$ErrCode=$_REQUEST["P_ErrCode"];
$PostKey=$_REQUEST["P_PostKey"];
$payMoney=$_REQUEST["P_PayMoney"];

$preEncodeStr=$P_UserId."|".$P_OrderId."|".$P_CardId."|".$P_CardPass."|".$P_FaceValue."|".$P_ChannelId."|".SalfStr;

$encodeStr=md5($preEncodeStr);

if($PostKey==$encodeStr)
{
	if($ErrCode=="0") //֧���ɹ�
	{
		echo "errCode=0";
		//����Ϊ�ɹ�����,���ⶩ�����ظ�����
	}
	else
	{
		//֧��ʧ��
		echo "err";
	}
}
else
{
	echo "���ݱ�����";
}
?>