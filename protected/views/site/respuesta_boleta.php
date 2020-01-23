<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Proceso Compra Boleta';
$this->breadcrumbs=array(
	'Proceso Boleta',
);
?>
<?php


	if (isset($_GET['id_funcion']) and isset($_GET['ref_payco']) ) {

	?>
	<h2 class="text-success"><i class="fas fa-shopping-cart"></i>  Comprar <small>boletas</small> </h2>
	<hr>

	<div class="container mt-3">
		<div class="row">
			<div class="col-md-9">
				<?php echo $msg; ?>
				<div class="alert alert-success" role="alert">
					<h3>COMPRA REALIZADA CON EXITO!</h3>
				</div>

				<h3>Ingresa tu direccion de correo electronico, donde quieres que se envie la boleta.</h3>

				<div class="mt-3">

				<?php
					$form = $this->beginWidget('CActiveForm', array(
						'method'=>'post',
						'action'=>Yii::app()->createUrl('site/respuesta_boleta?id_funcion='.$_GET["id_funcion"].'&&ref_payco='.$_GET["ref_payco"]),
						'enableClientValidation'=>true,
						'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
					));
					 ?>

					<div class="form-group">
						<?php
							echo $form->textField($model, 'id_funcion', array('style'=>'display: none;',
								'value'=>$_GET['id_funcion']));
						 ?>
					</div>


					 <div class="form-group">
						<?php
							echo $form->textField($model, 'ref_payco', array('style'=>'display: none;',
							'value'=>$_GET['ref_payco']));
						 ?>
					</div>

					<div class="form-group">
						<?php
							echo $form->labelEx($model, 'Ingresar Correo Electronico');
							echo $form->textField($model, 'email', array('class'=>'form-control'));
							echo $form->error($model, 'email', array('class'=>'text-danger'));
						 ?>
					</div>


					<div class="form-group">
						<?php
							echo CHtml::submitButton('Finalizar Compra', array('class'=>'btn btn-success'));
						?>
					</div>

					  <?php $this->endWidget(); ?>

					</div>
			</div>
		</div>
	</div>
	<?php

	}else {
		$this->redirect(Yii::app()->request->baseUrl."/site/");
	}
 ?>

