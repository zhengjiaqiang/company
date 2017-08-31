<?php 
use yii\widgets\LinkPager;
 ?>
 <?php 
$session=Yii::$app->session;
$session->open();
if($session->get('uname'))
{
 echo "<font color='red'>欢迎".$session->get('uname')."管理员!</font>";
}
else
{
  echo "<script>alert('请先登录');location.href='?r=novel/login';</script>";
}
  echo "&nbsp;&nbsp;&nbsp;";
  echo "<a href='?r=novel/loginout' >退出</a>";
  echo "<hr/>";
  ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 	<style>
 #box ul{
 background: yellow;
 width: 800px;
 height: 50px;
 list-style:none;margin:0px;
 }
  #box ul li {
  float:left;
  line-height: 50px;
  margin-right:50px
 };
 </style>
 </head>
  <div id="box">
  	<ul>
  	 <li><h4 background="black"><strong>放松一下</strong></h4></li>
    <li ><a href="?r=novel/index" class="box1" text-align:center;>首页</a></li>
   <li ><a href="#" class="box1">最新</a></li>
   <li ><a href="#"class="box1" >纯文</a></li>
   <li ><a href="#" class="box1">纯图</a></li>
   <li ><a href="?r=novel/says"class="box1" >讲一个</a></li>
   <li ><a href="?r=novel/add" class="box1">添加笑话</a></li>
  	</ul>
  </div>
 <body>
  <center>
 	<table border="1">
 		<tr>
		<td>编号</td>
		<td>名称</td>
    <td>作者</td>
		<td>所属分类</td>
    <td>状态</td>
    <td>审核</td>
    <td>操作</td>
 		</tr>
 		<?php foreach ($res as $key => $value): ?>
 		 <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['novel_name'] ?></td>
        <td><?php echo $value['author'] ?></td>
        <td><?php echo $value['type_name'] ?></td>
        <td>
          <?php if($value['is_check']==0){?> 
          <a href="?r=novel/check&id=<?php echo $value['id'] ?>">已审核</a>
          <?php }else{echo "<a href='#'>未审核</a>";} ?>
        </td>
        <td><a href="?r=novel/update&id=<?php echo $value['id'] ?>">编辑</a></td>
        <td>
          <a href="?r=novel/detail&id=<?php echo $value['id'] ?>">查看详情</a>
        </td>
 		 </tr>	
 		<?php endforeach ?>
 	</table>
 	<?= LinkPager::widget(['pagination' => $pages]); ?>
 </center>
 </body>
 </html>
 <script>
$(document).on('click','.check',function(){
  var id=$(this).parent().attr('opt');
  var status=$(this).html();
 $.ajax({
     type:"get",
     url:"?r=novel/he",
     data:{id:id,status:status},
     success:function(data)
     {
      alert(data);
     }
 });
  
})

 </script>

 
 