<?php

$nume= $prenume = $numeutilizator= $varsta =$adresa =$adresaemail =$password=$password2= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nume = test_input($_POST["nume"]);


    $prenume = test_input($_POST["prenume"]);

  


    $numeutilizator = test_input($_POST["numeutilizator"]);



    $adresa = test_input($_POST["adresa"]);
   



    $password= test_input($_POST["psw"]);
   


    $password2= test_input($_POST["psw2"]);


    $adresaemail = test_input($_POST["adresaemail"]);
  
    
 



    $varsta = test_input($_POST["varsta"]);


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
VALUES ($nume, $prenume ,$numeutilizator,$varsta ,$adresa,$adresaemail,$password)";




if (mysqli_query($mysql, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($mysql);





?>