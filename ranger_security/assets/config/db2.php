<?php
// simple conexion a la base de datos
function connect(){
	return new mysqli("localhost","root","","ranger_security");
}

?>