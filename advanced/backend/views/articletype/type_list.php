<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>文章发布-发布</title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/base.css'?>">
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/'.'company/css/page.css'?>">
	<!--  -->
	<!--[if lte IE 8]>
	<link href="css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/modernizr.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/main.js' ?>"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl.'/'.'company/js/jquery.selectui.js'?>"></script>
	
	<script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/lang/zh-cn/zh-cn.js"></script>
	
	<link rel="stylesheet" type="text/css" href="js/webuploader/webuploader.css">    
    <link rel="stylesheet" type="text/css" href="js/webuploader/demo.css">
	
	<script>
	$(function($) {
		$("select").selectui({
			// 是否自动计算宽度
			autoWidth: true,
			// 是否启用定时器刷新文本和宽度
			interval: true
		});
	});
	</script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
<link href="js/utf8-jsp/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<script src="js/utf8-jsp/third-party/codemirror/codemirror.js" type="text/javascript" defer></script>
<link rel="stylesheet" type="text/css" href="js/utf8-jsp/third-party/codemirror/codemirror.css">
<script src="js/utf8-jsp/third-party/zeroclipboard/ZeroClipboard.js" type="text/javascript" defer></script></head>
<!--  -->
<style>
       #timer{
        width:400px;
        float:left;                        
          }

       #upd_div{
        float:left;             
        color:red;
           }
</style>
<body style="background: rgb(246, 245, 250);">
	<!--content S-->
	<div class="super-content">
		
		<div class="superCtab">
			<div class="publishArt">
				<h4>发布文章</h4>
				<div class="pubMain">
					<a href="javascript:history.go(-1)" class="backlistBtn"><i class="ico-back"></i>返回列表</a>
					<form action="?r=article/add" method="post" enctype="multipart/form-data">
						<h5 class="pubtitle">选择分类</h5>
						<div class="pubselect">
							<span class="select_ui">
								<span class="select_text_ui" style="min-width: 6em;">请选择分类</span><b class="select_arrow"></b>
								<select name="article_type">
								<option value="">请选择分类</option>
								<?php foreach ($list as $key => $value): ?>
                         <option value="<?php echo $value['type_id'] ?>"><?php echo str_repeat('&nbsp;', substr_count($value['path'], '_')*4) ?><?php echo $value['type_name'] ?></option>
                         <?php endforeach ?>
							   </select>
						</span>
						</div>
					</form>
				</div>
			</div>
		
		</div>
		<!--main-->
        <!-- 定时保存 -->
	 <script>

     $(document).ready(function() {

         timePicker(10);

     });

 </script>

 <script>

 // timer code starts here ---

 //var init2 = 50;

     var s;

     function timePicker(vr) {

         if (vr > 0)

         {

             if (vr > 1) 
             {

                   $('#timer').html('数据将在 '+ vr+' 秒后自动保存！');
             } 

             else 
             {
             
                   $('#timer').html('数据将在 1 秒后自动保存！');
                  
             }

             vr--;

             s = setTimeout('timePicker(' + vr + ')', 1000);

         } 
         else 
         {

             clearInterval(s);
             $.post(
             'http://www.jia.com/demo1/do_save.php',
             {txt_area:$('#dstr').val()},
             function(r){
             // alert(r);
             // return;                    
             $('#upd_div').html("Last Updated: "+r);
             $('#timer').html('保存...数据将在 10 秒后自动保存！');
             s = setTimeout('timePicker(' + 10 + ')', 5000);
             return false;                             
             });

         }

     }

 </script>
	</div>
	<!--content E-->
	<!--点击修改弹出层-->
	<div class="layuiBg"></div><!--公共遮罩-->
	<!--点击添加标签弹出-->
	<div class="addFeileibox addSortBox layuiBox">
		<div class="layer-title clearfix"><h2>添加标签</h2><span class="layerClose"></span></div>
		<div class="layer-content">
			<div class="addSortMain clearfix">
				<span>保险</span><span data-id="lb1">保险</span><span data-id="lb2">保</span><span data-id="lb2">保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span><span>保险</span>
			</div>
			<div class="addSortBtn"><input type="button" value="保存" class="saveBtn FuncsaveBtn"></div>
		</div>
	</div>
	

<script type="text/javascript">
// 添加全局站点信息
var BASE_URL = '/webuploader';
</script>
<!--引入JS-->
<script type="text/javascript" src="js/webuploader/webuploader.js"></script>
<script type="text/javascript" src="js/webuploader/demo.js"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
    
</script>
</body></html>