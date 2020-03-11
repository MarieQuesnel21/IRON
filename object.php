<?php


 if (isset($_GET["object"]))
{
     
     $object = $_GET["object"]; 
    
    if (isset($_GET["Filtre"]))
    {
        $Filtre = $_GET["Filtre"];  
        if(!empty($Filtre))
        {
              $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

            $Filtre="select e.nom
            from entity as e
            inner join asso_entity_keyword as aek
            on e.id_entity = aek.num_entity
            inner join keyword as k
                on k.id_keyword = aek.num_keyword
                where k.name = '".$Filtre."' and nom Like '".$object."%'  "; 
            $Filtre1 =mysqli_query($con,$Filtre);

             while ($ligne = mysqli_fetch_array($Filtre1,MYSQLI_ASSOC))
                  {
                    echo "<div class='affichageobject'>";
                    echo $ligne['nom'];
                    echo "</div>";
                  }

        }
        else 
        {
        $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

        $test="SELECT nom from entity where nom Like '".$object."%' "; 
        $test1 =mysqli_query($con,$test);

         while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
              {
                echo "<div class='affichageobject'>";
                echo $ligne['nom'];
                echo "</div>";
              }
     
        }
    }
     
     else 
     {
        $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

        $test="SELECT nom from entity where nom Like '".$object."%' "; 
        $test1 =mysqli_query($con,$test);

         while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
              {
                echo "<div class='affichageobject'>";
                echo $ligne['nom'];
                echo "</div>";
              }
     
     }

}

//    $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );
//
//    $test="SELECT nom from entity where nom='".$nom."' "; 
//    $test1 =mysqli_query($con,$test);
//
//    $num_rows = mysqli_num_rows($test1);
//
//    echo $num_rows;


?>