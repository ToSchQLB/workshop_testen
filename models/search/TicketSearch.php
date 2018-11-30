<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket;

/**
 * TicketSearch represents the model behind the search form of `app\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'projekt_id', 'ticket_kategorie_id', 'bearbeiter_id', 'ticket_status_id', 'crus', 'upus'], 'integer'],
            [['titel', 'beschreibung', 'crti', 'upti'], 'safe'],
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
        $query = Ticket::find();

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
            'projekt_id' => $this->projekt_id,
            'ticket_kategorie_id' => $this->ticket_kategorie_id,
            'bearbeiter_id' => $this->bearbeiter_id,
            'ticket_status_id' => $this->ticket_status_id,
            'crus' => $this->crus,
            'crti' => $this->crti,
            'upus' => $this->upus,
            'upti' => $this->upti,
        ]);

        $query->andFilterWhere(['like', 'titel', $this->titel])
            ->andFilterWhere(['like', 'beschreibung', $this->beschreibung]);

        return $dataProvider;
    }
}
