<?php

//$emoji_array = array("","\u{1F50D}","\u{1F4CE}","\u{1F3E2}");

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;
use \Twilio\TwiML\MessagingResponse;


// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "";
$token = "";
$twilio = new Client($sid, $token);
$response = new MessagingResponse;
$body = $_REQUEST['Body'];
global $palabra;
$palabra = $body;
$number_request = $_REQUEST['From'];

$numero =  strstr($number_request, '+');

$date_now = $date = date('Y-m-d H:i:s');

$link = mysqli_connect("hostname", "username", "password", "database");





$query_find_number = "SELECT * FROM wts WHERE numero='".$numero."' LIMIT 0,1";
$result = mysqli_query($link, $query_find_number);

if (mysqli_num_rows($result) > 0) {
    
    //$response->message("Estas en la base de datos");
        //variable estas imprimir npregunta
    //$body lo queontesto 1 al 3
    
    while($row = mysqli_fetch_assoc($result)) {
    
    //$response->message($row['npregunta']);
    $idw=$row['idw'];
    $donde=$row['npregunta'];
    if($body=="0") $donde="100001";
    
  }
  if($donde==100101) $body=1;
  $query_find_messages = "SELECT sigue FROM wtsp WHERE menu=".$donde." AND pregunta=".$body."  LIMIT 0,100 ";

    $result = mysqli_query($link, $query_find_messages);    

    
  while($row = mysqli_fetch_assoc($result)) {
    
   // $response->message($i.") ".$row['mensaje']);
    $menu=$row['sigue'];
  }
    if(empty($menu)) $menu="100001";
    if($donde==100102) $menu="100102";
    $ko = "UPDATE `wts` SET `npregunta`='".$menu."' WHERE (`idw`='".$idw."') LIMIT 1";
    $rky = mysqli_query($link, $ko);
    
    $query_find_messages = "SELECT * FROM wtsp WHERE menu=".$menu." LIMIT 0,100 ";

    $result = mysqli_query($link, $query_find_messages);    
    $i=1;
    
  while($row = mysqli_fetch_assoc($result)) { 
    $menu_principal .=$i.") ".$row['mensaje']."\n"."\n";
    $pag=$row['pagina'];
    include $pag;
  
    
 
    $i++;
  }

   $response->message($menu_principal);
  
  
  
  //SELECT * FROM `wtsp` WHERE `menu` = '100101' LIMIT 0, 1000
  
  
  
} else {
    
  $sql = "INSERT INTO wts(numero,fecha,npregunta,obs) VALUES ('".$numero."','".$date_now."','100001','inicio')";
    if (mysqli_query($link, $sql)) {
        
        $response->message("Hola como estas en que te puedo ayudar?");
        
        $query_find_messages = "SELECT * FROM wtsp WHERE menu=100001 LIMIT 0,1000 ";
    $result = mysqli_query($link, $query_find_messages);    
    $i=1;
    
  while($row = mysqli_fetch_assoc($result)) {
    
    $response->message($i.") ".$row['mensaje']);
    $i++;
    
  }
        
        
        
    }
}




//id pregunta
//$default = "selecciona una opcion \n1)Buscar un libro \n2) \n3)";
//$options = [
//  "Describe el libro lo mas breve posible o el codigo de barras",
//  "opcion 2",
//  "opcion 3"
//  ];
//  
//
//
//if ($body == 1) {
//    //$response->message($options[0]);
//    //$response->message("El libro que buscaste es: ".$body);
//    $response->message($number_request);
//    
//    
//}elseif($body == 2){
//    $response->message($options[1]);
//    $response->message($default);
//}elseif($body == 3){
//    $response->message($options[2]);
//    $response->message($default);
//}
// else {
//    $response->message($default);
//}

print $response;



////responder con imagen y texto con cualquier mensaje que envien
//$response = new MessagingResponse;
//$message = $response->message("");
//$message->body("The Robots are coming! Head for the hills!");
//$message->media("https://farm8.staticflickr.com/7090/6941316406_80b4d6d50e_z_d.jpg");

//$mensaje_bienvenida = $twilio->messages
//->create("whatsapp:+5214432139780", // to
//[
//"from" => "whatsapp:+14155238886",
//"body" => "Hola Escoje una opcion 1) 2) 3)"
//]
//);
//print $response;

?>


