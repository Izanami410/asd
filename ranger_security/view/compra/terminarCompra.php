<?php
if(!isset($_POST["id_prove"]) || !isset($_POST["estado"])) exit;

session_start();



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


$ahora = date("Y-m-d");
$estado = $_POST["estado"];
$id_prove = $_POST["id_prove"];

$sentencia = $base_de_datos->prepare("INSERT INTO compra(fecha, estado) VALUES (?,?);");
$sentencia->execute([$ahora,$estado]);

$sentencia = $base_de_datos->prepare("SELECT id_compra FROM compra ORDER BY id_compra DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idCompra = $resultado === false ? 1 : $resultado->id_compra;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_comprados(id_art, id_prove,id_compra, canti) VALUES (?, ?, ?,?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE articulo SET stock = stock + ? WHERE id_art = ?;");
foreach ($_SESSION["carrito"] as $articulo) {

    $sentencia->execute([$articulo->id_art, $id_prove,$idCompra, $articulo->canti]);
    $sentenciaExistencia->execute([$articulo->canti, $articulo->id_art]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./nuevo.php?status=1");
?>