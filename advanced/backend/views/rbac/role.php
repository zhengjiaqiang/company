<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <?php $form = ActiveForm::begin(['action'=>'?r=rbac/dorole']); ?>
    <?= $form->field($model, 'role') ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
