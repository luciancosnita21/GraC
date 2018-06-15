<?php



class user{
private $id;
private $nume;
private $prenume;
private $numeutilizator;
private $varsta;
private $adresa;
private $adresaEmail;
private $password;

  public function __construct($nume, $prenume, $numeutilizator, $varsta,$adresa,$adresaEmail,$password){
$this->nume=$nume;
$this->prenume=$prenume;
$this->numeutilizator=$numeutilizator;
$this->varsta=$varsta;
$this->adresa=$adresa;
$this->adresaEmail=$adresaEmail;
$this->password=$password;
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


  $sql = "select max(id) from utilizator";
  $interog = mysql_query ($sql, $conexiune);
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }



  $inreg = mysql_fetch_array ($interog);

$this->id=$inreg['max(id)']+1;

  }


public function inserttodb()
{$conexiune = new mysqli (
	'localhost', // locatia serverului (aici, masina locala)
	'root',       // numele de cont
	'',    // parola (atentie, in clar!)
	'grac'   // baza de date
	);

// verificam daca am reusit
if (mysqli_connect_errno()) {
	die ('Conexiunea a esuat...');
}

  $sql = "select count(id) from utilizator where avatar='$this->numeutilizator';";
if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare2');

}

 
$inreg = $rez->fetch_assoc();

if($inreg['count(id)']>0)
{echo("Alegeti alt nume de utilizator<br>");
 echo ' <button type="button"><a href="Creare_cont.html">Incercati din nou</a></button>' ; 

}

else
{


$pdo = new PDO('mysql:host=localhost;dbname=grac', 'root', '');



$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$sql = "INSERT INTO utilizator (id,nume, prenume,avatar,varsta,adresa,adresaEmail,password) VALUES ('$this->id','$this->nume','$this->prenume' ,'$this->numeutilizator','$this->varsta','$this->adresa','$this->adresaEmail','$this->password')";



$stmt = $pdo->prepare("insert into utilizator (id,nume, prenume,avatar,varsta,adresa,adresaEmail,password)
                      values
                      (:id,:nume,:prenume,:avatar,:varsta,:adresa,:adresaEmail,:password)");



//to be removed;

$stmt->bindParam(":id",$this->id,PDO::PARAM_INT);

$stmt->bindParam(":nume",$this->nume,PDO::PARAM_INT);

$stmt->bindParam(":prenume",$this->prenume,PDO::PARAM_STR, 100);

$stmt->bindParam(":avatar",$this->numeutilizator,PDO::PARAM_STR, 20);

$stmt->bindParam(":varsta",$this->varsta,PDO::PARAM_STR, 20);

$stmt->bindParam(":adresa",$this->adresa,PDO::PARAM_STR, 20);

$stmt->bindParam(":adresaEmail",$this->adresaEmail,PDO::PARAM_STR, 20);

$stmt->bindParam(":password",$this->password,PDO::PARAM_STR, 20);


if ($stmt->execute()) {

    echo "New record created successfully";
    echo("<br>");
    echo ' <button type="button"><a href="Login.html">Acum va puteti loga</a></button>' ; 

} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($mysql);
}
mysqli_close($conexiune);
}
}

}






?>