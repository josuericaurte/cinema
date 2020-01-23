<?php
/* @var $this UsuariosController */

$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	'Nueva Funcion',
);
?>


<h2>Administrar <small>Funciones</small></h2>
<hr>
<div class="container">
	<div class="row">
		<h3 class="mr-5">Agregar Nueva Funcion
		</h3>
		<a href="<?php echo Yii::app()->createUrl('/usuario/funciones');  ?>"
	 		class="btn btn-small btn-danger">
	 		Regresar</a>
	</div>
</div>


<div class="row mt-5">

	<div class="col-md-6">
		<?php echo $msg; ?>

		<?php
			$form = $this->beginWidget('CActiveForm', array(
				'method'=>'post',
				'action'=>Yii::app()->createUrl('usuario/nueva_funcion'),
				'id'=>'form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
			));
		 ?>

		 <div class="form-group">
			<?php
				echo $form->textField($model, 'id_funcion', array('style'=>'display:none',
					'value'=>'0'));
			 ?>
		</div>

		 <div class="form-group">
			<?php
				echo $form->labelEx($model, 'teatro');
				echo $form->textField($model, 'teatro', array('class'=>'form-control'));
				echo $form->error($model, 'teatro', array('class'=>'text-danger'));
			 ?>
		</div>

		 <div class="form-group">
			<?php
				echo $form->labelEx($model, 'salon');
				echo $form->textField($model, 'salon', array('class'=>'form-control'));
				echo $form->error($model, 'salon', array('class'=>'text-danger'));
			 ?>
		</div>

		 <div class="form-group">
			<?php
				echo $form->labelEx($model, 'titulo_pelicula');
				echo $form->textField($model, 'titulo_pelicula', array('class'=>'form-control'));
				echo $form->error($model, 'titulo_pelicula', array('class'=>'text-danger'));
			 ?>
		</div>

		 <div class="form-group">
			<?php
				echo $form->labelEx($model, 'hora_funcion');
				echo $form->timeField($model, 'hora_funcion', array('class'=>'form-control'));
				echo $form->error($model, 'hora_funcion', array('class'=>'text-danger'));
			 ?>
		</div>



		 <div class="form-group">
			<?php
				echo $form->labelEx($model, 'precio_boleta');
				echo $form->numberField($model, 'precio_boleta', array('class'=>'form-control'));
				echo $form->error($model, 'precio_boleta', array('class'=>'text-danger'));
			 ?>
		</div>


		<div class="form-group">
			<?php
				echo CHtml::submitButton('Agregar Funcion', array('class'=>'btn btn-outline-primary'));
			?>
		</div>

		  <?php $this->endWidget(); ?>
	</div>

</div>