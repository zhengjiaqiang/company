    <?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
    ?>
    <center><a href="?r=novel_type/addtype">添加分类</a></center>
	<?php $form = ActiveForm::begin(['action'=>'?r=novel_type/search']); ?>
    <?= $form->field($model, 'type_name')->checkboxList($arr) ?>
    <div class="form-group">
       <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
	