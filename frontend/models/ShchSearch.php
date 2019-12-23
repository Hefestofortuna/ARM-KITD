<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shch;

/**
 * ShchSearch represents the model behind the search form of `app\models\Shch`.
 */
class ShchSearch extends Shch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number_scheme'], 'integer'],
            [['date_shch', 'number_date_protocol', 'date_plan', 'date_fuck', 'number_date_raport', 'couse', 'date_scheme', 'otv', 'ispol', 'date_ex'], 'safe'],
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
        $query = Shch::find();

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
            'number_scheme' => $this->number_scheme,
            'date_shch' => $this->date_shch,
            'date_plan' => $this->date_plan,
            'date_fuck' => $this->date_fuck,
            'date_scheme' => $this->date_scheme,
            'date_ex' => $this->date_ex,
        ]);

        $query->andFilterWhere(['like', 'number_date_protocol', $this->number_date_protocol])
            ->andFilterWhere(['like', 'number_date_raport', $this->number_date_raport])
            ->andFilterWhere(['like', 'couse', $this->couse])
            ->andFilterWhere(['like', 'otv', $this->otv])
            ->andFilterWhere(['like', 'ispol', $this->ispol]);

        return $dataProvider;
    }
}
