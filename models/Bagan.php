<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bagan".
 *
 * @property string $bagan_id
 * @property string $kelas_id
 * @property string $event_id
 *
 * @property Kelas $kelas
 * @property Event $event
 * @property Pendaftar[] $pendaftars
 */
class Bagan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_id', 'event_id'], 'required'],
            [['kelas_id'], 'string', 'max' => 6],
            [['event_id'], 'string', 'max' => 11],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['kelas_id' => 'kelas_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'event_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bagan_id' => 'Bagan ID',
            'kelas_id' => 'Kelas ID',
            'event_id' => 'Event ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['kelas_id' => 'kelas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['event_id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftars()
    {
        return $this->hasMany(Pendaftar::className(), ['bagan_id' => 'bagan_id']);
    }
}
