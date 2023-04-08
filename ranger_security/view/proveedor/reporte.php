
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
$this->Cell(95,10,'Lista de los proveedores',1,0,'C');
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
$display_heading = array('id_prove'=>'#', 'ruc'=> 'RUC', 'nombre'=> 'Nombre','correo'=> 'Correo','telef'=> 'Telefono',
	'direcci'=> 'Direccion', 'ciudad'=> 'Ciudad', 'Fecha'=> 'fecre');

$result = mysqli_query($connString, "SELECT * FROM proveedor") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM proveedor");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 30, 30, 60,30,50,30,41);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(30,12,'RUC',1);
$pdf->Cell(30,12,'NOMBRE',1);
$pdf->Cell(60,12,'CORREO',1);
$pdf->Cell(30,12,'TELEFONO',1);
$pdf->Cell(50,12,'DIRECCION',1);
$pdf->Cell(30,12,'CIUDAD',1);
$pdf->Cell(41,12,'FECHA',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['id_prove'],1);
$pdf->Cell($w[1],6,utf8_decode($row['ruc']),1);
$pdf->Cell($w[2],6,utf8_decode($row['nombre']),1);
$pdf->Cell($w[3],6,utf8_decode($row['correo']),1);
$pdf->Cell($w[4],6,utf8_decode($row['telef']),1);
$pdf->Cell($w[5],6,utf8_decode($row['direcci']),1);
$pdf->Cell($w[6],6,utf8_decode($row['ciudad']),1);

$pdf->Cell($w[7],6,$row['fecre'],1);




$pdf->Ln();
}
$pdf->Output('proveedor.pdf', 'D');
?>