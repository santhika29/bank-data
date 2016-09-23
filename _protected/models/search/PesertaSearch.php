<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peserta;

/**
 * PesertaSearch represents the model behind the search form about `app\models\Peserta`.
 */
class PesertaSearch extends Peserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nikkes', 'nama', 'band', 'tgl_lahir', 'tgl_pensiun', 'tanggungan', 'tgl_akhir_tanggungan', 'tpk', 'area'], 'safe'],
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => '10'],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tgl_lahir' => $this->tgl_lahir,
            'tgl_pensiun' => $this->tgl_pensiun,
            'tgl_akhir_tanggungan' => $this->tgl_akhir_tanggungan,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nikkes', $this->nikkes])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'band', $this->band])
            ->andFilterWhere(['like', 'tanggungan', $this->tanggungan])
            ->andFilterWhere(['like', 'tpk', $this->tpk])
            ->andFilterWhere(['like', 'area', $this->area]);

        return $dataProvider;
    }
}
