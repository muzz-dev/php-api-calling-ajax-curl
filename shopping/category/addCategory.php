<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Shopping | Add Category</title>
</head>
<body>
	<?php include '../libs/connection.php'; ?>
	<center>
		<h4>ADD CATEGORY</h4>
		<div style="align-items:center">
			<form method="POST">
				<?php

				if(isset($_REQUEST["btnAddCategory"])){
					$result=mysqli_query($conn,"insert into category(catName) values ('".$_REQUEST['txtCategoryName']."')") or die(mysqli_error($conn));
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
				}

				?>
				<table align="center">
					<tr>
						<td>
							Category Name: 
						</td>
						<td>
							<input type="text" name="txtCategoryName" class="form-control">
						</td>
					</tr>
					<tr><td colspan="2"></td></tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="btnAddCategory" value="Add Category" class="form-control btn-primary">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</center>
</body>
</html>