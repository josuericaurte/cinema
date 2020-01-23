<?php
	class BoletaForm extends CFormModel{

		public $email;
		public $ref_payco;
		public $id_funcion;

		public function rules(){
			return array(
				//--------------------------------------------
				// VALIDACION TODOS LOS CAMPOS
				// //--------------------------------------------
				array(
					'email, ref_payco, id_funcion',
					'required',
					'message'=>'Este campo es requerido',
				),

				array('email',
				      'email',
				      'message'=>"El formato de email no es correcto"),

				array(
					'email',
					'length',
					'min'=>8,
					'tooShort'=>'minimo 8 caracteres',
					'max'=>80,
					'tooLong'=>"maximo 80 caracteres"
				),
			);
		}
	}
