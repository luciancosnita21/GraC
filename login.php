<?php

$id=$numeutilizator=$password="";
$numeutilizatorErr=$passwordErr="";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["uname"])) {
    $numeutilizatorErr = "Nu ati speificat avatarul";
  } else {
    $numeutilizator = test_input($_POST["uname"]);
    }

 if (empty($_POST["psw"])) {
    $passwordErr = "Nu ati ales o parola";
  } else {
    $password= test_input($_POST["psw"]);
   
    
  }

  
 
 
 $conexiune = mysql_connect (
    'localhost', // locatia serverului (aici, masina locala)
    'root',       // numele de cont
    ''     // parola
  );
  // verificam daca am reusit
  if (!$conexiune) {
  	die ('A survenit o eroare de conectare: ' . mysql_error());
  }
  // deschidem baza de date 
  if (!mysql_select_db('grac', $conexiune)) {
    die ('Baza de date nu poate fi deschisa: ' . mysql_error());
  } 


  $sql = "select id from utilizator where avatar='$numeutilizator' and password='$password'";
  $interog = mysql_query ($sql, $conexiune);
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }



  $inreg = mysql_fetch_array ($interog);

$id=$inreg['id'];
if($id!=NULL)
{$_SESSION['uname']=$id;
header("Location:paginacont.html");
}
else
  
{echo ('Nume utilizator sau parola incorecta');
echo '<br>';
echo ' <button type="button"><a href="Login.html">Mai incercati o data</a></button>' ; 
  }

  }





?>