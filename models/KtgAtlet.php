<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ktg_atlet".
 *
 * @property string $ktg_atlet_id
 * @property string $kontingen_id
 * @property string $atlet_nik
 *
 * @property Atlet $atletNik
 * @property Kontingen $kontingen
 * @property Pendaftar[] $pendaftars
 */
class KtgAtlet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ktg_atlet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ktg_atlet_id', 'kontingen_id', 'atlet_nik'], 'required'],
            [['atlet_nik'], 'integer'],
            [['ktg_atlet_id'], 'string', 'max' => 32],
            [['kontingen_id'], 'string', 'max' => 11],
            [['ktg_atlet_id'], 'unique'],
            [['atlet_nik'], 'exist', 'skipOnError' => true, 'targetClass' => Atlet::className(), 'targetAttribute' => ['atlet_nik' => 'atlet_nik']],
            [['kontingen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kontingen::className(), 'targetAttribute' => ['kontingen_id' => 'kontingen_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ktg_atlet_id' => 'Ktg Atlet ID',
            'kontingen_id' => 'Kontingen ID',
            'atlet_nik' => 'Atlet Nik',
            'kontingen_nama' => 'Nama Kontingen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtletNik()
    {
        return $this->hasOne(Atlet::className(), ['atlet_nik' => 'atlet_nik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontingen()
    {
        return $this->hasOne(Kontingen::className(), ['kontingen_id' => 'kontingen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftar()
    {
        return $this->hasMany(Pendaftar::className(), ['ktg_atlet_id' => 'ktg_atlet_id']);
    }
}
