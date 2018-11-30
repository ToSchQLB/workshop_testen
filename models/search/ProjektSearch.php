<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projekt;

/**
 * ProjektSearch represents the model behind the search form of `app\models\Projekt`.
 */
class ProjektSearch extends Projekt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'crus', 'upus'], 'integer'],
            [['name', 'beschreibung', 'crti', 'upti'], 'safe'],
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
            'crus' => $this->crus,
            'crti' => $this->crti,
            'upus' => $this->upus,
            'upti' => $this->upti,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'beschreibung', $this->beschreibung]);

        return $dataProvider;
    }
}
