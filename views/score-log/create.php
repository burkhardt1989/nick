<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ScoreLog */

$this->title = '添加积分';
$this->params['breadcrumbs'][] = ['label' => 'Score Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="score-log-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2>
    	<?= Html::label('用户名: ') ?>
    	<?= Html::encode($username) ?>
    </h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
