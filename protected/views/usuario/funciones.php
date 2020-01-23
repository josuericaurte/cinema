<?php
/* @var $this UsuariosController */

$this->breadcrumbs=array(
	'Usuario'=>array('/usuario'),
	'Funciones',
);
?>

 <?php echo $msg; ?>
<h2>Administrar <small>Funciones</small></h2>
<hr>
<div class="container">
	<div class="row">
		<h3 class="mr-5">Listado de Funciones
		</h3>
		<a href="<?php echo Yii::app()->createUrl('/usuario/nueva_funcion');  ?>"
	 		class="btn btn-small btn-primary">
	 		Agregar Nueva Funcion</a>
	</div>
</div>

<!-- MENSAJES DE NOVEDADES POR MEDIO DEL GET -->
<?php
	if (isset($_GET['alert'])) {
		if ($_GET['alert'] == 'actualizo') {

			echo '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Enhorabuena</strong>, se actualizaron los datos con exito
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';

		} else if($_GET['alert'] == 'eliminado'){

			echo '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Enhorabuena</strong>, se borraron los datos con exito
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
		}
	}
 ?>
<!-- ------------------------------- -->
<table class="table table-inverse mt-5">
	<thead>
		<tr>
			<th>Teatro</th>
			<th>Salon</th>
			<th>Titulo Pelicula</th>
			<th>Hora Funcion</th>
			<th>Precio Boleta</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $data): ?>
			<tr>
				<td><?php echo $data['teatro']; ?></td>
				<td><?php echo $data['salon']; ?></td>
				<td><?php echo $data['titulo_pelicula']; ?></td>
				<td><?php echo $data['hora_funcion']; ?></td>
				<td><?php echo $data['precio_boleta']; ?></td>

				<td>
					<a href="
					<?php echo Yii::app()->createUrl('/usuario/editar_funcion?idFuncion='.$data["id"]);  ?>"
					class="btn btn btn-success btn-sm">Editar</a>
					<button class="btn btn btn-danger btn-sm" data-toggle="modal" data-target="#<?php echo 'modal'.$data['id']; ?>">
						Eliminar
					</button>
				</td>
			</tr>

			<!-- Modal -->
			<div class="modal fade" id="<?php echo 'modal'.$data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body text-center">
			        	<h4>¿DESEA ELIMINAR LA FUNCION?</h4>

			        	<?php
						$form = $this->beginWidget('CActiveForm', array(
							'method'=>'POST',
							'action'=>Yii::app()->createUrl('usuario/funciones'),
							'enableClientValidation'=>true,
							'clientOptions'=>array(
									'validateOnSubmit'=>true,
								),
						));
						 ?>

						 <div class="form-group">
							<?php
								echo $form->textField($model, 'id_funcion', array('style'=>'display:none',
									'value'=>$data['id']) );
							 ?>
						</div>


				      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			        <?php
						echo CHtml::submitButton('Eliminar', array('class'=>'btn btn-danger'));
					?>
					<?php $this->endWidget(); ?>
			      </div>
			    </div>
			  </div>
			</div>
		<?php endforeach; ?>
	</tbody>
</table>

