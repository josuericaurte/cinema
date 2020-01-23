<?php
	class FuncionForm extends CFormModel{

		public $teatro;
		public $salon;
		public $titulo_pelicula;
		public $precio_boleta;
		public $hora_funcion;
		public $id_funcion;

		public function rules(){
			return array(
				//--------------------------------------------
				// VALIDACION TODOS LOS CAMPOS
				// //--------------------------------------------
				array(
					'teatro, salon, titulo_pelicula, precio_boleta, hora_funcion, id_funcion',
					'required',
					'message'=>'Este campo es requerido',
				),

			);
		}
	}