<?php

namespace app\models\search;

use toschqlb\filterhelper\FilterHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projekt;

/**
 * ProjektSearch represents the model behind the search form of `app\models\Projekt`.
 */
class ProjektSearch extends Projekt
{

    public function attributes()
    {
        return array_merge(
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
            [['id', 'crus', 'upus'], 'integer'],
            [['name', 'beschreibung', 'crti', 'upti','createUser.name'], 'safe'],
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
        $query = Projekt::find();
        $query->joinWith(['createUser']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['createUser.name'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc'=> ['user.username' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id
        ]);
        
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'beschreibung', $this->beschreibung])
            ->andFilterWhere(['crus' => $this->getAttribute('createUser.name')])
            ->andFilterWhere(FilterHelper::getDateConditionArray('crti', $this->crti))
            ->andFilterWhere(FilterHelper::getDateConditionArray('upti', $this->upti));

        return $dataProvider;
    }
}
