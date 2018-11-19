<!DOCTYPE html>
<html lang="en">

<?php
            use yii\helpers\Html;
            use yii\widgets\ActiveForm;
            $this->registerCssFile('css/task.css');
?>
<div class="center">

    <div class="left">
    <?php $form = ActiveForm::begin([
                    'options' => [
                            'class' => 'left'
                    ],
                ]) ?>
                <?= $form->field($calculate_model, 'sender'); ?>
                <?= $form->field($calculate_model, 'getter'); ?>
                <?= $form->field($calculate_model, 'much'); ?>
                <?= Html::submitButton('Записать', ['class' => 'btn btn-success']) ?>
                    <?php ActiveForm::end() ?>
                    <?php if( Yii::$app->session->hasFlash('success')):?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif;?>
<?php if( Yii::$app->session->hasFlash('error')):?>
    <?php echo Yii::$app->session->getFlash('error'); ?>
<?php endif;?>
    </div>
             <div class="right">
<h2 class="left" >Доступный баланс</h2><br><Br><Br><br><Br>
<table id="table" class="left" border="1" width="100%" cellpadding="5">
<?php   
        foreach($date as $value){
?>                   
         <tr id="array">
          <th><?php echo $value['name']?></th>
          <th><?php echo $value['balance']?></th>
          </tr> 
          <?php
          }
             echo '</table>';?>
          
</html>  