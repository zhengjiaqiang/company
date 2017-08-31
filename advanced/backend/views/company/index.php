
<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>简洁扁平化CMS网站后台管理系统网站模板全套下载_在线演示_电脑网站模板_前端模板_js代码</title>
	<meta name="keywords" content="简洁,扁平化,CMS网站,后台管理,管理系统,网站模板,全套下载" />
	<meta name="description" content="简洁扁平化CMS网站后台管理系统网站模板全套下载，完整版全套网站模板下载，下载文件包含43张静态网页。" />
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/base.css'?>">
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/page.css'?>">
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/modernizr.js' ?>"></script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>

<body>
<div class="superWrap clearfix" style="height: 781px;">
	<!--side S-->
	<div class="super-side-menu">
		<iframe src="?r=company/public_left" width="205" height="100%" marginheight="0" marginwidth="0" frameborder="0" scrolling="no"></iframe>
	</div>
	<!--side E-->
	<!--content S-->
	<div class="superContent">
		
		<div class="super-header super-header2">
			<iframe src="?r=company/public_header" id="Pubheader" name="Pubheader" width="100%"  marginheight="0" marginwidth="0" frameborder="0" scrolling="no"></iframe>
		</div>
		<!--header-->
		<div class="superCtab superCtabBot" style="height: 695px;">
			<iframe src="?r=company/wenzhang_xinwen" id="Mainindex" name="Mainindex" width="100%" height="100%" marginheight="0" marginwidth="0" frameborder="0"></iframe>
			<a href="?r=company/wenzhang_xinwen" id="Mainindex" name="Mainindex" width="100%" height="100%" marginheight="0" marginwidth="0" frameborder="0"></a>
		</div>
		<!--main-->
		
	</div>
	<!--content E-->
	
</div>

<script>
window.onresize = function(){
	var winH=$(window).height();
	var headH=$('.super-header').height();
	$('.superWrap').height(winH);
	$('.superCtabBot').height(winH-headH);
};
$(window).resize();
</script>

</body></html>