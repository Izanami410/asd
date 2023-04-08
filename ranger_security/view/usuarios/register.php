<?php
session_start();
Class Connection{
 
	private $server = "mysql:host=localhost;dbname=ranger_security";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}
 
if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO usuarios (nombre, usuario, correo, contra, estado,privilegio) VALUES (:nombre,:usuario,:correo,:contra,:estado,:privilegio)");

		
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'],':usuario' => $_POST['usuario'],':correo' => $_POST['correo'],':contra' => MD5($_POST['contra']),':estado' => $_POST['estado'],':privilegio' => $_POST['privilegio']))) ? 'Guardado correctamente' : 'Algo salió mal. No se puede agregar';	

	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: mostrar.php');
	
?>

