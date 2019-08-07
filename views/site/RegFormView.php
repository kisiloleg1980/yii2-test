<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

?>

<?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'login')->textInput() ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                    
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>


                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

<?php ActiveForm::end(); ?>