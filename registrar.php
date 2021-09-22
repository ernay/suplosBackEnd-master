<?php
include "varDB.php";

$sql= "INSERT INTO bienes ( direction, city, phone, postal_code, type_b, price) VALUES ('".$_POST['reg1']."', '".$_POST['reg2']."', '".$_POST['reg3']."', '".$_POST['reg4']."', '".$_POST['reg5']."', '".$_POST['reg6']."')";
mysqli_query($conn, $sql);

?>