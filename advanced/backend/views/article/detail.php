<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>文章发布</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/base.css'?>">
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/page.css'?>">
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/modernizr.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/main.js' ?>"></script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>

<body style="background: #f6f5fa;">

	<!--content S-->
	<div class="super-content RightMain" id="RightMain">
		
		<!--header-->
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>文章发布</h3><a href="javascript:;" class="sp-column"><i class="ico-mng"></i>栏目管理</a></div>
			
			<div class="ctab-Main">
				<div class="ctab-Main-title">
					<ul class="clearfix">
						<li class="cur"><a href="wenzhang_xinwen.html">新闻动态</a></li>
						<li><a href="wenzhang_pinshang.html">品尚生活</a></li>
						<li><a href="wenzhang_zhuoyue.html">卓越联盟</a></li>
						<li><a href="wenzhang_zhaoxian.html">招贤纳士</a></li>
						<li><a href="wenzhang_kehu.html">客户见证</a></li>
						<li><a href="wenzhang_remen.html">热门产品</a></li>
						<li><a href="wenzhang_aboutus.html">关于我们</a></li>
						<li><a href="wenzhang_lianxi.html">联系方式</a></li>
					</ul>
				</div>
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn clearfix">
						<div class="operateBtn">
							<a href="?r=article/add" class="greenbtn publish">发布文章</a>
							<a href="javascript:;" class="greenbtn add sp-add">添加分类</a>
							<a href="javascript:;" class="greenbtn add sp-photo" id="preview">栏目图片</a>
							<a href="javascript:;" class="modify sp-modify" id="sp-modify">修改</a>
						</div>
						<div class="searchBar">
							<input type="text" id="" value="" class="form-control srhTxt" placeholder="输入标题关键字搜索">
							<input type="button" class="srhBtn" value="">
						</div>
					</div>
					<div class="super-label clearfix">
						<a href="#">行业新闻<em style="display: none;"></em></a><a href="#">保险常识<em style="display: none;"></em></a>
					</div>
					
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr><th class="t_1">图片</th><th class="t_2">作者</th><th class="t_3">发布时间</th><th class="t_4">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							  <tbody>
													
								<tr>
								<td class="t_1"><img src="<?php  echo Yii::$app->request->baseUrl.'/'.$list_one['img']  ?>" alt="" width="80px;" height="100px;"/></td>
								<td class="t_2"><?php echo $list_one['author'] ?></td>
								<td class="t_3"><?php echo date('Y-m-d H:i:s',$list_one['time']) ?></td>
								<td class="t_4">
								<div class="btn">
								<a class="Top" href="?r=article/show&id=<?php echo $list_one['id'] ?>">返回</a>
							   </div></td>
							</tr>
						   </tbody></table>
					</div>
				
				</div>
			</div>
		</div>
		<!--main-->
		
	</div>
	<!--content E-->	
</body></html>


