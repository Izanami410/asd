<?php

$conexion = mysqli_connect("localhost","root","","ranger_security");

$query = $conexion->query("SELECT * FROM categoria");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_cat']. '">' . $row['nomcat'] . '</option>' . "\n";
}
