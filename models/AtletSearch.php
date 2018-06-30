<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atlet;

/**
 * AtletSearch represents the model behind the search form of `app\models\Atlet`.
 */
class AtletSearch extends Atlet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atlet_nik'], 'integer'],
            [['atlet_nama', 'atlet_tgl_lahir', 'atlet_jk'], 'safe'],
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
        $query = Atlet::find();

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
            'atlet_nik' => $this->atlet_nik,
            'atlet_tgl_lahir' => $this->atlet_tgl_lahir,
        ]);

        $query->andFilterWhere(['like', 'atlet_nama', $this->atlet_nama])
            ->andFilterWhere(['like', 'atlet_jk', $this->atlet_jk]);

        return $dataProvider;
    }
}
