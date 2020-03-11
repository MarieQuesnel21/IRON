 
<html>
<head>
    
<title></title>
 
<script type="text/javascript">
<!--
function testInput()
{
 var exp = new RegExp("^[a-zA-Z]*$","g");
 var data = document.getElementById("idText").value;
 alert(exp.test(data));
 
}
//-->
</script>
 
</head>
 
<body>
 
<input type="test" value="" id="idText" size="50"/>
<input type="button" value="tester" id="idButton" onclick="testInput()"/>
 
 
</body>
 
</html>


                <?php
                $con = mysqli_connect( "localhost" , "root" , "" , "projetiron" );

                $req = "Select * from image;";
                $Resultat = mysqli_query($con,$req);
                 
                    echo'<select id="image" onchange="change();">';
                 
               echo'<option value=0 selected> </option>';
                while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
              {      

                   echo'<option style="background:url(image/'.$ligne['lien'].'.png) no-repeat; width:100px; height:100px;"></option>';
                }
    
                   echo'      </select>'
       ?> 