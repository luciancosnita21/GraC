<?php
session_start();
 ?>

<html>
<head>

 
 

<link rel="stylesheet" type="text/css" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="top-container">
  <img src="picture3.png" alt="Doctor Who" style="width:100%;height: 170px;">
  <div class="content">
  <h1>GraC</h1>
  <p>Autograph collector.</p>
</div>
</div>
<div class="header" id="myHeader">
  <ul>
   <li>   <a href="paginacont.php">Aplication main page</a>  </li>
	<div class="categorii">
		<button class="dropbtn">Categorii </button>
		<div class="categorii-content">
			<a href="Scriitori.php">Scriitori</a>
			<a href="Plastice.php">Pictori si sculptori</a>
			<a href="Actori.php">Actori</a>
                        <a href="Sportivi.php">Sportivi</a>
                        <a href="Politicieni.php">Personalitati politice</a>
                        <a href="Muzicieni.php">Muzicieni</a>
                        <a href="Altele.php">Altele</a>
                    
		</div>
      
  </div>

  <li> <form method="post" action="search.php" style="border:0px;height:2px"> <input type="text" name="search" placeholder="Search." />
     <input type="submit" value=">>"/> </form> </li>
</ul>
</div>

 


 


 <h1>Lista autografe pictori si sculptori</h1>
 
 <div class="row">
   <div class="col-2 col-s-2">
    </div>
 <div class="col-4 col-s-4">

<?php

 include "afiseaza.php";
 $tip='Plastice';
 
 $afiseaza1=new afiseaza('none',$tip);
 $afiseaza1->afiseazaAutograftip(1);
?>


</div>

 <div class="col-4 col-s-4">
<?php


 $tip='Plastice';
 
 $afiseaza2=new afiseaza('none',$tip);
 $afiseaza2->afiseazaAutograftip(2);
?>


</div>






</div>
<div class="footer">
  <p>Grac</p>
</div>
<script src="Script.js"></script>
</body>
</html>