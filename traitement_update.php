<?php

$entity = $_GET["id"]; 

$con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

$test="SELECT * from entity where id_entity = '".$entity."' "; 
$test1 =mysqli_query($con,$test);

while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
{

    if ($ligne['nom'] != $_GET['nom'])
    {
        $name= $_GET['nom'];

        $nom="UPDATE entity
                SET nom = '".$name."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['dimensionx'] != $_GET['L'])
    {
        $L= $_GET['L'];

        $nom="UPDATE entity
                SET dimensionx = '".$L."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['dimensiony'] != $_GET['l'])
    {
        $l= $_GET['l'];

        $nom="UPDATE entity
                SET dimensiony = '".$l."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['dimensionz'] != $_GET['h'])
    {
        $h= $_GET['h'];

        $nom="UPDATE entity
                SET dimensionz = '".$h."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['positionx'] != $_GET['positionx'])
    {
        $positionx= $_GET['positionx'];

        $nom="UPDATE entity
                SET positionx = '".$positionx."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['positiony'] != $_GET['positiony'])
    {
        $positiony= $_GET['positiony'];

        $nom="UPDATE entity
                SET positiony = '".$positiony."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['positionz'] != $_GET['positionz'])
    {
        $positionz= $_GET['positionz'];

        $nom="UPDATE entity
                SET positionz = '".$positionz."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }


    if ($ligne['contenant'] != $_GET['containing'])
    {
        $containing= $_GET['containing'];

        $nom="UPDATE entity
                SET contenant = '".$containing."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }

    if ($ligne['num_entity'] != $_GET['contenue'])
    {
        $contenue= $_GET['contenue'];

        $nom="UPDATE entity
                SET num_entity = '".$contenue."'
                WHERE id_entity = '".$entity."'"; 
        $nom1 =mysqli_query($con,$nom);
    }
}

header('Location: index.php');
exit();


?>