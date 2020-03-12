<html>

<head>
    <link media="screen" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <style>
        .affichage {
            display: flex;
            flex-direction: row;
            padding: 16px;
            Height : 50vh;

        }

        .affichageobject {
            width: 200px;
            height: 200px;
            border: 1px solid black;
            margin: 0 8px 0 8px;
        }

        .tag {
            color: whitesmoke;
        }

        .bas{
            height : 40px;
        }

        iframe {
            border: 1px solid black;
            width: 100%;
            height: 80%;
        }

        .output {
            background: #eee;
        }

        body{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .bottom{
            height:30vh;
        }


    </style>

    <script>
        function myFunction(obj) {
        
            var theId = obj.id;
            var loc = "object.php?entity=" + theId;  
            document.querySelector("iframe#oneIframe").setAttribute("src",loc);
        }
    </script>

    <div class="top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Acceuil</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Ajouter</a>
                </li>
            </ul>
            <?php
            
      
           
            
             if (isset($_GET["object"]))
        {
            $object = $_GET["object"]; 
                 
            echo'
            <form action="index.php?nom=marteau&amp;" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" value="'.$object.'" name="object" type="search" placeholder="Recherche un objet" aria-label="Search">
                <input class="form-control mr-sm-2" name="Filtre" type="search" placeholder="Filtre" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Filtre</button>
            </form>';
                
             }
              else
        {
            
               
            echo'<form action="index.php" method="get" class="form-inline my-2 my-lg-0" style="margin-right:16px;">
                <input class="form-control mr-sm-2" name="object" type="search" placeholder="Recherche un objet" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Recherche</button>
            </form>';
            }
            ?>
        </div>
    </nav>

    <?php
        echo '
        <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary" style="height:40px;">
            <div class=" collapse navbar-collapse" id="navbarTogglerDemo01">
                    ' ;
                if (isset($_GET["Filtre"]))
                    {
                         $Filtre = $_GET["Filtre"]; 
                        echo'<div class="tag">'.$Filtre.'</div>';
                    }
    
     echo'</div>
        </nav>';

    ?>
    </div>
    <div class="affichage">
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

                    $Filtre="select e.nom, e.id_entity,
                    from entity as e
                    inner join asso_entity_keyword as aek
                    on e.id_entity = aek.num_entity
                    inner join keyword as k
                        on k.id_keyword = aek.num_keyword
                        where k.name = '".$Filtre."' and nom Like '".$object."%'  "; 
                    $Filtre1 =mysqli_query($con,$Filtre);

                     while ($ligne = mysqli_fetch_array($Filtre1,MYSQLI_ASSOC))
                          {
                            echo "<div id='" .$ligne['id_entity']."' class='affichageobject' onclick='myFunction(this)'>";
                            echo $ligne['nom'];
                            echo "</div>";
                          }

                }
                else 
                {
                $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                $test="SELECT id_entity,nom from entity where nom Like '".$object."%' "; 
                $test1 =mysqli_query($con,$test);

                 while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
                      {
                        echo "<div id='" .$ligne['id_entity']."' class='affichageobject' onclick='myFunction(this)'>";
                        echo $ligne['nom'];
                        echo "</div>";
                      }
             
                }
            }
             
             else 
             {
                $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                $test="SELECT id_entity, nom from entity where nom Like '".$object."%' "; 
                $test1 =mysqli_query($con,$test);

                 while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
                      {
                        echo "<div id='" .$ligne['id_entity']."' class='affichageobject' onclick='myFunction(this)'>";
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
    </div>

    <div class="bottom">
        <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary" class="Bas">
            <div class=" collapse navbar-collapse" id="navbarTogglerDemo01">
            Object
            </div>
        </nav>
        <?php
        if (isset($_GET["object"]))
        {  

             $object = $_GET["object"]; 
            
                if (isset($_GET["Filtre"]))
                {  
                        $Filtre = $_GET["Filtre"];  
                }
            
        }
        echo"<iframe
            id='oneIframe'
            title='Inline Frame Example'
            target-name = iframe;
            width='300'
            height='200'
            src=''>
        </iframe>";

        ?>
    </div>
  
</body>

</html>
