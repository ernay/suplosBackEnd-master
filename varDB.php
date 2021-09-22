<?php

//DATOS DE CONEXION A LA BASE DE DATOS
$vserver='localhost';
$vuserdb='ernay';
$vpassdb='1234';
$vdbase='Intelcost_bienes';


try{
  $conn=mysqli_connect($vserver, $vuserdb, $vpassdb, $vdbase);
  if(!$conn)
    throw new Exception('No conecto a la base de datos');
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>