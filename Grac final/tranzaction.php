<?php

session_start();

$q = $_GET['q'];


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


  $sql = "select id ,idUser1,idUser2 ,autografdorit,autografdat1,autografdat2,autografdat3 from schimburi where  id='$q' and idUser2='$id';";
if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');

}

  $ok=0;
  

while ($inreg = $rez->fetch_assoc()) 
 {$dorit=$inreg["autografdorit"];

    
$sql2="select imagine,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where id='$dorit';";
if (!($rez2 = $conexiune->query ($sql2))){
die ('A survenit o eroare la interogare');

}
$inreg2 = $rez2->fetch_assoc();
$utilizator=$inreg["idUser1"];

$sql3="select avatar from utilizator where id='$utilizator';";
if (!($rez3 = $conexiune->query ($sql3))){
die ('A survenit o eroare la interogare');

}
$inreg3 = $rez3->fetch_assoc();


$dat1=$inreg["autografdat1"];
$dat2=$inreg["autografdat2"];
$dat3=$inreg["autografdat3"];
$suma=0;

$sql4="select title,imagine,valoare from autograf where id in('$dat1','$dat2','$dat3');";
if (!($rez4 = $conexiune->query ($sql4))){
die ('A survenit o eroare la interogare');

}


echo ( '<h1>'.'Tranzactia: '. $inreg["id"] .'</h1>'.'<br>'); 

echo ( '<h3>'.'Autograf cerut: '. $inreg2["title"] .'</h3>');
echo ( '<img src="'. $inreg2["imagine"] .'" alt="picture_autograf" style="width:100px; height: 100px;">'.'<br>');


echo ( '<p>'.'<b>Valoare: </b>'. $inreg2["valoare"] .'<p>');
echo('<h3>Autografe promise de catre :'.$inreg3["avatar"].'</h3>');

 while ($inreg4 = $rez4->fetch_assoc()) 
 {
    echo ( '<p><b>'. $inreg4["title"] .'</b><p>');
    echo ( '<img src="'. $inreg4["imagine"] .'" alt="picture_autograf" style="width:120px; height: 120px;">'.'<br>');
    echo ( '<p>'.'<b>Valoare</b>'. $inreg4["valoare"] .'<p>');
    $suma=$suma+ $inreg4["valoare"];
 }
 
  echo ( '<h3>'.'Suma valoare: '. $suma.'</h3>');
 
if($suma>=$inreg2["valoare"])
{
    echo("<b>Great advice from GRAC:</b> Schimbul este avantajos.");
    
}

else
  echo("<b>Great advice from GRAC:</b> S-ar putea sa iesiti in pierdere.");
 
  
   }




?>