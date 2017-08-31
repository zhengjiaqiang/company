<?php 
use yii\widgets\LinkPager;
 ?>
            <center>
			<table border="1">
				<tr>
				<td>编号</td>
				<td>小说名称</td>
				<td>作者</td>
				<td>价格</td>
				<td>简介</td>
				<td>点赞</td>
				</tr>
				<?php foreach ($res as $key => $value): ?>
				<tr>
		        <td><?php echo $value['id'] ?></td>
		        <td><?php echo $value['novel_name'] ?></td>
		        <td><?php echo $value['author'] ?></td>
		        <td><?php echo $value['price'] ?></td>
		        <td><?php echo $value['desc'] ?></td>
		        <td><button class="zan" opt="<?php echo $value['id'] ?>"><?php echo $value['click_num'] ?></button></td>
				</tr>
				<?php endforeach ?>
			</table>
			<?= LinkPager::widget(['pagination' => $pages]); ?>
          </center>
         <script>
         $(function(){
         $(document).on('click','.zan',function(){
         	var _this=$(this);
         	var id=$(this).attr('opt');//文章ID
         	var click_num=parseInt($(this).html());//点赞量
         	$.ajax({
              type:'get',
              url:'?r=demo/ding',
              data:{id:id,click_num:click_num},
              success:function(data){
                console.log(data);
                  _this.html(data);
              }
         	});

         })

         })

         </script>
			