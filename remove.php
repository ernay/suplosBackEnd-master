<?php
include "varDB.php";

$sql="delete from bienes where id='".$_POST['txtID']."'";
mysqli_query($conn, $sql);

?>