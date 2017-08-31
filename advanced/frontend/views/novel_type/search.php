    <center>
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
		<td><?php echo $value['type_name'] ?></td>	
		</tr>	
		<?php endforeach ?>
	</table>
   </center>