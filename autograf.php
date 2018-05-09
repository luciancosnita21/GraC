<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "user.php";

class autograf extends user{
private $aid;
private $path;
private $title;
private $date1;
private $date2;
private $date3;
private $det1;
private $tag;

  public function __construct($path, $title, $date1, $date2,$date3,$det1,$tag){
$this->path=$path;
$this->title=$title;
$this->date1=$date1;
$this->date2=$date2;
$this->date3=$date3;
$this->det1=$det1;
$this->tag=$tag;
  $conexiune = mysqli_connect (
    'localhost', // locatia serverului (aici, masina locala)
    'root',       // numele de cont
    ''     // parola
  );
  // verificam daca am reusit
  if (!$conexiune) {
  	die ('A survenit o eroare de conectare: ' . mysqli_error());
  }
  // deschidem baza de date 
  if (!mysqli_select_db($conexiune,'grac')) {
    die ('Baza de date nu poate fi deschisa: ' . mysqli_error());
  } 
	  $sql = "select max(id) from autograf";
  $interog = mysqli_query ($conexiune,$sql);
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }

  $inreg = mysqli_fetch_array ($interog);

$this->id=$inreg['max(id)']+1;
  }


public function inserttodb()
{$mysql = new mysqli (
	'localhost', // locatia serverului (aici, masina locala)
	'root',       // numele de cont
	'',    // parola (atentie, in clar!)
	'grac'   // baza de date
	);

// verificam daca am reusit
if (mysqli_connect_errno()) {
	die ('Conexiunea a esuat...');
}
$pdo = new PDO('mysql:host=localhost;dbname=grac', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("insert into autograf (id,idUser,path,title,date1,date2,date3,det1,tag) values (:id,:aid,:path,:title,:date1,:date2,:date3,:det1,:tag)");
//FOR TESTING ONLY REMOVE AFTER IT WORKS
$this->aid=6;
$stmt->bindParam(":id",$this->id,PDO::PARAM_INT);
$stmt->bindParam(":aid",$this->aid,PDO::PARAM_INT);
$stmt->bindParam(":path",$this->path,PDO::PARAM_STR, 20);
$stmt->bindParam(":title",$this->title,PDO::PARAM_STR, 20);
$stmt->bindParam(":date1",$this->date1,PDO::PARAM_STR, 20);
$stmt->bindParam(":date2",$this->date2,PDO::PARAM_STR, 20);
$stmt->bindParam(":date3",$this->date3,PDO::PARAM_STR, 20);
$stmt->bindParam(":det1",$this->det1,PDO::PARAM_STR, 20);
$stmt->bindParam(":tag",$this->tag,PDO::PARAM_STR, 20);

$stmt->execute();


/*if (mysqli_query($mysql, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysql);
}*/

mysqli_close($mysql);
}


}



?>