<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
?>
<?php $form = ActiveForm::begin
(
    [
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
    'method'=>'post',
     'action'=>'?r=upload/upload'
    ]
); ?>
    
    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])  ?>
    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
