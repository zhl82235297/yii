<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order as OrderModel;

/**
 * Order represents the model behind the search form about `backend\models\Order`.
 */
class Order extends OrderModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'utype', 'pay_type', 'is_paid', 'points', 'addtime', 'payment_time', 'setmeal', 'week'], 'integer'],
            [['oid', 'payment_name', 'description', 'notes'], 'safe'],
            [['amount'], 'number'],
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
        $query = OrderModel::find();

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
            'uid' => $this->uid,
            'utype' => $this->utype,
            'pay_type' => $this->pay_type,
            'is_paid' => $this->is_paid,
            'amount' => $this->amount,
            'points' => $this->points,
            //'addtime' => $this->addtime>'addtime',
            'payment_time' => $this->payment_time,
            'setmeal' => $this->setmeal,
            'week' => $this->week,
        ]);

        $query->andFilterWhere(['like', 'oid', $this->oid])
            ->andFilterWhere(['like', 'payment_name', $this->payment_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'notes', $this->notes]);
            //->andFilterWhere(['between', 'addtime', $this->addtime,time()])->all();
        $query->andFilterCompare('addtime',">$this->addtime");
        return $dataProvider;
    }
}