<?php

session_start();

$q = $_GET['q'];

$p="";

if($q=="1")
$p="pending";
if($q=="2")
$p="accepted";

if($q=="3")
$p="negated";



;

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


  $sql = "select id ,idUser1,idUser2 ,autografdorit,autografdat1,autografdat2,autografdat3 from schimburi where  idUser1='$id'and stare='$p';";
if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');

}

  $ok=0;
  
// <img src="picture9.jpg" alt="p6" style="width:100%">
while ($inreg = $rez->fetch_assoc()) 
 {$dorit=$inreg["autografdorit"];

    
$sql2="select imagine,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where id='$dorit';";
if (!($rez2 = $conexiune->query ($sql2))){
die ('A survenit o eroare la interogare');

}
$inreg2 = $rez2->fetch_assoc();
$utilizator=$inreg["idUser2"];

$sql3="select avatar from utilizator where id='$utilizator';";
if (!($rez3 = $conexiune->query ($sql3))){
die ('A survenit o eroare la interogare');

}
$inreg3 = $rez3->fetch_assoc();


$dat1=$inreg["autografdat1"];
$dat2=$inreg["autografdat2"];
$dat3=$inreg["autografdat3"];


$sql4="select title,valoare from autograf where id in('$dat1','$dat2','$dat3');";
if (!($rez4 = $conexiune->query ($sql4))){
die ('A survenit o eroare la interogare');

}


echo ( '<h3>'.'Tranzactia: '. $inreg["id"] .'</h3>'.'<br>'); 

echo ( '<p>'.'<b>Autograf cerut: </b>'. $inreg2["title"] .'<p>');
echo ( '<img src="'. $inreg2["imagine"] .'" alt="picture_autograf" style="width:100px; height: 100px;">'.'<br>');

echo ( '<p>'.'<b>Proprietar: </b>'. $inreg3["avatar"] .'<p>');

echo ( '<p>'.'<b>Valoare: </b>'. $inreg2["valoare"] .'<p>');
echo('<b>Autografe promise:</b>');

 while ($inreg4 = $rez4->fetch_assoc()) 
 {
    echo ( '<p>'. $inreg4["title"] .' ,<b>Valoare:</b> '.$inreg4["valoare"].'<p>');
    
 }
 
 
 
  $ok=1;
   }
if($ok==0)
echo('<i>Nu aveti tranzactii in aceasta categorie.</i>'.'<br>');



?>