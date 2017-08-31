<?php 
use yii\widgets\LinkPager;
 $session=Yii::$app->session;
 $session->open();
 if($session->get('user'))
 {
 	 echo "<strong>欢迎".$session->get('user')."</strong>";
 
 }
 else
 { 
  echo "<script>alert('请先登录');location.href='?r=login/index';</script>";
  
 }

 ?>

<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>文章发布</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/base.css'?>">
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/page.css'?>">
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/modernizr.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/main.js' ?>"></script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>

<body style="background: #f6f5fa;">

	<!--content S-->
	<div class="super-content RightMain" id="RightMain">
		
		<!--header-->
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>文章发布</h3><a href="?r=login/loginout" class="sp-column"><i class="ico-mng"></i>退出</a></div>
			
			<div class="ctab-Main">
				<div class="ctab-Main-title">
					<ul class="clearfix">
						<li class="cur"><a href="wenzhang_xinwen.html">新闻动态</a></li>
						<li><a href="wenzhang_pinshang.html">品尚生活</a></li>
						<li><a href="wenzhang_zhuoyue.html">卓越联盟</a></li>
						<li><a href="wenzhang_zhaoxian.html">招贤纳士</a></li>
						<li><a href="wenzhang_kehu.html">客户见证</a></li>
						<li><a href="wenzhang_remen.html">热门产品</a></li>
						<li><a href="wenzhang_aboutus.html">关于我们</a></li>
						<li><a href="wenzhang_lianxi.html">联系方式</a></li>
					</ul>
				</div>
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn clearfix">
						<div class="operateBtn">
							<a href="?r=article/add" class="greenbtn publish">发布文章</a>
							<a href="javascript:;" class="greenbtn add sp-add">添加分类</a>
							<a href="javascript:;" class="greenbtn add sp-photo" id="preview">栏目图片</a>
							<a href="javascript:;" class="modify sp-modify" id="sp-modify">修改</a>
						</div>
						<div class="searchBar">
							<input type="text" class="form-control srhTxt"  />
							<input type="button" class="srhBtn" >
						</div>
					</div>
					<div class="super-label clearfix">
						<a href="#">行业新闻<em style="display: none;"></em></a><a href="#">保险常识<em style="display: none;"></em></a>
					</div>
					
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr><th class="t_1">文章ID</th><th class="t_2">文章标题</th><th class="t_3">分类名称</th><th class="t_4">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							  <tbody>
								<?php foreach ($list as $key => $value): ?>							
								<tr>
								<td class="t_1"><?php echo $value['id'] ?></td>
								<td class="t_2" opt="<?php echo $value['id'] ?>"><span class="rightNow"><?php echo $value['title'] ?></span></td>
								<td class="t_3"><?php echo $value['type_name'] ?></td>
								<td class="t_4">
								<div class="btn">
								<a class="Top" href="?r=article/importexcel&id=<?php echo $value['id'] ?>">下载</a>
								<a href="?r=article/update&id=<?php echo $value['id'] ?>" class="modify">修改</a>
								<a href="?r=article/delete&id=<?php echo $value['id'] ?>" class="delete">删除</a>
								<a href="?r=article/detail&id=<?php echo $value['id'] ?>" class="delete">详情</a>
							   </div></td>
							</tr>
							<?php endforeach ?>
						   </tbody></table>
						<!--pages S-->
						<div class="pageSelect">
							<span>共 <b><?php echo $count ?></b> 条 每页 <b><?php echo $page_num ?></b>条   1/18</span>
							<div class="pageWrap">
								<a href="?r=article/show&page=<?php echo $up ?>" class="pagenumb">上页</a>
								 <?php for ($i=1; $i <=$total_page ; $i++) { 
								    if($page==$i){?> <span><?php echo $i ?></span> <?php }else{?> <a href="?r=article/show&page=<?php echo $i ?>" class="pagenumb"><?php echo $i ?></a><?php }
								 } ?>
								<a href="?r=article/show&page=<?php echo $next ?>" class="pagenumb">下页</a>
							</div>
						</div>
						<!--pages E-->
					</div>
				
				</div>
			</div>
		</div>
		<!--main-->
		
	</div>
	<!--content E-->
	
	<div class="layuiBg"></div><!--公共遮罩-->
	<!--点击修改弹出层-->
	<div class="imgXgbox layuiBox">
		<div class="layer-title clearfix"><h2>修改栏目图片</h2><span class="layerClose"></span></div>
		<div class="layer-content">
			<div class="XgfileImg"><img src="images/bg_img_sc.jpg"><input id="fileImage" class="fileImageSlect" type="file" size="30" name="fileselect[]"></div>
			<p class="onclktip">（点击图片可重新上传）</p>
			<div class="Xgimglink clearfix"><span>图片链接：</span><input type="text" value=""></div>
			<div class="XgBtn"><input type="button" value="保存" class="saveBtn"></div>
		</div>
	</div>
	<!--点击添加分类弹出-->
	<div class="addFeileibox layuiBox">
		<div class="layer-title clearfix"><h2>添加分类</h2><span class="layerClose"></span></div>
		<div class="layer-content">
			<div class="aFllink clearfix"><span>上级栏目：</span><h5>新闻动态</h5></div>
			<div class="aFllink clearfix"><span>二级栏目：</span><input type="text" value=""></div>
			<div class="aFlBtn"><input type="button" value="保存" class="saveBtn"></div>
		</div>
	</div>
	<!--栏目管理-->
	<div class="Columnbox layuiBox">
		<div class="layer-title clearfix"><h2>栏目管理</h2><span class="layerClose"></span></div>
		<div class="layer-content">
			<ul class="colu-title clearfix">
				<li class="li-1">栏目名称</li><li class="li-2">英文名称</li><li class="li-3">操作</li><li class="li-4">同步开关</li>
			</ul>
			<div class="colu-list">
				<ul class="colu-cont clearfix active">
					<li class="li-1"><i class="ico"></i>新闻动态</li><li class="li-2">life</li><li class="li-3"><a href="javascript:;" class="colu-xg" data-id="xg1">修改</a></li><li class="li-4"><input type="checkbox" id="checkbox_d1" class="chk_4"><label for="checkbox_d1"></label></li>
				</ul>
				<div class="colunext" style="display: block;">
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg" data-id="xg2">修改</a></li>
					</ul>
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
				</div>
			</div><!--新闻动态-->
			<div class="colu-list">
				<ul class="colu-cont clearfix">
					<li class="li-1"><i class="ico"></i>品尚生活</li><li class="li-2">news</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"><input type="checkbox" id="checkbox_d2" class="chk_4"><label for="checkbox_d2"></label></li>
				</ul>
				<div class="colunext">
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
				</div>
			</div><!--品尚生活-->
			<div class="colu-list">
				<ul class="colu-cont clearfix">
					<li class="li-1"><i class="ico"></i>卓越联盟</li><li class="li-2">allance</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"><input type="checkbox" id="checkbox_d3" class="chk_4"><label for="checkbox_d3"></label></li>
				</ul>
				<div class="colunext">
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
				</div>
			</div><!--卓越联盟-->
			<div class="colu-list">
				<ul class="colu-cont clearfix">
					<li class="li-1"><i class="ico"></i>招贤纳士</li><li class="li-2">managers</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"><input type="checkbox" id="checkbox_d4" class="chk_4" checked=""><label for="checkbox_d4"></label></li>
				</ul>
				<div class="colunext">
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
				</div>
			</div><!--招贤纳士-->
			<div class="colu-list">
				<ul class="colu-cont clearfix">
					<li class="li-1"><i class="ico"></i>客户见证</li><li class="li-2">witness</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"><input type="checkbox" id="checkbox_d5" class="chk_4" checked=""><label for="checkbox_d5"></label></li>
				</ul>
				<div class="colunext">
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
				</div>
			</div><!--客户见证-->
			<div class="colu-list">
				<ul class="colu-cont clearfix">
					<li class="li-1"><i class="ico"></i>热门产品</li><li class="li-2">product</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"><input type="checkbox" id="checkbox_d6" class="chk_4" checked=""><label for="checkbox_d6"></label></li>
				</ul>
				<div class="colunext">
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
					<ul class="colu-next clearfix">
						<li class="li-1"><i class="ico"></i>行业新闻</li><li class="li-2"></li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li>
					</ul>
				</div>
			</div><!--热门产品-->
			<div class="colu-list">
				<ul class="clearfix colu-cont-no">
					<li class="li-1"><i class="ico"></i>关于我们</li><li class="li-2">about</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"></li>
				</ul>
			</div><!--关于我们-->
			<div class="colu-list">
				<ul class="clearfix colu-cont-no">
					<li class="li-1"><i class="ico"></i>联系方式</li><li class="li-2">contact</li><li class="li-3"><a href="javascript:;" class="colu-xg">修改</a></li><li class="li-4"></li>
				</ul>
			</div><!--联系方式-->
			
		</div>
	</div>
	<!--栏目管理－修改-->
	<div class="ColumnXgbox layuiBox">
		<div class="layer-title clearfix"><h2>添加分类</h2><span class="layerClose"></span></div>
		<div class="layer-content">
			<div class="aFllink clearfix"><span>修改名称：</span><input type="text" value=""></div>
			<div class="aFllink clearfix"><span>英文名称：</span><input type="text" value=""></div>
			<div class="aFlBtn"><input type="button" value="保存" class="saveBtn"></div>
		</div>
	</div>



