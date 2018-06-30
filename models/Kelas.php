<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property string $kelas_id
 * @property string $kelas_nama
 * @property string $kelas_kategori
 * @property string $kelas_jk
 * @property int $kelas_usia
 * @property int $kelas_beratbadan
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_id', 'kelas_nama', 'kelas_kategori', 'kelas_jk', 'kelas_usia', 'kelas_beratbadan'], 'required'],
            [['kelas_jk'], 'string'],
            [['kelas_usia', 'kelas_beratbadan'], 'integer'],
            [['kelas_id'], 'string', 'max' => 6],
            [['kelas_nama', 'kelas_kategori'], 'string', 'max' => 100],
            [['kelas_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kelas_id' => 'Kelas ID',
            'kelas_nama' => 'Nama Kelas',
            'kelas_kategori' => 'Kategori',
            'kelas_jk' => 'Jenis Kelamin',
            'kelas_usia' => 'Usia',
            'kelas_beratbadan' => 'Berat Badan',
        ];
    }

    public function getLast() //untuk mengambil data terakhir dr database
    {
        $query = (new \yii\db\Query())
        ->select('kelas_id')
        ->from('kelas')
        ->orderBy(['kelas_id'=>SORT_DESC])
        ->limit(1)
        ->one();
        $id = $query['kelas_id'];
        return $id;
    }

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka)
    {
        //Menambah huruf
        $huruf = "KL";

        // mengambil nilai kode ex: KNS0015 hasil KNS
        //$kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: KNS0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);

        // menggabungkan kode dengan nilang angka baru
        $id_baru = $huruf.$angka_baru;

        return $id_baru;
    }
}
