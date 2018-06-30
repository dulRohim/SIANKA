<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property string $event_id
 * @property string $event_nama
 * @property string $event_tgl_mulai
 * @property string $event_tgl_selesai
 * @property string $event_tempat
 * @property string $event_info
 * @property string $event_create
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'event_nama', 'event_tgl_mulai', 'event_tgl_selesai', 'event_tempat', 'event_info', 'event_create'], 'required'],
            [['event_tgl_mulai', 'event_tgl_selesai', 'event_create'], 'safe'],
            [['event_id'], 'string', 'max' => 11],
            [['event_nama'], 'string', 'max' => 100],
            [['event_tempat'], 'string', 'max' => 50],
            [['event_info'], 'string', 'max' => 200],
            [['event_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_nama' => 'Nama Event',
            'event_tgl_mulai' => 'Tanggal Mulai',
            'event_tgl_selesai' => 'Tanggal Selesai',
            'event_tempat' => 'Tempat Event',
            'event_info' => 'Info Event',
            'event_create' => 'Event Dibuat',
        ];
    }

    public function getLast() //untuk mengambil data terakhir dr database
    {
        $query = (new \yii\db\Query())
        ->select('event_id')
        ->from('event')
        ->orderBy(['event_id'=>SORT_DESC])
        ->limit(1)
        ->one();
        $id = $query['event_id'];
        return $id;
    }

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka, $id_event)
    {
        //Menambah huruf
        $huruf = "E";

        //mengambil tanggal sekarang
        $date = Yii::$app->formatter->asDate('now', 'yyyyMMdd');

        // mengambil nilai kode ex: KNS0015 hasil KNS
        //$kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: KNS0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        if($id_event == $date){
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
    }else {
        $angka_baru = "0"."1";
    }
        // menggabungkan kode dengan nilang angka baru
        $id_baru = $huruf.$date.$angka_baru;

        return $id_baru;
    }
}
