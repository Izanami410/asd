
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
$this->Cell(95,10,'Lista de los articulos',1,0,'C');
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
$display_heading = array('id_art'=>'#', 'nomar'=> 'Articulos', 'stock'=> 'Stock','detalle'=> 'Detalles','nomcat'=> 'Categoria',
	'descripcion'=> 'Descripcion', 'correo'=> 'Correo','gene'=> 'Genero', 'fenaci'=> 'Fech_naci');

$result = mysqli_query($connString, "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat, categoria.descripcion, articulo.fere FROM articulo INNER JOIN categoria ON articulo.id_cat=categoria.id_cat") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM articulo");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(15, 60, 20, 60,40,50,42);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(60,12,'ARTICULOS',1);
$pdf->Cell(20,12,'STOCK',1);
$pdf->Cell(60,12,'DETALLES',1);
$pdf->Cell(40,12,'CATEGORIA',1);
$pdf->Cell(50,12,'DESCRIPCION',1);
$pdf->Cell(42,12,'FECHA',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['id_art'],1);
$pdf->Cell($w[1],6,utf8_decode($row['nomar']),1);
$pdf->Cell($w[2],6,utf8_decode($row['stock']),1);
$pdf->Cell($w[3],6,utf8_decode($row['detalle']),1);
$pdf->Cell($w[4],6,utf8_decode($row['nomcat']),1);
$pdf->Cell($w[5],6,utf8_decode($row['descripcion']),1);

$pdf->Cell($w[6],6,$row['fere'],1);




$pdf->Ln();
}
$pdf->Output('articulos.pdf', 'D');
?>