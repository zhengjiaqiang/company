<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin
(['id' => 'login-form',
'options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data'],
'action'=>'?r=demo/add']); ?>

    <?= $form->field($novel, 'novel_name') ?>

    <?= $form->field($novel, 'author') ?>
    <?= $form->field($novel, 'price') ?>
    <?= $form->field($upload, 'imagefile')->fileInput()?>
    <?= $form->field($novel, 'desc')->textarea(['rows'=>10]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
