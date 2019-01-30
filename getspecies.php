<?php
$mysqli = new mysqli("127.0.0.1", "youruser", "yourpassword", "animals", 3307);
if($mysqli->connect_error) {
 exit('Could not connect');
}

$sql = "SELECT Id, Species, Amount, Price, Owner FROM animals
  WHERE Id = ?";

$outp = "";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $species, $amount, $price, $owner);
$stmt->fetch();
$stmt->close();

$outp  = '{"Species":"'. $species . '",';
$outp .= '"Amount":"'  . $amount  . '",';
$outp .= '"Price":"'   . $price   . '",';
$outp .= '"Owner":"'   . $owner   . '"}';

echo $outp;
?>
