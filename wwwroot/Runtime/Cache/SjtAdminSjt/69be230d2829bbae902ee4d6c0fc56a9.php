<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="/Public/ueditor/themes/default/ueditor.css" />
<script type="text/javascript" src="/Public/ueditor/editor_config.js"></script>
<script type="text/javascript" src="/Public/ueditor/editor_api.js"></script>
<script type="text/javascript" src="/Public/User/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	
	$("#pbspan").click(function(e) {
        if($("#zt").attr("checked")){
			$("#zt").attr("checked",false);
			}else{
				$("#zt").attr("checked",true);
				}
    });
	
	//var content = $("#content").text()
	//alert(content);
	
	
});

function check(){
	
	if($("#title").val() == ""){
	
	    alert("标题不能为空！");
		return false;
		
	}else{
		//alert(ue.getContent());
		$("#content").text(ue.getContent());
		
		}
	
}

function setedit(){
	var content = $("#content").text()
	ue.setContent(content);
	//alert(content);
	}

</script>
<style type="text/css">
body{
	width:100%;
	height:100%;
	margin:0px auto;
	}
#titlediv{
	width:90%;
	height:50px;
	line-height:50px;
	text-align:center;
	margin:0px auto;
	}	
#titlediv input[type='text']{
	width:400px;
	}
	
#contentdiv{
	width:90%;
	height:250px;
	text-align:center;
	margin:0px auto;
	}
#tj{
	width:90%;
	height:40px;
	line-height:40px;
	margin:0px auto;
	margin-top:120px;
	text-align:center;
	}	
#pbspan{
	cursor:pointer;
	}			
</style>
</head>

<body>
<form name="Form1" method="post" action="/SjtAdminSjt_News_editeditnews_type_<?php echo ($type); ?>.html" onsubmit="return check()">
<div id="titlediv">
<input type="hidden" name="id" value="<?php echo ($id); ?>">
标题：<input type="text" name="title" id="title" value="<?php echo ($title); ?>">&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($zt == 1): ?><input type="checkbox" name="zt" value="1" id="zt" checked="checked">
<?php else: ?>
<input type="checkbox" name="zt" value="1" id="zt"><?php endif; ?>

&nbsp;<span id="pbspan">屏蔽信息</span>
</div>
<div id="tj" style="margin-top:10px;">
<input type="submit" value="修 改">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="返 回" onclick="javascript:history.go(-1);">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="如果没有显示祥细内容请点这里" onclick="javascript:setedit()">
</div>
<div id="contentdiv">
<script type="text/plain" id="editor" style="width:100%;"></script>
<textarea id="content" name="content" style="display:none"><?php echo ($content); ?></textarea>
<script type="text/javascript">
var ue = new UE.ui.Editor( {

    } );
	
    ue.render( 'editor' );

    ue.addListener( "selectionchange", function () {
        var state = ue.queryCommandState( "source" );
        var btndiv = document.getElementById( "btns" );
        if ( btndiv && state == -1 ) {
            disableBtn( "enable" );
        }
    } );
	
</script>
</div>
<div style="clear:left;"></div>
<div id="tj">
<input type="submit" value="修 改">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="返 回" onclick="javascript:history.go(-1);">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="如果没有显示祥细内容请点这里" onclick="javascript:setedit()">
</div>
</form>
</body>
</html>
<script type="text/javascript">

setedit();
</script>