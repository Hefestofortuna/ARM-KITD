<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scheme;

/**
 * SchemeSearch represents the model behind the search form of `app\models\Scheme`.
 */
class SchemeSearch extends Scheme
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number',  'result', 'page', 'id_author', 'id_org'], 'integer'],
            [['date', 'scheme', 'descriptin', 'reason','id_station'], 'safe'],
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
        $query = Scheme::find();
        $query-> joinWith(['station']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder' => [
                    'id' => SORT_DESK
                ]
            ]
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
            'number' => $this->number,
            'date' => $this->date,
            //'id_station' => $this->id_station,
            'result' => $this->result,
            'page' => $this->page,
            'id_author' => $this->id_author,
            'id_org' => $this->id_org,
        ]);//Жесткие совпадения

        $query->andFilterWhere(['like', 'scheme', $this->scheme])
            ->andFilterWhere(['like', 'descriptin', $this->descriptin])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'station.name', $this->id_station])
            ;//Не жесткие совпадения
            

        return $dataProvider;
    }
}
