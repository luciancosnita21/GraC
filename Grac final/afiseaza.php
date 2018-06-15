<?php
class afiseaza
{private $id;
 private $tip;
    
 public function __construct($id, $tip)
 {$this->id=$id;
  $this->tip=$tip;
 }

 
public function afiseazaAutograf()
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


 

  $sql = "select imagine,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where idUser='$this->id' and domeniu='$this->tip';";
if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');

}

  $ok=0;
  
// <img src="picture9.jpg" alt="p6" style="width:100%">
while ($inreg = $rez->fetch_assoc()) 
 {
echo ( '<h3>'. $inreg["title"] .'</h3>'.'<br>'); 
echo ( '<img src="'. $inreg["imagine"] .'" alt="picture_autograf" style="width:100%">'.'<br>');
echo('<h3>Detalii</h3>'.'<br>');

	echo ( '<b>Nume personalitate: </b>' .$inreg["personalitate"] .'<br>');
 echo ( '<b>Perioada achizitionare: </b>' .$inreg["data_achizitionare"] .'<br>');
 echo ( '<b>Detalii aditionale: </b>' .$inreg["detalii_aditionale"] .'<br>');
  echo ( '<b>Valoare: </b>' .$inreg["valoare"] .' L&A'.'<br>');
  echo('<br>');
  $ok=1;
   }
if($ok==0)
echo('<i>Nu aveti autografe in aceasta categorie.</i>'.'<br>');
}





public function afiseazaAutograftip($parte)
{$conexiune = mysql_connect (
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
 $sql2="select count(*) from autograf where domeniu='$this->tip';";
$count = mysql_query ($sql2, $conexiune);

  $sql = "select id,imagine,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where domeniu='$this->tip' and scop like 'public';";
  $interog = mysql_query ($sql, $conexiune);
 $c=mysql_fetch_assoc($count);
$ok=0;
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }
   if (!$count) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }


// <img src="picture9.jpg" alt="p6" style="width:100%">

if($parte==1)
 {while ($inreg =mysql_fetch_assoc($interog))
 {if($ok<$c["count(*)"]/2)
 {
echo ( '<h3>'. $inreg["title"] .' -ID: '.$inreg["id"].'</h3>'.'<br>'); 
echo ( '<img src="'. $inreg["imagine"] .'" alt="picture_autograf" style="width:100%">'.'<br>');
echo('<h3>Detalii</h3>'.'<br>');

	echo ( '<b>Nume personalitate: </b>' .$inreg["personalitate"] .'<br>');
 echo ( '<b>Perioada achizitionare: </b>' .$inreg["data_achizitionare"] .'<br>');
 echo ( '<b>Detalii aditionale: </b>' .$inreg["detalii_aditionale"] .'<br>');
  echo ( '<b>Valoare: </b>' .$inreg["valoare"] .' L&A'.'<br>');
   echo('<br>');
 echo('<form method="post" action="vot.php" >');

  echo('<input type="hidden" name="id" value='.$inreg["id"].' />');
 
    echo('<label for="nota"><b>Nota pentru '.$inreg["title"].'</b></label>');
  echo(' <p></p>');
    echo('<select name="nota">');
    echo('<option value="1">1 L&A</option>');
    echo('<option value="2">2 L&A</option>');
    echo('<option value="3">3 L&A</option>');
    echo('<option value="4">4 L&A</option>');
   echo('<option value="5">5 L&A</option>');
   echo('<option value="6">6 L&A</option>');
    echo('<option value="7">7 L&A</option>');
    echo('<option value="8">8 L&A</option>');
   echo('<option value="9">9 L&A</option>');
   echo('<option value="10">10 L&A</option>');
  echo('</select>');
	echo('<p></p>');
    
    
    
   echo('<button type="submit">Voteaza</button>');

  echo('</form>');
  
  echo('<br>');
 }
  $ok=$ok+1;
   
   }
 }
 
 if($parte==2)
 {while ($inreg =mysql_fetch_assoc($interog))
 {if($ok>=$c["count(*)"]/2)
 {
echo ( '<h3>'. $inreg["title"] .' -ID: '.$inreg["id"].'</h3>'.'<br>'); 
echo ( '<img src="'. $inreg["imagine"] .'" alt="picture_autograf" style="width:100%">'.'<br>');
echo('<h3>Detalii</h3>'.'<br>');

	echo ( '<b>Nume personalitate: </b>' .$inreg["personalitate"] .'<br>');
 echo ( '<b>Perioada achizitionare: </b>' .$inreg["data_achizitionare"] .'<br>');
 echo ( '<b>Detalii aditionale: </b>' .$inreg["detalii_aditionale"] .'<br>');
  echo ( '<b>Valoare: </b>' .$inreg["valoare"] .' L&A'.'<br>');
    echo('<br>');
 echo('<form method="post" action="vot.php" >');

   echo('<input type="hidden" name="id" value='.$inreg["id"].' />');
 
   echo('<label for="nota"><b>Nota pentru '.$inreg["title"].'</b></label>');
  echo(' <p></p>');
    echo('<select name="nota">');
    echo('<option value="1">1 L&A</option>');
    echo('<option value="2">2 L&A</option>');
    echo('<option value="3">3 L&A</option>');
    echo('<option value="4">4 L&A</option>');
   echo('<option value="5">5 L&A</option>');
   echo('<option value="6">6 L&A</option>');
    echo('<option value="7">7 L&A</option>');
    echo('<option value="8">8 L&A</option>');
   echo('<option value="9">9 L&A</option>');
   echo('<option value="10">10 L&A</option>');
  echo('</select>');
	echo('<p></p>');
    
    
    
   echo('<button type="submit">Voteaza</button>');

  echo('</form>');
  
 
  echo('<br>');
 }
  $ok=$ok+1;
   
   }
 }
 
 
 
 
