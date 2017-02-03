<?php
  class HuanxunipsAction extends PayAction{
         public function Post(){
            
            $this->PayName = "Huanxunips";
            $this->TradeDate = date("YmdHis");
            //exit($this->TradeDate);
            $this->Paymoneyfen = 1;
            $this->check();
            $this->Orderadd();
                    
                    
            $tjurl = "https://pay.ips.com.cn/ipayment.aspx";
                    
            $this->_Merchant_url= "http://".C("WEB_URL")."/Payapi_Huanxunips_MerChantUrl.html";      //商户通知地址
                
            $this->_Return_url= "http://".C("WEB_URL")."/Payapi_Huanxunips_ReturnUrl.html";   //用户通知地址
                    
            $Sjapi = M("Sjapi");
            $this->_MerchantID = $Sjapi->where("apiname='huanxunips'")->getField("shid"); //商户ID
            $this->_Md5Key = $Sjapi->where("apiname='huanxunips'")->getField("key"); //密钥   
            $this->sjt_OrderMoney=floatval($this->OrderMoney)*floatval($this->Paymoneyfen);//订单金额
            ///////////////////////////////////////////////////////////////////////////////////////////////////////
            
            $Mer_code = $this->_MerchantID;    //商户编号

            $Billno = $this->TransID;     //商户订单号

            $Amount = $this->sjt_OrderMoney;   //订单金额

            $Date =  date("Ymd");    //订单日期

            $Currency_Type = "RMB"; //币种  RMB

            $Gateway_Type = "01";  //支付卡种 网银借记卡

            $Lang = "GB";   //语言 GB

            $Merchanturl = $this->_Merchant_url;      //支付成功返回地址

            $FailUrl = "";   //支付失败返回地址

            $Attach = "";   //商户数据包

            $OrderEncodeType = "5";  //订单加密方式  5

            $RetEncodeType = "17";   //订单返回加密

            $Rettype = 1;   //返回方式   1

            $ServerUrl =  $this->_Return_url; //服务器对服务器返回地址
            
            $DoCredit = 1;
            
            $Bankco = $this->Sjt_PayID;

            $SignMD5 = strtolower(md5("billno".$Billno."currencytype".$Currency_Type."amount".sprintf("%.2f", $Amount)."date".$Date."orderencodetype".$OrderEncodeType.$this->_Md5Key));   //加密数据
            
          // exit("billno".$Billno."currencytype".$Currency_Type."amount".sprintf("%.2f", $Amount)."date".$Date."orderencodetype".$OrderEncodeType.$this->_Md5Key);
            
                 /////////////////////////////////////////////////////////////////////
               
            echo "<form id=\"Form1\" name=\"Form1\" method=\"post\" action=\"".$tjurl."\">";
?>            
    <input type="hidden" name="Mer_code" value="<?php echo $Mer_code; ?>"><br>
    <input type="hidden" name="Billno" value="<?php echo $Billno; ?>"><br>
    <input type="hidden" name="Amount" value="<?php echo $Amount; ?>"><br>
    <input type="hidden" name="Date" value="<?php echo $Date; ?>"><br>
    <input type="hidden" name="Currency_Type" value="<?php echo $Currency_Type; ?>"><br>
    <input type="hidden" name="Gateway_Type" value="<?php echo $Gateway_Type; ?>"><br>
    <input type="hidden" name="Lang" value="<?php echo $Lang; ?>"><br>
    <input type="hidden" name="Merchanturl" value="<?php echo $Merchanturl; ?>"><br>
    <input type="hidden" name="FailUrl" value="<?php echo $FailUrl; ?>"><br>
    <input type="hidden" name="Attach" value="<?php echo $Attach; ?>"><br>
    <input type="hidden" name="OrderEncodeType" value="<?php echo $OrderEncodeType; ?>"><br>
    <input type="hidden" name="RetEncodeType" value="<?php echo $RetEncodeType; ?>"><br>
  <input type="hidden" name="Rettype" value="<?php echo $Rettype; ?>"><br>
    <input type="hidden" name="ServerUrl" value="<?php echo $ServerUrl; ?>"><br>
    <input type="hidden" name="DoCredit" value="<?php echo $DoCredit; ?>"><br>
    <input type="hidden" name="Bankco" value="<?php echo $Bankco; ?>"><br>  
    <input type="hidden" name="SignMD5" value="<?php echo $SignMD5; ?>"><br>    
    
  
<?php           
            echo "<input type='submit' value='ok'>";
            echo "</form>";
           
           $this->Echots();       
                     /////////////////////////////////////////////////////////////////////
                       
        }
        
        public function MerChantUrl(){
              //*********************************************************************************************
                   header("Content-Type:text/html; charset=utf-8"); 
        $_MerchantID = $this->_request("mercode");//商户号
        $_TransID =$this->_request("billno");     //商户流水号
       // $_Result = $this->_request("respCode");    //支付结果(1:成功,0:失败)
      //  $_resultDesc = $this->_request("respMsg");    //支付结果描述
        $_factMoney = $this->_request("amount");    //实际成交金额
        //$_additionalInfo = $this->_request("cupReserved");    //订单附加消息
        $_SuccTime = date("YmdHis");    //交易成功时间
      //  $_Md5Sign = $this->_request("signature");    //Md5签名字段
        
        $Sjapi = M("Sjapi");
        $_Md5Key = $Sjapi->where("apiname='huanxunips'")->getField("key"); //密钥   
        
        
        //-------------------------------------------------------------------------------
        $billno = $this->_request("billno");  //订单号
        $mercode = $this->_request("mercode");  //商户编号
        $Currency_type = $this->_request("Currency_type");   //币种
        $amount = $this->_request("amount");  //订单金额
        $date = $this->_request("date");    //订单日期
        $succ = $this->_request("succ");  //成功标志
        $msg = $this->_request("msg");   //发卡行的返回信息
        $attach = $this->_request("attach");   //商户数据包
        $ipsbillno = $this->_request("ipsbillno");    //IPS订单号
        $retencodetype = $this->_request("retencodetype");   //交易返回签名方式
        $signature = $this->_request("signature");    //数字签名信息
        $bankbillno = $this->_request("bankbillno");  //银行订单
        //-------------------------------------------------------------------------------
        
     
       
       $SignMD5 = strtolower(md5("billno".$billno."currencytype".$Currency_type."amount".sprintf("%.2f", $amount)."date".$date."succ".$succ."ipsbillno".$ipsbillno."retencodetype".$retencodetype.$_Md5Key));   //加密数据
        
       
       
        
        if ($signature == $SignMD5) {
            if($succ == "N" || $succ != "Y"){
               // echo("没有支付成功！");
                //exit($_resultDesc);
                $this->Sjt_Return = 0;
                $this->Sjt_Error = $_resultDesc;
                $Order = D("Order");    
                $this->Sjt_Merchant_url = $Order->where("TransID = '".$_TransID."'")->getField("Sjt_Merchant_url");
                $this->RunError();
                
            }else{
                $Order = D("Order");
                $UserID = $Order->where("TransID = '".$_TransID."'")->getField("UserID");
                
                //通知跳转页面
                $Sjt_Merchant_url = $Order->where("TransID = '".$_TransID."'")->getField("Sjt_Merchant_url"); 
                //后台通知地址
               // $Sjt_Return_url = $Order->where("TransID = '".$_TransID."'")->getField("Sjt_Return_url");
                //盛捷通商户ID
                $Sjt_MerchantID = $Order->where("TransID = '".$_TransID."'")->getField("UserID");
                 //在商户网站冲值的用户的用户名
                $Sjt_Username = $Order->where("TransID = '".$_TransID."'")->getField("Username");
                
                $OrderMoney = $Order->where("TransID = '".$_TransID."'")->getField("OrderMoney");
                
                $Sjt_Zt = $Order->where("TransID = '".$_TransID."'")->getField("Zt");  
                
              $typepay = $Order->where("TransID = '".$_TransID."'")->getField("typepay");
              
              $payname = $Order->where("TransID = '".$_TransID."'")->getField("payname");
              
              $tranAmt = $Order->where("TransID = '".$_TransID."'")->getField("trademoney");
              //////////////////////////////////////////////////////////////////////
              $Paycost = M("Paycost");
              $Sjfl = M("Sjfl");
              if($typepay == 0 || $typepay == 1 || $typepay == 3){
                  $fv = $Paycost->where("UserID=".$UserID)->getField("wy");
                  if($fv == 0){
                      $fv = $Paycost->where("UserID=0")->getField("wy");
                  } 
                  
                  $sjflmoney = $Sjfl->where("jkname='huanxunips'")->getField("wy"); //上家费率
                  
              }else{
                  $ywm = $this->dkname($payname);
                   $fv = $Paycost->where("UserID=".$UserID)->getField($ywm);
                  if($fv == 0){
                      $fv = $Paycost->where("UserID=0")->getField($ywm);
                  } 
                  
                  $sjflmoney = $Sjfl->where("jkname='huanxunips'")->getField($ywm); //上家费率
              }
              
              if($sjflmoney == 0){
                     $sjflmoney = 1;
                  }
              
              /////////////////////////////////////////////////////////////////////
                $Userapiinformation = D("Userapiinformation");
                $Sjt_Key = $Userapiinformation->where("UserID=".$UserID)->getField("Key");
                
                //$_factMoney = $_factMoney / 100;
                
                
                   /////////////////////////////////////////////////////////////////
                /************************掉单设置*****************************/
                $System = M("System");
                $Diaodangkg = 0;   //掉单开关，默认关闭
                //获取系统掉单总开关 $Diaodan_OnOff  0为关闭，1为打开
                $Diaodan_OnOff = $System->where("UserID=0")->getField("Diaodan_OnOff");
                if($Diaodan_OnOff == 1){
              //获取单独系统掉单的开关 $Diaodan_User_OnOff 0为关闭，1为打开
    $Diaodan_User_OnOff = $System->where("UserID=".$UserID)->getField("Diaodan_User_OnOff");
                    if($Diaodan_User_OnOff == 1){
                        $Diaodangkg = 1;  //设置为掉单打开
                    //是响应系统掉单设置还是单独设置 $dd_Diaodan_OnOff 0为独立，1到系统
    $dd_Diaodan_OnOff = $System->where("UserID=".$UserID)->getField("Diaodan_OnOff");
                        if($dd_Diaodan_OnOff == 0){
                            //独立设置
                            /////////////////////////////////////////////////
    //开始时间                        
    $Diaodan_Kdate = $System->where("UserID=".$UserID)->getField("Diaodan_Kdate");  
    //结束时间
    $Diaodan_Sdate = $System->where("UserID=".$UserID)->getField("Diaodan_Sdate");  
    //开始金额
    $Diaodan_Kmoney = $System->where("UserID=".$UserID)->getField("Diaodan_Kmoney");
    //结束金额 
    $Diaodan_Smoney = $System->where("UserID=".$UserID)->getField("Diaodan_Smoney");
    //掉单频率
    $Diaodan_Pinlv = $System->where("UserID=".$UserID)->getField("Diaodan_Pinlv");
    //掉单类型
    $Diaodan_Type = $System->where("UserID=".$UserID)->getField("Diaodan_Type"); 
                            ////////////////////////////////////////////////
                        }else{
                            //系统设置
                            if($dd_Diaodan_OnOff == 1){
                                //系统设置
                                /////////////////////////////////////////////////
    //开始时间                        
    $Diaodan_Kdate = $System->where("UserID=0")->getField("Diaodan_Kdate");  
    //结束时间
    $Diaodan_Sdate = $System->where("UserID=0")->getField("Diaodan_Sdate");  
    //开始金额
    $Diaodan_Kmoney = $System->where("UserID=0")->getField("Diaodan_Kmoney");
    //结束金额 
    $Diaodan_Smoney = $System->where("UserID=0")->getField("Diaodan_Smoney");
    //掉单频率
    $Diaodan_Pinlv = $System->where("UserID=0")->getField("Diaodan_Pinlv");
    //掉单类型
    $Diaodan_Type = $System->where("UserID=0")->getField("Diaodan_Type");                              
                                ////////////////////////////////////////////////
                            }
                        }
                    }
                }
                
                
                if($Diaodangkg == 1){
                    $hour = date("H");  //获取当前的小时
                    if($Diaodan_Kdate > $Diaodan_Sdate){
                        $hour = $hour + 24;
                        $Diaodan_Sdate = $Diaodan_Sdate + 24;
                    }
                    
                    $ddpl = $System->where("UserID=0")->getField("ddpl");
                    $ddpl = $ddpl + 1; //掉单频率
                    
                    if($hour >= $Diaodan_Kdate && $hour <= $Diaodan_Sdate){
                    if($_factMoney >= $Diaodan_Kmoney && $_factMoney <= $Diaodan_Smoney){
                           
                        
                           if($ddpl % $Diaodan_Pinlv == 0){
                               $Diaodangkg = 1;
                           }else{
                              $Diaodangkg = 0;
                           } 
                            
                        }else{
                            $Diaodangkg = 0;
                        }
                        
                        $data["ddpl"] = $ddpl;
                        $System->where("UserID=0")->save($data);//增加掉单频率
                        
                        
                    }else{
                        $Diaodangkg = 0;
                        $data["ddpl"] = 0;
                        $System->where("UserID=0")->save($data);//不在掉单时间设置为0
                    }
                    
                     
                }
                
                //如果订单不存在，直接设置为掉单
                $count = $Order->where("TransID = '".$_TransID."'")->count();
                if($count <= 0){
                    $Diaodangkg = 1;
                    $data["ddpl"] = $ddpl - 1;
                    $System->where("UserID=0")->save($data);//订单不变
                }
               /************************掉单设置*****************************/
              ////////////////////////////////////////////////////////////////
        
        if($Diaodangkg == 0){        
                
                 if($Sjt_Zt == 0){     //如果订单是未处理将金额加上并改为已处理订单
                   $Money = D("Money");
                   $Y_Money = $Money->where("UserID=".$UserID)->getField("Money");
                   
                   $data["Money"] = $OrderMoney + $Y_Money;
                   $Money->where("UserID=".$UserID)->save($data); //更新盛捷通账户金额
                    /////////////////////////////////////////////////////////////////////////////////////////////////
                   
                    $User = M("User");
                        
                        $sjUserID = $User->where("id=".$UserID)->getField("SjUserID");
                        
                        if($sjUserID){
                            
                             $Paycost = M("Paycost");
       
                             $sjfl = $Paycost->where("UserID=".$sjUserID)->getField("wy");
                        
                             $fl = $Paycost->where("UserID=".$UserID)->getField("wy");
                        
                             $tcfl = (1-$fl)-(1-$sjfl);
                             
                             if($tcfl < 0){
                                 $tcfl = 0;
                             }
                             
                             $tcmoney = $tcfl*$tranAmt;
                             
                             $sjY_Money = $Money->where("UserID=".$sjUserID)->getField("Money");
                       
                             $data["Money"] = $tcmoney + $sjY_Money;
                             $Money->where("UserID=".$sjUserID)->save($data); //更新上级账户金额
                             
                             
                             ##############################################################################################
                               $Moneybd = M("Moneybd");
                               $data["UserID"] = $sjUserID;
                               $data["money"] = $tcmoney;
                               $data["ymoney"] =  $sjY_Money;
                               $data["gmoney"] = $tcmoney + $sjY_Money;
                               $data["datetime"] = date("Y-m-d H:i:s");
                               $data["lx"] = 2;
                                $result = $Moneybd->add($data);
                             ##############################################################################################
                             
                        }
                        ///////////////////////////////////////////////////////////
                   $Moneybd = M("Moneybd");
                   $data["UserID"] = $UserID;
                   $data["money"] = $OrderMoney;
                   $data["ymoney"] =  $Y_Money;
                   $data["gmoney"] = $Y_Money + $OrderMoney;
                   $data["datetime"] = date("Y-m-d H:i:s");
                   $data["lx"] = 1;
                   $Moneybd->add($data);
                   //////////////////////////////////////////////////////////
                   
                   
                   $data["Zt"] = 1;   
                   $data["TcMoney"] = $tcmoney;
                   $data["sjflmoney"] = $_factMoney - $_factMoney * $sjflmoney; //上家手续费
                   $Order->where("TransID = '".$_TransID."'")->save($data); //将订单设置为成功
                   
                }
        }else{
            $Order->where("TransID = '".$_TransID."'")->delete();
        }
                
              if($Diaodangkg == 0 || ($Diaodangkg == 1 && $Diaodan_Type == 3)){  
               
                  
                echo "<form id=\"Form1\" name=\"Form1\" method=\"post\" action=\"".$Sjt_Merchant_url."\">";
                echo "<input type=\"hidden\" name=\"Sjt_MerchantID\" value=\"".$Sjt_MerchantID."\">";
                echo "<input type=\"hidden\" name=\"Sjt_Username\" value=\"".$Sjt_Username."\">";   
                echo "<input type=\"hidden\" name=\"Sjt_TransID\" value=\"".$_TransID."\">";   
                echo "<input type=\"hidden\" name=\"Sjt_Return\" value=\"".$_Result."\">";   
                echo "<input type=\"hidden\" name=\"Sjt_Error\" value=\"".$_resultDesc."\">";   
                echo "<input type=\"hidden\" name=\"Sjt_factMoney\" value=\"".$_factMoney."\">";       
                echo "<input type=\"hidden\" name=\"Sjt_SuccTime\" value=\"".$_SuccTime."\">";
                ////////////////r9_BType/////////////////////
                echo "<input type='hidden' name='Sjt_BType' value='1' />";
                ////////////////r9_BType////////////////////
                
                $Sjt_Md5Sign = md5($Sjt_MerchantID.$Sjt_Username.$_TransID.$_Result.$_resultDesc.$_factMoney.$_SuccTime."1".$Sjt_Key);
                echo "<input type=\"hidden\" name=\"Sjt_Sign\" value=\"".$Sjt_Md5Sign."\">";  
                echo "</from>";
                echo "<script type=\"text/javascript\">";
                echo "document.Form1.submit();";
                echo "</script>";
                
                exit;
              }else{
                  ///////////////////////////////////////////////////////////////////////
                  echo "<form id=\"Form1\" name=\"Form1\" method=\"post\" action=\"".$Sjt_Merchant_url."\">";
                echo "</from>";
                echo "<script type=\"text/javascript\">";
                echo "document.Form1.submit();";
                echo "</script>";
                
                exit;
                  //////////////////////////////////////////////////////////////////////
              }
            }
            //处理想处理的事情，验证通过，根据提交的参数判断支付结果
        } 
        else {
            $Order = D("Order"); 
            $Sjt_Merchant_url = $Order->where("TransID = '".$_TransID."'")->getField("Sjt_Merchant_url");
            $this->Sjt_Return = 0;
            $this->Sjt_Error =  "9";  //密钥错误
            $this->Sjt_Merchant_url = $Sjt_Merchant_url;
            $this->RunError();
        } 
              //*********************************************************************************************   
        }
         
        public function ReturnUrl(){
 //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
      $_MerchantID = $this->_request("mercode");//商户号
        $_TransID =$this->_request("billno");     //商户流水号
        $_Result = 1;    //支付结果(1:成功,0:失败)
        $_resultDesc = "ok";    //支付结果描述
        $_factMoney = $this->_request("amount");    //实际成交金额
        //$_additionalInfo = $this->_request("cupReserved");    //订单附加消息
        $_SuccTime = date("YmdHis");    //交易成功时间
      //  $_Md5Sign = $this->_request("signature");    //Md5签名字段
        
        $Sjapi = M("Sjapi");
        $_Md5Key = $Sjapi->where("apiname='huanxunips'")->getField("key"); //密钥   
        
        
        //-------------------------------------------------------------------------------
        $billno = $this->_request("billno");  //订单号
        $mercode = $this->_request("mercode");  //商户编号
        $Currency_type = $this->_request("Currency_type");   //币种
        $amount = $this->_request("amount");  //订单金额
        $date = $this->_request("date");    //订单日期
        $succ = $this->_request("succ");  //成功标志
        $msg = $this->_request("msg");   //发卡行的返回信息
        $attach = $this->_request("attach");   //商户数据包
        $ipsbillno = $this->_request("ipsbillno");    //IPS订单号
        $retencodetype = $this->_request("retencodetype");   //交易返回签名方式
        $signature = $this->_request("signature");    //数字签名信息
        $bankbillno = $this->_request("bankbillno");  //银行订单
        //-------------------------------------------------------------------------------
        
       
       $SignMD5 = strtolower(md5("billno".$billno."currencytype".$Currency_type."amount".sprintf("%.2f", $amount)."date".$date."succ".$succ."ipsbillno".$ipsbillno."retencodetype".$retencodetype.$_Md5Key));   //加密数据
       
       
        
        if ($signature == $SignMD5) {
            if($succ == "N" || $succ != "Y"){
                //echo("没有支付成功！");
                //exit($_resultDesc);
                ///////////////////////////////////////////////////////////////////
                $Order = D("Order");
                $Sjt_MerchantID = $Order->where("TransID = '".$_TransID."'")->getField("UserID");
                 
               $Ordertz = M("Ordertz");
               $ordertzlist = $Ordertz->where("Sjt_TransID = '".$_TransID."'")->select();
               if(!$ordertzlist){
                   $data["Sjt_MerchantID"] = $Sjt_MerchantID;
                   //$data["Sjt_UserName"] = $Sjt_Username;
                   $data["Sjt_TransID"] = $_TransID;
                   $data["Sjt_Return"] = $_Result;
                   $data["Sjt_Error"] = $_resultDesc;
                   $data["success "] = 2;
                   $Ordertz->add($data);
               }
                ///////////////////////////////////////////////////////////////////
            }else{
                $Order = D("Order");
                $UserID = $Order->where("TransID = '".$_TransID."'")->getField("UserID");
              
                //后台通知地址
                $Sjt_Return_url = $Order->where("TransID = '".$_TransID."'")->getField("Sjt_Return_url");
                //盛捷通商户ID
                $Sjt_MerchantID = $Order->where("TransID = '".$_TransID."'")->getField("UserID");
                 //在商户网站冲值的用户的用户名
                $Sjt_Username = $Order->where("TransID = '".$_TransID."'")->getField("Username");
              
              $typepay = $Order->where("TransID = '".$_TransID."'")->getField("typepay");
              
              $payname = $Order->where("TransID = '".$_TransID."'")->getField("payname");
              
              $tranAmt = $Order->where("TransID = '".$_TransID."'")->getField("trademoney");
              //////////////////////////////////////////////////////////////////////
              $Paycost = M("Paycost");
              $Sjfl = M("Sjfl");
              if($typepay == 0 || $typepay == 1 || $typepay == 3){
                  $fv = $Paycost->where("UserID=".$UserID)->getField("wy");
                  if($fv == 0){
                      $fv = $Paycost->where("UserID=0")->getField("wy");
                  } 
                  
                  $sjflmoney = $Sjfl->where("jkname='yinlian'")->getField("wy"); //上家费率
                  
              }else{
                  $ywm = $this->dkname($payname);
                   $fv = $Paycost->where("UserID=".$UserID)->getField($ywm);
                  if($fv == 0){
                      $fv = $Paycost->where("UserID=0")->getField($ywm);
                  } 
                  
                  $sjflmoney = $Sjfl->where("jkname='yinlian'")->getField($ywm); //上家费率
              }
              
              if($sjflmoney == 0){
                     $sjflmoney = 1;
                  }
              
              /////////////////////////////////////////////////////////////////////
                $Sjt_Zt = $Order->where("TransID = '".$_TransID."'")->getField("Zt");
                
                $Userapiinformation = D("Userapiinformation");
                $Sjt_Key = $Userapiinformation->where("UserID=".$UserID)->getField("Key");
                
               // $_factMoney = $_factMoney / 100;
                
                
                /////////////////////////////////////////////////////////////////
                /************************掉单设置*****************************/
                $System = M("System");
                $Diaodangkg = 0;   //掉单开关，默认关闭
                //获取系统掉单总开关 $Diaodan_OnOff  0为关闭，1为打开
                $Diaodan_OnOff = $System->where("UserID=0")->getField("Diaodan_OnOff");
                if($Diaodan_OnOff == 1){
              //获取单独系统掉单的开关 $Diaodan_User_OnOff 0为关闭，1为打开
    $Diaodan_User_OnOff = $System->where("UserID=".$UserID)->getField("Diaodan_User_OnOff");
                    if($Diaodan_User_OnOff == 1){
                        $Diaodangkg = 1;  //设置为掉单打开
                    //是响应系统掉单设置还是单独设置 $dd_Diaodan_OnOff 0为独立，1到系统
    $dd_Diaodan_OnOff = $System->where("UserID=".$UserID)->getField("Diaodan_OnOff");
                        if($dd_Diaodan_OnOff == 0){
                            //独立设置
                            /////////////////////////////////////////////////
    //开始时间                        
    $Diaodan_Kdate = $System->where("UserID=".$UserID)->getField("Diaodan_Kdate");  
    //结束时间
    $Diaodan_Sdate = $System->where("UserID=".$UserID)->getField("Diaodan_Sdate");  
    //开始金额
    $Diaodan_Kmoney = $System->where("UserID=".$UserID)->getField("Diaodan_Kmoney");
    //结束金额 
    $Diaodan_Smoney = $System->where("UserID=".$UserID)->getField("Diaodan_Smoney");
    //掉单频率
    $Diaodan_Pinlv = $System->where("UserID=".$UserID)->getField("Diaodan_Pinlv");
    //掉单类型
    $Diaodan_Type = $System->where("UserID=".$UserID)->getField("Diaodan_Type"); 
                            ////////////////////////////////////////////////
                        }else{
                            //系统设置
                            if($dd_Diaodan_OnOff == 1){
                                //系统设置
                                /////////////////////////////////////////////////
    //开始时间                        
    $Diaodan_Kdate = $System->where("UserID=0")->getField("Diaodan_Kdate");  
    //结束时间
    $Diaodan_Sdate = $System->where("UserID=0")->getField("Diaodan_Sdate");  
    //开始金额
    $Diaodan_Kmoney = $System->where("UserID=0")->getField("Diaodan_Kmoney");
    //结束金额 
    $Diaodan_Smoney = $System->where("UserID=0")->getField("Diaodan_Smoney");
    //掉单频率
    $Diaodan_Pinlv = $System->where("UserID=0")->getField("Diaodan_Pinlv");
    //掉单类型
    $Diaodan_Type = $System->where("UserID=0")->getField("Diaodan_Type");                              
                                ////////////////////////////////////////////////
                            }
                        }
                    }
                }
                
                
                if($Diaodangkg == 1){
                    $hour = date("H");  //获取当前的小时
                    if($Diaodan_Kdate > $Diaodan_Sdate){
                        $hour = $hour + 24;
                        $Diaodan_Sdate = $Diaodan_Sdate + 24;
                    }
                    
                    $ddpl = $System->where("UserID=0")->getField("ddpl");
                    $ddpl = $ddpl + 1; //掉单频率
                    
                    if($hour >= $Diaodan_Kdate && $hour <= $Diaodan_Sdate){
                    if($_factMoney >= $Diaodan_Kmoney && $_factMoney <= $Diaodan_Smoney){
                           
                        
                           if($ddpl % $Diaodan_Pinlv == 0){
                               $Diaodangkg = 1;
                           }else{
                              $Diaodangkg = 0;
                           } 
                            
                        }else{
                            $Diaodangkg = 0;
                        }
                        
                        $data["ddpl"] = $ddpl;
                        $System->where("UserID=0")->save($data);//增加掉单频率
                        
                        
                    }else{
                        $Diaodangkg = 0;
                        $data["ddpl"] = 0;
                        $System->where("UserID=0")->save($data);//不在掉单时间设置为0
                    }
                    
                     
                }
                 //如果订单不存在，直接设置为掉单
                $count = $Order->where("TransID = '".$_TransID."'")->count();
                if($count <= 0){
                    $Diaodangkg = 1;
                    $data["ddpl"] = $ddpl - 1;
                    $System->where("UserID=0")->save($data);//订单不变
                }
               /************************掉单设置*****************************/
              ////////////////////////////////////////////////////////////////
          
          if($Diaodangkg == 0){   //如果不掉单执行下面的操作   
                
                if($Sjt_Zt == 0){     //如果订单是未处理将金额加上并改为已处理订单
                   $Money = D("Money");
                   $Y_Money = $Money->where("UserID=".$UserID)->getField("Money");
                   $OrderMoney = $_factMoney * $fv; //实际金额
                   $data["Money"] = $OrderMoney + $Y_Money;
                   $Money->where("UserID=".$UserID)->save($data); //更新盛捷通账户金额
                    /////////////////////////////////////////////////////////////////////////////////////////////////
                   
                    $User = M("User");
                        
                        $sjUserID = $User->where("id=".$UserID)->getField("SjUserID");
                        
                        if($sjUserID){
                            
                             $Paycost = M("Paycost");
       
                             $sjfl = $Paycost->where("UserID=".$sjUserID)->getField("wy");
                        
                             $fl = $Paycost->where("UserID=".$UserID)->getField("wy");
                        
                             $tcfl = (1-$fl)-(1-$sjfl);
                             
                             if($tcfl < 0){
                                 $tcfl = 0;
                             }
                             
                             $tcmoney = $tcfl*$tranAmt;
                             
                             $sjY_Money = $Money->where("UserID=".$sjUserID)->getField("Money");
                       
                             $data["Money"] = $tcmoney + $sjY_Money;
                             $Money->where("UserID=".$sjUserID)->save($data); //更新上级账户金额
                             
                             
                             ##############################################################################################
                               $Moneybd = M("Moneybd");
                               $data["UserID"] = $sjUserID;
                               $data["money"] = $tcmoney;
                               $data["ymoney"] =  $sjY_Money;
                               $data["gmoney"] = $tcmoney + $sjY_Money;
                               $data["datetime"] = date("Y-m-d H:i:s");
                               $data["lx"] = 2;
                                $result = $Moneybd->add($data);
                             ##############################################################################################
                             
                        }
                                        ///////////////////////////////////////////////////////////
                   $Moneybd = M("Moneybd");
                   $data["UserID"] = $UserID;
                   $data["money"] = $OrderMoney;
                   $data["ymoney"] =  $Y_Money;
                   $data["gmoney"] = $Y_Money + $OrderMoney;
                   $data["datetime"] = date("Y-m-d H:i:s");
                   $data["lx"] = 1;
                   $Moneybd->add($data);
                   //////////////////////////////////////////////////////////
                   
                   $data["Zt"] = 1;  
                   $data["TcMoney"] = $tcmoney; 
                   //$data["TradeDate"] = date("Y-m-d h:i:s");  
                   $jiaoyijine = $_factMoney * $fv;
                   $data["OrderMoney"] = $jiaoyijine;     //实际订单金额
                   $data["trademoney"] = $_factMoney;   //交易金额
                   $data["sxfmoney"] = $_factMoney - $jiaoyijine; //手续费
                   $data["sjflmoney"] = $_factMoney - $_factMoney * $sjflmoney; //上家手续费
                   $Order->where("TransID='".$_TransID."'")->save($data); //将订单设置为成功
                   
                }
          }else{
              if($Diaodangkg == 1){  //如果掉单，删除掉订单信息
                 $Order->where("TransID='".$_TransID."'")->delete();
              }
          }     
                
                 ////////////////////////////////////////////////////////  
               $Ordertz = M("Ordertz");
               $ordertzlist = $Ordertz->where("Sjt_TransID = '".$_TransID."'")->select();
               if(!$ordertzlist){
                   $data["Sjt_MerchantID"] = $Sjt_MerchantID;
                   $data["Sjt_UserName"] = $Sjt_Username;
                   $data["Sjt_TransID"] = $_TransID;
                   $data["Sjt_Return"] = $_Result;
                   $data["Sjt_Error"] = $_resultDesc;
                  //$_factMoney = $_factMoney/100;
                   $_factMoney = number_format($_factMoney,3);
                   $data["Sjt_factMoney"] = $_factMoney;
                   $data["Sjt_SuccTime"] = $_SuccTime;
                   $Sjt_Md5Sign = md5($Sjt_MerchantID.$Sjt_Username.$_TransID.$_Result.$_resultDesc.$_factMoney.$_SuccTime."2".$Sjt_Key);
                   $data["Sjt_Sign"] = $Sjt_Md5Sign;
                   $data["Sjt_urlname"] = $Sjt_Return_url;
                   $data["Sjt_BType"] = 2;
                   //////////////////////////////////////////////////////
                   //掉单设置
                   if($Diaodangkg == 1){
                       $data["Diaodang"] = 1;
                       $data["datetime"] = date("Y-m-d H:i:s");
                   }
                   
                   /////////////////////////////////////////////////////
                   $Ordertz->add($data);
               }
               ///////////////////////////////////////////////////////
               //返回状态
               if($Diaodangkg == 0 || ($Diaodangkg == 1 && $Diaodan_Type == 3)){
               
               $datastr = "Sjt_MerchantID=".$Sjt_MerchantID."&Sjt_UserName=".$Sjt_Username."&Sjt_TransID=".$_TransID."&Sjt_Return=".$_Result."&Sjt_Error=".$_resultDesc."&Sjt_factMoney=".$_factMoney."&Sjt_SuccTime=".$_SuccTime."&Sjt_BType=2&Sjt_Sign=".$Sjt_Md5Sign;
               $tjurl = $Sjt_Return_url."?".$datastr; 
               $contents = fopen($tjurl,"r"); 
               $contents=fread($contents,4096); 
               if($contents == "ok"){
                 $data["success"] = 1;
                 $Ordertz->where("Sjt_TransID = '".$_TransID."'")->save($data);
               }else{
                  // $data["Sjt_UserName"] = $contents;
                  // $Ordertz->where("Sjt_TransID = '".$this->_post("out_trade_no")."'")->save($data);
               }
          }
               ///////////////////////////////////////////////////////
              
                exit("ok");
            }
            //处理想处理的事情，验证通过，根据提交的参数判断支付结果
        } 
        else {
             
            exit("no_no");
        } 
 //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
        }
  }
?>
