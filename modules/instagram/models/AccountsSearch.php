<?php

namespace app\modules\instagram\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\instagram\models\Accounts;

/**
 * AccountsSearch represents the model behind the search form of `app\modules\instagram\models\Accounts`.
 */
class AccountsSearch extends Accounts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'posts', 'followers', 'following', 'datatime'], 'integer'],
            [['accound', 'avatar', 'descr'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Accounts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'posts' => $this->posts,
            'followers' => $this->followers,
            'following' => $this->following,
            'datatime' => $this->datatime,
        ]);

        $query->andFilterWhere(['like', 'accound', $this->accound])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'descr', $this->descr]);

        return $dataProvider;
    }
}
