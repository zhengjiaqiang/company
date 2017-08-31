<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>文章发布-发布</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/base.css'?>">
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/page.css'?>">
	<!--  -->
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/modernizr.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/main.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.selectui.js'?>"></script>
	
	<script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/lang/zh-cn/zh-cn.js"></script>
	
	<link rel="stylesheet" type="text/css" href="js/webuploader/webuploader.css">    
    <link rel="stylesheet" type="text/css" href="js/webuploader/demo.css">
	
	<script>
	$(function($) {
		$("select").selectui({
			// 是否自动计算宽度
			autoWidth: true,
			// 是否启用定时器刷新文本和宽度
			interval: true
		});
	});
	</script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
<link href="js/utf8-jsp/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<script src="js/utf8-jsp/third-party/codemirror/codemirror.js" type="text/javascript" defer></script>
<link rel="stylesheet" type="text/css" href="js/utf8-jsp/third-party/codemirror/codemirror.css">
<script src="js/utf8-jsp/third-party/zeroclipboard/ZeroClipboard.js" type="text/javascript" defer></script></head>

<body style="background: rgb(246, 245, 250);">
	<!--content S-->
	<div class="super-content">
		
		<div class="superCtab">
			<div class="publishArt">
				<h4>修改文章</h4>
				<div class="pubMain">
					<a href="javascript:history.go(-1)" class="backlistBtn"><i class="ico-back"></i>返回列表</a>
					<form action="?r=article/update" method="post">
                        <input type="hidden" name="a_id" value="<?php echo $row['id'] ?>">
						<h5 class="pubtitle">文章标题:</h5>
						<div class="pub-txt-bar">
							<input type="text" name='title' value="<?php echo $row['title'] ?>">
						</div>
                        <h5 class="pubtitle">作者:</h5>
                        <div class="pub-txt-bar">
                            <input type="text" name='author' value="<?php echo $row['author'] ?>">
                        </div>
                        <div class="pub-btn">
                            <input type="submit" id="" value="更新" class="saveBtn">
                        </div>
					</form>
				</div>
			</div>
		
		</div>
		<!--main-->
	</div>
	<!--content E-->
	<!--点击修改弹出层-->
	<div class="layuiBg"></div><!--公共遮罩-->
	<!--点击添加标签弹出-->
	<div class="addFeileibox addSortBox layuiBox">
		<div class="layer-title clearfix"><h2>添加标签</h2><span class="layerClose"></span></div>
		<div class="layer-content">
			<div class="addSortMain clearfix">
				<span>保险</span><span data-id="lb1">保险</span><span data-id="lb2">保</span><span data-id="lb2">保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span>
			</div>
			<div class="addSortBtn"><input type="button" value="保存" class="saveBtn FuncsaveBtn"></div>
		</div>
	</div>
	
</body></html>