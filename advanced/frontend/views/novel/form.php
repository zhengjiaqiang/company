<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<style>
	.inline .radio,.inline .checkbox{display: inline-block;margin: 0 5px;}
	#editor{margin-top: 20px;padding:0;margin:20px 0;width:100%;height:auto;border: none;}	
</style>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::$app->request->baseUrl.'/ueditor/ueditor.config.js' ?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::$app->request->baseUrl.'/ueditor/ueditor.all.min.js'; ?>"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo Yii::$app->request->baseUrl.'/ueditor/lang/zh-cn/zh-cn.js' ?>"></script>
</head>  
    <?php $form = ActiveForm::begin(['action'=>'?r=novel/add']); ?>
    <?= $form->field($model, 'novel_name')->textInput() ?>
    <?= $form->field($model, 'author')->textInput() ?>
    <?= $form->field($model, 'desc')->textarea(['row'=>5,'id'=>'editor','class'=>'col-sm-1 col-md-12']) ?>
    <?= $form->field($model, 'is_check')->radioList([0=>'通过',1=>'未通过']) ?>
    <?= $form->field($model, 'novel_id')->checkboxList($models) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
<script>
 //实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
 var ue = UE.getEditor('editor');	
</script>
