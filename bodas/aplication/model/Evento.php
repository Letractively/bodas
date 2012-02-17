<?php
	class Evento{

		private $id_evento;
		private $texto_acerca;
		private $imagen_acerca;
		private $texto_expo;
		private $texto_desfile;
		private $texto_coro;
		private $texto_charlas;

		public function __construct($id = 0){
			$this->id = $id;
			if($this->id > 0){

				$sql = "SELECT 
						e.id_evento,
						e.texto_acerca,
						e.imagen_acerca,
						e.texto_expo,
						e.texto_desfile,
						e.texto_coro,
						e.texto_charlas
					FROM eventos e
					WHERE e.id_evento =".$id;

				$qry = new Consulta($sql);
				if($qry->NumeroRegistros() > 0){
					$rw = $qry->VerRegistro();
					$this->id_evento 		= $rw['id_evento'];
					$this->texto_acerca		= $rw['texto_acerca'];
					$this->imagen_acerca	= $rw['imagen_acerca'];
					$this->texto_expo		= $rw['texto_expo'];
					$this->texto_desfile	= $rw['texto_desfile'];
					$this->texto_coro		= $rw['texto_coro'];
					$this->texto_charlas	= $rw['texto_charlas'];
				}					
			}
		}

		public function __get($atributo){
			return $this->$atributo;
		}
		
		public function enviar_correo(){
				$mens="
					Estimados Señores de BODAS:

					El Señor(a): ".$_POST['txtNombres']." ".$_POST['txtApellido']." envio a travez del formulario de 'Eventos' de bodas los siguientes datos:
					Email: ".$_POST['txtEmail']." 
					Telefono: ".$_POST['txtTelefono1']."
					Nombre de medio: ".$_POST['txtNombreMedio']." 
					Pagina web: ".$_POST['txtPaginaWeb']." 
					Medio(s): ".$_POST['Medios']." 
					Documento: ".$_POST['txtDocumento']." 
					Cargo: ".$_POST['txtCargo']." 
					Telefonos: ".$_POST['txtTelefono2']." 
					
					BODAS
						
				";

				@mail('contacto@bodas.com.pe','Eventos',$mens,'from: Eventos Portal BODAS');
		}

		public function enviar_correo_index(){
				$mens="
					Estimados Señores de BODAS:

					El Señor(a): ".$_POST['txtINombres']." envio a travez del formulario de 'Inscribete aquí' de bodas los siguientes datos:
					Dirección: ".$_POST['txtIDireccion']." 
					Distrito: ".$_POST['txtIDistrito']."
					Teléfono: ".$_POST['txtITelefono']." 
					Celular: ".$_POST['txtICelular']." 
					Email: ".$_POST['txtIEmail']." 
					Fecha de boda: ".$_POST['txtIFechaBoda']."
					Como se entero: ".$_POST['rdoEntero']."

					BODAS
				";

				$Query = new Consulta("INSERT INTO incripciones_index VALUES('',
					'".strtoupper( $this->stripAccents($_POST['txtINombres']) )."',
					'".strtoupper( $this->stripAccents($_POST['txtIDireccion']) )."',
					'".strtoupper( $this->stripAccents($_POST['txtIDistrito']) )."',
					'".strtoupper( $this->stripAccents($_POST['txtITelefono']) )."',
					'".strtoupper( $this->stripAccents($_POST['txtICelular']) )."',
					'".strtoupper( $this->stripAccents($_POST['txtIEmail']) )."',
					'".strtoupper( $this->stripAccents($_POST['txtIFechaBoda']) )."',
					'".strtoupper( $this->stripAccents($_POST['rdoEntero']) )."'
				)");

				@mail('contacto@bodas.com.pe','Eventos',$mens,'from: Formulario Portal BODAS');
		}

		public function stripAccents($string){
			return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		}
	}
?>