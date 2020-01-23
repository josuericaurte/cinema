<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Proceso Compra Boleta';
$this->breadcrumbs=array(
	'Finalizar Compra',
);
?>

<h2 class="text-success"><i class="fas fa-shopping-cart"></i>  Comprar <small>boletas</small> </h2>
	<hr>

	<div class="container mt-3">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Compra finalizada con exito</h1>
				<h2><small>Gracias por comprar, revise su email</small></h2>
				<span class="text-muted">Si no ve el correo revise los mensajes de spam</span>
				<br><br>
				<a href="<?php echo Yii::app()->createUrl('/site/');  ?>" class="btn btn-danger btn-lg">Regresar al Inicio</a>
			</div>
		</div>
	</div>