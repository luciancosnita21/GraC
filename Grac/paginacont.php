
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
<div class="row">

<div class="col-3 col-s-3 menu">
  <ul>
    
    <li><a href="Upload.html">Adaugare autograf nou</a></li>
    <li><a href="dorite.php">Autografe dorite</a></li>
     <li><a href="cerute.php">Autografe cerute</a></li>
  
  </ul>
 
  <a href="logout.php"><button type="button" class="cancelbtn">Logout</button></a>
</div>

<div class="col-9 col-s-9">
 <h1>Autografele detinute:</h1>
<div class="row2">
  <div class="column">
 <div class="content2">
   <h1>Actori</h1>




<?php
 include "afiseaza.php";
 $tip='Actori';
 
 $afiseaza1=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza1->afiseazaAutograf();
 
?>


   <h1>Personalitati Politice</h1>




<?php

 $tip='Politicieni';
 
 $afiseaza1=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza1->afiseazaAutograf();
 
?>








</div>
</div>
<div class="column">
 <div class="content2">
  <h1>Sportivi</h1>


 

<?php

 $tip='Sportivi';
 
 $afiseaza2=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza2->afiseazaAutograf();
 
?>



   <h1>Pictori si sculptori</h1>




<?php

 $tip='Plastice';
 
 $afiseaza1=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza1->afiseazaAutograf();
 
?>









</div>
</div>

<div class="column">
 <div class="content2">
  <h1>Muzicieni</h1>
  <?php
 
 $tip='Muzicieni';
 
 $afiseaza3=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza3->afiseazaAutograf();
 
?>
 
 
 
 
</div>
</div>

<div class="column">
 <div class="content2">
  <h1>Scriitori</h1>
  <?php

 $tip='Scriitori';
 
 $afiseaza4=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza4->afiseazaAutograf();
 
?>
     <h1>Autografe neincluse intr-o categorie</h1>


<?php

 $tip='Altele';
 
 $afiseaza1=new afiseaza($_SESSION['UNAME'],$tip);
 $afiseaza1->afiseazaAutograf();
 
?>
 
 
 
</div>
</div>
</div>
<div class="col-9 col-s-9">
<h>Selectare autografe</h>

 <button type="button"><a href="Scriitori.php">Autografe ordonate alfabetic</a></button>
 <button type="button"><a href="rss.php">Raport RSS</a></button>
 <button type="button"><a href="pdf.php">Raport PDF</a></button>
</div>
</div>



</div>
<div class="footer">
  <p></p>
</div>
<script src="Script.js"></script>
</body>
</html>
 
 