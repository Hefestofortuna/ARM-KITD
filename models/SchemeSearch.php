<?php

namespace app\models;

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
            [['id', 'number', 'result', 'page', 'id_author', 'id_org'], 'integer'],
            [['id_shch', 'id_shl', 'id_station','date', 'scheme', 'descriptin', 'reason'], 'safe'],
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
        $query -> joinWith('station');
        $query -> joinWith('shch');
        $query -> joinWith('shl');
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
            'id' => $this->id,
            'number' => $this->number,
            //'id_shch' => $this->id_shch,
            //'id_shl' => $this->id_shl,
            'date' => $this->date,
            //'id_station' => $this->id_station,
            'scheme.result' => $this->result,
            'page' => $this->page,
            'id_author' => $this->id_author,
            //'id_org' => $this->id_org,
            'scheme.id_org' => $this->id_org,//"scheme.id_org" в обяз, ибо в station.* тоже есть id_org.
        ]);

        $query->andFilterWhere(['like', 'scheme', $this->scheme])
            ->andFilterWhere(['like', 'descriptin', $this->descriptin])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'station.name', $this->id_station])
            ->andFilterWhere(['like', 'shch.date_fuck', $this->id_shch])
            ->andFilterWhere(['like', 'shl.date_utv', $this->id_shl])
        ;

        return $dataProvider;
    }
}
