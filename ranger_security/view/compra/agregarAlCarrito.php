<?php
if (!isset($_POST["nomar"])) {
    return;
}

$nomar = $_POST["nomar"];

$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "ranger_security";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
     $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->prepare("SELECT * FROM articulo WHERE nomar = ? LIMIT 1;");
$sentencia->execute([$nomar]);
$articulo = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$articulo) {
    header("Location: ./nuevo.php?status=4");
    exit;
}
# Si no hay existencia id...

session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->nomar === $nomar) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $articulo->canti = 1;
    
    array_push($_SESSION["carrito"], $articulo);
} else {
    
    $cantidadExistente = $_SESSION["carrito"][$indice]->canti;
    
    
    $_SESSION["carrito"][$indice]->canti++;
  
}
header("Location: ./nuevo.php");
