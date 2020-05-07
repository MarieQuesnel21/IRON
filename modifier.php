<html>

<head>
    
    <link media="screen" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    
    <style>
        .form-container{
            background-color: #9DD2CB;
            width: 100%;
            padding: 16px;
            margin-top: 16px;    
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }


        .direction{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .direction input{
            margin : 6px;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="new.php">Ajouter</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-sm-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Retour</a> 
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="form-container">
        <form method="get" action="traitement_update.php">
                 <?php

                    $entity = $_GET["object"]; 

                    $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                    $test="SELECT * from entity where id_entity = '".$entity."' "; 
                    $test1 =mysqli_query($con,$test);

                    while ($ligne = mysqli_fetch_array($test1,MYSQLI_ASSOC))
                    {
                        echo'
                        
                            <input type=text name="id" id="id" value="' .$entity.'"  style="display:none" required></td>
                        
                            <p> Nom :</p>
                            <td><input type=text name="nom" class="form-control" id="nom" value="' .$ligne['nom'].'" required></td>
                        
                            <hr>
            
                            <p> Dimensions : </p>
                            <div class="direction"><p>L</p><p>l</p><p>h</p></div>
                            <div class="direction">
                                <input type="text" class="InputT" name="L" id="L" value="' .$ligne['dimensionx'].'"></td>
                                <input type="text" class="InputT" name="l" id="l" value="' .$ligne['dimensiony'].'"></td>
                                <input type="text" class="InputT" name="h" id="h" value="' .$ligne['dimensionz'].'"></td>
                            </div>
                            
                            <hr>
                
                        <td>Mot clé (séparé par ";") : </td>
                        ';

                            $keyword="SELECT k.name 
                            from asso_entity_keyword as aek
                            inner join keyword as k
                            on aek.num_keyword = k.id_keyword
                            where aek.num_entity = '".$entity."' "; 

                            $keyword1 =mysqli_query($con,$keyword);

                            while ($keyword_ligne = mysqli_fetch_array($keyword1,MYSQLI_ASSOC))
                            {
                               echo' <td><input type="text" name="" value="' .$keyword_ligne['name'].'"></td>';
                            }
        
                        echo'
                       <hr>
                            Contenant :';

                            if ($ligne['contenant'] == 1)
                            {
                                echo'
                                    <td>
                                        <div>
                                            <input type="radio" id="huey" name="containing" value="1" checked required>
                                            <label for="huey">Oui</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" id="dewey" name="containing" value="0" required>
                                            <label for="dewey">Non</label>
                                        </div>
                                    </td>';
                            }
                            else{
                                echo'
                                    <td>
                                        <div>
                                            <input type="radio" id="huey" name="containing" value="1"  required>
                                            <label for="huey">Oui</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" id="dewey" name="containing" value="0" checked required>
                                            <label for="dewey">Non</label>
                                        </div>
                                    </td>';
                            }
                            

                            echo'
                        <hr>

                        <p> Position :  </p>
                        <div class="direction"><p>L</p><p>l</p><p>h</p></div>
                        <div class="direction">
                            <input type="text" class="InputT" name="positionx" id="x" value="' .$ligne['positionx'].'">
                            <input type="text" class="InputT" name="positiony" id="y" value="' .$ligne['positiony'].'">
                            <input type="text" class="InputT" name="positionz" id="z" value="' .$ligne['positionz'].'">
                        </div>
                       
                        <hr>
                            <p>Contenu dans : </p>
                            ';

                            $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                            $req = "Select * from entity where contenant='1';";
                            $Resultat = mysqli_query($con,$req);

                            $selected="SELECT num_entity from entity where id_entity = '".$entity."' "; 
                            $selected1 = mysqli_query($con,$test);

                            echo'<select name="contenue" id="pet-select" class="form-control">';

                            echo'<option value=0> </option>';

                            while (  $s = mysqli_fetch_array($selected1,MYSQLI_ASSOC)  )
                            {   
                                $select = $s['num_entity'];
                            }
                            
                            while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
                            {      
                            
                                echo $select;
                                echo $ligne['id_entity'];

                                if ($select == $ligne['id_entity']){
                                    echo'<option value="'.$ligne['id_entity'].'" selected>'. $ligne['nom'] .'</option>';
                                }
                                else{
                                 echo'<option value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</option>';
                                }
                            }     

                            echo'</select>';

                     };

                    
                ?> 

            
            <div id="container-valider"> 
                <center>
                    <input id="valider" type="submit" value="Valider"  class="btn btn-secondary" onclick="testInput()">
                </center>
            </div>
           
       
    </div>
    
</body>

</html>