<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="moranrios_e1";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>

<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="index.html">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<style type="text/css">
/*	.login-form {
		width: 340px;
    	margin: 50px auto;
	}*/


    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
<script>

function solonumeros(evt)
{
	if (window.event) {
		keynum = evt.keyCode;
	}else{
		keynum = evt.which;
	}
	if((keynum > 47 && keynum <58) || keynum == 8 ||keynum == 13)
	{
		return true;
	}else {
		alert("Cedula incorrecta no se permite letras");
		return false;
	}
}

	function sololetras(e)
	{
		key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toString();
	letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz"; 

especiales = [8,13];
tecla_especial = false
for(var i in especiales){
	if(key == especiales[i]){
		tecla_especial = true;
		break;
	}
}
if (letras.indexOf(tecla) == -1  && !tecla_especial){
	alert("ingresar solo letras");
	return false;
} 
}
</script>
<title>Sistema facturación</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
    </head>
    <body class="">

      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div><div class="row">	
  <div class="col-xs-6">
  
<div class="heading">
		
	</div>
<div class="login-form">
<form name ="registrar" method="post">
    <h2 class="text-center">Registro</h2>  
<div class="form-group">
</div> 

<style>

		body{font-family: Arial; background-color: #256999; box-sizing: border-box; padding: 0px;}

		form{
			background-color: white;
			border-radius: 0 0 3px 3px;
			color: #999;
			font-size: 0.8em;
			padding: 40px;
			margin: 0 auto;
			width: 600px;
		}

		

	</style>        
 <div class="form-group">
 	<div class="form-group">
 		<font color="black"><h5>Ingrese su nombre</h5></font>
    <input type="first_name"  class="form-control" name="first_name" placeholder="Nombre"
    onkeypress="return sololetras(event);" maxlength="15" required>
</div> 

<div class="form-group">
	<font color="black"><h5>Ingrese su apellido</h5>
    <input type="last_name" class="form-control" name="last_name" placeholder="apellido" onkeypress="return sololetras(event);" maxlength="15" required>
</div> 
<div class="form-group">
	<font color="black"><h5>Ingrese su cedula</h5>
    <input type="mobile" class="form-control" name="mobile" placeholder="cedula" onkeypress="return solonumeros(event);" maxlength="10" required>
</div> 
<div>
	<font color="black"><h5>Ingrese su email</h5>
    <input name="email" id="email" type="email" class="form-control" placeholder="Email" autofocus required>
</div>



<div class="form-group">
	<font color="black"><h5>Ingrese una contraseña</h5>
    <input name="pwd" id="password" type="password" class="form-control" placeholder="Contraseña" autofocus required>
</div>


<div class="form-group">
	<font color="black"><h5>Ingrese su dirección</h5>
    <input type="address" class="form-control" name="address" placeholder="cuidad" maxlength="50" required>
</div> 

<div class="form-group">
   <a href="index.php" target="black"> <input type="submit" name="registrarse" value="registrate" class="btn btn-primary" style="width: 100%;"> </a>  
</div>
<div class="clearfix">
 <p><a href="index.php">Iniciar Sesion</a></p>
</div>        
</form>
</div>   

</div>
<div class="col-xs-6">-</div>	
</div>		
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body></html>
						
				
				
			</table>
		</div>
	</div>
	<script src="formulario.js"></script>
</body>
</html>
<?php
	if(isset($_POST['registrarse'])){
		$id= rand(1,99);
		$email=$_POST["email"];
		$password=$_POST["pwd"];
			$first_name=$_POST["first_name"];
				$last_name=$_POST["last_name"];
					$mobile=$_POST["mobile"];
						$address=$_POST["address"];

		

		$insertarDatos = "INSERT INTO factura_usuarios VALUES('$id','$email','$password','$first_name','$last_name','$mobile','$address')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql";
		}
	}
?>
