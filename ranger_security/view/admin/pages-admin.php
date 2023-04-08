<?php
	 session_start();
	
	if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 1){
    header('location: ../login.php');
  }
?>
<html>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sitio Web Administrativo</title>

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

    <link href="../../assets/plugins/DataTables/css/datatables.css" rel="stylesheet">    
   
</head>
<body onload="startTime()">
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="pages-admin.php" class="navbar-brand">
                         <img src="..\..\assets\images\logo.png" alt="Ranger Logo" class="brand-icon">
                       
                        <div class="brand-title">
                            <span class="brand-text" style="font-size: 180%;">ZMAGE</span>
                        </div>
                    </a>
                </div>
                
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
                       <!--End Navigation toogle button-->
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
                    
<div class="pad-all text-center">
    <h2>Bienvenido <?php echo ucfirst($_SESSION['nombre']); ?></h2>
    <h5>
        <strong>Tu último acceso es:</strong>
        <div id="date" ></div>
                     
    </h5>
</div>
                    </div>
                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					    <div class="row">	       
					    </div>		
					    <div class="row">
					        <div class="col-md-3">
					            <div class="panel panel-warning panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="ti-package icon-3x"></i>
					                    </div>
					                </div>
<?php
$db_host="localhost"; 
$db_user="root";    
$db_password="";    
$db_name="ranger_security";    
try
{
    $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
    $e->getMessage();
}
$sql = "SELECT COUNT(*) total FROM articulo";
$result = $db->query($sql); //$pdo sería el objeto conexión
$total = $result->fetchColumn();
?>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold"><?php echo  $total; ?></p>
					                    <p class="mar-no">Articulos</p>
					                </div>
					            </div>
					        </div>

					        <div class="col-md-3">
					            <div class="panel panel-info panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="ti-user icon-3x"></i>
					                    </div>
					                </div>
   <?php
$db_host="localhost"; 
$db_user="root";    
$db_password="";    
$db_name="ranger_security";    
try
{
    $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
    $e->getMessage();
}
$sql = "SELECT COUNT(*) total FROM trabajador";
$result = $db->query($sql); //$pdo sería el objeto conexión
$total = $result->fetchColumn();
?>                                 
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold"><?php echo  $total; ?></p>
					                    <p class="mar-no">Trabajadores</p>
					                </div>
					            </div>
					        </div>

					        <div class="col-md-3">
					            <div class="panel panel-danger panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="ti-user icon-3x"></i>
					                    </div>
					                </div>
                                    <?php
$db_host="localhost"; 
$db_user="root";    
$db_password="";    
$db_name="ranger_security";    
try
{
    $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
    $e->getMessage();
}
$sql = "SELECT COUNT(*) total FROM proveedor";
$result = $db->query($sql); //$pdo sería el objeto conexión
$total = $result->fetchColumn();
?>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold"><?php echo  $total; ?></p>
					                    <p class="mar-no">Proveedores</p>
					                </div>
					            </div>
					        </div>

                            <div class="col-md-3">
                                <div class="panel panel-mint panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="ti-tag icon-3x"></i>
                                        </div>
                                    </div>
                                    <?php
$db_host="localhost"; 
$db_user="root";    
$db_password="";    
$db_name="ranger_security";    
try
{
    $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
    $e->getMessage();
}
$sql = "SELECT COUNT(*) total FROM categoria";
$result = $db->query($sql); //$pdo sería el objeto conexión
$total = $result->fetchColumn();
?>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo  $total; ?></p>
                                        <p class="mar-no">Categorias</p>
                                    </div>
                                </div>
                            </div>

					       

					    </div>
					    <div class="row">
					        <div class="col-xs-12">
					            <div class="panel">
					                <div class="panel-heading">
					                    <h3 class="panel-title">Articulos de Seguridad</h3>
					                </div>

					                <!--Data Table-->
					                <!--===================================================-->
					                <div class="panel-body">
					                    <div class="pad-btm form-inline">
					                       
					                    </div>
					                    <div class="table-responsive">
										<a href="../articulo/reporte.php" title="Reporte" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i> </a> 

        <form class="form-inline" method="POST" action="">
            <label>Fecha desde:</label>
            <input type="date" class="form-control" placeholder="Start" id="date1"  name="date1"/>
            <label>Hasta</label>
            <input type="date" class="form-control" placeholder="End" id="date2"  name="date2"/>
            <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> 
            
        </form>  
					<table class="table table-striped" id="myTable">
					     <thead>
					<tr>
					  <th>#</th>
                      <th>Nombre</th>
                      <th class="min-tablet">Stock</th>
                      <th class="min-desktop">Categoria</th>
                     <th class="min-tablet">Detalles</th>
                       
                      <th class="min-desktop">Proveedor</th>
                      <th class="min-desktop">Fecha</th>                                     
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
            </div>		
                     
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
                                       
                                        
                                        <a href=" ../logout.php" class="list-group-item">
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
						            <li class="active-sub">
						                <a href="pages-admin.php">
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
						                <ul class="collapse">
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
						                    <li><a href="../categoria/mostrar.php">Mostrar</a></li>
											<li><a href="../categoria/nuevo.php">Nuevo</a></li>
						                </ul>
						            </li>

                                    <li>
						                <a href="#">
						                    <i class="ti-envelope"></i>
						                    <span class="menu-title">Pedidos</span>
											<i class="arrow"></i>
						                </a>
                                        <!--Submenu-->
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
                                    
                                    <li>
                                        <a href="#">
                                            <i class="ti-bookmark-alt"></i>
                                            <span class="menu-title">Kardex</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="../kardex/kardexgeneral.php">Kardex en general</a></li>
                                            
                                        </ul>                    
                                    </li>


                                </ul>
									
                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>

        </div>

        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    
    <!--jQuery [ REQUIRED ]-->
    <script src="..\..\assets\js\jquery.min.js"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\bootstrap.min.js"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\nifty.min.js"></script>
    
    <!--Demo script [ DEMONSTRATION ]-->
  

    <!--Flot Chart [ OPTIONAL ]-->
    <script src="..\..\assets\plugins\flot-charts\jquery.flot.min.js"></script>
	<script src="..\..\assets\plugins\flot-charts\jquery.flot.resize.min.js"></script>
	<script src="..\..\assets\plugins\flot-charts\jquery.flot.tooltip.min.js"></script>

    <!--Sparkline [ OPTIONAL ]-->
    <script src="..\..\assets\plugins\sparkline\jquery.sparkline.min.js"></script>

    <!--Specify page [ SAMPLE ]-->
    <script src="..\..\assets\js\demo\dashboard.js"></script>
    <script src="../../assets/plugins/DataTables/js/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script src="../../assets/js/reloj.js"></script> 

</body>
</html>

