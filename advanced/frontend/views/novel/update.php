<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action'=>'?r=novel/update']); ?>

    <?$model->novel_name=$rows['novel_name']?>
    <?$model->author=$rows['author']?>
    <?$model->id=$rows['id']?>
    <?$model->novel_id=$ids?>
    <?= Html::activeHiddenInput($model,'id') ?>
    <?= $form->field($model, 'novel_name') ?>
    <?= $form->field($model, 'author') ?>
    <?= $form->field($model, 'is_check')->radioList([0=>'通过',1=>'未通过']) ?>
    <?= $form->field($model, 'novel_id')->checkboxList($arr) ?>
    <div class="form-group">
        <?= Html::submitButton('更新', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
