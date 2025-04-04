<?php
/* @var $this SiteController */
/* @var $model LoginForm */
$this->pageTitle = Yii::app()->name . ' - Login';
?>

<h1>Login</h1>

<p>Silakan isi form di bawah ini untuk login:</p>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'login-form',
		'enableAjaxValidation' => true,
	)); ?>

	<p class="note">Kolom bertanda <span class="required">*</span> wajib diisi.</p>

	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->textField($model, 'email'); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password'); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model, 'rememberMe'); ?>
		<?php echo $form->label($model, 'rememberMe'); ?>
		<?php echo $form->error($model, 'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->