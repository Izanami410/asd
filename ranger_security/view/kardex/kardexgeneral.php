<?php
	 session_start();
	
	if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 1){
    header('location: ../login.php');
  }
?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Kardex</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\..\assets\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo-icons.min.css" rel="stylesheet">
    <link href="..\..\assets\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="..\..\assets\plugins\pace\pace.min.css" rel="stylesheet">
    <script src="..\..\assets\plugins\pace\pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">

        
    <!--DataTables [ OPTIONAL ]-->
    <link href="../../assets/plugins/DataTables/css/datatables.css" rel="stylesheet">
    
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--================================-->
                <div class="navbar-header">
                    <a href="pages-admin.php" class="navbar-brand">
                         <img src="..\..\assets\images\logo.png" alt="Ranger Logo" class="brand-icon">
                       
                        <div class="brand-title">
                            <span class="brand-text" style="font-size: 11px;">Ranger Security Force</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
              
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                    </ul>
                    <ul class="nav navbar-top-links">

                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <i class="demo-pli-male"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                    </li>
                                    
                                    
                                    <li>
                                        <a href="../logout.php"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Kardex</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="../admin/pages-admin.php"><i class="demo-pli-home"></i></a></li>
					<li><a href="kardexgeneral.php">Kardex</a></li>
					<li class="active">Mostrar</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
                    <div class="panel">
                                <!--Panel heading-->
                                <div class="panel-heading">
                                    <div class="panel-control">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#demo-tabs2-box-1" data-toggle="tab">
                                                    <i class="ti-bookmark-alt"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#demo-tabs2-box-2" data-toggle="tab">
                                                    <i class="ti-search"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="panel-title">Kardex</h3>
                                </div>
                    
                                <!--Panel Body-->
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="demo-tabs2-box-1">
                                            <p class="text-main text-semibold"> Kardex general </p>
                                            <p>En el módulo KARDEX puede ver los pedidos y compras de los articulos. Además, puede ver información detallada de los movimientos específicos de un producto por cada mes.</p>

                                            <?php
                                function connect(){
                                return new mysqli("localhost","root","","ranger_security");
                                }
                                $con = connect();
                                $sql = "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat,proveedor.id_prove, proveedor.ruc, proveedor.nombre, proveedor.direcci, proveedor.correo, proveedor.ciudad,articulo.fere , GROUP_CONCAT(categoria.id_cat, '..', categoria.nomcat, '..' SEPARATOR '__') AS categoria , GROUP_CONCAT(proveedor.id_prove, '..', proveedor.nombre, '..' SEPARATOR '__') AS proveedor FROM articulo INNER JOIN categoria ON articulo.id_cat = categoria.id_cat INNER JOIN proveedor ON articulo.id_prove = proveedor.id_prove GROUP BY articulo.id_art";
                                $query  =$con->query($sql);
                                $data =  array();
                                    if($query){
                                        while($r = $query->fetch_object()){
                                                $data[] = $r;
                                                }
                                            }
                            ?>
                            <?php if(count($data)>0):?>

              <table id="myTable"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Articulos</th>
                                        <th>Fecha</th>                                     
                                        <th class="min-tablet">Acciones</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php foreach($data as $d):?>
                                        <tr>
                                            <td><span class="text-muted"><?php echo $d->id_art; ?></span></td>
                                 <td><span class="text-muted"><?php echo $d->nomar; ?></span></td>
                                 <td><span class="text-muted"><?php echo $d->fere; ?></span></td>
                                            
                              <td>
                             <a href="#detalle_<?php echo $d->id_art; ?>"title="Detalles del kardex" class="btn btn-primary btn-sm" data-toggle="modal"><span class="ti-bookmark-alt" aria-hidden="true"></span></a>
