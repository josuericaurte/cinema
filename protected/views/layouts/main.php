<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<script src="https://kit.fontawesome.com/ea71e944fa.js" crossorigin="anonymous"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
	<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
</head>

<body>


	<div class="navbar navbar-expand-lg navbar-dark bg-dark">

			  <a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>"><?php echo
			  Yii::app()->name; ?></a>

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			 <div class="collapse navbar-collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),

						array('label'=>'Web Service', 'url'=>array('/site/web_service')),
						// array('label'=>'Panel de Control', 'url'=>array('/site/panel'), 'visible'=>!Yii::app()->user->isGuest),

						),
					'htmlOptions'=> array('class'=>'navbar-nav mr-auto')
					)); ?>

					<?php
						if (!Yii::app()->user->isGuest){
						?>

							<ul class="navbar-nav mr-3">
								<li class="nav-item">
									<a class="nav-link" href="
							       	<?php echo Yii::app()->createUrl('/usuario/funciones');  ?>">	Administrar Funciones</a>
								</li>
								<li class="nav-item dropdown">
							        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							          (<?php echo Yii::app()->user->name ?>)
							        </a>
							        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

							          <a class="dropdown-item"
							          href="<?php echo Yii::app()->createUrl('/usuario/configuracion');  ?>">
							          Configuracion</a>

							        </div>
							      </li>
							</ul>
							 <a class="btn btn-outline-danger " href="
							       	<?php echo Yii::app()->createUrl('/site/logout');  ?>">
							       	Logout</a>
						<?php
						}
					 ?>


			</div>
	</div><!-- mainmenu -->
	<div class="container m-5">

		<div class="card">
		  <div class="card-header">
		     <?php if(isset($this->breadcrumbs)):?>
			 <?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			 )); ?><!-- breadcrumbs -->
			 <?php endif?>
		  </div>
		  <div class="card-body">
		   	<?php echo $content; ?>
		  </div>
		  <div class="card-footer text-muted text-center">
		     Copyright &copy; <?php echo date('Y'); ?> by <?php echo
			  Yii::app()->name; ?>.<br/>
			All Rights Reserved.<br/>
			<p><a href="<?php echo Yii::app()->createUrl('site/login');  ?>">Login - Administracion</a></p>
		  </div>
		</div>

	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
