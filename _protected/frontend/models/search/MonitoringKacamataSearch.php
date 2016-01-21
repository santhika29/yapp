<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MonitoringKacamata;

/**
 * MonitoringKacamataSearch represents the model behind the search form about `frontend\models\MonitoringKacamata`.
 */
class MonitoringKacamataSearch extends MonitoringKacamata
{
    //variable tambahan untuk searching
    public $nikkes0;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hak_kacamata_id', 'created_by'], 'integer'],
            [['nikkes', 'tgl_ambil', 'created_at', 'updated_at'], 'safe'],
            //rules tambahan
            [['nikkes0'],'safe']
        ];
    }

    /**
     * @inheritdoc
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
    public function search($params)
    {
        $query = MonitoringKacamata::find();

        // add conditions that should always apply here
        $query->joinWith(['nikkes0']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nikkes0'] = [
            'asc' => ['peserta.nama' => SORT_ASC],
            'desc' => ['peserta.nama' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'hak_kacamata_id' => $this->hak_kacamata_id,
            'tgl_ambil' => $this->tgl_ambil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'monitoring_kacamata.nikkes', $this->nikkes])
              ->andFilterWhere(['like','peserta.nama',$this->nikkes0]);;

        return $dataProvider;
    }
}
