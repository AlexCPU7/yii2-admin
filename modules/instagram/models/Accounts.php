<?php

namespace app\modules\instagram\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $id
 * @property int $user_id
 * @property string $accound
 * @property string $avatar
 * @property string $descr
 * @property int $posts
 * @property int $followers
 * @property int $following
 * @property int $datatime
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'accound', 'avatar', 'descr', 'posts', 'followers', 'following', 'datatime'], 'required'],
            [['user_id', 'posts', 'followers', 'following', 'datatime'], 'integer'],
            [['descr'], 'string'],
            [['accound', 'avatar'], 'string', 'max' => 255],
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
            'avatar' => 'Avatar',
            'descr' => 'Descr',
            'posts' => 'Posts',
            'followers' => 'Followers',
            'following' => 'Following',
            'datatime' => 'Datatime',
        ];
    }
}
