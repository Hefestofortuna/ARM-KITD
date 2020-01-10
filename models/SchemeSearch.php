<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scheme;
use Yii;

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
            [['number',  'result', 'page', 'id_author', 'id_org'], 'integer'],
            [['id', 'id_station','date', 'scheme', 'descriptin', 'reason'], 'safe'],
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
        $query->joinWith('station');
        //$query->joinWith('shch');    
        if(Yii::$app->user->identity->id_post == 1)
        {
            $query->where(['scheme.id_org' => Yii::$app->user->identity->id_org]);
        };

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
            //'shch.number_scheme' => $this->id,//в this указывается наименование столбца из DGV(вроде как)
            'number' => $this->number,
            'date' => $this->date,
            'result' => $this->result,
            'page' => $this->page,
            'id_author' => $this->id_author,
            'scheme.id_org' => $this->id_org,//"scheme.id_org" в обяз, ибо в station.* тоже есть id_org.            
        ]);

        $query->andFilterWhere(['like', 'scheme', $this->scheme])
            ->andFilterWhere(['like', 'descriptin', $this->descriptin])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'station.name', $this->id_station])
            ;

        return $dataProvider;
    }
}
