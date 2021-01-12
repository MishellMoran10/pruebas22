<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:create_invoice.php");
	} else {
		$loginError = "Email y contraseña son incorrectos!";
	}
}
?>

<head>
<title>Sistema facturación</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<link href="inicio.php" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0
">
</head>
<div class="row">	
  <div class="col-xs-6">
  
<div class="heading">
		
	</div>
<div class="login-form">
<form action="" method="post">
    <h2 class="text-center">Iniciar Sesión</h2>  
<div class="form-group">
<?php if ($loginError ) { ?>
<div class="alert alert-warning"><?php echo $loginError; ?></div>
<?php } ?>
</div> 
<style>
		body{font-family: Arial; background-color: #256999; 
			box-sizing: border-box; padding: 100px;
			position: relative;}

		form{
			background-color: white;
			border-radius: 0 0 3px 3px;
			color: #999;
			font-size: 0.8em;
			padding: 40px;
			margin: 0 auto;
			width: 500px;
	

		}

	
		

	</style>        
<div class="form-group">
	    <input name="email" id="email" type="email" class="form-control" placeholder="Email address" autofocus required>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
</div> 
<div class="form-group">
    <button type="submit" name="login" class="btn btn-primary" style="width: 100%;"> Acceder </button>
</div>
<div class="clearfix">
 <p><a href="registrar.php">Registrarse</a></p>
</div>        
</form>
</div>   

</div>
<div class="col-xs-6">-</div>	
</div>		
</div>
<?php include('footer.php');?>