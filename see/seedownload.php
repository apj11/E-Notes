<!DOCTYPE html>
<html>
<head>
	<title>Download files</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark"> 
	    <header class="container">
		    <div class="collapse navbar-collapse" id="navbarCollapse">
		      <ul class="navbar-nav mr-auto">
		        <li class="nav-item ">
		          <a class="nav-link" href="../Home.php">Home </a>
		        </li>
		         <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="../Programs.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Programs
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="see/seedownload.php">SEE</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="hseb/downloadhseb.php">HSEB</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="bachelor/bachelordownload.php">Bachelor</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="master/masterdownload.php">Master</a>
              </div>
          </li>
		        <li class="nav-item">
		          <a class="nav-link " href="../About.php">About</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="../Contact.php">Contact</a>
		        </li>
		      </ul>
		      <form class="form-inline mt-2 mt-md-0">
		        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		      </form>
		    </div>
	    </header>
  </nav>
	<div class="container download-wrapper">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Faculty</th>
					<th>Subject</th>
					<th>File</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$con=mysqli_connect('localhost','root','','notes');
				$query=mysqli_query($con,"SELECT * from see");
				$rowcount=mysqli_num_rows($query);
				?>
				<tr>
				</tr>
				<?php
				for($i=1;$i<=$rowcount;$i++)
				{
					$row=mysqli_fetch_array($query);

				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['faculty']?></td>
					<td><?php echo $row['subject']?></td>
				<td><a href="seeupload/<?php echo $row["file"] ?>"><?php echo $row["file"] ?></a></td>

				</tr>

				<?php	
				}

				?>
			</tbody>	
		</table>
	</div>
	 <footer class="page-footer font-small mdb-color lighten-3 pt-4">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
          <h5 class="font-weight-bold text-uppercase mb-4">Our Mission</h5>
          <p>We intend to change the current trend of education and help students and teachers simplify teaching learning environment.</p>
          <p>The question is what we wanted to do with the new life God has given us. This is the mission we want to take on.</p>

        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
          <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

          <ul class="list-unstyled">
            <li>
              <p>
                <a href="Programs.php">Programs</a>
              </p>
            </li>
            <li>
              <p>
                <a href="About.php">About Us</a>
              </p>
            </li>
            <li>
              <p>
                <a href="Contact.php">Contact Us</a>
              </p>
            </li>
          </ul>

        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
          <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

          <ul class="list-unstyled">
            <li>
              <p>
                <i class="fas fa-home mr-3"></i> Kathmandu, Nepal</p>
            </li>
            <li>
              <p>
                <i class="fas fa-envelope mr-3"></i> parajuliavishek@gmail.com</p>
            </li>
            <li>
              <p>
                <i class="fas fa-phone mr-3"></i> +9779842529871</p>
            </li>
          </ul>

        </div>

        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">
          <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>
          <li>
          <a  href="https://www.facebook.com" class="btn-floating btn-fb">
          <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li>
          <a  href="https://www.twitter.com" class="btn-floating btn-tw">
          <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li>
          <a  href="https://www.google.com" class="btn-floating btn-gplus">
          <i class="fab fa-google-plus-g"></i>
          </a>
        </li>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="#"> Enotes.com</a>
    </div>
  </footer> 
</body>
</html>