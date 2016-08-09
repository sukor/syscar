<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orderdetails;

/**
 * OrderdetailsSearch represents the model behind the search form about `app\models\Orderdetails`.
 */
class OrderdetailsSearch extends Orderdetails
{
    public $productName;
    public $productLine;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderNumber', 'quantityOrdered', 'orderLineNumber'], 'integer'],
            [['productCode','productName','productLine'], 'safe'],
            [['priceEach'], 'number'],
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
        $query = Orderdetails::find()->joinWith(['productCode0','productCode0.productLine0']);

        // add conditions that should always apply here
        //print_r($query->asArray()->all());

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['productName']=[
                    'asc' =>['productName'=>SORT_ASC],
                    'desc' =>['productName'=>SORT_DESC],
                ];

        // grid filtering conditions
        $query->andFilterWhere([
            'orderNumber' => $this->orderNumber,
            'quantityOrdered' => $this->quantityOrdered,
            'priceEach' => $this->priceEach,
            'orderLineNumber' => $this->orderLineNumber,
        ]);

        $query->andFilterWhere(['like', 'productName', $this->productName]);
        $query->andFilterWhere(['like', 'productlines.productLine', $this->productLine]);



        return $dataProvider;
    }
}
