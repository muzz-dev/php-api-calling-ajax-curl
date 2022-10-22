<?php
include '../libs/connection.php';

$result=mysqli_query($conn,"select * from category");
$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}
echo json_encode($response);
?>