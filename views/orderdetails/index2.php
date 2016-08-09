<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            [
            'attribute'=>'productName',
            'value' => 'productCode0.productName'
            ],
            [
            'attribute'=>'productLine',
            'value' => 'productCode0.productLine0.productLine'
            ],
            'quantityOrdered',
            'priceEach',
            'orderLineNumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
