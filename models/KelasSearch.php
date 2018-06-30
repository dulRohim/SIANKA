<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kelas;

/**
 * KelasSearch represents the model behind the search form of `app\models\Kelas`.
 */
class KelasSearch extends Kelas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_id', 'kelas_nama', 'kelas_kategori', 'kelas_jk'], 'safe'],
            [['kelas_usia', 'kelas_beratbadan'], 'integer'],
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
        $query = Kelas::find();

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
            'kelas_usia' => $this->kelas_usia,
            'kelas_beratbadan' => $this->kelas_beratbadan,
        ]);

        $query->andFilterWhere(['like', 'kelas_id', $this->kelas_id])
            ->andFilterWhere(['like', 'kelas_nama', $this->kelas_nama])
            ->andFilterWhere(['like', 'kelas_kategori', $this->kelas_kategori])
            ->andFilterWhere(['like', 'kelas_jk', $this->kelas_jk]);

        return $dataProvider;
    }
}
