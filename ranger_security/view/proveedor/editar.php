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
	if(isset($_POST['update'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			
			$ruc  = $_POST['ruc'];
			$nombre = $_POST['nombre'];
			$correo = $_POST['correo'];
			$telef = $_POST['telef'];
			$direcci = $_POST['direcci'];
			$ciudad = $_POST['ciudad'];
			
			
$sql = "UPDATE proveedor SET ruc = '$ruc', nombre = '$nombre', correo = '$correo', telef = '$telef',direcci = '$direcci',ciudad = '$ciudad' WHERE id_prove = '$id'";
			//if-else statement in executing our query
		$_SESSION['message'] = ( $db->exec($sql) ) ? 'Proveedor actualizado correctamente' : 'No se puso actualizar el proveedor';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: mostrar.php');

?>