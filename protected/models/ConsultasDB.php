<?php
   // CLASE PARA REALIZAR CONSULTAS A LA BASE DE DATOS
	class ConsultasDB{

		// REALIZA UNA CONSULTA DE TODOS LOS DATOS EN LA TABLA
		public function consultarDatos($tabla){
			$conexion = Yii::app()->db;

			$consulta = " SELECT * from $tabla ORDER BY id DESC";
			$resultado = $conexion->createCommand($consulta);
			$filas = $resultado->query();

			return $filas;
		}

		//REALIZA CONSULTA DE UN SOLO DATO EN LA BD
		public function consultarOneDatos($tabla, $donde, $dato){
			$conexion = Yii::app()->db;

			$consulta = " SELECT * from $tabla WHERE $donde='$dato' ";
			$resultado = $conexion->createCommand($consulta);
			$filas = $resultado->query();

			return $filas;
		}

		// ELIMINA UN DATO DE LA BASE DE DATOS
		public function eliminar_funcion($tabla, $donde, $dato){
			$conexion = Yii::app()->db;

			$consulta = "DELETE FROM $tabla WHERE $donde=$dato ";

			$resultado = $conexion->createCommand($consulta);
		 	$resultado->execute();
		}

		// CON ESTA CONSULTA INSERTAMOS UNA NUEVA FUNCION EN LA BD
		public function  nueva_funcion($teatro, $salon, $titulo_pelicula,
		 $precio_boleta, $hora_funcion){

		 	$conexion = Yii::app()->db;

			$consulta = "INSERT INTO tbl_funciones (teatro, salon, titulo_pelicula,
			 hora_funcion, precio_boleta)  VALUES ('$teatro', '$salon', '$titulo_pelicula',
			 '$hora_funcion', '$precio_boleta')";

		 	$resultado = $conexion->createCommand($consulta);
		 	$resultado->execute();

		}

		//CON ESTA CONSULTA VAMOS A ACUTALIZAR LOS DATOS DEL FORMULARIO
		public function  editar_funcion($teatro, $salon, $titulo_pelicula,
		 $precio_boleta, $hora_funcion, $id_funcion){

		 	$conexion = Yii::app()->db;

			$consulta = "UPDATE tbl_funciones SET teatro='$teatro', salon='$salon', titulo_pelicula='$titulo_pelicula', precio_boleta = '$precio_boleta', hora_funcion ='$hora_funcion' WHERE id='$id_funcion'";

		 	$resultado = $conexion->createCommand($consulta);
		 	$resultado->execute();

		}

		//CON ESTA CONSILTA INSERTAMOS EN LA BD LAS COMPRAS REALIZADAS
		//
		public function registrar_compras($id_funcion, $ref_payco, $email){

			$conexion = Yii::app()->db;

			$consulta = "INSERT INTO tbl_compras (id_funcion, ref_payco, email)  VALUES ('$id_funcion', '$ref_payco', '$email')";

		 	$resultado = $conexion->createCommand($consulta);
		 	$resultado->execute();
		}
	}