<?php
/* @var $this UsuariosController */

$this->breadcrumbs=array(
	'Usuario',
);
?>

<h2>Panel de Control <small>Administrador</small></h2>
<hr>

		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo Yii::app()->createUrl('/usuario/funciones');  ?>">Administrar Funciones</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo Yii::app()->createUrl('/usuario/configuracion');  ?>">Configuracion</a>
			</li>
		</ul>