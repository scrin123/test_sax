<?php
            use yii\helpers\Html;
            use yii\widgets\ActiveForm;
            $this->registerCssFile('css/main.css');
            $this->registerJsFile('js/main.js');
?>
<html>
    <title>

    </title>
    <body>
                <div>
                <?php $form = ActiveForm::begin([
                    'options' => [
                            'class' => 'class1'
                    ],
                ]) ?>
                <?= $form->field($Howmuch_owen_model, 'name'); ?>
                <?= $form->field($Howmuch_owen_model, 'summa'); ?>
                <?= Html::submitButton('Записать', ['class' => 'btn btn-success']) ?>
                    <?php ActiveForm::end() ?>
                </div>
    </body>

</html>