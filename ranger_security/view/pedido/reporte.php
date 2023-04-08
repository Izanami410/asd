
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
$this->Cell(95,10,'Lista de los pedidos',1,0,'C');
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
$display_heading = array('idpedido'=>'Nº', 'nomar'=> 'Articulos','nombre'=> 'Trabajador','cantid'=> 'Cantidad','fechare'=> 'Fecha');

$result = mysqli_query($connString, "SELECT pedido.idpedido, articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, trabajador.id_tra, trabajador.nombre, trabajador.dni, trabajador.apellido, trabajador.correo, pedido.fechare, pedido.cantid,pedido.estado FROM pedido INNER JOIN articulo ON pedido.id_art = articulo.id_art INNER JOIN trabajador ON pedido.id_tra = trabajador.id_tra") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM pedido");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 90, 70,30,50,30);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,utf8_decode('Nº'),1);
$pdf->Cell(90,12,'ARTICULOS',1);
$pdf->Cell(70,12,'DETALLE',1);
$pdf->Cell(30,12,'CANTIDAD',1);
$pdf->Cell(50,12,'TRABAJADOR',1);
$pdf->Cell(30,12,'FECHA',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idpedido'],1);
$pdf->Cell($w[1],6,utf8_decode($row['nomar']),1);
$pdf->Cell($w[2],6,utf8_decode($row['detalle']),1);
$pdf->Cell($w[3],6,utf8_decode($row['cantid']),1);
$pdf->Cell($w[4],6,utf8_decode($row['nombre']),1);
$pdf->Cell($w[5],6,utf8_decode($row['fechare']),1);


$pdf->Ln();
}
$pdf->Output('pedidos.pdf', 'D');
?>