<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台欢迎页</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/reset.css' ?>" />
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/public.css' ?>" />
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/content.css' ?>" />
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">管理首页</a>></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>修改网站配置</h3>
			</div>
			<div class="public-content-cont">
			<form action="?r=news/update" method="post" enctype="multipart/form-data">
				<input type="hidden" name="news_id" value="<?php echo $row['id'] ?>">
				<div class="form-group">
					<label for="">信息标题</label>
					<input class="form-input-txt" type="text" name="title" value="<?php echo $row['title'] ?>" />
				</div>
				<div class="form-group">
					<label for="">关键词</label>
					<input class="form-input-txt" type="text" name="keys" value="<?php echo $row['keys'] ?>" />
				</div>
				<div class="form-group">
					<label for="">发布人</label>
					<input class="form-input-txt" type="text" name="add_man" value="<?php echo $row['add_man'] ?>" />
				</div>
				<div class="form-group">
					<label for="">录入时间</label>
					<input class="form-input-txt" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
				</div>
				<div class="form-group" style="margin-left:150px;">
					<input type="submit" class="sub-btn" value="更新" />
					<input type="reset" class="sub-btn" value="重  置" />
				</div>
				</form>
			</div>
		</div>
	</div>
<script src="../kingediter/kindeditor-all-min.js"></script>
<script src="../js/laydate.js"></script>
<script>
	 KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
</script>
</body>
</html>