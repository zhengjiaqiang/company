<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action'=>'?r=demo/index']); ?>

    <?= $form->field($model, 'uname')->textInput(['style'=>'width:100px;']) ?>

    <?= $form->field($model, 'upwd')->passwordInput(['style'=>'width:100px;']) ?>
    <?= $form->field($model, 'is_writer')->radioList([0=>'作者',1=>'普通用户']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
