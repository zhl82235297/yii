<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CompanyProfile as CompanyProfileModel;

/**
 * CompanyProfile represents the model behind the search form about `backend\models\CompanyProfile`.
 */
class CompanyProfile extends CompanyProfileModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'audit', 'addtime', 'refreshtime', 'click', 'comment', 'trade', 'famous', 'state'], 'integer'],
            [['companyname', 'trade_cn', 'address', 'contact', 'telephone', 'email', 'contents', 'reason'], 'safe'],
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
        $query = CompanyProfileModel::find();

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
            'audit' => $this->audit,
            'addtime' => $this->addtime,
            'refreshtime' => $this->refreshtime,
            'click' => $this->click,
            'comment' => $this->comment,
            'trade' => $this->trade,
            'famous' => $this->famous,
            'state' => $this->state,
        ]);

        $query->andFilterWhere(['like', 'companyname', $this->companyname])
            ->andFilterWhere(['like', 'trade_cn', $this->trade_cn])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contents', $this->contents])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
} 