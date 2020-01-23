<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2> Funciones <small>Disponibles</small> </h2>
<hr>

<div class="card-columns">

	<?php foreach ($datos as $data): ?>
		<div class="card text-center">
		    <div class="card-body">
		      <h3 class="card-title text-danger"><?php echo $data['titulo_pelicula']; ?></h3>

		      <h6 class="card-text">
		      	<i class="fas fa-home"></i> <?php echo $data['teatro']; ?></h6>

		      <h5 class="card-text">
		      	<i class="far fa-clock"></i> <?php echo $data['hora_funcion']; ?>
		      </h5>

		      <h4 class="card-text"><small class="text-muted">
		      	$<?php echo $data['precio_boleta']; ?> COP
		      </small></h4>

		      <a href="
				 <?php echo Yii::app()->createUrl('/site/comprar_boleta?id_funcion='.$data['id']);  ?>
		      "
		      	 class="btn btn-success">
		      	 <i class="fas fa-shopping-cart"></i> Comprar Boleta
		      </a>
		    </div>
	    </div>
	<?php endforeach ?>


</div>