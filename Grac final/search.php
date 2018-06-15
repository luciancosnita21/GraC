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






<div class="row">

    

<?php
    
 $search = $_POST["search"];
include "afiseaza.php";

 
 $afiseaza1=new afiseaza($_SESSION['UNAME'],$search);
 $afiseaza1->afiseazaAutografsearch();
    
    
?>






<div class="footer">
  <p></p>
</div>
<script src="Script.js"></script>
</body>
</html>