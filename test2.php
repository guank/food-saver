<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("oniddb.cws.oregonstate.edu", "buenavia-db", "bbZ49fWn3DKxkQhv", "buenavia-db");

$result = $conn->query("SELECT name, phone, address from business");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["name"] . '",';
    $outp .= '"Phone":"'   . $rs["phone"]        . '",';
    $outp .= '"Address":"'. $rs["address"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>