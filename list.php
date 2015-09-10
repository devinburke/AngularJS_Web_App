<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$conn = mysqli_connect("$host", "$user", "$dbpassword", "$database");

$result = $conn->query("SELECT name, free FROM gluten order by name");

$spacer = " - ";

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	
	if ($rs["free"] == "yes"){
		$statement = "Gluten Free";
	}else{
		$statement  = "Contains Gluten";
		
	}
    $outp .= '{"Name":"'  . $rs["name"] . $spacer . $statement . '"}';  
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>

