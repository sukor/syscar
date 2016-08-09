<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Customers;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


$customer=Customers::find()->asArray()->all();
$customerlist=ArrayHelper::map($customer,'customerNumber',
function($customer,$defaultvalue){
 return   $customer['customerNumber'].'-'.$customer['customerName'];
}
    );

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderNumber')->textInput() ?>


    <?= $form->field($model, 'orderDate')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat' => 'yyyy-MM-dd',
    'options'=>['class'=>'form-control']
]) ?>

    <?= $form->field($model, 'requiredDate')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat' => 'yyyy-MM-dd',
    'options'=>['class'=>'form-control']
]) ?>
    <?= $form->field($model, 'shippedDate')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat' => 'yyyy-MM-dd',
    'options'=>['class'=>'form-control']
]) ?>
    <?= $form->field($model, 'status')
    ->dropDownlist(['Shipped'=>'Shipped',
    'Cancelled'=>'Cancelled'],['prompt'=>'Choose']) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>


    <?= $form->field($modelOrderdetail, 'productCode')->textInput() ?>
    
    <?= $form->field($model, 'customerNumber')->dropDownlist($customerlist,['prompt'=>'Choose']) ?>
    <?= $form->field($modelOrderdetail, 'quantityOrdered')->textInput() ?>

    <?= $form->field($modelOrderdetail, 'priceEach')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelOrderdetail, 'orderLineNumber')->textInput() ?>
     

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
