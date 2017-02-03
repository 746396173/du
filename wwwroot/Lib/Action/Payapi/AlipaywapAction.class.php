﻿<?php
     class AlipayAction extends PayAction{
         
         
         public function Post(){
             
            $this->PayName = "Alipaywap";
            $this->TradeDate = date("Y-m-d H:i:s");
            $this->Paymoneyfen = 1;
           
            $this->check();
           
            $this->Orderadd();

            
              $this->_Merchant_url = "https://".C("WEB_URL")."/Payapi_Alipaywap_MerChantUrl.html";      //商户通知地址
           // $this->_Merchant_url = "";
        
             $this->_Return_url = "https://".C("WEB_URL")."/Payapi_Alipaywap_ReturnUrl.html";   //用户通知地址
            ////////////////////////////////////////////////
             $Sjapi = M("Sjapi");
             $this->_MerchantID = $Sjapi->where("apiname='".$this->PayName."'")->getField("shid"); //商户ID
             $this->_Md5Key = $Sjapi->where("apiname='".$this->PayName."'")->getField("key"); //密钥   
             $zhanghu = $Sjapi->where("apiname='".$this->PayName."'")->getField("zhanghu");
             $this->sjt_OrderMoney=floatval($this->OrderMoney)*floatval($this->Paymoneyfen);//订单金额
            ///////////////////////////////////////////////
             Vendor('Alipay.alipay_submit','','.class.php');
             //↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
             //合作身份者id，以2088开头的16位纯数
             $alipay_config['partner']		= $this->_MerchantID;
             
             //收款支付宝账号
             $alipay_config['seller_email']	= $zhanghu;
             
             //安全检验码，以数字和字母组成的32位字符
             $alipay_config['key']			= $this->_Md5Key;
             
             
             //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
             
             
             //签名方式 不需修改
             $alipay_config['sign_type']    = strtoupper('MD5');
             
             //字符编码格式 目前支持 gbk 或 utf-8
             $alipay_config['input_charset']= strtolower('utf-8');
             
             //ca证书路径地址，用于curl中ssl校验
             //请保证cacert.pem文件在当前文件夹目录中
             $alipay_config['cacert']    = getcwd().'\\cacert.pem';
             
             //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
             $alipay_config['transport']    = 'http';
             
             
             //支付类型
             $payment_type = "1";
             //必填，不能修改
             //服务器异步通知页面路径
             $notify_url = $this->_Return_url;
             //需http://格式的完整路径，不能加?id=123这类自定义参数
             
             //页面跳转同步通知页面路径
             $return_url = $this->_Merchant_url;
             //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
             
             //商户订单号
             $out_trade_no = $this->TransID;
             //商户网站订单系统中唯一订单号，必填
             
             //订单名称
             $subject = "支付宝在线支付";
             //必填
             
             //付款金额
             $total_fee = $this->sjt_OrderMoney;
             //必填
             
             //订单描述
             
             $body = "";
             //默认支付方式
             $paymethod = "bankPay";
             //必填
             //默认网银
             $defaultbank = $this->Sjt_PayID;
             //必填，银行简码请参考接口技术文档
             
             //商品展示地址
             $show_url = "";
             //需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html
             
             //防钓鱼时间戳
             $anti_phishing_key = "";
             //若要使用请调用类文件submit中的query_timestamp函数
             
             //客户端的IP地址
             $exter_invoke_ip = "";
             //非局域网的外网IP地址，如：221.0.0.1
             
             //构造要请求的参数数组，无需改动
             $parameter = array(
             		"service" => "create_direct_pay_by_user",
             		"partner" => trim($alipay_config['partner']),
             		"seller_email" => trim($alipay_config['seller_email']),
             		"payment_type"	=> $payment_type,
             		"notify_url"	=> $notify_url,
             		"return_url"	=> $return_url,
             		"out_trade_no"	=> $out_trade_no,
             		"subject"	=> $subject,
             		"total_fee"	=> $total_fee,
             		"body"	=> $body,
             		"paymethod"	=> $paymethod,
             		"defaultbank"	=> $defaultbank,
             		"show_url"	=> $show_url,
             		"anti_phishing_key"	=> $anti_phishing_key,
             		"exter_invoke_ip"	=> $exter_invoke_ip,
             		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
             );
             
             //建立请求
             $alipaySubmit = new AlipaySubmit($alipay_config);
             $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "正在加载中...");
             echo $html_text;
              

         }
         
       
       public function MerChantUrl(){
		       	$Sjapi = M("Sjapi");
		       	$this->_MerchantID = $Sjapi->where("apiname='Alipay'")->getField("shid"); //商户ID
		       	$this->_Md5Key = $Sjapi->where("apiname='Alipay'")->getField("key"); //密钥
		       	$zhanghu = $Sjapi->where("apiname='Alipay'")->getField("zhanghu");
		       	Vendor('Alipay.alipay_notify','','.class.php');
		       	//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		       	//合作身份者id，以2088开头的16位纯数
		       	$alipay_config['partner']		= $this->_MerchantID;
		       	 
		       	//收款支付宝账号
		       	$alipay_config['seller_email']	= $zhanghu;
		       	 
		       	//安全检验码，以数字和字母组成的32位字符
		       	$alipay_config['key']			= $this->_Md5Key;
		       	 
		       	 
		       	//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		       	 
		       	 
		       	//签名方式 不需修改
		       	$alipay_config['sign_type']    = strtoupper('MD5');
		       	 
		       	//字符编码格式 目前支持 gbk 或 utf-8
		       	$alipay_config['input_charset']= strtolower('utf-8');
		       	 
		       	//ca证书路径地址，用于curl中ssl校验
		       	//请保证cacert.pem文件在当前文件夹目录中
		       	$alipay_config['cacert']    = getcwd().'\\cacert.pem';
		       	 
		       	//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		       	$alipay_config['transport']    = 'http';
		       	
		       	
		       	//计算得出通知验证结果
		       	$alipayNotify = new AlipayNotify($alipay_config);
		       	$verify_result = $alipayNotify->verifyReturn();
		       //	file_put_contents("zyzyzzy.txt","[".$verify_result."]\n", FILE_APPEND);
		       	if($verify_result) {//验证成功
		       		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		       		//请在这里加上商户的业务逻辑程序代码
		       	
		       		//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		       		//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
		       	
		       		//商户订单号
		       	
		       		$out_trade_no = $_GET['out_trade_no'];
		       	
		       		//支付宝交易号
		       	
		       		$trade_no = $_GET['trade_no'];
		       	
		       		//交易状态
		       		$trade_status = $_GET['trade_status'];
		       	
		       	
		       		if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		       			//判断该笔订单是否在商户网站中已经做过处理
		       			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
		       			//如果有做过处理，不执行商户的业务程序
		       			$this->TongdaoManage($out_trade_no,0);
		       		}
		       		else {
		       			echo "trade_status=".$_GET['trade_status'];
		       		}
		       	
		       		//echo "验证成功<br />";
		       	
		       		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
		       	
		       		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		       	 }else {
		       		//验证失败
		       		//如要调试，请看alipay_notify.php页面的verifyReturn函数
		       		echo "验证失败";
		       	 }
		       	
       }
      
   
      public function ReturnUrl(){
	      	$Sjapi = M("Sjapi");
	      	$this->_MerchantID = $Sjapi->where("apiname='Alipay'")->getField("shid"); //商户ID
	      	$this->_Md5Key = $Sjapi->where("apiname='Alipay'")->getField("key"); //密钥
	      	$zhanghu = $Sjapi->where("apiname='Alipay'")->getField("zhanghu");
	      	Vendor('Alipay.alipay_notify','','.class.php');
	      	//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
	      	//合作身份者id，以2088开头的16位纯数
	      	$alipay_config['partner']		= $this->_MerchantID;
	      	 
	      	//收款支付宝账号
	      	$alipay_config['seller_email']	= $zhanghu;
	      	 
	      	//安全检验码，以数字和字母组成的32位字符
	      	$alipay_config['key']			= $this->_Md5Key;
	      	 
	      	 
	      	//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	      	 
	      	 
	      	//签名方式 不需修改
	      	$alipay_config['sign_type']    = strtoupper('MD5');
	      	 
	      	//字符编码格式 目前支持 gbk 或 utf-8
	      	$alipay_config['input_charset']= strtolower('utf-8');
	      	 
	      	//ca证书路径地址，用于curl中ssl校验
	      	//请保证cacert.pem文件在当前文件夹目录中
	      	$alipay_config['cacert']    = getcwd().'\\cacert.pem';
	      	 
	      	//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
	      	$alipay_config['transport']    = 'http';
	      	
	      	//计算得出通知验证结果
	      	$alipayNotify = new AlipayNotify($alipay_config);
	      	$verify_result = $alipayNotify->verifyNotify();
	      	
	      	if($verify_result) {//验证成功
	      		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	      		//请在这里加上商户的业务逻辑程序代
	      	
	      	
	      		//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	      	
	      		//获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
	      	
	      		//商户订单号
	      	
	      		$out_trade_no = $_POST['out_trade_no'];
	      	
	      		//支付宝交易号
	      	
	      		$trade_no = $_POST['trade_no'];
	      	
	      		//交易状态
	      		$trade_status = $_POST['trade_status'];
	      	
	      		if($_GET['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {
	      			//判断该笔订单是否在商户网站中已经做过处理
	      			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
	      			//如果有做过处理，不执行商户的业务程序
	      			$this->TongdaoManage($out_trade_no);
	      			echo "success";		//请不要修改或删除
	      		}
	      		else {
	      			echo "trade_status=".$_GET['trade_status'];
	      		}
	      	
	      		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	      	
	      		
	      	
	      		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	      	}
	      	else {
	      		//验证失败
	      		echo "fail";
	      	
	      		//调试用，写文本函数记录程序运行情况是否正常
	      		//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	      	}
          
      }
         
         
     }
?>