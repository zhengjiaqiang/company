<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(
[
'id' => 'login-form',
'options' => ['class' => 'form-horizontal'],
'action'=>'?r=login/do_login',
]
); ?>

    <?= $form->field($model, 'uname') ?>

    <?= $form->field($model, 'upwd') ?>

    <div class="form-group">
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
</script>
    
    

