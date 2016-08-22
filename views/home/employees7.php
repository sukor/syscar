<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class='row'>

<?php
$form=ActiveForm::begin(['id'=>'addemployees',
	'layout'=>'horizontal',

	]);
?>

<?=$form->field($model,'employeeNumber')?>
<?=$form->field($model,'email')?>
<?=$form->field($model,'emailchek')?>
<?=$form->field($model,'officeCode')
->radioList(['1'=>'city1','2'=>'city2'])->label('city')?>

<?=Html::submitButton('submit',['class'=>'btn btn-primary']) ?>

<?php
ActiveForm::end();
?>
</div>