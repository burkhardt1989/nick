<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScoreLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '积分日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="score-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            'memo',
            'created_at',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</div>
