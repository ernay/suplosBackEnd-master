
<?php
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=bienes.xls');
if(isset($_POST['ciudad']) || isset($_POST['tipo'])){
    $ciudad= $_POST['ciudad'];
    $tipo= $_POST['tipo'];
    $data = file_get_contents("data-1.json");
    $bienes = json_decode($data, true);
    $res=array();
    $i=0;
    foreach($bienes as $bien){
      
        if(isset($_POST['ciudad']) && isset($_POST['tipo'])){
            if($bien['Ciudad']==$ciudad && $bien['Tipo']==$tipo){
                $res[$i]= $bien;              
                $i++;
            }
                
        }
        if(empty($tipo)){   
       
            if($bien['Ciudad']==$ciudad){
            $res[$i]= $bien;          
            $i++;
            }
       }
       if(empty($ciudad)){     
            if($bien['Tipo']==$tipo){
            $res[$i]= $bien;          
            $i++;
            }    
        }
  
   
    }
    $bienes=$res;

}
else{
    $data = file_get_contents("data-1.json");
    $bienes = json_decode($data, true);

}

?>

<html>
<head>
</head>
<body>

<table  cellpadding="2" cellspacing="0" width="100%">
    <caption>Bienes</caption>
    <tr>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Telefono</th>
        <th>Codigo Postal</th>
        <th>Tipo</th>
        <th>Precio</th>
    </tr>
   <?php foreach ($bienes as $bien) { ?>
    <tr>
        <td><?php echo $bien['Direccion']; ?></td>
        <td><?php echo $bien['Ciudad']; ?></td>
        <td><?php echo $bien['Telefono']; ?></td>
        <td aling="right"><?php echo $bien['Codigo_Postal']; ?></td>
        <td aling="right"><?php echo $bien['Tipo']; ?></td>
        <td aling="right"><?php echo $bien['Precio']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>    