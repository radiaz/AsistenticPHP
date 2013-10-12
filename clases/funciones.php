<?php 

class funciones{

	/**
	 * Clase con las funciones PHP
	 */

	private $dato_limpio;
	private $dato_encriptado;

	private $pass;

	private $mail;
	private $para;
	private $asunto;
	private $header;
	private $mensaje;
        
        private $ano;
          
	private $hora;

	private $fecha;
	
	private $dia;

	/**
	 * toma el dato que llega e incia el proceso de limpieza
	 * @param unknown_type $dato
	 */

	function set_dato_limpio($dato){

		$this->dato_limpio = trim($dato);
		$this->dato_limpio = strtr($this->dato_limpio,"Ã€Ã�Ã‚ÃƒÃ„Ã…Ã Ã¡Ã¢Ã£Ã¤Ã¥Ã’Ã“Ã”Ã•Ã–Ã˜Ã²Ã³Ã´ÃµÃ¶Ã¸ÃˆÃ‰ÃŠÃ‹Ã¨Ã©ÃªÃ«Ã‡Ã§ÃŒÃ�ÃŽÃ�Ã¬Ã­Ã®Ã¯Ã™ÃšÃ›ÃœÃ¹ÃºÃ»Ã¼Ã¿Ã‘Ã±","aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
		$this->dato_limpio = strtr($this->dato_limpio,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
		$this->dato_limpio = preg_replace('#([^.a-z0-9]+)#i', '-', $this->dato_limpio);
		$this->dato_limpio = preg_replace('#-{2,}#','-',$this->dato_limpio);
		$this->dato_limpio = preg_replace('#-$#','',$this->dato_limpio);
		$this->dato_limpio = preg_replace('#^-#','',$this->dato_limpio);
	}

	/**
	 * Retorna el dato ingresado sin caracteres especiales
	 * @return Ambigous <mixed, string>
	 */

	function get_dato_limpio(){

		return $this->dato_limpio;

	}

	/**
	 * Encripta un dato
	 * @param unknown_type $dato
	 */
	function set_dato_encriptada($dato){

		$this->dato_encriptado = sha1(md5($dato));

	}

	/**
	 * Retorna el dato encriptado
	 * @return string
	 */
	function get_dato_encriptado(){

		return $this->dato_encriptado;


	}

	/**
	 * Inicia la sesion y devuelve un numero de control
	 * @param unknown $prinom
	 * @param unknown $segnom
	 * @param unknown $priape
	 * @param unknown $segape
	 * @param unknown $id
	 * @param unknown $tipuser
	 *
	 */

	function create_session($prinom,$segnom,$priape,$segape,$id,$tipuser){
		session_set_cookie_params(86400);
		session_start();
		$_SESSION['prinom']=$prinom;
		$_SESSION['segnom']=$segnom;
		$_SESSION['priape']=$priape;
		$_SESSION['segape']=$segape;
		$_SESSION['id']=$id;
		$_SESSION['tipuser']=$tipuser;
		$_SESSION['estado'] ="enable";




	}

	/**
	 * Destruye la sesion y devulve un valor para validacion
	 * @return number
	 */

	function close_session() {

		session_start();
		session_unset();
		session_destroy();
	}

	/**
	 * Devuelve una contraseÃ±a aleatoria
	 * @return string
	 */

	function claveRandom() {

		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$this->pass = '' ;
		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$this->pass = $this->pass . $tmp;
			$i++;
		}
		return $this->pass;
	}

	/**
	 * prepara correos para enviar desde el servidor
	 * @param unknown $para
	 * @param unknown $asunto
	 * @param unknown $mensaje
	 */

	function set_mailto($para,$asunto,$mensaje) {
		 
		$this->mail = "noreply@asistentic.com";
		$this->para = $para;
		$this->asunto = $asunto;
		 
		$this->header = "From: AsistenTIC " . $this->mail . " \r\n";
		$this->header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$this->header .= "Mime-Version: 1.0 \r\n";
		$this->header .= "Content-Type: text/plain";
		 
		$this->mensaje = $mensaje;
	}

	/**
	 * Envia el mensaje guardado desde el servidor
	 */

	function mailto() {
		 
		mail($this->para, $this->asunto, utf8_decode($this->mensaje), $this->header);
		 
	}

         /**
	 * devuelve el ano del servidor para la region de "America/bogota"
	 * format aaaa
	 */
	
	function get_ano() {
		date_default_timezone_set("America/Bogota");
		$this->ano=date("Y");
		return $this->ano;
	}
        
	/**
	 * devuelve la hora del servidor para la region de "America/Bogota";
	 * formato horas:minutos:segundos
	 * @return string
	 */

	function get_hora(){
		 
		date_default_timezone_set("America/Bogota");
		$this->hora=date("H:i:s");
		return $this->hora;
		 
	}

	/**
	 * devuelve la fecha del servidor para la region de "America/Bogota"
	 * formato aaaa-mm-dd
	 * @return string
	 */

	function get_fecha(){
		date_default_timezone_set("America/Bogota");
		$this->fecha=date("Y:m:d");
		return $this->fecha;

		 
		 
	}
	
	function get_dia(){
		date_default_timezone_set("America/Bogota");
		$this->dia=date(D);
		if ($this->dia=="Mon"){
			$this->dia="lunes";
			
		}
		if ($this->dia=="Tue"){
			$this->dia="martes";
				
		}
		
		if ($this->dia=="Wed"){
			$this->dia="miercoles";
				
		}
		
		if ($this->dia=="Thu"){
			$this->dia="jueves";
				
		}
		
		if ($this->dia=="Fri"){
			$this->dia="viernes";
				
		}
		if ($this->dia=="Sat"){
			$this->dia="sabado";
		
		}
		
		
		
			
		return $this->dia;
	
			
			
	}




}


?>