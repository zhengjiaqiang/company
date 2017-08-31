<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/reset.css' ?>">
	<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl.'/public/css/login.css' ?>" />
</head>
<body>
<div class="page">
	<div class="loginwarrp">
		<div class="logo">注册</div>
        <div class="login_form">
	<?php $form = ActiveForm::begin(['action'=>'?r=login/regist']); ?>

    <?= $form->field($regist, 'uname') ?>

    <?= $form->field($regist, 'upwd') ?>

    <?= $form->field($regist, 'sex') ?>

    <?= $form->field($regist, 'age') ?>
    <?= $form->field($regist, 'phone') ?>
    <?= $form->field($regist, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('注册', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
</body>
</html>