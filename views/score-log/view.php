<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ScoreLog */

$this->title = '日志:' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '积分详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="score-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => '用户',
                'attribute' => 'user_id',
                'value' => function ($data) {
                    $userModel = Yii::$app->user->identityClass;
                    $user = $userModel::findOne(['id' => $data->user_id]);
                    return $user->username;
                }
            ],
            'befor_score',
            'score',
            'after_score',
            [
                'label' => '操作用户',
                'attribute' => 'op_id',
                'value' => function ($data) {
                    $userModel = Yii::$app->user->identityClass;
                    $user = $userModel::findOne(['id' => $data->op_id]);
                    return $user->username;
                }
            ],
            'created_at',
        ],
    ]) ?>

</div>
