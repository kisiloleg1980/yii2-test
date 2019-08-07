<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'login')->textInput() ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                    
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

<?php ActiveForm::end(); ?>