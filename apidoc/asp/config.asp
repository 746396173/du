<%
'ƽ̨�̻�ID����Ҫ�������Լ����̻�ID
UserId="2013"


'�ӿ���Կ����Ҫ���������Լ�����Կ��Ҫ����̨���õ�һ��
'��¼APIƽ̨���̻�����-->��ȫ����-->��Կ���ã������Լ�������Կ
SalfStr="aabbcc"


'���ص�ַ��Ҫ���³������ڵ�ƽ̨���ص�ַ
'���磺����www.abc.com�ϽӵĽӿڣ���ô���ص�ַ���ǣ�http://www.abc.com/pay/gateway.asp
gateWary="../pay/gateway.asp"


'��ֵ�����̨֪ͨ��ַ
result_url="http://"&request.ServerVariables("HTTP_HOST")&"/test/result_url.asp"


'��ֵ����û�����վ�ϵ�ת���ַ
notify_url="http://"&request.ServerVariables("HTTP_HOST")&"/test/notify_Url.asp"
%>