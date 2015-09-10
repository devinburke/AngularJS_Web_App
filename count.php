<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("$host", "$user", "$dbpassword", "$database");
$sql = "select * from gluten";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
$statement = $num_rows;
echo ($statement);
?>