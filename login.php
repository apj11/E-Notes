<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body class="bgimg">
		<div class="header">
			<h2>Login</h2>

			<form method="post" action="login.php">
				<?php include('errors.php'); ?>
				<div class="input-group">
					<label>Username</label>
					<input type="text" autocomplete="off" name="username">
				</div>
				
				<div class="input-group">
					<label>Password</label>
					<input type="password" autocomplete="off"  name="password">
				</div>
				
				<div class="input-group">
					<button type="submit" name="login" class="btn btn-primary">Login</button>
				</div>
				<p>
					Not yet a member? <a href="register.php" >Sign Up</a>
				</p>
			</form>


		</div>
	</body>
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>