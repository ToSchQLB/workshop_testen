<?php

namespace app\models\search;

use toschqlb\filterhelper\FilterHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TicketStatus;
use yii\helpers\ArrayHelper;

/**
 * TicketStatusSearch represents the model behind the search form of `app\models\TicketStatus`.
 */
class TicketStatusSearch extends TicketStatus
{
    public function attributes()
    {
        return ArrayHelper::merge(
            parent::attributes(),
            [
                'createUser.name'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'crti', 'upti', 'createUser.name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TicketStatus::find();
        $query->joinWith('createUser');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['createUser.name'] = [
            'asc' => ['user.name' => SORT_ASC],
            'desc'=> ['user.name' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['crus'=>$this->getAttribute('createUser.name')])
            ->andFilterWhere(FilterHelper::getDateConditionArray('crti', $this->getAttribute('crti')))
            ->andFilterWhere(FilterHelper::getDateConditionArray('upti', $this->getAttribute('upti')))
        ;

        return $dataProvider;
    }
}
