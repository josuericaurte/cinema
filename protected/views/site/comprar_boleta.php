<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Comprar Boleta';
$this->breadcrumbs=array(
	'Comprar Boleta',
);
?>


<h2 class="text-success"><i class="fas fa-shopping-cart"></i>  Comprar <small>boletas</small> </h2>
<hr>

<div class="container mt-3">
	<div class="row">
		<div class="col-md-6">

			<div class="row">
				<h4 class="mr-5">Informacion de compra:</h4>
				<a href="<?php echo Yii::app()->createUrl('/site/');  ?>"
				 		class="btn btn-small btn-danger">
				 		Regresar</a>
			</div>

			<?php foreach ($datos as $data): ?>
				<div class="card mt-3">
					<div class="card-header bg-success">
						<h3 class="text-light">Pelicula: <?php echo $data['titulo_pelicula']; ?></</h3>
					</div>
					<div class="card-body">

						<h4>Teatro: <small><?php echo $data['teatro']; ?></small></h4>
						<h4>Hora de la funcion: <small><?php echo $data['hora_funcion']; ?></small></h4>

						<h4>Precio: <small>$<?php echo $data['precio_boleta']; ?> COP</small></h4>

					</div>
				</div>
				<hr>
				<div class="mt-2">
					<h4>Metodos de Pago:</h4>
					<form>
				        <script
				            src="https://checkout.epayco.co/checkout.js"
				            class="epayco-button"
				            data-epayco-key="491d6a0b6e992cf924edd8d3d088aff1"
				            data-epayco-amount="<?php echo $data['precio_boleta']; ?>"
				            data-epayco-name="Boleto para pelicula"
				            data-epayco-description="<?php echo 'Pelicula:'.$data['titulo_pelicula']; ?>"
				            data-epayco-currency="cop"
				            data-epayco-country="co"
				            data-epayco-test="true"
				            data-epayco-external="false"
				            data-epayco-response="http://localhost/apps-yii/cinemas/site/respuesta_boleta?id_funcion=<?php echo $data['id']; ?>&"
				            data-epayco-confirmation="https://ejemplo.com/confirmacion">
				        </script>
			  		 </form>
				</div>
			<?php endforeach ?>

		</div>
	</div>
</div>