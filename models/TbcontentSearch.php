<?php

namespace suleyildirim\blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use suleyildirim\blog\models\Tbcontent;

/**
 * TbcontentSearch represents the model behind the search form about `backend\modules\blog\models\Tbcontent`.
 */
class TbcontentSearch extends Tbcontent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'subject', 'tag', 'content', 'date','type', 'author'], 'safe'],
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
        $query = Tbcontent::find();
        $query->joinWith(['types','authors']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $dataProvider->sort->attributes['type'] = [
            'asc' => ['Tbtype.Name' => SORT_ASC],
            'desc' => ['Tbtype.Name' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['author'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            //'type' => $this->type,
            //'author' => $this->author,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'Tbtype.Name', $this->type])
            ->andFilterWhere(['like', 'user.username', $this->author]);

        return $dataProvider;
    }
}
