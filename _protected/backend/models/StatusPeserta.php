<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status_peserta".
 *
 * @property integer $id
 * @property string $status_peserta
 *
 * @property Peserta[] $pesertas
 * @property PlafonKacamata[] $plafonKacamatas
 */
class StatusPeserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_peserta'], 'required'],
            [['status_peserta'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_peserta' => 'Status Peserta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertas()
    {
        return $this->hasMany(Peserta::className(), ['status_peserta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlafonKacamatas()
    {
        return $this->hasMany(PlafonKacamata::className(), ['status_peserta_id' => 'id']);
    }
}
