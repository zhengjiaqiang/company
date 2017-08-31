<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'writer_name') ?>
    <?= $form->field($model, 'age')->dropDownList([0=>'1',1=>'2'],['prompt'=>'请选择','style'=>'width:120px']) ?>
    <?= $form->field($model, 'pwd') ?>
    <?= $form->field($model, 'identity') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'novel_type')->checkboxList([0=>'励志',1=>'惊悚']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