<script type="text/javascript" src="js/zxxFile.js"></script>
<script>
//及点及该
$(function(){

	var t_num='';//定义一个全局变量来存储更新前的值
	$(document).on('click','.rightNow',function(){
      var num=$(this).html();
      t_num=num;
      //alert(num);
      $(this).parent().html("<input type='text' class='up' value="+num+">");
	})
	//失去焦点事件
	$(document).on('blur','.up',function(){
		var _this=$(this);
		var new_num=$(this).val();//获取要更新的值
		if(new_num=='')
		{
		  alert('要更新的值不能为空');
		 _this.parent().html('<span class="up">'+t_num+'</span>');
			
		}
		var id=$(this).parent().attr('opt');
	    $.ajax({
          type:'get',
          url:"?r=article/up",
          data:{id:id,new_num:new_num},
          success:function(data)
          {
          	
          	if(data==0)
          	{
            _this.html('<span class="rightNow">'+new_num+'</span>')
          	}
          	else
          	{
          	  _this.html('<span class="rightNow">'+num+'</span>')	
          	}
          }
	    });

	})
})
var params = {
	fileInput: $("#fileImage").get(0),
	upButton: $("#fileSubmit").get(0),
	url: $("#uploadForm").attr("action"),
	filter: function(files) {
		var arrFiles = [];
		for (var i = 0, file; file = files[i]; i++) {
			if (file.type.indexOf("image") == 0) {
				if (file.size >= 512000) {
					alert('您这张"'+ file.name +'"图片大小过大，应小于500k');	
				} else {
					arrFiles.push(file);	
				}			
			} else {
				alert('文件"' + file.name + '"不是图片。');	
			}
		}
		return arrFiles;
	},
	onSelect: function(files) {
		var html = '', i = 0;
		$("#preview").html('<div class="upload_loading"></div>');
		var funAppendImage = function() {
			file = files[i];
			if (file) {
				var reader = new FileReader()
				reader.onload = function(e) {
					$('.XgfileImg img').attr('src', e.target.result);
					$('.sp-photo').addClass('cur');
					html = html + '<div id="uploadList_'+ i +'" class="upload_append_list"><p><span>' + file.name + '</span>'+ 
						'<a href="javascript:" class="upload_delete" title="删除" data-index="'+ i +'">删除</a>' +
					'</div>';
					
					i++;
					funAppendImage();
				}
				reader.readAsDataURL(file);
			} else {
				$("#preview").html(html);
				if (html) {
					//删除方法
					$(".upload_delete").click(function() {
						ZXXFILE.funDeleteFile(files[parseInt($(this).attr("data-index"))]);
						$('.sp-photo').removeClass('cur').html('栏目图片');
						return false;	
					});
					//提交按钮显示
					$("#fileSubmit").show();	
				} else {
					//提交按钮隐藏
					$("#fileSubmit").hide();	
				}
			}
		};
		funAppendImage();		
	},
	onDelete: function(file) {
		$("#uploadList_" + file.index).fadeOut();
	},
	onDragOver: function() {
		$(this).addClass("upload_drag_hover");
	},
	onDragLeave: function() {
		$(this).removeClass("upload_drag_hover");
	},
	onProgress: function(file, loaded, total) {
		var eleProgress = $("#uploadProgress_" + file.index), percent = (loaded / total * 100).toFixed(2) + '%';
		eleProgress.show().html(percent);
	},
	onSuccess: function(file, response) {
		$("#uploadInf").append("<p>上传成功，图片地址是：" + response + "</p>");
	},
	onFailure: function(file) {
		$("#uploadInf").append("<p>图片" + file.name + "上传失败！</p>");	
		$("#uploadImage_" + file.index).css("opacity", 0.2);
	},
	onComplete: function() {
		//提交按钮隐藏
		$("#fileSubmit").hide();
		//file控件value置空
		$("#fileImage").val("");
		$("#uploadInf").append("<p>当前图片全部上传完毕，可继续添加上传。</p>");
	}
};
ZXXFILE = $.extend(ZXXFILE, params);
ZXXFILE.init();

</script>

</body></html>