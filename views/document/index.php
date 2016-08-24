<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Document', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php

echo GridView::widget([
    'id' => 'kv-grid-demo',
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
       'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'doc_id',
            'name',
            'path:ntext',
            'status',

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
