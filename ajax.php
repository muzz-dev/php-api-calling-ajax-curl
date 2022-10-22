<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>API Calling using AJAX</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
</head>
<body>
	<h1>API Response</h1>
	<div id="userData"></div>
	<!-- <input type="button" name="b1" onclick="getResponse();" value="Click"> -->
	<script type="text/javascript">
		$( document ).ready(function() {
		    getResponse();
		});
		function getResponse() {
			$.ajax({
				url:"https://reqres.in/api/users",
				type:"GET",
				success: (data)=>{
					var str_table="<table border='1'>";
                	str_table += "<tr><th>Name</th><th>Email</th><th>Photo</th></tr>";
					$.each(data["data"], function(i,object) {
						str_table+="<tr>"
	                    str_table+="<td>"+object.first_name+" "+object.last_name+"</td>"
	                    str_table+="<td>"+object.email+"</td>"
	                    str_table+="<td><img src='"+object.avatar+"'/></td>"
	                    str_table+="</tr>"
					  	console.log(object);
					});
					str_table+="</table>"
					userData.innerHTML=str_table;
				}
			})
		}
	</script>
</body>
</html>