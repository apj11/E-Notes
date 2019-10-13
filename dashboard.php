<?php include('server.php'); 
if (empty($_SESSION['username'])) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Dashboard Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="das">
		<h2>Dashboard Page</h2>
	</div>
	<div class="content">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>

				</h3>
			</div>
		<?php endif ?>
		<?php if (isset($_SESSION['username'])): ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p><a href="dashboard.php?logout='1'" style="color: red;">Logout</a></p>

		<?php endif ?> 
	</div>
	<header class="contents">
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="see/upload.php"><h3>SEE</h3> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hseb/uploadhseb.php"><h3>+2</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="bachelor/bachelorupload.php"><h3>Bachelor</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="master/masterupload.php"><h3>Master</h3></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
</body>
</html>