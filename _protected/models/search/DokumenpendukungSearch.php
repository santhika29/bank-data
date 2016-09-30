<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DokumenPendukung;

/**
 * DokumenpendukungSearch represents the model behind the search form about `app\models\DokumenPendukung`.
 */
class DokumenpendukungSearch extends DokumenPendukung
{
    
    public $peserta;
    public $uploadedFile;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uploaded_file_id', 'tag_id', 'created_at'], 'integer'],
            [['peserta_id'], 'safe'],
            [['peserta','uploadedFile'], 'safe'],
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
        $query = DokumenPendukung::find();

        $query->joinWith(['peserta']);
        $query->joinWith(['uploadedFile']);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['peserta'] = [
            'asc' => ['peserta.nama' => SORT_ASC],
            'desc' => ['peserta.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['uploadedFile'] = [
            'asc' => ['uploaded_file.name' => SORT_ASC],
            'desc' => ['uploaded_file.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'uploaded_file_id' => $this->uploaded_file_id,
            //'tag_id' => $this->tag_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'uploaded_file_id', $this->uploaded_file_id])
            ->andFilterWhere(['like', 'uploaded_file.id', $this->uploaded_file_id]);
        
        //untuk mengeluarkan foto
        if ($this->tag_id === '99') {

            $kode = substr($this->peserta_id, 0, 6);

            $subQuery = DokumenPendukung::find();
            $subQuery->select('peserta_id')->where(['like','peserta_id',$kode])->andWhere(['tag_id' => '1']); 
            
            $query->andFilterWhere(['<', 'tag_id', '5'])
                ->andFilterWhere(['like','peserta_id', $this->peserta_id])
                ->andWhere(['in', 'peserta_id', $subQuery]);
        }else{
            $query->andFilterWhere(['tag_id' => $this->tag_id]);

            $query->andFilterWhere(['like', 'peserta_id', $this->peserta_id]);

            $query->andFilterWhere(['like', 'peserta_id', $this->peserta_id])
                ->andFilterWhere(['like', 'peserta.nikkes', $this->peserta_id]);
        }

        
        return $dataProvider;
    }
}
