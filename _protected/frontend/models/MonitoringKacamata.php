<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "monitoring_kacamata".
 *
 * @property string $id
 * @property string $nikkes
 * @property integer $hak_kacamata_id
 * @property string $tgl_ambil
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 *
 * @property HakKacamata $hakKacamata
 * @property Peserta $nikkes0
 */
class MonitoringKacamata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monitoring_kacamata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nikkes', 'hak_kacamata_id', 'tgl_ambil'], 'required'],
            [['hak_kacamata_id', 'created_by'], 'integer'],
            [['hak_kacamata_id'],'in','range'=>array_keys($this->getHakKacamataList())],
            [['tgl_ambil', 'created_at', 'updated_at'], 'safe'],
            [['nikkes'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nikkes' => 'Nikkes',
            'hak_kacamata_id' => 'Hak Kacamata',
            'tgl_ambil' => 'Tanggal Pengambilan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',

            'hakkacamataName' => Yii::t('app','HakKacamata'),
            'nikkes0' => 'Nama',

        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' =>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => \yii\behaviors\BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHakKacamata()
    {
        return $this->hasOne(\backend\models\HakKacamata::className(), ['id' => 'hak_kacamata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNikkes0()
    {
        return $this->hasOne(\backend\models\Peserta::className(), ['nikkes' => 'nikkes']);
    }

    public function getHakKacamataList()
    {
        $dropOptions = \backend\models\HakKacamata::find()->asArray()->all();
        return ArrayHelper::map($dropOptions,'id','hak_kacamata');
    }

    public function beforeValidate()
    {
        if ($this->tgl_ambil != null) {                    
            $new_date_format = date('Y-m-d', strtotime($this->tgl_ambil));
            $this->tgl_ambil = $new_date_format;
        }   

            return parent::beforeValidate();
    }
}
