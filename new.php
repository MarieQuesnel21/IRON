<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="test.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="test.js"></script>


</head>

<body>


    <div class="SearchContainer">

        <input class="search" type="text">
        <button class="search-btn"><img src="image/search.png" width="32px" alt="Settings Button"> </button>
        <button class="add-btn"><a href="index.php"><img src="image/return.png" width="32px" alt="Settings Button"></a> </button>

    </div>

    <form method="post" action="traitement.php">
        <br>
        Nom <input type=text name="nom" id="nom" required>

        <table>
            <tr>
                <td></td>
                <td>L</td>
                <td>l</td>
                <td>h</td>
            </tr>
            <tr>
                <td>Dim</td>
                <td><input type="text" class="InputT" name="L" id="L"></td>
                <td><input type="text" class="InputT" name="l" id="l"></td>
                <td><input class="InputT" type="text" name="h" id="h"></td>
            </tr>
        </table>
        <br><br>
        Mot clé (séparé par ";")
        <input type="text" class="keyword" name="keyword" id="keyword" required>

        <table>
            <tr>
                <td>Contenant</td>

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
            <br>
            <tr>
                <td></td>
                <td>x</td>
                <td>y</td>
                <td>z</td>
            </tr>
            <tr>
                <td>Position </td>
                <td><input type="text" class="InputP" name="positionx" id="x"></td>
                <td><input type="text" class="InputP" name="positiony" id="y"></td>
                <td><input class="InputP" type="text" name="positionz" id="z"></td>
                <!--
             <td><button class="add-containing"><a href="index.php"><img src="image/add.png" width="32px" alt="Settings Button"></a>
                 </button></td>
-->
            </tr>
        </table>
        <table>
            <tr>
                <td>Contenu dans:</td>

                <td>
                    <?php
                $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                $req = "Select * from entity where contenant='1';";
                $Resultat = mysqli_query($con,$req);
                 
               echo' <select name="contenue" id="pet-select" >';
               
           echo'<option value=0 selected> </option>';
                while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
              {      

//                      echo' <button class="dropdown-item" type="button" value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</button>';
                     echo'<option value="'.$ligne['id_entity'].'">'. $ligne['nom'] .'</option>';
              }     
                
                echo'      </select>'
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
        <div>


            <center> <input type="submit" value="Valider" onclick="testInput()"> </center></div>
    </form>



</body>

</html>
