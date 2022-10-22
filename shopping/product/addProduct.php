<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include '../libs/connection.php'; ?>

	<form method="POST" enctype="multipart/form-data">
		<center>
		<h4>Add Product</h4>

		<?php

		if(isset($_REQUEST["btnAddProduct"])){
			$ext = pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);
            $newname = time() . rand(1111, 9999) . time() . "." . $ext;
            move_uploaded_file($_FILES["productImage"]["tmp_name"], "../images/" . $newname);

            $result = mysqli_query($conn,"insert into product (productName,price,productImage,catId) values ('".$_REQUEST['txtProductName']."','".$_REQUEST['txtPrice']."','".$newname."','".$_REQUEST['txtCatId']."')") or die(mysqli_error($conn));

		}


		?>

		<table align="center">
			<tr>
				<td>
					Product Name: 
				</td>
				<td>
					<input type="text" name="txtProductName" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					Price: 
				</td>
				<td>
					<input type="text" name="txtPrice" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					Image: 
				</td>
				<td>
					<input type="file" name="productImage" class="form-control">
				</td>
			</tr>
			<tr>
				<td>Select Category</td>
				<td>
					<select class="form-control" id="txtCatId" name="txtCatId">
                      
                    </select>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="btnAddProduct" value="Add Product" class="form-control btn-primary">
				</td>
			</tr>
		</table>
	</center>
	</form>
	<script type="text/javascript">
		
		$.ajax({
          url: "http://localhost/ICT/shopping/category/getAllCategories.php",
          type: 'GET',
          success: function(result){
          			var str_table="";
          			str_table+='<option value="">Select Category</option>';
          			$.each(JSON.parse(result), function(i,object) {
						str_table+="<option value="+object.catId+">"+object.catName+"</option>"
					  	console.log(object.catName);
					});

					$("#txtCatId").html(str_table);
                }
          });

	</script>
</body>
</html>