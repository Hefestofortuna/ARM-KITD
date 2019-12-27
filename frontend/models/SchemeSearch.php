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
    public $number_scheme;
    public $date_utv;
    public $date_fuck;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'id_station', 'result', 'page', 'id_author', 'id_org','number_scheme'], 'integer'],
            [['date', 'scheme', 'descriptin', 'reason', 'date_utv','date_fuck'], 'safe'],
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
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'attributes'=>[
                ]
            ]
        ]);
        $dataProvider->setSort([
            'attributes' => array_merge($dataProvider->getSort()->attributes,[
                'date_utv'=>[
                ],
                'date_fuck' =>[],
            ]),
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
            //'date' => $this->date,
            'id_station' => $this->id_station,
            'result' => $this->result,
            'page' => $this->page,
            'id_author' => $this->id_author,
            'date_utv' =>$this->date_utv,
            'date_fuck' =>$this->date_fuck,
            'id_org' => $this->id_org,
        ]);

        $query->andFilterWhere(['like', 'scheme', $this->scheme])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'descriptin', $this->descriptin])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'date_utv', $this->reason])
            ->andFilterWhere(['like', 'shl.date_fuck', $this->reason])
            ;

        return $dataProvider;
    }
}
