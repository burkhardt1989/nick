<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "score_log".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $befor_score
 * @property integer $score
 * @property integer $after_score
 * @property integer $op_id
 * @property string $created_at
 * @property string $updated_at
 */
class ScoreLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'score_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['score'], 'required'],
            [['id', 'user_id', 'befor_score', 'score', 'after_score', 'op_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '记录ID',
            'user_id' => '用户ID',
            'befor_score' => '操作前积分',
            'score' => '积分修改',
            'after_score' => '操作后积分',
            'op_id' => '操作用户ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    // 通过user_id加载
    public function loadByUserId($data, $formName = null)
    {
        // print_r($data);exit;
        if (empty($data)) {
            return false;
        }
        $userModel = Yii::$app->user->identityClass;
        $user = $userModel::findOne(['id' => $data['ScoreLog']['user_id']]);
        if (empty($user)) {
            return false;
        }
        $data['ScoreLog']['befor_score'] = $user->score;
        $data['ScoreLog']['after_score'] = $user->score + $data['ScoreLog']['score'];
        $data['ScoreLog']['op_id'] = Yii::$app->user->id;
        $transaction = Yii::$app->db->beginTransaction();
        if (!parent::load($data, $formName)) {
            $transaction->rollBack();
            return false;
        }
        Yii::$app->user->Identity->score += $data['ScoreLog']['score'];
        if (!Yii::$app->user->Identity->save()) {
            $transaction->rollBack();
            return false;
        }
        $transaction->commit();
        return true;
    }
}
