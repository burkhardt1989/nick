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
            [['id', 'user_id', 'befor_score', 'score', 'after_score', 'op_id'], 'required'],
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
            'id' => 'ID',
            'user_id' => 'User ID',
            'befor_score' => 'Befor Score',
            'score' => 'Score',
            'after_score' => 'After Score',
            'op_id' => 'Op ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
