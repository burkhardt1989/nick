<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="score-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="display: none;">
    	<?= $form->field($model, 'user_id')->hiddenInput() ?>
    </div>

    <?= $form->field($model, 'score')->textInput() ?>

    <?= $form->field($model, 'memo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
