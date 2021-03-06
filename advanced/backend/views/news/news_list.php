
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台欢迎页</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/reset.css'?>" />
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/content.css' ?>" />
	<!-- <base href="<?php echo  Yii::$app->request->baseUrl.'/public/images/img.jpg' ?>"/> -->
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">管理首页</a>><a href="">信息列表</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3 style="display: inline-block;">修改网站配置</h3>
				<div class="public-content-right fr">
					<a href="" style="height: 24px; width: 60px;border: 1px solid #ccc;font-size: 12px;text-align:center">添加信息</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="public-content-cont two-col">
				<div class="public-cont-left col-1">
					<div class="public-cont-title">
						<h3>信息分类</h3>
					</div>
					<ul class="public-cate-list">
						<li class="public-cate-item"><a href="#">+轻松一刻</a></li>
					</ul>
				</div>
				 <center>
				 	<form action="?r=news/search" method="post">
				 <input type="text"  name="keys">
                 <input type="submit" value="搜索">
				</form>
				 </center>
				<table class="public-cont-table col-2">
					<tr>
						<th style="width:5%">选择</th>
						<th style="width:5%">ID</th>
						<th style="width:5%">标题</th>
						<th style="width:35%">信息名称</th>
						<th style="width:5%">状态</th>
						<th style="width:5%">审核</th>
						<th style="width:5%">排序</th>
						<th style="width:10%">加入时间</th>						
						<th style="width:15%">操作</th>
					</tr>
					<?php foreach ($data as $key => $value): ?>
					<tr>
						<td><input type="checkbox" /></td>
						<td><?php echo $value['id'] ?></td>						
						<td><?php echo $value['title'] ?></td>						
						<td>【梦幻之旅】8天7夜澳大利亚巡航与陆地文化之旅<img class="state-img" src="<?php echo Yii::$app->request->baseUrl.'/'.$value['img'] ?>" /></td>
						<td><span style="color:#999">大图</span></td>
						<td><span style="color:#6bc095">已审核</span></td>
						<td><span style="color:#999">0</span></td>
						<td><span style="color:#999"><?php echo date('Y-m-d',$value['add_time']) ?></span></td>
						<td>
							<div class="table-fun">
								<a href="?r=news/update&id=<?php echo $value['id'] ?>">修改</a>
								<a href="?r=news/del&id=<?php echo $value['id'] ?>">删除</a>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>