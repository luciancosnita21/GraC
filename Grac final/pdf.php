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
 
  $sql3 = "select count(id) from autograf where idUser='$var';";
  $interog3 = mysql_query ($sql3, $conexiune);
  $inreg3 =mysql_fetch_assoc($interog3);
 
$ok=0;
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }

 require('fpdf181/fpdf.php');
 
 class PDF extends FPDF
{
// Page header
function Header()
{
   
  $this->Image('picture3.png',10,10,190,20);

    $this->SetFont('Arial','B',25);
    // Move to the right
    $this->Cell(10);
    // Title
    $this->Cell(80,20,'Grac',0,0,'C');
    // Line break
    $this->Ln(30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
    
    
}
 }
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
  
 $pdf->Cell(0,10,'',0,1);
  $pdf->Cell(0,10,'Proprietar colectie: '.$inreg2['avatar'],0,1);
  $pdf->Cell(0,10,'Numar autografe: '.$inreg3['count(id)'],0,1);
 $pdf->Cell(0,10,'Lista autografe:',0,1);
 while ($inreg =mysql_fetch_assoc($interog)) 
 { 

 $pdf->Cell(0,10,'Title: '.$inreg['title'],0,1);
  $pdf->Image($inreg['imagine'],null,null,70,70);
  $pdf->Cell(0,10,'Nume personalitate: '.$inreg['personalitate'],0,1);
   $pdf->Cell(0,10,'Valoare:'.$inreg['valoare'].' L&A',0,1);
   $pdf->Cell(0,10,'',0,1);
 }
$pdf->Output();
 
?>