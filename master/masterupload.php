<?php 
$con=mysqli_connect('localhost','root','','notes');
if(isset($_REQUEST["submit"]))
{
	$faculty=$_POST['faculty'];
	$subject=$_POST['subject'];
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="uploadmaster/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","pdf","wmv","pdf","zip","rar","doc","ppt");
	if(in_array($ext,$allowed))
	{
 	move_uploaded_file($tmp_name,$path);
 	$sql=mysqli_query($con,"INSERT into master(faculty,subject,file)
 		values('$faculty','$subject','$file')");
	mysqli_query($con,$sql);
	
}
}

?>

<html>
<head>
	<title>Upload see</title>
	<title>Adminpanel</title><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body class="container download-wrapper">
	<h4>Master </h4><br>
		<form enctype="multipart/form-data" method="post">
			<div class="form-group">
			    <label for="level">faculty</label>
			    <input type="text" class="form-control" id="faculty" name="faculty" autocomplete="off" >
			 </div>
			  <div class="form-group">
			    <label for="subject">subject</label>
			    <input type="text" class="form-control" autocomplete="off" name="subject" id="subject" >
			  </div>
			<div>
			File Upload:<input type="file" name="file">
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="upload">
		</form>
	</div>
</body>
</html>