<?php
include "consulta.php";
//https://www.twilio.com/es-mx/docs/whatsapp/tutorial/connect-number-business-profile
    $palabras = explode(" ", $palabra);
    $contador = count($palabras);
    $conexion1 = mysqli_connect("hostname","username","password", 'database');
    //mysqli_select_db($conexion1, "allende");
//    $allende0 = "SELECT * FROM `libro` WHERE `titulo` LIKE '%".$palabra."%' AND `cantidad` >= '1' OR `codbar` LIKE '%".$palabra."%' AND `cantidad` >= '1' ORDER BY `titulo` LIMIT 0, 5";
//    $allende2 = "SELECT * FROM `libro` WHERE `titulo` LIKE '%".$palabras[0]."%' AND `titulo` LIKE '%".$palabras[1]."%' AND `cantidad` >= '1' OR `codbar` LIKE '%".$palabra."%' AND `cantidad` >= '1' ORDER BY `titulo` LIMIT 0, 5";
//    $allende3 = "SELECT * FROM `libro` WHERE `titulo` LIKE '%".$palabras[0]."%' AND `titulo` LIKE '%".$palabras[1]."%' AND `titulo` LIKE '%".$palabras[2]."%' AND `cantidad` >= '1' OR `codbar` LIKE '%".$palabra."%' AND `cantidad` >= '1' ORDER BY `titulo` LIMIT 0, 5";
//    $allende4 = "SELECT * FROM `libro` WHERE `titulo` LIKE '%".$palabras[0]."%' AND `titulo` LIKE '%".$palabras[1]."%' AND `titulo` LIKE '%".$palabras[2]."%' AND `titulo` LIKE '%".$palabras[3]."%' AND `cantidad` >= '1' OR `codbar` LIKE '%".$palabra."%' AND `cantidad` >= '1' ORDER BY `titulo` LIMIT 0, 5";
//    
    //switch ($contador) {
//    case 1:
//        $allende = mysqli_query($conexion1,$allende0);
//    case 2:
//        $allende = mysqli_query($conexion1,$allende1);
//    case 3:
//        $allende = mysqli_query($conexion1,$allende2);
//    case 4:
//        $allende = mysqli_query($conexion1,$allende3);
//    }
    
    //$row_allende=mysqli_fetch_array($allende);
	//echo "".$palabra."";
    //$response->message($row_allende['titulo'],$row_allende['cantidad'],$row_allende['precio']);
    
    $allende = mysqli_query($conexion1,$sql);
    
    if (mysqli_num_rows($allende) > 0) {
    while($row = mysqli_fetch_assoc($allende)) {
    $resultado .= "Titulo: ".$row['titulo']."\nStock: ".intval($row['cant'])."\t Precio: $".$row['precio']."\n"."Codigo: ".$row['codbar']."\n"."https://libreriashidalgo.com/libros/".$row['codbar']."\n"."\n";
    
  }
  //$response->message($resultado);
  $menu_principal.=$resultado;
  
$menu_principal.="Deseas buscar otro libro?? \u{1F4DA}\nDe lo contrario presiona cero \u{24EA}, para volver al menu principal";
    }else{
        
        $menu_principal.="No se encontraron resultados, por favor se mas especifico o revisa el codigo de barras";
    }
?>