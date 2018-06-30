<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atlet".
 *
 * @property string $atlet_nik
 * @property string $atlet_nama
 * @property string $atlet_tgl_lahir
 * @property string $atlet_jk
 *
 * @property KtgAtlet[] $ktgAtlets
 */
class Atlet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atlet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['atlet_nik', 'atlet_nama', 'atlet_tgl_lahir', 'atlet_jk'], 'required'],
            [['atlet_nik'], 'integer'],
            [['atlet_tgl_lahir'], 'safe'],
            [['atlet_jk'], 'string'],
            [['atlet_nama'], 'string', 'max' => 100],
            [['atlet_nama'], 'filter', 'filter' => 'strtoupper'],
            [['atlet_nik'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'atlet_nik' => 'NIK Atlet',
            'atlet_nama' => 'Nama Atlet',
            'atlet_tgl_lahir' => 'Tanggal Lahir',
            'atlet_jk' => 'Jenis Kelamin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtgAtlets()
    {
        return $this->hasMany(KtgAtlet::className(), ['atlet_nik' => 'atlet_nik']);
    }
}
