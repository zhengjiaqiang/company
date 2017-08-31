<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action'=>'?r=novel/regist']); ?>

    <?= $form->field($model, 'uname') ?>

    <?= $form->field($model, 'upwd')->passwordInput() ?>
    <?= $form->field($model, 'age') ?>
    <?= $form->field($model, 'hobby')->checkboxList([0=>'唱歌',1=>'下棋']) ?>

    <div class="form-group">
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
