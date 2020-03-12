<html>

<head>
    
    <link media="screen" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    
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
            <table>
                <tr>
                    <td>Nom :</td>
                    <td><input type=text name="nom" id="nom" required></td>
                
                </tr>
                <tr>
                    <td>Dimensions : </td>
                    <td>L : <input type="text" class="InputT" name="L" id="L"></td>
                    <td>l : <input type="text" class="InputT" name="l" id="l"></td>
                    <td>h : <input type="text" class="InputT" name="h" id="h"></td>
                </tr>
            
                <br><br>
                <tr >
                    <td>Mot clé (séparé par ";") : </td>
                    <td colspan="3"><input type="text" class="keyword" name="keyword" id="keyword" required></td>
                </tr>
                <tr>
                    <td>Contenant : </td>
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
                    </td>
                </tr>
                <tr>
                    <td>Position : </td>
                    <td>X : <input type="text" class="InputT" name="positionx" id="x"></td>
                    <td>Y : <input type="text" class="InputT" name="positiony" id="y"></td>
                    <td>Z : <input type="text" class="InputT" name="positionz" id="z"></td>
                    <!--
                 <td><button class="add-containing"><a href="index.php"><img src="image/add.png" width="32px" alt="Settings Button"></a>
                     </button></td>
    -->
                </tr>
                <tr>
                    <td>Contenu dans : </td>

                    <td>

                        <?php
                        $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                        $req = "Select * from entity where contenant='1';";
                        $Resultat = mysqli_query($con,$req);

                        echo'<select name="contenue" id="pet-select" >';

                        echo'<option value=0 selected> </option>';
                        while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
                        {      

                            //echo' <button class="dropdown-item" type="button" value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</button>';
                            echo'<option value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</option>';
                        }     

                        echo'</select>'
                        ?>

                    </td>
                </tr>
            </table>
            <br><br>

                <?php
                $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                $req = "Select * from image;";
                $Resultat = mysqli_query($con,$req);

                while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
                {      
                    echo' <input type="radio" name="image" value="'.$ligne['id_image'].'" id="radio-choice-1" />
                    <label for="radio-choice-1"><img src="image/'.$ligne['lien'].'.png" alt=""  width="80px" height="80px"></label>';

                }
                ?> 

            <div id="container-valider"> 
                <center>
                    <input id="valider" type="submit" value="Valider" onclick="testInput()">
                </center>
            </div>
        </form>
    </div>
    
</body>

</html>
