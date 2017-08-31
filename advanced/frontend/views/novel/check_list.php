<center>
	<table border="1">
		<tr>
			<td>编号</td>
			<td>状态</td>
			<td>内容</td>
			<tr>
			<td><?php echo $check_list['id'] ?></td>	
			<td>已审核</td>	
			<td><?php echo $check_list['desc'] ?></td>	
			</tr>
		</tr>
	</table>
	<a href="?r=novel/show&id=<?php echo $check_list['id'] ?>">返回</a>
</center>