<?php
	postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$email = $request->email;
    @$name = $request->name;
	@$fooditem = $resuest->fooditem;
	@$gluten = $request->gluten;

$host = "localhost";
$user = "dburke";
$dbpassword = "paige905";
$database = "dburke_gluten";
$con = mysqli_connect("$host", "$user", "$dbpassword", "$database");
$sql = "Insert Into subs (name, email, food_name, gluten_free) values ('$name', '$email', '$fooditem', '$gluten')";
$result = mysqli_query($con, $sql);
echo $sql; 
?>