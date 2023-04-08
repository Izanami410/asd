<?php
// VARIABLES GENERALES:
$servidor="localhost"; // También valdría "localhost"
$usuario_bd="root";
$clave_bd="";
$basedatos="ranger_security";
$tabla="pedido"; // Con los campos: id (int autoinc.), nombre(char 50) y telefono(char 10).
$conexion=mysqli_connect($servidor,$usuario_bd,$clave_bd);
if (!$conexion){
    echo "ERROR: Imposible establecer conexión con el servidor.<br>\n";
    exit; 
    // Si no pudo conectarse nos salimos del código php directamente...
}

$resultado=mysqli_select_db($conexion,$basedatos);


if (!$resultado){
    echo "ERROR: Imposible seleccionar la base de datos $basedatos.<br>\n";
}

if(isset($_POST["agregar"])) {
    $id_art = $_POST["id_art"];
    $id_tra = $_POST["id_tra"];
    $cantid = $_POST["cantid"];
    $fechare=$_POST['fechare'];
    $estado = $_POST['estado'];
    // verifico que sea menor o igual el pedido al stock
    $maxStock = '99';
    if($cantid > $maxStock) {
        echo "La cantidad es superior a lo que hay en la tienda";
    }else{ 
        // actualizo la db con los datos nuevos!
        $query=mysqli_query($conexion, "insert into pedido(id_art,id_tra, cantid, fechare, estado) 
  value('$id_art','$id_tra', '$cantid', '$fechare', '$estado' )");

  $query=mysqli_query($conexion,"UPDATE articulo  SET stock = stock - '$cantid' WHERE id_art = '$id_art'");

    if ($query) {
    header('location: mostrar.php'); 
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
    }
}



?>