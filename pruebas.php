<?php
//$link = mysqli_connect("localhost", "libhidalgo", "1(LibMich)2++", "altcom_web");
//
//if (mysqli_connect_errno()) {
//    printf("Falló la conexión: %s\n", mysqli_connect_error());
//    exit();
//}
//$date_now = $date = date('Y-m-d H:i:s');
//$quey_find_number = "SELECT * FROM wts WHERE numero='1234' LIMIT 0,1";
//
//
//
//$sql = "INSERT INTO wts(numero,fecha,npregunta,obs) VALUES ('1234','".$date_now."','100001','inicio')";
//if (mysqli_query($link, $sql)) {
//  echo "New record created successfully";
//} else {
//  echo "Error: " . $sql . "<br>" . mysqli_error($link);
//}
//
//$sql = "SELECT * FROM wts";
//$result = mysqli_query($link, $quey_find_number);
//
//if (mysqli_num_rows($result) > 0) {
//    
//  while($row = mysqli_fetch_assoc($result)) {
//    echo "id: " . $row["numero"]. " - Name: " . $row["fecha"]. " " . $row["npregunta"]. "<br>";
//  }
//} else {
//  echo "0 results";
//}
//
//
//mysqli_close($link);

$palabra = "Mi alfa dos tres";
$palabras = explode(" ", $palabra);
print_r($palabras);
echo count($palabras);

echo json_decode('"\ud83d\ude00"');



