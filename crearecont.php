<?php
$numeErr = $prenumeErr = $numeutilizatorErr = $varstaErr =$adresaErr =$adresaemailErr =$passwordErr=$password2Err= "";
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
    if (!filter_var($adresaemail, FILTER_VALIDATE_EMAIL)) {
      $adresemailErr = "Invalid email format"; 
    }
  }
    
 


  if (empty($_POST["varsta"])) {
    $varstaErr = "Gender is required";
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


$mysql = new mysqli (
	'localhost', // locatia serverului (aici, masina locala)
	'root',       // numele de cont
	'',    // parola (atentie, in clar!)
	'grac'   // baza de date
	);

// verificam daca am reusit
if (mysqli_connect_errno()) {
	die ('Conexiunea a esuat...');
}



$sql = "INSERT INTO utilizator (nume, prenume,avatar,varsta,adresa,adresaEmail,password)
VALUES ('$nume','$prenume' ,'$numeutilizator','$varsta','$adresa','$adresaemail','$password')";




if (mysqli_query($mysql, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysql);
}

mysqli_close($mysql);





?>