<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action'=>'?r=novel/login']); ?>

    <?= $form->field($model, 'uname') ?>

    <?= $form->field($model, 'upwd')->passwordInput()?>

    <div class="form-group">
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
