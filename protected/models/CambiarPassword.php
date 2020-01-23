<?php
	class CambiarPassword extends CFormModel{

		public $password;
		public $nuevo_password;
		public $repetir_nuevo_password;

		public function rules(){
			return array(

				//--------------------------------------------
				// VALIDACION TODOS LOS CAMPOS
				// //--------------------------------------------
				array(
					'password, nuevo_password, repetir_nuevo_password',
					'required',
					'message'=>'Este campo es requerido',
				),

				array('password, nuevo_password, repetir_nuevo_password',
					  'match',
					  'pattern'=>'/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i',
					  'message'=>"Obligatorio solo letras y numeros"
					),

				//--------------------------------------------
				// VALIDACION CAMPO REPETIR PASSWORD
				// //--------------------------------------------
				array('nuevo_password',
				      'compare',
				      'compareAttribute'=>'repetir_nuevo_password',
				      'message'=>'Las nuevas password no coinciden',
				  ),

			);
	}

}