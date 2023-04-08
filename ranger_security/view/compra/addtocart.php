<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();
if(!empty($_POST)){
	if(isset($_POST["id_art"])  && isset($_POST["canti"]) && isset($_POST["stock"]) ){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["cart"])){
			$_SESSION["cart"]=array( array("id_art"=>$_POST["id_art"], "canti"=>$_POST["canti"],"stock"=>$_POST["stock"]));
		}else{
			// apartie del segundo producto:
			$cart = $_SESSION["cart"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["id_art"]==$_POST["id_art"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($cart, array("id_art"=>$_POST["id_art"],"canti"=> $_POST["canti"],"stock"=> $_POST["stock"]));
				$_SESSION["cart"] = $cart;
			}
		}
		print "<script>window.location='nuevo.php';</script>";
	}
}

?>

