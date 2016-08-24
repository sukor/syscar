<?php
use yii\widgets\ActiveForm;
?>
<?php
	$fiOptions = ['class'=>'file'];
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput($fiOptions) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>

<!-- <label class="control-label">Select File</label>
<input id="input-1" type="file" class="file"> -->