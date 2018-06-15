<?php
session_start();
$date3=$date4=$date5=$date6="";


$id=$_SESSION['UNAME'];
$date=$_POST["date3"];
$actiune=$_POST["action"];

$conexiune = new mysqli (
	'localhost', // locatia serverului (aici, masina locala)
	'root',       // numele de cont
	'',    // parola (atentie, in clar!)
	'grac'   // baza de date
	);
  // verificam daca am reusit
  if (mysqli_connect_errno()) {
	die ('Conexiunea a esuat...');
}


 $id=$_SESSION['UNAME'];

if($actiune=="refuza")
{
 $sql = "UPDATE schimburi SET stare = 'negated' where idUser2='$id'and id='$date';";

if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');

}
header("Location:cerute.php");
}

else
{
  $sql = "select id ,idUser1,idUser2 ,autografdorit,autografdat1,autografdat2,autografdat3 from schimburi where  idUser2='$id'and id='$date';";

if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');
}
$inreg = $rez->fetch_assoc();
$d=$inreg["autografdorit"];
$a1=$inreg["autografdat1"];
$a2=$inreg["autografdat2"];
$a3=$inreg["autografdat3"];
$cel=$inreg["idUser1"];
$sql3="select count(distinct idUser) from autograf where id in ('$a1','$a2','$a3')";

if (!($rez3 = $conexiune->query ($sql3))){
die ('A survenit o eroare la interogare');
}
$inreg3 = $rez3->fetch_assoc();
if($inreg3["count(distinct idUser)"]>1)
{echo('Schimbul nu mai poate fi facut.');
  echo '<br>';
   echo ' <button type="button"><a href="cerute.php">Mai incercati o data</a></button>' ;

}

else
{
    
  $sql2 = "UPDATE autograf SET idUser='$cel' where  id='$d';";
 if (!($rez2 = $conexiune->query ($sql2))){
die ('A survenit o eroare la interogare');
}
 
 
 
 $sql2 = "UPDATE autograf SET idUser='$id' where id in ('$a3','$a2','$a1');";
 if (!($rez2 = $conexiune->query ($sql2))){
die ('A survenit o eroare la interogare');}

    
    
    $sql = "UPDATE schimburi SET stare = 'accepted' where idUser2='$id'and id='$date';";
header("Location:cerute.php");
if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');

}
}




}

?>