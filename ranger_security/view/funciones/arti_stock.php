<?php

$conexion = mysqli_connect("localhost","root","","ranger_security");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM articulo WHERE id_art = $el_continente");



while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_art']. '">' . $row['stock'] . '</option>' . "\n";
}
