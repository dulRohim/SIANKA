<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bagan;

/**
 * BaganSearch represents the model behind the search form of `app\models\Bagan`.
 */
class BaganSearch extends Bagan
{
    /**
     * {@inheritdoc}
     */

    public $kelas_nama;
    public $event_nama;

    public function rules()
    {
        return [
            [['bagan_id'], 'integer'],
            [['kelas_id', 'event_id', 'kelas_nama', 'event_nama'], 'safe'],
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
        $query = Bagan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['kelas_nama'] = [
            'asc' => ['kelas.kelas_nama' => SORT_ASC],
            'desc' => ['kelas.kelas_nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'bagan_id' => $this->bagan_id,
            'kelas_id' => $this->kelas_id,
            'event_id' => $this->event_id,
        ]);

        $query->andFilterWhere(['like', 'kelas_id', $this->kelas_id])
            ->andFilterWhere(['like', 'kelas_nama', $this->kelas_nama])
            ->andFilterWhere(['like', 'event_nama', $this->event_nama])
            ->andFilterWhere(['like', 'event_id', $this->event_id]);

        return $dataProvider;
    }
}
