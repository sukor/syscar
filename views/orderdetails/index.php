<?php

use yii\helpers\Html;
use kartik\grid\GridView;
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

<?php

echo GridView::widget([
    'id' => 'kv-grid-demo',
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
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
            ['class'=>'yii\grid\CheckboxColumn'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar'=> [
        ['content'=>
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=> 'Add Book', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=> 'Reset Grid'])
        ],
        '{export}',
        '{toggleData}',
    ],
    // set export properties
    'export'=>[
        'fontAwesome'=>true
    ],
   
    'panel'=>[
        'type'=>GridView::TYPE_PRIMARY,
       // 'heading'=>$heading,
    ],
    'persistResize'=>false,
    //'exportConfig'=>$exportConfig,
]);


?>



</div>
