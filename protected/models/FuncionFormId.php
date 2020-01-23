<?php
	class FuncionFormId extends CFormModel{

		public $id_funcion;

		public function rules(){
			return array(
				//--------------------------------------------
				// VALIDACION TODOS LOS CAMPOS
				// //--------------------------------------------
				array(
					'id_funcion',
					'required',
					'message'=>'Este campo es requerido',
				),

			);
		}
	}