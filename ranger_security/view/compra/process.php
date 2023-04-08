<?php 
session_start();
$con  = new mysqli("localhost","root","","ranger_security");
if(!empty($_POST)){
$q1 = $con->query("insert into compra(fecha,estado,id_prove) value(NOW(), \"$_POST[estado]\", \"$_POST[id_prove]\")");
if($q1){
$id_compra = $con->insert_id;
foreach($_SESSION["cart"] as $c){
$q1 = $con->query("insert into productos_comprados(id_art,canti,id_compra) value($c[id_art],$c[canti],$id_compra)");
$q1 = $con->query
			("update articulo SET stock = '$c[stock]' + $c[canti] WHERE id_art = $c[id_art];");

			
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Compra procesada exitosamente');window.location='mostrar.php';</script>";
?>