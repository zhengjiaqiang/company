<center>
	<form action="?r=novel/search" method="post">
	<input type="text" name="keys">	
	<input type="submit" value="搜索">

	</form>
	<table border="1">
		<tr>
			<td>编号</td>
			<td>名称</td>
			<td>作者</td>
			<td>简介</td>
			<td>分类名称</td>
		</tr>
		<?php foreach ($rows as $key => $value): ?>
		<tr>
		<td><?php echo $value['id'] ?></td>	
		<td><?php echo $value['novel_name'] ?></td>	
		<td><?php echo $value['author'] ?></td>	
		<td><?php echo $value['desc'] ?></td>	
		<td><?php echo $value['novel_type']['type_name'] ?></td>	
		</tr>	
		<?php endforeach ?>
	</table>
</center>