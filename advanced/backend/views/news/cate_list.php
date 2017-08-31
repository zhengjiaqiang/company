<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台欢迎页</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/reset.css' ?>" />
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/content.css' ?>" />
	<!-- <base href="<?php echo Yii::$app->request->baseUrl.'/public/images/icon.jpg' ?>"> -->
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">管理首页</a>><a href="">分类管理</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>修改网站配置</h3>
			</div>
			<div class="public-content-cont two-col">
				<table class="public-cont-table">
					<tr>
						<th style="width:10%">分类名称</th>
						<th style="width:20%">外链</th>
						<th style="width:10%">排序ID</th>
						<th style="width:10%">新栏目</th>
					</tr>
					<?php foreach ($data as $key => $value): ?>
					<tr>
						<td><?php echo $value['cate_name'] ?></td>
						<td><?php echo $value['link'] ?></td>						
						<td><?php echo $value['sort'] ?></td>
						<td><span style="color:#6bc095">
							<?php if($value['is_show']==0){echo "√";}else{echo "×";} ?></span></td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>