<?php

namespace app\modules\instagram\models;

use Yii;

/**
 * This is the model class for table "statistics".
 *
 * @property int $id
 * @property int $user_id
 * @property string $accound
 * @property int $posts
 * @property int $followers
 * @property int $following
 * @property int $datatime
 */
class Statistics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'accound', 'posts', 'followers', 'following', 'datatime'], 'required'],
            [['user_id', 'posts', 'followers', 'following', 'datatime'], 'integer'],
            [['accound'], 'string', 'max' => 255],
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
            'accound' => 'Accound',
            'posts' => 'Posts',
            'followers' => 'Followers',
            'following' => 'Following',
            'datatime' => 'Datatime',
        ];
    }
}
