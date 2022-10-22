<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>API Calling using Curl</title>
</head>
<body>
	<?php
		// header("Access-Control-Allow-Origin: *"); # enable Cross Origin [CORS]
		// $url = 'https://reqres.in/api/users'; # API Link
		$url = 'http://localhost:4000/user'; # API Link

		$ch = curl_init(); # initialize curl object
		curl_setopt($ch, CURLOPT_URL, $url); # set url
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); # receive server response
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); # do not verify SSL

		$response = curl_exec($ch); # execute curl
		$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE); # http response status code
		curl_close($ch); # close curl

		$data = json_decode($response,TRUE);


		foreach($data as $singleData){
			echo $singleData["name"]." ".
				 $singleData["phone"]." <br>".
				 "<img src='".$singleData["profileUrl"]."' height='150px' width='150px'/><br>";
		}

		// echo $response;

		// foreach($data["data"] as $singleData){
		// 	echo $singleData["first_name"]." ".
		// 		 $singleData["last_name"]." <br>".
		// 		 "<img src='".$singleData["avatar"]."'/><br>";
		// }
	?>
</body>
</html>