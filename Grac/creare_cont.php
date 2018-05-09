<?php
$numeErr = $prenumeErr = $numeutilizatorErr = $varstaErr =$adresaErr =$adresaemailErr =$passwordErr=$password2Err="";
$nume= $prenume = $numeutilizator= $varsta =$adresa =$adresaemail =$password=$password2= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nume"])) {
    $numeErr = "Nu ati speificat numele";
	 
  } else {
    $nume = test_input($_POST["nume"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nume)) {
      $numeErr = "Only letters and white space allowed"; 
    }
  }
  
  
  if (empty($_POST["prenume"])) {
    $prenumeErr = "Nu ati speificat prenumele";
  } else {
    $prenume = test_input($_POST["prenume"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
      $prenumeErr = "Only letters and white space allowed"; 
    }
   }



  if (empty($_POST["numeutilizator"])) {
    $numeutilizatorErr = "Nu ati speificat avatarul";
  } else {
    $numeutilizator = test_input($_POST["numeutilizator"]);
    }


   if (empty($_POST["adresa"])) {
    $adresaErr = "Nu ati speificat adresa";
  } else {
    $adresa = test_input($_POST["adresa"]);
   
    
  }


  if (empty($_POST["psw"])) {
    $passwordErr = "Nu ati ales o parola";
  } else {
    $password= test_input($_POST["psw"]);
   
    
  }


   if (empty($_POST["psw2"])) {
    $password2Err = "Nu ati confirmat parola";
  } else {
    $password2= test_input($_POST["psw2"]);
   if ($password2!=$password) {
     $password2Err = "Nu ati putut confirma parola";
  }
  }


   if (empty($_POST["adresaemail"])) {
    $adresaemailErr = "Email is required";
  } else {
    $adresaemail = test_input($_POST["adresaemail"]);
    // check if e-mail address is well-formed
    if (filter_var($adresaemail, FILTER_VALIDATE_EMAIL)) {
      $adresemailErr = "Invalid email format"; 
    }
  }
    
 


  if (empty($_POST["varsta"])) {
    $varstaErr = "Nu ati introdus varsta";
  } else {
    $varsta = test_input($_POST["varsta"]);
  }


}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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