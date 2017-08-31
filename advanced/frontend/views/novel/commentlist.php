<center>
 	<table border="1">
 		<tr>
 			<td>编号</td>
 			<td>时间</td>
 			<td>内容</td>
 		</tr>
 		<?php foreach ($data as $key => $value): ?>
 		 <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo date("Y-m-d H:i:s",$value['time']) ?></td>
        <td><?php echo $value['content'] ?></td>
 		 </tr>	
 		<?php endforeach ?>
 	</table>
 	<a href="?r=novel/show&id=<?php echo $value['id'] ?>">点击返回</a>
 </center>