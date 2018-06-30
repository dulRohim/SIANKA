<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendaftar;
use app\models\Bagan;

/**
 * PendaftarSearch represents the model behind the search form of `app\models\Pendaftar`.
 */
class PendaftarSearch extends Pendaftar
{
    /**
     * {@inheritdoc}
     */

    public $atlet_nama;
    public $kelas_nama;
    public $kelas_id;


    public function rules()
    {
        return [
            [['pendaftar_id', 'bagan_id', 'berat_badan'], 'integer'],
            [['ktg_atlet_id', 'perguruan', 'prestasi', 'atlet_nama', 'kelas_nama', 'kelas_id'], 'safe'],
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
    public function search($params, $ktg, $ev)
    {
        //jointWith(Nama Metod)
        $query = Pendaftar::find()->joinWith(['bagan', 'ktgAtlet', 'bagan.kelas', 'ktgAtlet.atletNik'])->where(['kontingen_id' => $ktg, 'event_id' => $ev]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

        $dataProvider->sort->attributes['atlet_nama'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['atlet.atlet_nama' => SORT_ASC],
            'desc' => ['atlet.atlet_nama' => SORT_DESC],
        ];

        //sortir pada tabel dataprovider
        $dataProvider->sort->attributes['kelas_nama'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
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
            'pendaftar_id' => $this->pendaftar_id,
            'bagan_id' => $this->bagan_id,
            'berat_badan' => $this->berat_badan,
        ]);

        $query->andFilterWhere(['like', 'ktg_atlet_id', $this->ktg_atlet_id])
            ->andFilterWhere(['like', 'perguruan', $this->perguruan])
            ->andFilterWhere(['like', 'prestasi', $this->prestasi])
            ->andFilterWhere(['like', 'atlet.atlet_nama', $this->atlet_nama])
            ->andFilterWhere(['like', 'kelas.kelas_nama', $this->kelas_nama]);
        return $dataProvider;
    }

    public function search2($params, $ev)
    {
        //jointWith(Nama Metod)
        $query = Pendaftar::find()->joinWith(['bagan', 'ktgAtlet', 'bagan.kelas', 'ktgAtlet.atletNik'])->where(['event_id' => $ev]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['bagan_id' => SORT_ASC]]
        ]);

        $dataProvider->sort->attributes['atlet_nama'] = [
            'asc' => ['atlet.atlet_nama' => SORT_ASC],
            'desc' => ['atlet.atlet_nama' => SORT_DESC],
        ];

        //sortir pada tabel dataprovider
        $dataProvider->sort->attributes['kelas_nama'] = [
            //asc desc => ['nama tabel.atribut']
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
            'pendaftar_id'  => $this->pendaftar_id,
            'bagan_id'      => $this->bagan_id,
            'berat_badan'   => $this->berat_badan,
            // 'ktg_atlet.atlet.atlet_nama' => $this->atlet_nama,
        ]);

        $query->andFilterWhere(['like', 'ktg_atlet_id', $this->ktg_atlet_id])
            ->andFilterWhere(['like', 'perguruan', $this->perguruan])
            ->andFilterWhere(['like', 'prestasi', $this->prestasi])
            ->andFilterWhere(['like', 'atlet.atlet_nama', $this->atlet_nama])
            ->andFilterWhere(['like', 'kelas.kelas_nama', $this->kelas_nama]);

        return $dataProvider;
    }

    public function searchBagan($params, $ev)
    {
        //jointWith(Nama Metod)
        $query = Bagan::find()->joinWith(['kelas'])->where(['event_id' => $ev]);

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
            'bagan_id' => $this->bagan_id,
        ]);

        $query->andFilterWhere(['like', 'kelas.kelas_nama', $this->kelas_nama])
            ->andFilterWhere(['like', 'kelas.kelas_id', $this->kelas_id]);

        return $dataProvider;
    }
}
