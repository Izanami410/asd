<?php
  require '../assets/config/config.php';

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    
    $contra = MD5($_POST['contra']);
    $privilegio = $_POST['privilegio'];
    $estado = $_POST['estado'];

    if($nombre == '')
      $errMsg = 'Digite su nombre';
    if($usuario == '')
      $errMsg = 'Digite su usuario';
   if($correo == '')
      $errMsg = 'Digite su correo';
    if($contra == '')
      $errMsg = 'Digite su contraseña';
    if($privilegio == '')
      $errMsg = 'Digite su privilegio';
    if($estado == '')
      $errMsg = 'Digite su estado';

    if($errMsg == ''){
      try {
        $stmt = $db->prepare('INSERT INTO usuarios (nombre, usuario, correo,contra, privilegio,estado) VALUES (:nombre, :usuario, :correo,:contra, :privilegio,:estado)');
        $stmt->execute(array(
          ':nombre' => $nombre,
          ':usuario' => $usuario,
          ':correo' => $correo,
          ':contra' => $contra,
          ':privilegio' => $privilegio,
          ':estado' => $estado
          ));
        header('Location: login.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Registro | RANGER SECURITY</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../assets/css\bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../assets/css\nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../assets/css\demo\nifty-demo-icons.min.css" rel="stylesheet">
    <link href="../assets/css\demo\nifty-demo.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../assests/img/logo.png" />
</head>
<body>
    <div id="container" class="cls-container">
		<div id="bg-overlay"></div>
		<div class="cls-content">
		    <div class="cls-content-lg panel">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Registrarte</h1>
		                <p>Es rápido y fácil.</p>
		            </div>
		             <?php
        if(isset($errMsg)){
          echo '<div style="color:#21eb2b;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>
		            <form action="" method="post">
		                <div class="row">
		                    <div class="col-sm-6">
		                        <div class="form-group">
		                            <input type="text" class="form-control" placeholder="Nombre completo" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'] ?>" autocomplete="off" name="nombre">
		                        </div>
		                        <div class="form-group">
		                            <input type="text" class="form-control" placeholder="Correo electrónico" name="correo" value="<?php if(isset($_POST['correo'])) echo $_POST['correo'] ?>" autocomplete="off">
		                        </div>
		                    </div>
		                    
		                    <div class="col-sm-6">
		                        <div class="form-group">
		                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off">
		                        </div>
		                        <div class="form-group">
		                            <input type="password" class="form-control" placeholder="Contraseña" name="contra" value="<?php if(isset($_POST['contra'])) echo $_POST['contra'] ?>">
		                        </div>
		                    </div>

		                    <div class="col-sm-6" style="display:none;">
		                        <div class="form-group">
		                            <input type="text" class="form-control" name="privilegio" value="3" autocomplete="off">
		                        </div>
		                        <div class="form-group">
		                            <input type="text" class="form-control" name="estado" value="1" autocomplete="off">
		                        </div>
		                       
		                    </div>

		                </div>

		                
		                <button class="btn btn-primary btn-lg btn-block" name='register' type="submit">Registrarte</button>
		            </form>
		        </div>
		        <div class="pad-all">
		            ¿Ya tienes una cuenta? <a href="login.php" class="btn-link mar-rgt text-bold">Ingresa</a>
		
		        </div>
		    </div>
		</div>
		
    </div>
   
    <!--jQuery [ REQUIRED ]-->
    <script src="../assets/js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="../assets/js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="../assets/js\nifty.min.js"></script>

    <!--Background Image [ DEMONSTRATION ]-->
    <script src="../assets/js\demo\bg-images.js"></script>

</body>
</html>