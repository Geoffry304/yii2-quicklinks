<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use geoffry304\symbolpicker\SymbolPicker;

/* @var $this yii\web\View */
/* @var $model app\models\Quicklink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quicklink-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'link')->textInput(['placeholder' => \yii\helpers\Url::base(true) ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->widget(SymbolPicker::className()) ?>

    <?= $form->field($model, 'newwindow')->dropDownList(geoffry304\quicklinks\models\Quicklink::valuesNewwindow()) ?>

    <?= $form->field($model, 'position')->textInput(['type' => "number", 'min' => "0"]) ?>


	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('quicklink', 'Create') : Yii::t('quicklink', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

</div>
