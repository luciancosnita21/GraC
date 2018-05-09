<?php
class afiseaza
{private $id;
 private $tip;
    
 public function __construct($id, $tip)
 {$this->id=$id;
  $this->tip=$tip;
 }
 
public function afiseazaAutograf()
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


  $sql = "select title,personalitate from autograf where idUser='$this->id' and domeniu='$this->tip';";
  $interog = mysql_query ($sql, $conexiune);
 
 
 echo($this->tip);
 
  if (!$interog) {
  	die ('A survenit o eroare la interogare: ' . mysql_error());
  }


 while ($inreg =mysql_fetch_assoc($interog)) 
 {
echo ( 'Titlu: '. $inreg["title"] .'<br>'); 
	echo ( 'Nume: ' .$inreg["personalitate"] .'<br>');
 
   }


}

}
?>