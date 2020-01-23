<?php
   // CLASE PARA los serivioc web
	class WebServices{

		function API($ruta){
			$url = "http://localhost/Api_restaurantes-master/";
			$respuesta = $url . $ruta;
			return $respuesta;
		}

	}