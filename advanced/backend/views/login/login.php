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
<!--  -->
<div class="page">
	<div class="loginwarrp">
		<div class="logo">管理员登陆</div>
        <div class="login_form">
	<?php $form = ActiveForm::begin(['action'=>'?r=login/index']); ?>

    <?= $form->field($model, 'uname') ?>

    <?= $form->field($model, 'upwd')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
</body>
</html>