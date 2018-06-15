<?php
$numeErr = $prenumeErr = $numeutilizatorErr = $varstaErr =$adresaErr =$adresaemailErr =$passwordErr=$password2Err="";
$nume= $prenume = $numeutilizator= $varsta =$adresa =$adresaemail =$password=$password2= "";


$nume=$_POST["nume"];
$prenume=$_POST["prenume"];
$numeutilizator=$_POST["numeutilizator"];
$varsta=$_POST["varsta"];
$adresa=$_POST["adresa"];
$adresaemail=$_POST["adresaemail"];
$password=$_POST["psw"];
$password2=$_POST["psw2"];

$nume=strip_tags($nume);
$prenume=strip_tags($prenume);
$numeutilizator=strip_tags($numeutilizator);
$varsta=strip_tags($varsta);
$adresa=strip_tags($adresa);
$adresaemail=strip_tags($adresaemail);
$password=strip_tags($password);
$password2=strip_tags($password2);




 if (!preg_match("/^[a-zA-Z ]*$/",$nume)) {
      $numeErr = "Only letters and white space allowed fro name"; 
    }

  
  
 
    if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
      $prenumeErr = "Only letters and white space allowed for prenume"; 
    }
   


   if ($password2!=$password) {
     $password2Err = "Nu ati putut confirma parola";
  }
  

  if(!($numeErr || $prenumeErr || $numeutilizatorErr ||$varstaErr ||$adresaErr ||$adresaemailErr ||$passwordErr ||$password2Err ))
  {
  include 'user.php';
  
$us=new user($nume, $prenume, $numeutilizator, $varsta,$adresa,$adresaemail,$password);
$us->inserttodb();

  }
  else
  {
  if($numeErr)
  {echo $numeErr;
echo("<br>");
  }
   if($prenumeErr)
  {echo $prenumeErr;
echo("<br>");
  }
    if($numeutilizatorErr)
  {echo($numeutilizatorErr);
echo("<br>");
  }
    if($varstaErr)
  {echo($varstaErr);
echo("<br>");
  }
    if($adresaemailErr)
  {echo($adresaemailErr);
echo("<br>");
  }
    if($passwordErr)
  {echo($passwordErr);
echo("<br>");
  }
    if($password2Err)
  {echo($password2Err);
echo("<br>");
  }
  
    echo ' <button type="button"><a href="Creare_cont.html">Incercati din nou</a></button>' ; 

  }













?>