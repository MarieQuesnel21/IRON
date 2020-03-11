<?php

header( 'content-type: text/html; charset=utf-8' );

$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "projetiron";
$entity_arrays = array();
/* Créer une Connexion  */
$conn = new mysqli($host, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
/* Verifie si il y a une erreur */
if ($conn->connect_error) {
     die("Connexion a BDD Echouer: " . $conn->connect_error);
}
/* Créer une Requête SQL qui interroge la BDD et en sort les entity dans une array. */
$sql = "SELECT LOWER(nom) AS lnom FROM entity";
$result = $conn->query($sql);
/* Si il y a des résultat, les stocker dans le entity_arrays */
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($entity_arrays, $row);
    }
}

if(isset($_POST['search'])){
    $entity = $_POST['search'];
    //var_dump($entity);
    if(!empty($entity)){
        foreach($entity_arrays as $entity_array) {
            if (strpos($entity_array['lnom'], $entity) !== false) {
                //var_dump($entity_array);
                echo "<p id='searchResult' onClick='clickResult(".'"'.$entity_array['lnom'].'"'.")'>".$entity_array['lnom']."</p>";
                //echo "<p id='searchResult' onClick='mafnc(this)'>".$entity_array['lnom']."</p>";
                echo "<br>";
            }
        }
    }
}

if(isset($_POST['supprimer'])){
    $entity = $_POST['supprimer'];
    //var_dump($entity);
    if(!empty($entity)){
        $sql = "DELETE FROM entity WHERE nom = '".$entity."';";
        $conn->query($sql);
        echo "Erasing Failed Sucessfully";
    }
}

if(isset($_POST['requeten'])){
    $name = $_POST['requeten'];
    if ($_POST['requetec'] == NULL){ $contenant = NULL;} else {$contenant = $_POST['requetec'];}
    if ($_POST['requetesx'] == NULL){ $sizex = 0;} else {$sizex = $_POST['requetesx'];}
    if ($_POST['requetesy'] == NULL){ $sizey = 0;} else {$sizey = $_POST['requetesy'];}
    if ($_POST['requetesz'] == NULL){ $sizez = 0;} else {$sizez = $_POST['requetesz'];}
    if ($_POST['requetepx'] == NULL){ $posx = 0;} else {$posx = $_POST['requetepx'];}
    if ($_POST['requetepy'] == NULL){ $posy = 0;} else {$posy = $_POST['requetepy'];}
    if ($_POST['requetepz'] == NULL){ $posz = 0;} else {$posz = $_POST['requetepz'];}
    if(!empty($name)){
        $sql = "INSERT INTO entity (nom, contenant, dimensionx, dimensiony, dimensionz, positionx, positiony, positionz)
        VALUES ('".$name."', '".$contenant."', '".$sizex."', '".$sizey."', '".$sizez."', '".$posx."', '".$posy."', '".$posz."')";
        var_dump($sql);
        $conn->query($sql);
        echo "Add Sucessfully Done";
    } else {
        echo "Add Failed Miserably";
    }
}



/* send a JSON encded array to client */
//echo json_encode($entity_array);
//$conn->close();
?>