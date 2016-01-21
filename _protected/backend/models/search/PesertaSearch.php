<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Peserta;

/**
 * PesertaSearch represents the model behind the search form about `backend\models\Peserta`.
 */
class PesertaSearch extends Peserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_peserta_id'], 'integer'],
            [['nikkes', 'nik', 'nama_kk', 'nama', 'band'], 'safe'],
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
        $query = Peserta::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            $query->where('1=0');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status_peserta_id' => $this->status_peserta_id,
        ]);

        $query->andFilterWhere(['like', 'nikkes', $this->nikkes])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama_kk', $this->nama_kk])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'band', $this->band]);

        return $dataProvider;
    }
}
