<?php

use yii\grid\GridView;

?>

<?= GridView::widget([
    'dataProvider' => $dataprovider,
     'columns' => [
        'employeeNumber',
        'lastName',
        'email',
    ],
]) 

?>
