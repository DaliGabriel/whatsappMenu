<?php
$a= 0;
$b= 5;
$t2="titulo";
$odeby="cantidad DESC";
$ode="cant DESC";
$condf="AND `cantidad` >= '1' AND `web` = '0' AND `precio` > '0' ";
$t1 = $palabra;
$n=explode(" ", $t1);
$numero=count($n); 
switch ($numero) {
 		case 1:
		$sql ="SELECT tx.id,tx.titulo,tx.autor,tx.editorial,tx.tema,tx.codbar,tx.precio,tx.grado,tx.linea,sum(tx.cantidad) as cant FROM ( 
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM madero.libro WHERE titulo LIKE '%".$t1."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf." 
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM allende.libro WHERE titulo LIKE '%".$t1."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM chapu.libro WHERE titulo LIKE '%".$t1."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
) as tx
GROUP BY tx.id
ORDER BY ".$ode."
LIMIT $a,$b";
        break;
		case 2:
		$sql ="SELECT tx.id,tx.titulo,tx.autor,tx.editorial,tx.tema,tx.codbar,tx.precio,tx.grado,tx.linea,sum(tx.cantidad) as cant FROM ( 
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM madero.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf." 
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM allende.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM chapu.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
) as tx
GROUP BY tx.id
ORDER BY ".$ode."
LIMIT $a,$b";
        break;
		case 3:
		$sql = "SELECT tx.id,tx.titulo,tx.autor,tx.editorial,tx.tema,tx.codbar,tx.precio,tx.grado,tx.linea,sum(tx.cantidad) as cant FROM ( 
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM madero.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' AND $t2 LIKE '%".$n[2]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf." 
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM allende.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' AND $t2 LIKE '%".$n[2]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM chapu.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' AND $t2 LIKE '%".$n[2]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
) as tx
GROUP BY tx.id
ORDER BY ".$ode."
LIMIT $a,$b";
        break;
		case 4:
		$sql = "SELECT tx.id,tx.titulo,tx.autor,tx.editorial,tx.tema,tx.codbar,tx.precio,tx.grado,tx.linea,sum(tx.cantidad) as cant FROM ( 
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM madero.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' AND $t2 LIKE '%".$n[2]."%' AND $t2 LIKE '%".$n[3]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf." 
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM allende.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' AND $t2 LIKE '%".$n[2]."%' AND $t2 LIKE '%".$n[3]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
UNION
SELECT id,titulo,autor,editorial,tema,codbar,precio,grado,linea,cantidad FROM chapu.libro WHERE titulo LIKE '%".$n[0]."%' AND $t2 LIKE '%".$n[1]."%' AND $t2 LIKE '%".$n[2]."%' AND $t2 LIKE '%".$n[3]."%' ".$condf."or autor LIKE '%".$t1."%' ".$condf."or codbar LIKE '%".$t1."%' ".$condf."
) as tx
GROUP BY tx.id
ORDER BY ".$ode."
LIMIT $a,$b";
        break;
		default:
		$sql = "SELECT * FROM allende.libro WHERE $t2 LIKE '%$t1%' ".$condf."ORDER BY ".$odeby." LIMIT $a,$b";
		}
?>