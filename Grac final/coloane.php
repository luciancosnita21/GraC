<html>
 
<link rel="stylesheet" type="text/css" href="style2.css">



<div class="row2">
  <div class="column">
 <div class="content2">
   <h1>Actori</h1>




<?php
$q=$_GET["q"];
 include "afiseaza.php";
 $tip='Actori';
 
 $afiseaza1=new afiseaza($q,$tip);
 $afiseaza1->afiseazaAutograf();
 
?>

</div>
</div>
<div class="column">
 <div class="content2">
  <h1>Sportivi</h1>


 

<?php

 $tip='Sportivi';
 
 $afiseaza2=new afiseaza($q,$tip);
 $afiseaza2->afiseazaAutograf();
 
?>

</div>
</div>

<div class="column">
 <div class="content2">
  <h1>Muzicieni</h1>
  <?php
 
 $tip='Muzicieni';
 
 $afiseaza3=new afiseaza($q,$tip);
 $afiseaza3->afiseazaAutograf();
 
?>
 
</div>
</div>

<div class="column">
 <div class="content2">
  <h1>Scriitori</h1>
  <?php

 $tip='Scriitori';
 
 $afiseaza4=new afiseaza($q,$tip);
 $afiseaza4->afiseazaAutograf();
 
?>
 
</div>
</div>


</html>