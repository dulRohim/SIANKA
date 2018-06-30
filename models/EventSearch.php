<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form of `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'event_nama', 'event_tgl_mulai', 'event_tgl_selesai', 'event_tempat', 'event_info', 'event_create'], 'safe'],
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
        $query = Event::find();

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
            'event_tgl_mulai' => $this->event_tgl_mulai,
            'event_tgl_selesai' => $this->event_tgl_selesai,
            'event_create' => $this->event_create,
        ]);

        $query->andFilterWhere(['like', 'event_id', $this->event_id])
            ->andFilterWhere(['like', 'event_nama', $this->event_nama])
            ->andFilterWhere(['like', 'event_tempat', $this->event_tempat])
            ->andFilterWhere(['like', 'event_info', $this->event_info]);

        return $dataProvider;
    }
}
