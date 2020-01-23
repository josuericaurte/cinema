<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$datos = "";
		//REALIZAMOS LA CONSULTA A LA BD, MANDANDO COMO PARAMETRO LA TABLA
		$consulta = new ConsultasDB;
		//LE ASIGNAMOS A MODEL EL REUSLTADO DE LA CONSULTA UN ARRAY
		$datos = $consulta->consultarDatos("tbl_funciones");
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', array('datos'=>$datos));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	// ACTION DE LA PAGINA COMPRAR BOLETA
	//
	public function actionComprar_Boleta(){
		$datos = "";

		if (isset($_GET["id_funcion"])) {
			$id_funcion = $_GET["id_funcion"];
			//REALIZAMOS LA CONSULTA A LA BD
			$consulta = new ConsultasDB;
			//LE ASIGNAMOS A datos EL REUSLTADO DE LA CONSULTA UN ARRAY
			$datos = $consulta->consultarOneDatos("tbl_funciones", "id", $id_funcion);
		}
		  else{
		  	$this->redirect(Yii::app()->request->baseUrl."/site/");
		  }

		$this->render('comprar_boleta', array('datos'=>$datos));
	}

	//
	//
	public function actionRespuesta_Boleta(){
		$model = new BoletaForm;
		$msg = "";
		$datos = "";

		if (isset($_POST["BoletaForm"])) {

			$model->attributes=$_POST["BoletaForm"];

			if (!$model->validate()) {

				$model->addError('email', 'error al enviar el formulario');

			}else{
				//PRIMERO VAMOS A VALIDAR QUE YA NO SE HAYA
				//ENVIADO LA BOLETA A UN EMAIL
				//lo comprobamos con la refencia de payco almacenada en la tb de compras
				$ref_payco = $model->ref_payco;

				//hacemos la consulta
				$consulta = new ConsultasDB;
				$datos = $consulta->consultarOneDatos('tbl_compras', 'ref_payco', $ref_payco);
				$existe = false;
				//comprobamos si nos trae datos
			 	foreach ($datos as $fila) {
			 		$existe = true;
			 	}
				if ($existe == false) {

									//UNA VEZ ENVIADO EL EMAIL Y LOS DATOS SIN PROBLEMAS
				//REALIZAMOS LA INSERSION DE LOS DATOS DE LA COMPRA
				$consulta = new ConsultasDB;
				 $consulta->registrar_compras(
				 	$model->id_funcion,
				 	$model->ref_payco,
				 	$model->email,
				 );

				 //ahora tenemos que consultar los datos de la boleta
				 // para mandarlos al cliente por email

				 //CREAMOS las variables necesarias
				 $id_funcion = $model->id_funcion;
				 //con la ref_payco se valida la boleta
				 $ref_payco = $model->ref_payco;
				 $teatro = "";
				 $salon = "";
				 $titulo_pelicula = "";
				 $hora_funcion = "";
				 $precio_boleta = "";

				 //consulta
				 $conexion = Yii::app()->db;
				 $consulta = "SELECT * FROM tbl_funciones
				 WHERE id='$id_funcion' ";
				 $resultado = $conexion->createCommand($consulta);
			 	 $filas = $resultado->query();
			 	 $existe = false;

			 	 foreach ($filas as $fila) {
			 	 	//reemplazamos el valor de las variables
			 	 	//por los datos
			 	 	 $teatro = $fila["teatro"];
					 $salon = $fila["salon"];
					 $titulo_pelicula = $fila["titulo_pelicula"];
					 $hora_funcion = $fila["hora_funcion"];
					 $precio_boleta = $fila["precio_boleta"];
			 	 }

			 	 //AHORA PROCEDEMOS A ENVIAR EL EMAIL
			 	 //
			 	 $mail = new EnviarEmail;
				 $subject = utf8_decode("Compra Boleta - Pelicula ".$titulo_pelicula);
				 $message = utf8_decode("
				 		<h2>Pelicula: ". $titulo_pelicula ." </h2>
				 		</br>
						<table class='table table-inverse'>
							<thead>
								<tr>
									<th>Teatro</th>
									<th>Salon</th>
									<th>Titulo Pelicula</th>
									<th>Hora Funcion</th>
									<th>Precio Boleta</th>
									<th>Ref Compra:</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>".$teatro."</td>
									<td>".$salon."</td>
									<td>".$titulo_pelicula."</td>
									<td>".$hora_funcion."</td>
									<td>".$precio_boleta."</td>
									<td>".$ref_payco."</td>
								</tr>
							</tbody>
						</table>
				 	");

				 $mail->enviar(
				 	array(Yii::app()->params['adminEmail'], Yii::app()->name),
				 	array($model->email, 'compras'),
				 	$subject,
				 	$message
				 );
				 // UNA VES ENVIADO EL EMAIL
				 // REDIRECIONAMOS A UNA VISTA DICIENDO QUE SE FINALIZO EL PROCESO
				 $this->redirect(Yii::app()->request->baseUrl."/site/finalizar_compra/");

				}else if($existe == true){
					$msg = '<div class="alert alert-danger" role="alert">
						  <h3>Error, ya se envio el boleto por email</h3>
						</div></br>';
				}
			}
		}

		$this->render('respuesta_boleta', array( 'model'=>$model, 'msg'=>$msg));
	}

	//ACTION VISTA DE LA COMPRA FINALIZADA
	//
	public function  actionFinalizar_Compra(){
		$this->render('finalizar_compra');
	}

	//ACTION VISTA PAGINA DE WEB SERVICE
	//
	public function actionWeb_Service(){
		//DECLARAMOS LAS VARIABLES QUE NECESITAREMOS
		$model = "";
		$data = "";
		//INTANCIAMOS LA CLASE DE LOS WEB SERVICES
		$direccion = new WebServices;
		//UTILIZAMOS UNA FUNCION QUE TRAE LA RUTA
		$data = $direccion->API('restaurantes');
		//pasamos la data
		$json = file_get_contents($data);
		//DESCOMPONEMOS A JSON LA DATA
		$model = json_decode($json);

		//la mandamos a la vista
		$this->render('web_service', array('model'=>$model));
	}
}