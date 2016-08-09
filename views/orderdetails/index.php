<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Orders;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orderdetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'orderNumber',
            'productCode',
              [
            'attribute'=>'status',
            'value'=>'orderNumber0.status',
            //ArrayHelper::map(\app\models\Orders::find()->asArray()->all(), 'status', 'status'),
              'filter' => ArrayHelper::map(Orders::find()->asArray()->all(),'status','status')
            ],
               [
            'attribute'=>'customerName',
            'value'=> 'orderNumber0.customerNumber0.customerName',
            ],
            'orderNumber0.customerNumber0.salesRepEmployeeNumber0.lastName',
            [
            'attribute'=>'productName',
            'value'=>'productCode0.productName'
            ],
            'quantityOrdered',
            'priceEach',
            'orderLineNumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
