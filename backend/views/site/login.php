<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login';
?>
<div style="margin-left: 400px" class="site-login d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-lg-6">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <p class="text-center">Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password_hash')->passwordInput()->error() ?>

        <div class="form-group text-center">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
