<?php
session_start();
$date3=$date4=$date5=$date6="";


$id=$_SESSION['UNAME'];
$date3=$_POST["date3"];
$date4=$_POST["date4"];
$date5=$_POST["date5"];
$date6=$_POST["date6"];



if(((($date4==$date5)&&($date5!=""))||(($date5==$date6)&&($date5!=""))||(($date4==$date6)&&($date4!=""))) )
{echo("Un autograf poate fi adaugat la un schimb doar o data");
echo '<br>';
echo ' <button type="button"><a href="dorite.php">Inapoi pe pagina de schimb</a></button>' ; 
}
else
if($date3=="")
  {echo("Nu ati spus ce autograf doriti");
echo '<br>';
echo ' <button type="button"><a href="dorite.php">Inapoi pe pagina de schimb</a></button>' ; 
}
 else
 if($date4==""&&$date5==""&&$date6=="")
 {echo("Nu ati specificat niciun autograf pe care doriti sa-l oferiti");
echo '<br>';
echo ' <button type="button"><a href="dorite.php">Inapoi pe pagina de schimb</a></button>' ; 
}

else
{



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
 

 
 
 
 $sql = "select max(id) from schimburi;";
  $interog = mysql_query ($sql, $conexiune);
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }



  $inreg = mysql_fetch_array ($interog);

   $schimb=$inreg['max(id)']+1;


 
 

  $sql = "select idUser from autograf where id='$date3' ; ";
  $interog = mysql_query ($sql, $conexiune);

 
  if (!$interog) {
  	die ('A survenit o eroare la interogare2: ' . mysql_error());
  }
   


  
  if( $inreg =mysql_fetch_assoc($interog))
  {
    $User=$inreg["idUser"];
    
  }
    $stare="pending";
    $sql = "INSERT INTO schimburi (id,idUser1,idUser2,autografdorit,autografdat1,autografdat2,autografdat3,stare)
VALUES ('$schimb','$id','$User','$date3','$date4','$date5','$date5','$stare')";

if(! mysql_query ($sql, $conexiune))
die ('A survenit o eroare la interogare3: ' . mysql_error());
  else
   header("Location:dorite.php");
  
  
  
}

?>