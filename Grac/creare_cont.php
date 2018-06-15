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


 if (!preg_match("/^[a-zA-Z ]*$/",$nume)) {
      $numeErr = "Only letters and white space allowed"; 
    }

  
  
 
    if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
      $prenumeErr = "Only letters and white space allowed"; 
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
  {if($numeErr)
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
  }













?>