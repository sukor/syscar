<?php
use yii\widgets\LinkPager;
use  yii\helpers\Url;
use  yii\bootstrap\Html

?>

<table class='table'>
	<thead>
	<tr>
		<td>
			bil
		</td>
		<td>
			Email
		</td>
		<td>
			lastname
		</td>
		<td>
			detail
		</td>
	</tr>
</thead>
<?php
$bill=$count;
foreach ($models as $row) {
	$bill++;
	$url=Url::to(['home/detail-employees',
	 'id' => $row->employeeNumber]);
?>
		<tr>
			<td><?=$bill?></td>
			<td>
			<?=$row->email?>
		 	</td>
		 	<td>
			<?=$row['officeCode0']->city?>
		 	</td>
		 	<td>
		 	<?=Html::a('view',['home/detail-employees',
		 	'id'=>$row->employeeNumber])?>
			<a href="<?=$url?>">detail</a>
		 	</td>
		</tr>
<?php	
}
?>
<table>
<?php
echo LinkPager::widget([
    'pagination' => $pages,
]);