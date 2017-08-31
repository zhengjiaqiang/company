<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <?php $form = ActiveForm::begin(['action'=>'?r=rbac/dorolepower']); ?>
    <?= $form->field($model, 'role')->checkboxList($roles) ?>
    <?= $form->field($model, 'power')->checkboxList($powers) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
