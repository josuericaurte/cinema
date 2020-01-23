<?php

class UsuarioController extends Controller
{

	public function filters(){
		return array('accessControl');
	}

	public function accessRules(){
		return array(
			array(
				'deny',
				'actions' => array('index','configuracion', 'funciones', 'nueva_funcion'),
				'users'=>array('?'),
			)
		);
	}

	public function actionIndex(){
		$this->render('index');
	}

	// ACTION PARA LA CONFIGURACION - CAMBIAR PASSWORD

	public function actionConfiguracion()
	{
		$model = new CambiarPassword;
		$msg = "";

		if (isset($_POST["CambiarPassword"])) {

			$model->attributes=$_POST["CambiarPassword"];

			if (!$model->validate()) {

				$model->addError('repetir_password', 'Error al enviar el formulario');

			}else{
				//consulta para actualizar password
				$conexion = Yii::app()->db;
				//nombre de usuario
				$username = Yii::app()->user->name;

				//nuevo password
				$npassword = sha1($model->nuevo_password);

				$consulta = "UPDATE tbl_user SET password='$npassword'
				WHERE username='$username' ";
				$resultado = $conexion->createCommand($consulta)->execute();

				if ($resultado) {
					$msg = '<div class="alert alert-primary" role="alert">
								  Enhorabuena, se ha actualizado el password
								</div></br>';
					$model->unsetAttributes();

				}else{
					$msg = '<div class="alert alert-primary" role="alert">
								Error, no se ha podido cambiar el password
								</div></br>';
					$model->unsetAttributes();
				}
			}
		}

		$this->render('configuracion', array('model'=>$model, 'msg'=>$msg));

	}

	// ACTION PARA MOSTRAR / LISTAS LAS FUNCIONES

	public function actionFunciones(){
		$model = new FuncionFormId;
		$datos = "";
		$msg = "";
		//REALIZAMOS LA CONSULTA A LA BD, MANDANDO COMO PARAMETRO LA TABLA
		$consulta = new ConsultasDB;
		//LE ASIGNAMOS A MODEL EL REUSLTADO DE LA CONSULTA UN ARRAY
		$datos = $consulta->consultarDatos("tbl_funciones");

		if (isset($_POST["FuncionFormId"])) {

			$model->attributes=$_POST["FuncionFormId"];

			if (!$model->validate()) {
				//SI LOS CAMPOS NO CUMPLEN LA VALIDACION MOSTRAMOS EL ERROR
				$msg = '<div class="alert alert-danger" role="alert">
						  Error, no se ha podido enviar el formulario
						</div></br>';

			}else{
				//ELIMINAMOS EL VALOR QUE TRAE LA VARIABLE DELETE, EL ID
				$consulta = new ConsultasDB;
				 $consulta->eliminar_funcion(
				 	"tbl_funciones",
				 	 "id",
				 	 $model->id_funcion
				 );

				 $this->redirect(Yii::app()->request->baseUrl."/usuario/funciones?alert=eliminado");
			}
		}

		//MANDAMOS A funciones el contenido de model
		$this->render('funciones', array('model'=>$model, 'datos'=>$datos, 'msg'=>$msg));
	}
	///////////////
	/////////////////////////////////////////////////////////////////

	// ACTION PARA AGREGAR NUEVAS FUNCiones

	public function actionNueva_Funcion(){
		$model = new FuncionForm;
		$msg = "";

		if (isset($_POST["FuncionForm"])) {

			$model->attributes=$_POST["FuncionForm"];

			if (!$model->validate()) {
				//SI LOS CAMPOS NO CUMPLEN LA VALIDACION MOSTRAMOS EL ERROR
				$msg = '<div class="alert alert-danger" role="alert">
						  Error, no se ha podido enviar el formulario
						</div></br>';

			}else{
				// SI SE ENVIA EL FORMULARIO CON EXITO, INSERTAMOS LOS DATOS
				// EN LA BD
				 $consulta = new ConsultasDB;
				 $consulta->nueva_funcion(
				 	$model->teatro,
				 	$model->salon,
				 	$model->titulo_pelicula,
		 			$model->precio_boleta,
		 			$model->hora_funcion
				 );

				 //ENVIAMOS UN MENSAJE PARA CONFIRMAR QUE SE INSERTARON LOS DATOS
				 $msg = '<div class="alert alert-primary" role="alert">
						  Enhorabuena, se ha agregado la Funcion con exito
						</div></br>';

				$model->unsetAttributes();

			}
		}

		$this->render('nueva_funcion', array('model'=>$model, 'msg'=>$msg));
	}

	/////////////////////////////////////////////////////////
	///
	// ACTION PARA EDITAR FUNCIONES
	public function actionEditar_Funcion(){
		$datos = "";
		$msg = "";
		$model = "";

		if (isset($_GET["idFuncion"])) {
			$id_funcion = $_GET["idFuncion"];
			//REALIZAMOS LA CONSULTA A LA BD
			$consulta = new ConsultasDB;
			//LE ASIGNAMOS A datos EL REUSLTADO DE LA CONSULTA UN ARRAY
			$datos = $consulta->consultarOneDatos("tbl_funciones", "id", $id_funcion);


			// ACTUALIZACION DE DATOS
			$model = new FuncionForm;
			if (isset($_POST["FuncionForm"])) {

			$model->attributes=$_POST["FuncionForm"];

			if (!$model->validate()) {
				//SI LOS CAMPOS NO CUMPLEN LA VALIDACION MOSTRAMOS EL ERROR
				$msg = '<div class="alert alert-danger" role="alert">
						  Error, no se ha podido enviar el formulario
						</div></br>';

			}else{
				//SI PASA EL FORMULARIO ACTUALIZAMOS LOS DATOS
				 $consulta = new ConsultasDB;
				 $consulta->editar_funcion(
				 	$model->teatro,
				 	$model->salon,
				 	$model->titulo_pelicula,
		 			$model->precio_boleta,
		 			$model->hora_funcion,
		 			$model->id_funcion
				 );


				//CUANDO SE ACTUALICEN LOS DATOS MANDAMOS A LA VISTA FUNCIONES
				//CON UN PARAMETRO GET PARA MOSGTRAR QUE SE ACTULIZO CON UNA ALERTA DE b4
				$this->redirect(Yii::app()->request->baseUrl."/usuario/funciones?alert=actualizo");


			}

			}

		}else{
			$this->redirect(Yii::app()->request->baseUrl."/usuario/funciones");
		}

		//MANDAMOS  el contenido de a editar_funcion
		$this->render('editar_funcion', array('datos'=>$datos, 'model'=>$model, 'msg'=>$msg));
	}





	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}