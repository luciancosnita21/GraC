<?php
session_start();
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

$var=$_SESSION['UNAME'];
  $sql = "select imagine,domeniu,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where idUser='$var';";
  $interog = mysql_query ($sql, $conexiune);
 
   $sql2 = "select avatar from utilizator where id='$var';";
  $interog2 = mysql_query ($sql2, $conexiune);
  $inreg2 =mysql_fetch_assoc($interog2);
 
 
 
$ok=0;
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }

  $data = '<?xml version="1.0" encoding="UTF-8" ?>';
$data .= '<rss version="2.0">';
$data .= '<channel>';
$data .= '<title>Raport autografe</title>';
$data .= '<link>http://localhost/grac/rss.php.</link>';
$data .= '<utilizator>Utilizator: '.$inreg2['avatar'].'</utilizator>';
$data .= '<description>Lista completa cu autografele</description>';
  
// <img src="picture9.jpg" alt="p6" style="width:100%">
 while ($inreg =mysql_fetch_assoc($interog)) 
 { $data .= '<item>';
    $data .= '<title>'.$inreg['title'].'</title>';
    $data.=  '<image>'.'<url>' .$inreg['imagine'].'</url>'.'<title>poza autograf</title>'.'</image>';
    $data .= '<personalitate>'.$inreg['personalitate'].'</personalitate>';
    $data .= '<domeniu>'.$inreg['domeniu'].'</domeniu>';
    $data .= '<data>'.$inreg['data_achizitionare'].'</data>';
    $data .= '<description>'.$inreg['detalii_aditionale'].'</description>';
    $data .= '</item>';

}
$data .= '</channel>';
$data .= '</rss> ';
header('Content-Type: application/xml');
echo $data;

?>