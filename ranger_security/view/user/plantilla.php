<?php
require "consulta.php";
$usuario = new Consulta();
$salida = "";
$salida .= "<table>";
$salida .= "<thead> <th>ID</th> <th>Nombre</th><th>Stock</th><th>Detalle</th><th>Categoria</th></thead>";
foreach($usuario->buscar() as $r){
    $salida .= "<tr> <td>".$r->id_art."</td> <td>".$r->nomar."</td> <td>".$r->stock."</td> <td>".$r->detalle."</td> <td>".$r->nomcat."</td></tr>";
}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=articulos_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;