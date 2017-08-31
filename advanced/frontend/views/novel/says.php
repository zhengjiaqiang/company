查看全文:
<p>去接三年级的小侄子放学，顺手买了两串糖葫芦，一个给小侄子，一个给自己重温一下童年的回忆！
小侄子一见到我：叔真好！把两串都夺了过去，随手给了旁边女同学一串！<br/>
女同学笑嘻嘻的拉着他的手吃了起来！看着我有点不高兴的样子，小侄子对女同学说：你姑姑不是大学刚毕业了吗？<br>
以后让她来接你。
我。。。</p>
赞:
<span class="btn btn-primary" id="zan"opt="<?php echo $says_list['id'] ?>"><?php echo $says_list['click_num'] ?></span>&nbsp;&nbsp;
<a href="?r=novel/detail&id=<?php echo $says_list['id'] ?>" class="btn btn-primary">评论</a>
<script>
//点赞
$(function(){
 $(document).on('click','#zan',function(){
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