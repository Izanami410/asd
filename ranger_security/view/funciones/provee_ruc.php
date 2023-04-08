<?php

$conexion = mysqli_connect("localhost","root","","ranger_security");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM proveedor WHERE id_prove = $el_continente");



while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_prove']. '">' . $row['ruc'] . '</option>' . "\n";
}
