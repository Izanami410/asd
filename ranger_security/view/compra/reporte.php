
<?php
//Incluimos el fichero de conexion
Class dbConexion{
/* Variables de conexion */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "ranger_security";
var $conn;
//Funcion de conexion MySQL
function getConexion() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* Revisamos la conexion */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
//Incluimos la libreria PDF
include_once('../../assets/fpdf/fpdf.php');

class PDF extends FPDF
{
// Funcion encargado de realizar el encabezado
function Header()
{
// Logo
$this->Image('../../assets/images/logo.png',10,-1,30);
$this->SetFont('Arial','B',13);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(95,10,'Listado de compras',1,0,'C');
// Line break
$this->Ln(20);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('id_compra'=>'#', 'fecha'=> 'Fecha', 'nomar'=> 'Producto','canti'=> 'Cantidad');

$result = mysqli_query($connString, "SELECT  productos_comprados.id_pcomp, articulo.id_art, articulo.nomar, articulo.stock,articulo.detalle,  productos_comprados.canti, compra.id_compra, compra.fecha, compra.estado  FROM productos_comprados INNER JOIN articulo ON productos_comprados.id_art = articulo.id_art 
 INNER JOIN compra ON  productos_comprados.id_compra=compra.id_compra  WHERE compra.estado ='1'  GROUP BY productos_comprados.id_pcomp") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM compra");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 35, 130,45, 35);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'#',1);
$pdf->Cell(35,12,'FECHA',1);
$pdf->Cell(130,12,'ARTICULOS',1);
$pdf->Cell(45,12,'STOCK',1);
$pdf->Cell(35,12,'CANTIDAD',1);



$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['id_compra'],1);
$pdf->Cell($w[1],6,$row['fecha'],1);
$pdf->Cell($w[2],6,$row['nomar'],1);
$pdf->Cell($w[3],6,$row['stock'],1);
$pdf->Cell($w[4],6,$row['canti'],1);





$pdf->Ln();
}
$pdf->Output('compra.pdf', 'D');
?>