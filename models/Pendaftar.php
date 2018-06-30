<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftar".
 *
 * @property int $pendaftar_id
 * @property string $ktg_atlet_id
 * @property string $bagan_id
 * @property string $berat_badan
 * @property string $perguruan
 * @property string $prestasi
 *
 * @property KtgAtlet $ktgAtlet
 * @property Bagan $bagan
 */
class Pendaftar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ktg_atlet_id', 'bagan_id', 'berat_badan', 'perguruan'], 'required'],
            ['info_grup', 'safe'],
            [['bagan_id', 'berat_badan'], 'integer'],
            [['ktg_atlet_id'], 'string', 'max' => 32],
            [['perguruan'], 'string', 'max' => 20],
            [['prestasi'], 'string', 'max' => 10],
            [['ktg_atlet_id'], 'exist', 'skipOnError' => true, 'targetClass' => KtgAtlet::className(), 'targetAttribute' => ['ktg_atlet_id' => 'ktg_atlet_id']],
            [['bagan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bagan::className(), 'targetAttribute' => ['bagan_id' => 'bagan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pendaftar_id' => 'Pendaftar ID',
            'ktg_atlet_id' => 'Ktg Atlet ID',
            'bagan_id' => 'Bagan ID',
            'berat_badan' => 'Berat Badan',
            'perguruan' => 'Perguruan',
            'info_grup' => 'Detail Beregu',
            'prestasi' => 'Prestasi',
            'atlet_nama' => 'Nama Atlet',
            'kelas_nama' => 'Nama Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtgAtlet()
    {
        return $this->hasOne(KtgAtlet::className(), ['ktg_atlet_id' => 'ktg_atlet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBagan()
    {
        return $this->hasOne(Bagan::className(), ['bagan_id' => 'bagan_id']);
    }
}
