<script type="text/javascript" charset="utf-8" src="<?php echo Yii::$app->request->baseUrl.'/ueditor/ueditor.config.js' ?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::$app->request->baseUrl.'/ueditor/ueditor.all.min.js'; ?>"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::$app->request->baseUrl.'/ueditor/lang/zh-cn/zh-cn.js' ?>"></script>
</head>  
<style>
#box{
float:right;
}
</style>
<div id="box">
<a href="?r=novel_type/addtype">添加分类</a>	
</div>
<li><a href="#">查看全文</a>
<p><?php echo $row['desc'] ?></p>
赞:
<span class="zan" opt="<?php echo $row['id'] ?>"><?php echo $row['click_num'] ?></span>
</li>

<form action="?r=novel/comment&n_id=<?php echo $row['id'] ?>"method="post">
<textarea name="content" id="editor" cols="5" rows="5" class="content"></textarea><br/>
    <br/>
<input type="submit" value="发布" id="fa" opt="<?php echo $row['id'] ?>" />
</form>
<div class="box"></div>
<script>
 //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
//点赞
$(function(){
 $(document).on('click','.zan',function(){
 	var _this=$(this);
 	var id=$(this).attr('opt');//获取ID值
 	var click_num=parseInt($(this).html())+1;
 	$.ajax({
 		type:'get',
 		url:'?r=novel/ding',
 		data:{id:id,click_num:click_num},
 		success:function(data){
 			if(data==0)
 			{
 			 _this.html(click_num)	
 			}
       
 		}
 	})
 })
})

</script>