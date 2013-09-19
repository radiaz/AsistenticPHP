<?php

/**
 * Clase para el manejo de la base de datos
 * @author orochijuan
 *
 */

class DataBase {
	
	private $result;
	private $query;
	private $values=array();
	private $num_rows;
	
	   /**
	    * Guarda la consulta enviada
	    * @param unknown $query
	    */
	
       public function set_query($query){
       	
       	$this->query=$query;
        
       	
       }
       
         /**
        * Ejecuta la consulta
        * @param unknown_type $ruta
        */
       
       public function exec_query($ruta) {
          
       	  include $ruta.'conexion.php';
          $this->result=mysql_query($this->query,$link);
          $this->num_rows=mysql_affected_rows($link);
          mysql_close($link);
       }
       
       /**
        * Devuelve los campos obtenidos en la consulta o false en caso de que sea nulo
        * @return multitype:object |boolean
        */
       
       public function get_values(){
       	$this->values="";
       	 if(mysql_num_rows($this->result)){
       	 	while ($values=mysql_fetch_array($this->result)){
       	 		$this->values[]=$values;
       	 		
       	 	}
       	 	
       	 	return $this->values;
       	 	
       	 }else{
       	 	$this->values[]=array("empty");
       	 	return $this->values;
       	 	
       	 }
        
       	
       	
       }
       
       /**
        * Devuelve el numero de columnas afectas por la consulta usar para validar
        * insert,update,delete etc...
        * @return number
        */
       
       public function get_num_rows(){
       	
       	return $this->num_rows;
       	
       }
}

?>