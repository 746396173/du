<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport"
				content="width=device-width, initial-scale=1">
					<title><?php echo C("WEB_NAME");?>-商户中心</title>
			<link rel="stylesheet" type="text/css"
				href="Public/css/bootstrap.min.css?v=1483669556" />
			<link rel="stylesheet" type="text/css"
				href="Public/css/metisMenu.min.css?v=1483669556" />
			<link rel="stylesheet" type="text/css"
				href="Public/css/dataTables.bootstrap.css?v=1483669556" />
			<link rel="stylesheet" type="text/css"
				href="Public/css/sb-admin-2.css?v=1483669556" />
						<link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css?v=1483670719" rel="stylesheet">
				
		</head>
		<body style="margin-top: -20px">
			<div id="wrapper"><!-- Navigation -->
				<nav class="navbar navbar-default navbar-static-top"
					role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle"
							data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">
								Toggle navigation
							</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/User">信付云计费</a>
					</div><!-- /.navbar-header -->
					<ul class="nav navbar-top-links navbar-right"><!-- /.dropdown -->
						<li class="dropdown">
							<a class="dropdown-toggle"
								data-toggle="dropdown" href="#">
								<?php echo ($_SESSION['UserName']); ?>	
								<i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<a href="/User_Index_aqxx.html">
										<i class="fa fa-user fa-fw"></i>
										安全设置
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a
										href="/User_Index_ExitLogin.html">
										<i
											class="fa fa-sign-out fa-fw">
										</i>
										退出登录
									</a>
								</li>
							</ul><!-- /.dropdown-user -->
						</li><!-- /.dropdown -->
					</ul><!-- /.navbar-top-links -->
                                             ﻿<div class="navbar-default sidebar"
						role="navigation">
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
								<li>
									<a href="/User">
										<i
											class="fa fa-dashboard fa-fw">
										</i>
										首页
									</a>
								</li>
								<li>
									<a href="#">
										<i
											class="fa fa-bar-chart-o fa-fw">
										</i>
										交易管理
										<span class="fa arrow"></span>
									</a>
									<ul class="nav nav-second-level">
										<li>
											<a
												href="User_Index_wyjyjl.html">
												交易记录
											</a>
										</li>
										<li>
											<a
												href="User_Index_jltj.html">
												记录统计
											</a>
										</li>
									</ul><!-- /.nav-second-level -->
								</li>
								<li>
									<a href="#">
										<i class="fa fa-rmb fa-fw"></i>
										财务管理
										<span class="fa arrow"></span>
									</a>
									<ul class="nav nav-second-level">
										<li>
											<a
												href="User_Index_tkyh_banktype_0.html">
												银行设置
											</a>
										</li>
										<li>
											<a
												href="User_Index_tktx.html">
												申请提现
											</a>
										</li>
										<li>
											<a
												href="User_Index_tkjl.html">
												提现记录
											</a>
										</li>
										<li>
											<a
												href="User_Index_zdjsb.html">
												自动提款记录
											</a>
										</li>
										<li>
											<a
												href="User_Index_zjbdjl.html">
												资金记录
											</a>
										</li>
									</ul><!-- /.nav-second-level -->
								</li>
								<li>
									<a href="#">
										<i class="fa fa-user fa-fw"></i>
										用户管理
										<span class="fa arrow"></span>
									</a>
									<ul class="nav nav-second-level">
										<li>
											<a
												href="User_Index_shjk.html">
												接口信息
											</a>
										</li>
										<li>
											<a
												href="User_Index_shtd.html">
												通道信息
											</a>
										</li>
                                                                                 <li>
											<a
												href="User_Index_skym.html">
												收款主页
											</a>
										</li>
										<li>
											<a
												href="User_Index_sjtgg.html">
												平台公告
											</a>
										</li>
									</ul><!-- /.nav-second-level -->
								</li>
								<li>
									<a href="#">
										<i class="fa fa-cogs fa-fw"></i>
										系统管理
										<span class="fa arrow"></span>
									</a>
									<ul class="nav nav-second-level">
										<li>
											<a
												href="/User_Index_dllist.html">
												登录记录
											</a>
										</li>
										<li>
											<a
												href="/User_Index_aqxx.html">
												安全设置
											</a>
										</li>
									</ul><!-- /.nav-second-level -->
								</li>
							</ul>
						</div><!-- /.sidebar-collapse -->
					</div>
                                             <!-- /.navbar-static-side -->
				</nav>
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header">
								接口信息
								</h1>
						</div><!-- /.col-lg-12 -->
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">我的接口
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["Zt"] == 0): ?>未审核
<?php elseif($vo["Zt"] == 1): ?>
审核中
<?php elseif($vo["Zt"] == 2): ?>
已审核<?php endif; ?>

						
						</div>
							<?php if($vo["Zt"] == 0): ?><div class="panel-body">
							请联系客服完善相关信息后提交审核，审核通过后才能使用商户接口
						
							<button type="button"
								onclick="javascript:tjsh()" class="btn btn-primary">
								审核申请
							</button>
							</div>
							<?php elseif($vo["Zt"] == 2): endif; endforeach; endif; else: echo "" ;endif; ?>
						<table class="table table-striped table-bordered table-hover text-center">
							<tr>
								<td>商户ID：</td>
								<td><?php echo ($_SESSION["UserID"]+10000); ?></td>
							</tr>
							<tr>
								<td>密钥：</td>
								<td> 
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["Zt"] != 2): ?><span class="tsts">审核通过后由系统自动生成，生成后不可修改</span>
      <?php else: ?>
      <span class="tsts" style="font-size:18px; color:#000;"><?php echo ($vo["Key"]); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </td>
							</tr>
							<tr>
								<td>提交地址：</td>
								<td>http://<?php echo C("WEB_URL");?>/Payapi_Index_Pay.html</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
									<script type="text/javascript"
					src="Public/js/jquery.min.js?v=1483670095">
				</script>
				<script type="text/javascript"
					src="Public/js/bootstrap.min.js?v=1483670095">
				</script>
				<script type="text/javascript"
					src="Public/js/metisMenu.min.js?v=1483670095">
				</script>
				<script type="text/javascript"
					src="Public/js/jquery.dataTables.min.js?v=1483670095">
				</script>
				<script type="text/javascript"
					src="Public/js/dataTables.bootstrap.min.js?v=1483670095">
				</script>
				<script type="text/javascript"
					src="Public/js/sb-admin-2.js?v=1483670095">
				</script>
				<script type="text/javascript"
					src="Public/js/wyjyjl.js?v=1483670095">
				</script>
			<script type="text/javascript">
				$(document).ready(function(e) {

				$("#SearchButton").click(function(e) {
				window.location.href =
				"/User_Index_zjbdjl.html?sq_date="+$("#sq_date").val()+"&sq_date_js="+$("#sq_date_js").val()+"&pagepage="+$("#pagepage").val()+"&lx="+$("#lx").val();
				});

				});
			</script>
			<script type="text/javascript">
				function tjsh(){
				if(confirm("请确保完善了基本资料后再提交审核，提交审核后不能再修改基本信息！") == true){
				location.href = "/User_Index_shjksh.html"; } }
			</script>
		</body>
	</html>