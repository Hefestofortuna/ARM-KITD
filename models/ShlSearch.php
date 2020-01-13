<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shl;

/**
 * ShlSearch represents the model behind the search form of `app\models\Shl`.
 */
class ShlSearch extends Shl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number_scheme', 'result', 'page_serch', 'page_fix', 'page_retur', 'fix_serch'], 'integer'],
            [['date_shl', 'date_utv', 'date_ex_sh'], 'safe'],
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
        $query = Shl::find();

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
            'date_shl' => $this->date_shl,
            'result' => $this->result,
            'date_utv' => $this->date_utv,
            'page_serch' => $this->page_serch,
            'page_fix' => $this->page_fix,
            'page_retur' => $this->page_retur,
            'fix_serch' => $this->fix_serch,
            'date_ex_sh' => $this->date_ex_sh,
        ]);

        return $dataProvider;
    }
}
