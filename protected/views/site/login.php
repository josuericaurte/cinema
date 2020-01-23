<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h2>Login <small>Administrador</small></h2>
<hr>
<div class="row">
	<div class="col-md-6">
		<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>


			<div class="form-group">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'username', array('class'=>'text-danger')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'password', array('class'=>'text-danger')); ?>
			</div>

			<div class="form-check">
				<?php echo $form->checkBox($model,'rememberMe', array('class'=>'form-check-input')); ?>
				<?php echo $form->label($model,'rememberMe', array('class'=>'form-check-label')); ?>
				<?php echo $form->error($model,'rememberMe', array('class'=>'text-danger')); ?>
			</div>

			<div class="form-group mt-2">
				<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-outline-primary btn-block')); ?>
			</div>

		<?php $this->endWidget(); ?>
		</div><!-- form -->
	</div>
</div>
