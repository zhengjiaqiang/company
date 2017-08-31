<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <?php $form = ActiveForm::begin(['action'=>'?r=rbac/dopower']); ?>
    <?= $form->field($model, 'power') ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
