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
			
			$nomcat  = $_POST['nomcat'];
			$descripcion = $_POST['descripcion'];
			
$sql = "UPDATE categoria SET nomcat = '$nomcat', descripcion = '$descripcion' WHERE id_cat = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Categoria actualizado correctamente' : 'No se puso actualizar la categoria';

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