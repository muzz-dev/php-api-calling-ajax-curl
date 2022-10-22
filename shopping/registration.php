<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shopping | Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php include 'libs/connection.php'; ?>
	<div style="align-items:center">
		<center>
			<h4>Register to Continue</h4>
			<form method="POST" enctype="multipart/form-data">
				<?php

				if(isset($_REQUEST['btnRegister'])){
					if($_SESSION["captcha"]== $_REQUEST["txtCaptcha"]){

						$ext = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
	                    $newname = time() . rand(1111, 9999) . time() . "." . $ext;
	                    move_uploaded_file($_FILES["profile"]["tmp_name"], "images/" . $newname);

	                    $name = $_REQUEST['txtUsername'];
	                    $phone = $_REQUEST["txtPhone"];
	                    $password = $_REQUEST["txtPassword"];


						$query = "insert into user (name,phone,password,profile) values ('".$_REQUEST['txtUsername']."','".$_REQUEST["txtPhone"]."','".$_REQUEST["txtPassword"]."','".$newname."')";

						$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

						if ($result == true) {
	                  ?>
	                      <div class="alert alert-success" role="alert">
	                        Successfully Insert !!!
	                      </div>
	                    <?php
	                    } 
	                    else {
	                    ?>
	                      <div class="alert alert-danger" role="alert">
	                        ERROR !!!
	                      </div>
	                  <?php
	                    }
	                  } else{
	                  	?>
	                      <div class="alert alert-danger" role="alert">
	                        WRONG Captcha !!!
	                      </div>
	                  <?php
	                  }
				}

				?>
				<table align="center">
					<tr>
						<td>
							Name: 
						</td>
						<td>
							<input type="text" name="txtUsername" class="form-control">
						</td>
					</tr>
					<tr>
						<td>
							Phone: 
						</td>
						<td>
							<input type="text" name="txtPhone"  class="form-control">
						</td>
					</tr>
					<tr>
						<td>
							Password: 
						</td>
						<td>
							<input type="text" name="txtPassword"  class="form-control">
						</td>
					</tr>
					<tr>
						<td>
							Profile Photo: 
						</td>
						<td>
							<input type="file" name="profile"  class="form-control">
						</td>
					</tr>
					<tr>
						<td>
							Captcha: 
						</td>
						<td>
							<input type="text" name="txtCaptcha"  class="form-control">
						</td>
					</tr>
					<tr align="center">
	                    <td colspan="2">
	                        <img src="./libs/captcha.php" alt="CAPTCHA" class="captcha-image">
	                    </td>
	                </tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="btnRegister" value="Register"  class="form-control btn-primary">
						</td>
					</tr>
				</table>
				<a href="login.php" class="auth-link text-black">Already have an Account?</a>
			</form>
		</center>
	</div>
</body>
</html>