<?php include('modal.php'); ?>
                          </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php else:?>
                                    <p class="alert alert-warning"><strong>No hay datos</strong></p>
                                    <?php endif; ?>
                                </tbody>    
                                
                            </table>                              
                                        </div>

                                        <div class="tab-pane fade" id="demo-tabs2-box-2">
                                            <p class="text-main text-semibold">Buscar kardex</p>
                                            <p>En el módulo KARDEX puede ver los pedidos y compras de los articulos. Además, puede ver información detallada de los movimientos específicos de un producto por cada mes.</p>
        <form class="form-inline" action="" method="GET">
            <label>Fecha desde:</label>
            <input type="date" class="form-control" placeholder="Start" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>"/>
            <label>Hasta</label>
            <input type="date" class="form-control" placeholder="End" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"/>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button> 
            
        </form> 


        <table class="table table-striped" id="myTable3">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Articulo</th>
                                                        <th>Stock</th>
                                                        <th>Detalle</th>
                                                        <th>Categoria</th>
                                                        <th>Proveedor</th>
                                                        <th>Fecha</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                              <?php 
                                $con = mysqli_connect("localhost","root","","ranger_security");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat,proveedor.id_prove, proveedor.ruc, proveedor.nombre, proveedor.direcci, proveedor.correo, proveedor.ciudad,articulo.fere , GROUP_CONCAT(categoria.id_cat, '..', categoria.nomcat, '..' SEPARATOR '__') AS categoria , GROUP_CONCAT(proveedor.id_prove, '..', proveedor.nombre, '..' SEPARATOR '__') AS proveedor FROM articulo INNER JOIN categoria ON articulo.id_cat = categoria.id_cat INNER JOIN proveedor ON articulo.id_prove = proveedor.id_prove WHERE articulo.fere BETWEEN '$from_date' AND '$to_date' GROUP BY articulo.id_art";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['id_art']; ?></td>
                                               
                                                <td><?= $row['nomar']; ?></td>
                                                <td><?= $row['stock']; ?></td>
                                                <td><?= $row['detalle']; ?></td>
                                              

<?php foreach(explode("__", $row['categoria']) as $categoriaConcatenados){ 
                   $categoria = explode("..", $categoriaConcatenados)
         ?>
         <td><?php echo $categoria[1] ?> </td>
         <?php } ?>



        <?php foreach(explode("__", $row['proveedor']) as $proveedorConcatenados){ 
                   $proveedor = explode("..", $proveedorConcatenados)
         ?>
          <td><?php echo $proveedor[1] ?></td>

         <?php } ?>

         <td><?= $row['fere']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="panel">
                                <!--Panel heading-->
                                <div class="panel-heading">
                                    <div class="panel-control">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#demo-tabs2-box-4" data-toggle="tab">
                                                    <i class="ti-envelope"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#demo-tabs2-box-3" data-toggle="tab">
                                                    <i class="ti-search"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="panel-title">Kardex</h3>
                                </div>
                    
                                <!--Panel Body-->
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="demo-tabs2-box-4">
                                            <p class="text-main text-semibold">Kardex por pedidos</p>
                                            <p>En el módulo KARDEX puede ver los pedidos y compras de los articulos. Además, puede ver información detallada de los movimientos específicos de un producto por cada mes.</p>
<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "ranger_security";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
     $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("SELECT pedido.idpedido, articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, articulo.fere, trabajador.id_tra, trabajador.nombre,trabajador.apellido, trabajador.dni, trabajador.correo, trabajador.telefono, trabajador.fecha,pedido.fechare, pedido.estado,pedido.cantid, GROUP_CONCAT(categoria.id_cat, '..', categoria.nomcat, '..', categoria.descripcion, '..' SEPARATOR '__') AS categoria FROM pedido INNER JOIN articulo ON pedido.id_art = articulo.id_art INNER JOIN trabajador ON pedido.id_tra = trabajador.id_tra INNER JOIN categoria ON categoria.id_cat = articulo.id_cat  GROUP BY pedido.idpedido;");
$pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<table id="myTable5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Articulo </th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Acciones</th>                                       
        </tr>
    </thead>
    <tbody>
         <?php foreach($pedidos as $pedido){ ?>
            <tr>
                <td><?php echo $pedido->idpedido ?></td>
                <td><?php echo $pedido->nomar ?></td>
              
                <td><?php echo $pedido->cantid ?></td>
                <td><?php echo $pedido->fechare ?></td>

                <td>
                             <a href="#detallepedi_<?php echo $pedido->idpedido; ?>"title="Detalles del kardex" class="btn btn-primary btn-sm" data-toggle="modal"><span class="ti-bookmark-alt" aria-hidden="true"></span></a>
                             <a href="entrada.php?id=<?php echo $pedido->id_tra; ?>" title="Entrar"  class="btn btn-warning btn-sm"><span class="ti-stats-up" aria-hidden="true"></span></a>

<?php include('modal.php'); ?>
                          </td>

            </tr>
<?php } ?>
    </tbody>
