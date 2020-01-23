<?php
/* @var $this UsuarioController */
$this->pageTitle=Yii::app()->name . ' - Configuracion';
$this->breadcrumbs=array(
	'Usuario'=>array('/usuario'),
	'Configuracion',
);
?>

<h2>Configuracion <small>Cambiar Password</small></h2>
<hr>
<?php echo $msg; ?>
<div class="row">
	<div class="col-md-6">
		<?php
			$form = $this->beginWidget('CActiveForm', array(
				'method'=>'post',
				'action'=>Yii::app()->createUrl('usuario/configuracion'),
				'enableClientValidation'=>true,
				'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
			));
		 ?>



		 <div class="form-group">
			<?php
				echo $form->labelEx($model, 'password');
				echo $form->passwordField($model, 'password', array('class'=>'form-control'));
				echo $form->error($model, 'password', array('class'=>'text-danger'));
			 ?>
		</div>

		<div class="form-group">
			<?php
				echo $form->labelEx($model, 'nuevo_password');
				echo $form->passwordField($model, 'nuevo_password', array('class'=>'form-control'));
				echo $form->error($model, 'nuevo_password', array('class'=>'text-danger'));
			 ?>
		</div>

		<div class="form-group">
			<?php
				echo $form->labelEx($model, 'repetir_nuevo_password');
				echo $form->passwordField($model, 'repetir_nuevo_password', array('class'=>'form-control'));
				echo $form->error($model, 'repetir_nuevo_password', array('class'=>'text-danger'));
			 ?>
		</div>

		<div class="form-group">
			<?php
				echo CHtml::submitButton('Cambiar Password', array('class'=>'btn btn-outline-primary'));
			?>
		</div>

		  <?php $this->endWidget(); ?>
	</div>
</div>