if($ok==0&&$parte==1)
echo('<i>Nu sunt autografe in aceasta categorie.</i>'.'<br>');
}



public function afiseazaAutograftitlu()
{$conexiune = mysql_connect (
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

 if($this->tip==1)
 {
 $sql = "select id,title from autograf where idUser<>'$this->id' order by title asc,id asc ;";
 }

 
 if($this->tip==2)

{  $sql = "select id,title from autograf where idUser='$this->id' order by title asc,id asc ;";
}
$ok=0;
   $interog = mysql_query ($sql, $conexiune);
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }

// <img src="picture9.jpg" alt="p6" style="width:100%">
 while ($inreg =mysql_fetch_assoc($interog)) 
 {
echo (  '<option value='.(string)$inreg["id"].'>'.$inreg["title"].'-ID: '.$inreg["id"] .'</option>' ); 

}
// <option value="Scriitori">Scriitori</option>


}

public function afiseazaAutografjj()
{$conexiune = mysql_connect (
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


  $sql = "select imagine,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where id='$this->id';";
  $interog = mysql_query ($sql, $conexiune);
 
 

 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }

// <img src="picture9.jpg" alt="p6" style="width:100%">
 while ($inreg =mysql_fetch_assoc($interog)) 
 {
echo ( '<h3>'. $inreg["title"] .'</h3>'.'<br>'); 
echo ( '<img src="'. $inreg["imagine"] .'" alt="picture_autograf" style="width:100%">'.'<br>');
echo('<h3>Detalii</h3>'.'<br>');

	echo ( '<b>Nume personalitate: </b>' .$inreg["personalitate"] .'<br>');
 echo ( '<b>Perioada achizitionare: </b>' .$inreg["data_achizitionare"] .'<br>');
 echo ( '<b>Detalii aditionale: </b>' .$inreg["detalii_aditionale"] .'<br>');
  echo ( '<b>Valoare: </b>' .$inreg["valoare"] .' L&A'.'<br>');
  echo('<br>');
 
   }

}


public function afiseazatranzactie()
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
$p="pending";
 $sql = "select id ,idUser1,idUser2 ,autografdorit,autografdat1,autografdat2,autografdat3 from schimburi where  idUser2='$this->id' and stare='$p';";
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
$utilizator=$inreg["idUser1"];

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




echo (  '<option value='.(string)$inreg["id"].'>'.$inreg2["title"].'-ID: '.$inreg["id"] . ' de catre <b>' .$inreg3["avatar"].'</b></option>' ); 
 
 
  $ok=1;
   }

 

  
}


 
public function afiseazaAutografsearch()
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


 
$var='%'.$this->tip.'%';
$user=$_SESSION['UNAME'];
 $sql = "select imagine,title,data_achizitionare,valoare,personalitate,detalii_aditionale from autograf where tag like '$var' and scop like 'public' or tag like '$var' and idUser like $user;";
if (!($rez = $conexiune->query ($sql))){
die ('A survenit o eroare la interogare');

}

  $ok=0;
  
// <img src="picture9.jpg" alt="p6" style="width:100%">
while ($inreg = $rez->fetch_assoc()) 
 {
  echo('<div class="row">');
 echo( '<div class="col-5 col-s-5 ">');
echo ( '<h3>'. $inreg["title"] .'</h3>'.'<br>'); 
echo ( '<img src="'. $inreg["imagine"] .'" alt="picture_autograf" style="width:100%">'.'<br>');
echo('</div>');
 echo( '<div class="col-5 col-s-5 ">');
echo('<h3>Detalii</h3>'.'<br>');

	echo ( '<b>Nume personalitate: </b>' .$inreg["personalitate"] .'<br>');
 echo ( '<b>Perioada achizitionare: </b>' .$inreg["data_achizitionare"] .'<br>');
 echo ( '<b>Detalii aditionale: </b>' .$inreg["detalii_aditionale"] .'<br>');
  echo ( '<b>Valoare: </b>' .$inreg["valoare"] .' L&A'.'<br>');
  echo('<br>');
  echo('</div>');
  echo('</div>');
  $ok=1;
   }
if($ok==0)
echo('<i>Nu aveti autografe in aceasta categorie.</i>'.'<br>');
}









}
?>