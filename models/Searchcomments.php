<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Posts;

/**
 * Searchcomments represents the model behind the search form of `app\models\Posts`.
 */
class Searchcomments extends Posts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'in_category', 'owned_by_user', 'count_view', 'count_bookmarked', 'rating'], 'integer'],
            [['h1', 'pageText', 'description', 'date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Posts::find();

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
            'id' => $this->id,
            'in_category' => $this->in_category,
            'owned_by_user' => $this->owned_by_user,
            'count_view' => $this->count_view,
            'count_bookmarked' => $this->count_bookmarked,
            'rating' => $this->rating,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'h1', $this->h1])
            ->andFilterWhere(['like', 'pageText', $this->pageText])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
