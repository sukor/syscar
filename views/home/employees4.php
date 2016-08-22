<?php
use yii\grid\GridView;




?>

<?= GridView::widget([
    'dataProvider' => $dataprovider,
    'columns' => [
        'email',
        'lastName',
        'firstName',
        // ...
    ],
]) ?>