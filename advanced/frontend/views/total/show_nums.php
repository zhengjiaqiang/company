<center>
	<table border='1'>
		<tr>
			<td>编号</td>
			<td>用户ip</td>
			<td>访问时间</td>
			<td>所在地</td>
		</tr>
		<?php foreach ($list as $key => $value): ?>
		<tr>
		<td><?php echo $value['id'] ?></td>
		<td><?php echo $value['vs_ip'] ?></td>
		<td><?php echo date('Y-m-d H:i:s',$value['vs_time']) ?></td>
		<td><?php echo $value['area'] ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</center>