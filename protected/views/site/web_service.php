<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Web Services';
$this->breadcrumbs=array(
	'Web Service',
);
?>
<div class="card-columns">
<?php foreach ($model as $value): ?>
	<div class="card text-center">
		<div class="card-head mt-2">
			<h4><?php echo $value->RestauranteNombre; ?></h4>
		</div>
		<div class="card-body">
			<ul class="list-group">
				<li class="list-group-item">
					<strong>Restaurante Rating:</strong>
					<?php echo $value->RestauranteRating; ?>
				</li>
				<li class="list-group-item">
					<strong>Restaurante Ubicacion:</strong>
					<?php echo $value->RestauranteUbicacion; ?>
				</li>
			</ul>
		</div>
	</div>

<?php endforeach ?>
</div>