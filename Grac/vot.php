<?php
session_start();

$id=$nota="";

$id=$_POST["id"];
$nota=$_POST["nota"];







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
 
$var='%/'.$_SESSION['UNAME'].'/%';

  $sql = "select valoare,nr_voturi,lista_voturi from autograf where id='$id' and lista_voturi  not like '$var'; ";
  $interog = mysql_query ($sql, $conexiune);

 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }
   


  
  if( $inreg =mysql_fetch_assoc($interog))
  {$newnota=bcdiv(( $inreg["valoare"]*$inreg["nr_voturi"]+$nota),($inreg["nr_voturi"]+1),3);
  $newnr=$inreg["nr_voturi"]+1;
  $newlist=$inreg["lista_voturi"].'/'.$_SESSION['UNAME'].'/';
 
  $sql2 = "update autograf set valoare='$newnota',nr_voturi='$newnr',lista_voturi='$newlist' where id='$id'";




if (mysql_query($sql2, $conexiune)) {
 
  header("Location:paginacont.php");
} else {
   echo "Error: " . $sql2 . "<br>" . mysql_error();
}}
  else
  {echo('Ati votat acest autograf odata.');
  echo '<br>';
   echo ' <button type="button"><a href="paginacont.php">Mai incercati o data</a></button>' ;
  }
  
  
  
  
  

?>