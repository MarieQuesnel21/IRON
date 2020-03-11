<?php

$nom=$_POST['nom'];

if (isset($L))
{
    $L=$_POST['L'];
}
else{
    $L='0';
}


if (isset($l))
{
    $l=$_POST['l'];
}
else{
    $l='0';
}

if (isset($h))
{
    $h=$_POST['h'];
}
else{
    $h='0';
}

//***********


if (isset($positionx))
{
   $positionx=$_POST['positionx'];
}
else{
 $positionx='0';
}


if (isset($positiony))
{
   $positiony=$_POST['positiony'];
}
else{
 $positiony='0';
}


if (isset($positionz))
{
   $positionz=$_POST['positionz'];
}
else{
 $positionz='0';
}

//****
$keyword=$_POST['keyword'];
$containing=$_POST['containing'];
$contenue=$_POST['contenue'];
$image=$_POST['image'];

var_dump($L);


if (!isset($l))
{
    $l = '0';
}

if (!isset($h))
{
    $h = '0';
}

$con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

// Verif avant injection

$test="SELECT nom from entity where nom='".$nom."' "; 
$test1 =mysqli_query($con,$test);

$num_rows = mysqli_num_rows($test1);

echo $num_rows;

//if ($num_rows != 0)
//{
//    echo 'ERREUR';
//}
//else{
//    echo'PAS ERREUR';
//}


//--------------------------

// Insertion
if ($contenue != 0)
{
$req = "INSERT INTO entity(nom, contenant, dimensionx, dimensiony, dimensionz, positionx, positiony, positionz,num_entity,image) VALUES('$nom', '$containing', '$l','$L', '$h', 
'$positionx', '$positiony', '$positionz','$contenue',$image);";
}
else {
   $req = "INSERT INTO entity(nom, contenant, dimensionx, dimensiony, dimensionz, positionx, positiony, positionz,image) VALUES('$nom', '$containing', '$l','$L', '$h', 
'$positionx', '$positiony', '$positionz',$image);"; 
}
mysqli_query($con,$req);

// Récupérer id entity

$req1="select id_entity from entity where nom='".$nom."' ";
$id=mysqli_query($con,$req1);

while ($ligne = mysqli_fetch_array($id,MYSQLI_ASSOC))
{
    
    $id_entity=$ligne['id_entity'];
}

// --------------------------

// Ajout Keywork

$mot = "";
$fin = 0;
for( $i=0; $i<=strlen($keyword); $i++ )
  {
      if ($keyword[$i] == ';')
      {
          $mot = "";

          for ( $j=$fin; $j<$i; $j++ )
          {
              $mot.=$keyword[$j];
             
          }
          
          if ((ord ($mot[0]) >= 97 )and (ord ($mot[0]) <= 122) )
          {
              $value = ord($mot[0]) - 32 ;
              $mot[0] = chr ($value);
          }
         
          $reqTestKeywork = "SELECT * FROM `keyword` WHERE name='".$mot."' ";
          $reponseK=mysqli_query($con,$reqTestKeywork);
          $rowcount=mysqli_num_rows($reponseK);
        
          
         if($rowcount == 0 ){ 
            $reqKeywork = "INSERT INTO keyword(name) VALUES('$mot');";
            mysqli_query($con,$reqKeywork);
          }
          
          $fin = $i + 1;
      }
      
  }

// -------------------------------------


// Ajout dans la table entity + keyword 
echo "Id_entity : " .$id_entity."<br>";
  $mot = "";
$fin = 0;
for( $i=0; $i<=strlen($keyword); $i++ )
  {
      if ($keyword[$i] == ';')
      {
          $mot = "";

          for ( $j=$fin; $j<$i; $j++ )
          {
              $mot.=$keyword[$j];
             
          }
          
          echo "Le mot : " .$mot."<br>";
          $reqidK = "SELECT * FROM `keyword` WHERE name='".$mot."' ";
          $reponseIdK=mysqli_query($con,$reqidK);

          
          while ($ligne = mysqli_fetch_array($reponseIdK,MYSQLI_ASSOC))
          {
            
              $id_keyword=$ligne['id_keyword'];
              echo "Id_keyword : " .$id_keyword."<br>";
              $reqKeywork = "INSERT INTO asso_entity_keyword(num_entity,num_keyword) VALUES('$id_entity','$id_keyword');";
              mysqli_query($con,$reqKeywork);
          }

          
          $fin = $i + 1;
      }
      
  }
      
  
// -----------------------------------
  header('Location: index.php');
  exit();

?>


