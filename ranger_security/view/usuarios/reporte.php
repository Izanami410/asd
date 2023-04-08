
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
$this->Cell(95,10,'Lista de los trabajadores',1,0,'C');
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
$display_heading = array('id_tra'=>'#', 'dni'=> 'DNI', 'nombre'=> 'Nombres','marca'=> 'Apellidos','correo'=> 'Correo',
	'telefono'=> 'Telefono', 'fecha'=> 'Fecha');

$result = mysqli_query($connString, "SELECT * FROM trabajador") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM trabajador");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 25, 50, 50,55,40,45);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(25,12,'DNI',1);
$pdf->Cell(50,12,'NOMBRES',1);
$pdf->Cell(50,12,'APELLIDOS',1);
$pdf->Cell(55,12,'CORREO',1);
$pdf->Cell(40,12,'TELEFONO',1);
$pdf->Cell(45,12,'FECHA',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['id_tra'],1);
$pdf->Cell($w[1],6,utf8_decode($row['dni']),1);
$pdf->Cell($w[2],6,utf8_decode($row['nombre']),1);
$pdf->Cell($w[3],6,utf8_decode($row['apellido']),1);
$pdf->Cell($w[4],6,utf8_decode($row['correo']),1);
$pdf->Cell($w[5],6,utf8_decode($row['telefono']),1);

$pdf->Cell($w[6],6,$row['fecha'],1);




$pdf->Ln();
}
$pdf->Output('trabajador.pdf', 'D');
?>