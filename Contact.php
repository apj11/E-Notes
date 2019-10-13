<?php


$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  require 'mailer/class.phpmailer.php';
  require 'mailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();      
  $mail->Host = 'smtp.gmail.com'; 
  $mail->Port = '587';      
  $mail->SMTPAuth = true;       
  $mail->Username = 'parajuliavishek@gmail.com';   
  $mail->Password = '9842529871';    
  $mail->SMTPSecure = 'tls';     
  $mail->From = $_POST["email"];   
  $mail->FromName = $_POST["name"]; 
  $mail->AddAddress('paraajuliavi11@gmail.com', 'Name');
  $mail->AddCC($_POST["email"], $_POST["name"]); 
  $mail->WordWrap = 50;   
  $mail->IsHTML(true);       
  $mail->Subject = $_POST["subject"];   
  $mail->Body = $_POST["message"];   
  if($mail->Send())    
  {
   $error = '<label class="text-success">Thank you for contacting us</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
?>





<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <header class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="Home.php">Home </a>
            </li>
             <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <a class="nav-link " href="About.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Contact.php">Contact</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </header>
    </nav>
   

        <div class="container">
        <div class="row">   
          <div class="col-lg-8">
            <div class="contact-form">
              <h2 class="title text-center">Get In Touch</h2>
              <hr class="bg-light">
              <h5 class="text-center text-success"> <?php echo $error; ?> </h5>
                <form action=" " class="contact-wrapper" method="POST" >
                    <div class="form-group col-lg-6">
                      <div class="input-group-prepend"> 
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                      
                        <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Enter your name" required>
                    
                    </div>
                    </div>
                     <div class="form-group col-md-6">
                      <div class="input-group-prepend"> 
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                   
                        <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter your email" required>
                     
                    </div>
                    </div>
                     <div class="form-group col-md-6">
                      <div class="input-group-prepend"> 
                      <span class="input-group-text"><i class="fas fa-at"></i></span>
                    
                        <input type="text" name="subject" class="form-control" autocomplete="off" placeholder="Enter Subject" required>
                      
                    </div>
                    </div>
                     <div class="form-group col-md-6">
                      <div class="input-group-prepend"> 
                      <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                  
                        <textarea id="message" name="message" class="form-control" autocomplete="off" placeholder="Write Message" cols="30" rows="4" required>
                          </textarea>
                     
                    </div>
                    </div>
                     <div class="form-group col-md-6">
                    <div class="form-group">
                      <input type="submit" name="submit" id="submit" class="btn btn-dark btn-block" value="Send Message">
                    </div>
                  </div>
                  </form>    
                </div>
            </div>
        
          <div class="col-sm-4">
              <h2 class="title text-center">Contact Info</h2><br>
              <address class="address-wrapper">
                <p>All In One Notes</p>
              <p>Kathmandu Nepal</p>
              <p>Mobile: +9779842529871</p>
              <p>Email: parajuliavishek@gmail.com</p>
              </address>
          </div>
    </div> 
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   
  

<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body></html>