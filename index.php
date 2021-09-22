<?php
include "varDB.php";
  

 $query="select id, direction, city, phone, postal_code, type_b, price from bienes";
 $result=$conn->query($query);

 
if(!empty($_POST['ciudad']) || !empty($_POST['tipo'])){
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

//LLENA LOS FILTROS DE LA CIUDAD Y TIPO
$data = file_get_contents("data-1.json");
$selec = json_decode($data, true);
$i=0;
$ci = array(0);

foreach($selec as $ar){
 
    $ci[$i]=$ar['Ciudad'];
    $ti[$i]=$ar['Tipo'];
    $i++;
}
$citys= array_unique($ci);
$tipos= array_unique($ti);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>            
              <?php foreach($citys as $ci){  ?>
                <option value="<?php  echo $ci; ?>"><?php  echo $ci; ?></option>
                <?php }  ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <?php foreach ($tipos as $ti) {  ?>
                <option value="<?php  echo $ti; ?>"><?php  echo $ti; ?></option>
                <?php }  ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>        
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reportes</a></li>
      </ul>
      <div id="tabs-1">
      <form method="post" onsubmit="return false" id="bienesform">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>           
            <div class="divider"></div>
 
                <?php $j=0; foreach ($bienes as $bien) {  ?> 
                <div class="container">  
                    <div class="row">
                        <div class="col pull-s2">
                            <img src="img/home.jpg" width="300px" height="250px">    
                        </div>  
                        <div class="row pull-s8">
                        
                            <p>Dirección: <?php echo $bien['Direccion']; ?></p>
                            <input type="hidden" name="direction" id="direction<?php echo $j; ?>" value="<?php echo $bien['Direccion']; ?>">
                            <p>Ciudad: <?php echo $bien['Ciudad']; ?></p>
                            <input type="hidden" name="city" id="city<?php echo $j; ?>" value="<?php echo $bien['Ciudad']; ?>">
                            <p>Telefono: <?php echo $bien['Telefono']; ?></p>
                            <input type="hidden" name="phone" id="phone<?php echo $j; ?>" value="<?php echo $bien['Telefono']; ?>">
                            <p>Codigo Postal: <?php echo $bien['Codigo_Postal']; ?></p>
                            <input type="hidden" name="postal_code" id="postal_code<?php echo $j; ?>" value="<?php echo $bien['Codigo_Postal']; ?>">
                            <p>Tipo: <?php echo $bien['Tipo']; ?></p>
                            <input type="hidden" name="type_b" id="type_b<?php echo $j; ?>" value="<?php echo $bien['Tipo']; ?>">
                            <p>Precio: <?php echo $bien['Precio']; ?></p>                            
                            <input type="hidden" name="price" id="price<?php echo $j; ?>" value="<?php echo $bien['Precio']; ?>">           
                           
                            <button onclick="registrar(<?php echo $j; ?>)" class="btn" value="<?php echo $j; ?>" >GUARDAR</button>
                            <?php $j++; ?>
                        </div>
                        
                    </div>     
                </div>
                <?php }?>
               
            </div>
            </div>
         </form>
        </div>      
        <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="divider"></div>
            <?php    while($row = $result->fetch_assoc()) { ?>
            <div class="container" id="bien<?php echo $row['id']; ?>">  
                    <div class="row">
                    <form action="#" method="post" id="myForm">
                        <div class="col pull-s2">
                           <img src="img/home.jpg" width="300px" height="250px"> 
                        </div>  
                        <div class="row pull-s10" >  
                                  <p>Dirección: <?php echo $row['direction']; ?></p>
                                  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                                  <p>Ciudad: <?php echo $row['city']; ?></p>
                                  <p>Telefono: <?php echo $row['phone']; ?></p>                                 
                                  <p>Codigo Postal: <?php echo $row['postal_code']; ?></p>                                  
                                  <p>Tipo: <?php echo $row['type_b']; ?></p>                                  
                                  <p>Precio: <?php echo $row['price']; ?></p>                                                                                             
                                  <a type="submit" class="btn"  name="btndelete" id="delete" onclick="Eliminar(<?php echo $row['id']; ?>)" >ELIMINAR</a>
                                  <div id="resultado"></div>
                        </div>  
                    </form>                        
                    </div>
              </div>
              <?php } ?>  
          </div>
        </div>
      </div>
    
    <div id="tabs-3" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Exportar reporte:</h5>
            <div class="divider"></div>
              <div class="container">  
                    <div class="row m12">
                      <form action="exportar.php" method="post">                       
                          <div class="col m12">  
                            <div class="center"><h4>Filtros</h4></div>
                            <div class="filtroCiudad input-field">
                              <p><label for="selectCiudad">Ciudad:</label><br></p>
                              <select name="ciudad" id="selectCiudad">
                                <option value="" selected>Elige una ciudad</option>            
                                <?php foreach($citys as $ci){  ?>
                                  <option value="<?php  echo $ci; ?>"><?php  echo $ci; ?></option>
                                  <?php }  ?>
                              </select>
                            </div> 
                              <div class="filtroTipo input-field">
                              <p><label for="selecTipo">Tipo:</label></p>
                                <br><br>
                                <select name="tipo" id="selectTipo">
                                  <option value="">Elige un tipo</option>
                                  <?php foreach ($tipos as $ti) {  ?>
                                    <option value="<?php  echo $ti; ?>"><?php  echo $ti; ?></option>
                                    <?php }  ?>
                                </select>
                            </div>                            
                          </div>  
                          
                            <button type="submit"  class="btn">GENERAR EXCEL</button>
                           
                      </form>                        
                    </div>
              </div>
          </div>
        </div>
    </div>
  </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });

  function Eliminar(txtID) {
    if(confirm("¿Esta seguro de eliminar?")){
    $.ajax({
      
            type: "POST",
            url: "remove.php",
            cache: false,
            data: {txtID},
            error:function(){
                $("#resultado").html("Error");
            },            
            success: function(okay){
              $("#bien" + txtID).remove();

            }

    });
  }
    return false;
}
  function registrar(txtID){

    var reg1= document.getElementById('direction'+txtID).value;
    var reg2= document.getElementById('city'+txtID).value;
    var reg3= document.getElementById('phone'+txtID).value;
    var reg4= document.getElementById('postal_code'+txtID).value;
    var reg5= document.getElementById('type_b'+txtID).value;
    var reg6= document.getElementById('price'+txtID).value;
 
    $.ajax({
    		url: "registrar.php",
    		type: "POST",
        cache: false,
    		data: { reg1: reg1, reg2: reg2, reg3: reg3, reg4: reg4, reg5: reg5, reg6: reg6},
 
    		success: function(data){    	
          alert("Datos insertados correctamente");
          $("#tabs-2").load(" #tabs-2");
    		},
    	});
    return false;
  }
</script>
  </body>
  </html>
