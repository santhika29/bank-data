<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterTpk;

/**
 * MastertpkSearch represents the model behind the search form of `app\models\MasterTpk`.
 */
class MastertpkSearch extends MasterTpk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDTPK', 'NO_FKTP', 'NAMA_TPK', 'NAMA_FKTP', 'ALAMAT', 'KOTA', 'STATUS', 'TGL_MULAI_PKS', 'TGL_AKHIR_PKS', 'KETERANGAN'], 'safe'],
            [['AREA'], 'integer'],
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
        $query = MasterTpk::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'AREA' => $this->AREA,
        ]);

        $query->andFilterWhere(['like', 'KDTPK', $this->KDTPK])
            ->andFilterWhere(['like', 'NO_FKTP', $this->NO_FKTP])
            ->andFilterWhere(['like', 'NAMA_TPK', $this->NAMA_TPK])
            ->andFilterWhere(['like', 'NAMA_FKTP', $this->NAMA_FKTP])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'KOTA', $this->KOTA])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'TGL_MULAI_PKS', $this->TGL_MULAI_PKS])
            ->andFilterWhere(['like', 'TGL_AKHIR_PKS', $this->TGL_AKHIR_PKS])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN]);

        return $dataProvider;
    }
}
