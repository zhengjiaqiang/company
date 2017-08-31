<table border="1">
		<tr>
			<td>编号</td>
			<td>分类名称</td>
			<td>标题</td>
			<td>作者</td>
		</tr>
		<?php foreach ($list as $key => $value): ?>
		<?php foreach ($value['novel'] as $k => $v): ?>
		<tr>
		<td><?php echo $value['novel_id'] ?></td>	
		<td><?php echo $value['type_name'] ?></td>
		 <td><?php echo $v['novel_name'] ?></td>
		 <td><?php echo $v['author'] ?></td>
		</tr>
	    <?php endforeach ?>		
		<?php endforeach ?>
	</table>