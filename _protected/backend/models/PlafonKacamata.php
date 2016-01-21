<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plafon_kacamata".
 *
 * @property integer $id
 * @property integer $status_peserta_id
 * @property integer $hak_kacamata_id
 * @property string $band
 * @property string $biaya
 *
 * @property HakKacamata $hakKacamata
 * @property StatusPeserta $statusPeserta
 */
class PlafonKacamata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plafon_kacamata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_peserta_id', 'hak_kacamata_id', 'band'], 'required'],
            [['status_peserta_id', 'hak_kacamata_id'], 'integer'],
            [['biaya'], 'number'],
            [['band'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_peserta_id' => 'Status Peserta ID',
            'hak_kacamata_id' => 'Hak Kacamata ID',
            'band' => 'Band',
            'biaya' => 'Biaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHakKacamata()
    {
        return $this->hasOne(HakKacamata::className(), ['id' => 'hak_kacamata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPeserta()
    {
        return $this->hasOne(StatusPeserta::className(), ['id' => 'status_peserta_id']);
    }
}
