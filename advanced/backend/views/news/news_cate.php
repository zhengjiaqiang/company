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
				<div class="public-cont-left">
					<div class="public-cont-title">
						<h3>添加修改分类</h3>
					</div>

					<form action="?r=news/cate_add" method="post">
						<div class="form-group">
						<label for="">分类名称</label>
						<select  id="" class="form-select">
						<option value="0">顶级分类</option>
						 <?php foreach ($list as $key => $value): ?>
						 <option value="<?php echo $value['cate_id'] ?>"><?php echo str_repeat('&nbsp;', substr_count($value['path'], '_')*4) ?><?php echo $value['cate_name'] ?></option>
						 <?php endforeach ?>
                     </select>
						</select>
					</div>
					<div class="form-group mt0">
						<label for="">分类名称</label>
						<input type="text" class="form-input-small" name="cate_name">
					</div>
					<div class="form-group mt0">
						<label for="">排序编号</label>
						<input type="text" class="form-input-small" name="sort">
					</div>
					<div class="form-group mt0">
						<label for="">外链</label>
						<input type="text" class="form-input-small" name="link">
					</div>
					<div class="clearfix"></div>
				
					<div class="form-group mt0">
						<label for="">新栏目</label>
						<input type="radio" name="is_show"/ value="0">显示
						<input type="radio" name="is_show"/ value="1">不显示
					</div>
					<div class="form-group mt0" style="text-align:center;margin-top:15px;">
						<input type="submit" class="sub-btn" value="提   交">
					</div>
				</div>
			    </form>
				<!-- <table class="public-cont-table">
					<tr>
						<th style="width:10%">分类名称</th>
						<th style="width:20%">外链</th>
						<th style="width:10%">图标</th>
						<th style="width:10%">排序ID</th>
						<th style="width:10%">新栏目</th>
					</tr>
					<tr>
						<td>+新人必看</td>
						<td>news.asp?cid=40</td>						
						<td><img class="icon" width="30" src="../images/icon.jpg" /></td>
						<td>0</td>
						<td><span style="color:#6bc095">显示</span></td>
					</tr>
				</table> -->
			</div>
		</div>
	</div>
</body>
</html>