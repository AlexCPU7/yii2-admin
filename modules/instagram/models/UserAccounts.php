<?php

namespace app\modules\instagram\models;

use Yii;

/**
 * This is the model class for table "instagram_user_accounts".
 *
 * @property int $id
 * @property int $user_id
 * @property string $accound
 * @property string $avatar
 * @property string $name
 * @property string $descr
 * @property int $followers
 * @property int $following
 * @property int $posts
 * @property int $datatime
 */
class UserAccounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instagram_user_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'accound', 'avatar', 'name', 'descr', 'followers', 'following', 'posts', 'datatime'], 'required'],
            [['user_id', 'followers', 'following', 'posts', 'datatime'], 'integer'],
            [['accound', 'avatar', 'name', 'descr'], 'string', 'max' => 255],
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
            'accound' => Yii::t('app', 'Accound'),
            'avatar' => Yii::t('app', 'Avatar'),
            'name' => Yii::t('app', 'Name'),
            'descr' => Yii::t('app', 'Descr'),
            'followers' => Yii::t('app', 'Followers'),
            'following' => Yii::t('app', 'Following'),
            'posts' => Yii::t('app', 'Posts'),
            'datatime' => Yii::t('app', 'Datatime'),
        ];
    }
}
