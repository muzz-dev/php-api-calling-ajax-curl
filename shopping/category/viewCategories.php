<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View All Categories</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include '../libs/connection.php'; ?>
	<center>
		<h4>View All Categories</h4>
		<form>
			<div id="categories"></div>
		</form>
	</center>
	<script type="text/javascript">
		$( document ).ready(function() {
		    getResponse();
		});
		function getResponse() {
			$.ajax({
				url:"http://localhost/ICT/shopping/category/getAllCategories.php",
				type:"GET",
				success: (data)=>{
					var str_table="<table class='form-control' border='1'>";
                	str_table += "<tr><th>Category Id</th><th>Name</th><th>Action</th></tr>";
					//Cannot use 'in' operator to search for 'length' => use JSON.parse()
					$.each(JSON.parse(data), function(i,object) {
						str_table+="<tr>"
	                    str_table+="<td>"+object.catId+"</td>"
	                    str_table+="<td>"+object.catName+"</td>"
	                    str_table+="<td><input type='submit' name='btnDelete' value='Delete' class='btn btn-danger'/></td>"
	                    str_table+="</tr>"
					  	console.log(object.catName);
					});
					str_table+="</table>"
					categories.innerHTML=str_table;
				}
			})
		}
	</script>
</body>
</html>