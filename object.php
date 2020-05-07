<?php

  $entity = $_GET["entity"]; 

  $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

    $test="SELECT * from entity where id_entity = '".$entity."' "; 
    $test1 =mysqli_query($con,$test);

    while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
    {
      echo"<table>";
      echo "<tr><td>Object : " .$ligne['nom']."</td><tr>";
      echo "<tr><td>Dimention : ".$ligne['dimensionx']." | ".$ligne['dimensiony']." | ".$ligne['dimensionz']."</td><tr>";
      echo "<tr><td>Dimention : ".$ligne['positionx']." | ".$ligne['positiony']." | ".$ligne['positionz']."</td><tr>";
      echo "<tr></tr>";
      echo"</table>";
    }

?>