</table>

                                        </div>
                                        <div class="tab-pane fade" id="demo-tabs2-box-3">
                                            <p class="text-main text-semibold">Buscar kardex por pedidos</p>
                                            <p>En el módulo KARDEX puede ver los pedidos y compras de los articulos. Además, puede ver información detallada de los movimientos específicos de un producto por cada mes.</p>
       <form class="form-inline" method="POST" action="">
            <label>Fecha desde:</label>
            <input type="date" class="form-control" placeholder="Start" id="date1"  name="date1"/>
            <label>Hasta</label>
            <input type="date" class="form-control" placeholder="End" id="date2"  name="date2"/>
            <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> 
            
        </form>  
        <table class="table table-striped" id="myTable7">
        <thead>
            <tr>
                 <th>#</th>
                 <th>Articulo</th>
                 <th>Stock inicial</th>
                 <th>Trabajador</th>
                 <th>Cantidad del pedido</th>

            </tr>
        </thead>
        <tbody>
            <?php include'range.php'?> 
        </tbody>
        
        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                </div>
            </div>

            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="..\..\assets\images\7.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo ucfirst($_SESSION['nombre']); ?></p>
                                            <span class="mnp-desc"><?php echo ucfirst($_SESSION['correo']); ?></span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        
                                        <a href="../logout.php" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>

                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->

  							<ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Navigation</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="..\admin\pages-admin.php">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Dashboard</span>
											<i class="arrow"></i>
						                </a>
						            </li>

						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Components</li>

                                    <!--Menu list item-->
                                    <li>
						                <a href="#">
						                    <i class="ti-package"></i>
						                    <span class="menu-title">Articulos</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="../articulo/mostrar.php">Mostrar</a></li>
											<li><a href="../articulo/nuevo.php">Nuevo</a></li>
						                </ul>
						            </li>              

						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="ti-user"></i>
						                    <span class="menu-title">Trabajadores</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="../trabajador/mostrar.php">Mostrar</a></li>
											<li><a href="../trabajador/nuevo.php">Nuevo</a></li>
						                </ul>										
						            </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i>
                                            <span class="menu-title">Usuarios</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="../usuarios/mostrar.php">Mostrar</a></li>
                                            <li><a href="../usuarios/nuevo.php">Nuevo</a></li>
                                        </ul>   
                                    </li>

									<li>
						                <a href="#">
						                    <i class="ti-user"></i>
						                    <span class="menu-title">Proveedores</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse" >
						                    <li><a href="../proveedor/mostrar.php">Mostrar</a></li>
											<li><a href="../proveedor/nuevo.php">Nuevo</a></li>
						                </ul>
						            </li>

                                    <li>
						                <a href="#">
						                    <i class="ti-tag"></i>
						                    <span class="menu-title">Categoría</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="mostrar.php">Mostrar</a></li>
											<li><a href="nuevo.php">Nuevo</a></li>
						                </ul>
						            </li>
                                    <li>
						                <a href="#">
						                    <i class="ti-envelope"></i>
						                    <span class="menu-title">Pedidos</span>
											<i class="arrow"></i>
						                </a>
                                         <ul class="collapse">
                                            <li><a href="../pedido/mostrar.php">Mostrar</a></li>
                                            <li><a href="../pedido/nuevo.php">Nuevo</a></li>
                                        </ul>  
						            </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-shopping-cart"></i>
                                            <span class="menu-title">Compra</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="../compra/mostrar.php">Mostrar</a></li>
                                            <li><a href="../compra/nuevo.php">Nuevo</a></li>
                                        </ul>                    
                                    </li>

                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="ti-bookmark-alt"></i>
                                            <span class="menu-title">Kardex</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li class="active-link"><a href="../kardex/kardexgeneral.php">Kardex en general</a></li>
                                           
                                        </ul>                    
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </nav>
        </div>
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
   
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="..\..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\nifty.min.js"></script>

    


    
    <!--DataTables [ OPTIONAL ]-->
    <script src="../../assets/plugins/DataTables/js/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable3').DataTable();
    } );
</script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable5').DataTable();
    } );
</script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable7').DataTable();
    } );
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--------------------------------script editar----------------------------->

  <?php
if(isset($_POST["update"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ranger_security";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
$id = $_GET['id'];

    $nomcat=$_POST['nomcat'];
    $descripcion=$_POST['descripcion'];


// Realizamos la consulta para saber si coincide con uno de esos criterios

$result = mysqli_query($conn);
?>


<?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

        <script type="text/javascript">

Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ya existe el registro a editar!'
 
})


        </script>

    <?php
    }
  
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "update categoria set  nomcat='$nomcat', descripcion='$descripcion' where id_cat='$id'";


if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>

        <script type="text/javascript">
             
Swal.fire({
  icon: 'success',
  title: 'Update',
  text: 'Actualizado correctamente',
  
}).then(function() {
            window.location = "mostrar.php";
           
        });
        </script>

    <?php
    }
    else{
       ?>
       <script type="text/javascript">
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se pudo guardar!'
 
})
       </script>
       <?php

    }
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>
</body>
</html>

