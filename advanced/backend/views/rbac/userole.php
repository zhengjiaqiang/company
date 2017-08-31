<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <?php $form = ActiveForm::begin(['action'=>'?r=rbac/douseroles']); ?>
    <?= $form->field($model, 'username')->checkboxList($users) ?>
    <?= $form->field($model, 'role')->checkboxList($roles) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
