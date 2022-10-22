<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shopping | Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php include 'libs/connection.php'; ?>
	<div style="align-items:center">
		<center>
			<h4>Login to Continue as Admin</h4>
			<form method="POST">

				<?php

				if(isset($_REQUEST["btnLogin"])){
					$result = mysqli_query($conn,"select * from admin where username='".$_REQUEST['txtUsername']."' and password = '".$_REQUEST['txtPassword']."'");
					
					if (mysqli_num_rows($result)>0)
					{
	                  $_SESSION["islogin"]="yes";
	                  echo "<script>window.location='./category/addCategory.php';</script>";
					}else {
                    ?>
                      <div class="alert alert-danger" role="alert">
                        Incorrect Credentials !!!
                      </div>
                  <?php
                    }
				}

				?>

				<table align="center">
					<tr>
						<td>
							Username: 
						</td>
						<td>
							<input type="text" name="txtUsername" class="form-control">
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
						<td colspan="2" align="center">
							<input type="submit" name="btnLogin" value="Login" class="form-control btn-primary">
						</td>
					</tr>
				</table>
				<a href="registration.php" class="auth-link text-black">Don't have an Account?</a><br>
				<a href="login.php" class="auth-link text-black">Login as a Customer?</a>
			</form>
		</center>
	</div>
</body>
</html>