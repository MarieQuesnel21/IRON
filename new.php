<html>

<head>
    
    <link media="screen" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <style>
        body {
            height: 100%;
        }
        input[type="radio"]:checked+label img {
            outline: 3px solid #343a40 !important;
        }   

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
        <form method="post" action="traitement.php">
            <br>
              
                <p> Nom :</p>
                <input type=text name="nom" id="nom" class="form-control" required>
            
                <hr>
            
                <p> Dimensions : </p>
                <div class="direction"><p>L</p><p>l</p><p>h</p></div>
                <div class="direction">
                    <input type="text" class="InputT" name="L" id="L">
                    <input type="text" class="InputT" name="l" id="l">
                    <input type="text" class="InputT" name="h" id="h">
                </div>
                
                <hr>
        
                <p>Mot clé (séparé par ";") : <p>
                <input type="text" class="keyword" name="keyword" id="keyword" required>
            
                <hr>
               
                <p> Contenant : </p>
                
                <div>
                    <input type="radio" id="huey" name="containing" value="1" checked required>
                    <label for="huey">Oui</label>
                </div>
            
            
                <div>
                    <input type="radio" id="dewey" name="containing" value="0" required>
                    <label for="dewey">Non</label>
                </div>
                
                <hr>

                <p>Position : </p>
                <div class="direction"><p>X</p><p>Y</p><p>Z</p></div>
                <div class="direction">
                    <input type="text" class="InputT" name="positionx" id="x">
                    <input type="text" class="InputT" name="positiony" id="y">
                    <input type="text" class="InputT" name="positionz" id="z">
                </div>
            
                <!--
            <button class="add-containing"><a href="index.php"><img src="image/add.png" width="32px" alt="Settings Button"></a>
                    </button>
    -->
                <hr>
            
                <p>Contenu dans : </p>

                

                    <?php
                    $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                    $req = "Select * from entity where contenant='1';";
                    $Resultat = mysqli_query($con,$req);

                    echo'<select name="contenue" id="pet-select" class="form-control">';

                    echo'<option value=0 selected> </option>';
                    while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
                    {      

                        //echo' <button class="dropdown-item" type="button" value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</button>';
                        echo'<option value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</option>';
                    }     

                    echo'</select>'
                    ?>

                
            
           
                <hr>

                <?php
                $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                $req = "Select * from image;";
                $Resultat = mysqli_query($con,$req);

                while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
                {     
            
                    if ($ligne['lien'] == "autre") 
                    {
                        echo' <input type="radio" name="image" value="'.$ligne['id_image'].'" id="radio-choice-1" >
                        <label for="radio-choice-1"><img src="image/'.$ligne['lien'].'.png" alt=""  width="80px" height="80px"></label>';    
                    }
                    else
                    {
                        echo' <input type="radio" name="image" value="'.$ligne['id_image'].'" id="radio-choice-1" checked>
                        <label for="radio-choice-1"><img src="image/'.$ligne['lien'].'.png" alt=""  width="80px" height="80px"></label>';    
                    }
                   
                }
                ?> 

            <div id="container-valider"> 
                <center>
                    <input id="valider" type="submit" value="Valider"  class="btn btn-secondary" onclick="testInput()">
                </center>
            </div>
        </form>
    </div>
    
</body>

</html>
