<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>
  <link href='login1.css' rel='stylesheet' type='text/css'>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background-image: linear-gradient(135deg, #4ca1af 0%, #c4e0e5 100%);
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:lightblue;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo{
    margin: auto;
    font-size: 8rem;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
.logo img{
	width: 200px;
	position: absolute;
	bottom: 300px;
	right: 100px;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    /*background: #000000e0;*/
}
#login-left .bg img{
  border-radius: 150px;
  padding-left: 20px;
  width: 900px;
}

</style>

<body>

  <main id="main" class=" bg-light">
  		<div id="login-left">
  			<div class="bg">
  					<img src="bg1.jpg">
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="w-100">
			<br>
			<br>
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<div class="logo"><img src="user.png"></div>
							<div class="login-block">
	    					<h1>Login</h1>
	    					<input type="text" value="" placeholder="Username" id="username" name="username" />
  							<input type="password" value="" placeholder="Password" id="password" name="password" />
	    					<center><button>Login</button></center>
  						</div>
  						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>