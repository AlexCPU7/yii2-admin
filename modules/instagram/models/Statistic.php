<?php

namespace app\modules\instagram\models;

use Yii;

/**
 * This is the model class for table "instagram_statistic".
 *
 * @property int $id
 * @property int $user_id
 * @property string $account
 * @property int $followers
 * @property int $following
 * @property int $posts
 * @property int $datatime
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instagram_statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'account', 'followers', 'following', 'posts', 'datatime'], 'required'],
            [['user_id', 'followers', 'following', 'posts', 'datatime'], 'integer'],
            [['account'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'account' => Yii::t('app', 'Account'),
            'followers' => Yii::t('app', 'Followers'),
            'following' => Yii::t('app', 'Following'),
            'posts' => Yii::t('app', 'Posts'),
            'datatime' => Yii::t('app', 'Datatime'),
        ];
    }
}
