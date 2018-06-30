<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KtgAtlet;

/**
 * KtgAtletSeaarch represents the model behind the search form of `app\models\KtgAtlet`.
 */
class KtgAtletSeaarch extends KtgAtlet
{
    /**
     * {@inheritdoc}
     */

    public $kontingen_nama;
    public $atlet_nama;

    public function rules()
    {
        return [
            [['ktg_atlet_id', 'kontingen_id', 'kontingen_nama', 'atlet_nama'], 'safe'],
            [['atlet_nik'], 'integer'],
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
    public function search($params, $ktg)
    {
        $query = KtgAtlet::find()->where(['kontingen_id' => $ktg]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //sortir pada tabel dataprovider
        $dataProvider->sort->attributes['kontingen_nama'] = [
            //asc desc => ['nama tabel.atribut']
            'asc' => ['kontingen.kontingen_nama' => SORT_ASC],
            'desc' => ['kontingen.kontingen_nama' => SORT_DESC],
        ];

        //sortir pada tabel dataprovider
        $dataProvider->sort->attributes['atlet_nama'] = [
            //asc desc => ['nama tabel.atribut']
            'asc' => ['atlet.atlet_nama' => SORT_ASC],
            'desc' => ['atlet.atlet_nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'atlet_nik' => $this->atlet_nik,
        ]);

        $query->andFilterWhere(['like', 'ktg_atlet_id', $this->ktg_atlet_id])
            ->andFilterWhere(['like', 'kontingen.kontingen_nama', $this->kontingen_nama])
            ->andFilterWhere(['like', 'atlet.atlet_nama', $this->atlet_nama])
            ->andFilterWhere(['like', 'kontingen_id', $this->kontingen_id]);

        return $dataProvider;
    }
}
