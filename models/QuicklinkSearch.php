<?php

namespace geoffry304\quicklinks\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use geoffry304\quicklinks\models\Quicklink;

/**
 * QuicklinkSearch represents the model behind the search form about `app\models\Quicklink`.
 */
class QuicklinkSearch extends Quicklink
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'newwindow', 'position'], 'integer'],
            [['link', 'title', 'icon'], 'safe'],
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
        $query = Quicklink::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'newwindow' => $this->newwindow,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
