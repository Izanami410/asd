<?php
	 session_start();
	
	if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 2){
    header('location: ../login.php');
  }
?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Lista de Articulos</title>


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

    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="..\..\assets\plugins\pace\pace.min.css" rel="stylesheet">
    <script src="..\..\assets\plugins\pace\pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\..\assets\css\demo\nifty-demo.min.css" rel="stylesheet">


        
    <!--DataTables [ OPTIONAL ]-->
  <link href="..\..\assets\plugins/DataTables/css/datatables.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
        
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--================================-->
                <div class="navbar-header">
                    <a href="almacenero.php" class="navbar-brand">
                        <img src="img\logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Ranger Security Force</span>
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
                                        <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
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
                        <h1 class="page-header text-overflow">Articulos</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="almacenero.php"><i class="demo-pli-home"></i></a></li>
					<li><a href="almapromos.php">Articulo</a></li>
					<li class="active">Mostrar</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<!-- Basic Data Tables -->
					<!--===================================================-->
					<div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title">Articulos</h3>
					    </div>
                        <div class="col-sm-6 table-toolbar-left">                              
                                <div class="btn-group">
                            
    <a href="plantilla.php"  class="btn btn-default" title="EXCEL" type="button"><i class="demo-pli-file-excel"></i>Export to excel</a>
    
    <a href="reporte.php"  class="btn btn-default" title="PDF" type="button"><i class="demo-pli-printer"></i>Export to PDF</a>

                                     
        </div>

                                    </div>
                                    <br><br>
  <?php    
    if(isset($_SESSION['message'])){
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span><b> Success - </b><?php echo $_SESSION['message']; ?></span>
        </div>       
        <?php
        unset($_SESSION['message']);
    }
?>


<?php    
    if(isset($_SESSION['message1'])){
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span><b> Danger - </b><?php echo $_SESSION['message1']; ?></span>
        </div>       
        <?php
        unset($_SESSION['message1']);
    }
?>
					    <div class="panel-body">
							<?php
								function connect(){
								return new mysqli("localhost","root","","ranger_security");
								}
								$con = connect();
								$sql = "SELECT articulo.id_art, articulo.nomar, articulo.stock, articulo.detalle, categoria.id_cat, categoria.nomcat, categoria.descripcion, proveedor.id_prove, proveedor.ruc, proveedor.nombre, proveedor.correo, proveedor.telef FROM articulo INNER JOIN categoria ON articulo.id_cat=categoria.id_cat INNER JOIN proveedor ON articulo.id_prove =proveedor.id_prove";
								$query  =$con->query($sql);
								$data =  array();
									if($query){
										while($r = $query->fetch_object()){
												$data[] = $r;
												}
											}
							?>
							<?php if(count($data)>0):?>
					       <table id="myTable" cellspacing="0" width="100%">
					            <thead>
					                <tr> 
					                    <th>#</th>
					                    <th>Nombre</th>
					                    <th class="min-tablet">Stock</th>
                                        <th class="min-tablet">Detalle</th>
                                        <th class="min-desktop">Categoria</th>
                                        <th class="min-desktop">Proveedor</th>
                                        <th class="min-desktop">Acciones</th>
					                
					                </tr>
					            </thead>
					            <tbody>
									<?php foreach($data as $d):?>
										<tr>
											<td><span class="text-muted"><?php echo $d->id_art; ?></span></td>
                                                    <td><span class="text-muted"><?php echo $d->nomar; ?></span></td>
                                                    <td><span class="text-muted"><?php echo $d->stock; ?></span></td>
                                                    <td><span class="text-muted"><?php echo $d->detalle; ?></span></td>
                                                    <td><span class="text-muted"><?php echo $d->nomcat; ?></span></td>
                                                    <td><span class="text-muted"><?php echo $d->nombre; ?></span></td>

										<td>
										<a href="#edit_<?php echo $d->id_art; ?>"title="Editar datos"  class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

										<a href="#delete_<?php echo $d->id_art; ?>"title="Eliminar datos" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash del-btn" aria-hidden="true"></span></a>

                                        <a href="#stock_<?php echo $d->id_art; ?>"title="Editar stock" data-toggle="modal" class="btn btn-mint btn-sm"><span class="glyphicon glyphicon-inbox del-btn" aria-hidden="true"></span></a>

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
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-information icon-lg icon-fw"></i> Help
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
						                <a href="almacenero.php">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Dashboard</span>
											<i class="arrow"></i>
						                </a>
						
						            </li>

						            <li class="list-divider"></li>
						
						            <!--Category name-->
						            <li class="list-header">Components</li>

                                    <!--Menu list item-->
                                    <li class="active-sub">
						                <a href="#">
						                    <i class="ti-package"></i>
						                    <span class="menu-title">Articulos</span>
											<i class="arrow"></i>
						                </a>
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li class="active-link"><a href="almapromos.php">Mostrar</a></li>
											<li><a href="almapronue.php">Nuevo</a></li>
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
						                    <li><a href="catemostra.php">Mostrar</a></li>
											<li><a href="catenuevo.php">Nuevo</a></li>
						                </ul>
						            </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--================================-->
                </div>
            </nav>
            <!--===================================================-->

        </div>

        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
  
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="..\..\assets\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\..\assets\js\nifty.min.js"></script>

    
    <!--Demo script [ DEMONSTRATION ]-->
       <script src="../../assets/plugins/DataTables/js/datatables.min.js"></script>
     <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>



</body>
</html>

