<?php
session_start();
 ?>

<html>
<head>

 
 <script>
  function loadtranzaction(tranzaction)
{
var xhttp = new XMLHttpRequest();
  
  xhttp.open("GET","tranzaction.php?q="+ tranzaction, true);
  xhttp.send();
   xhttp.onreadystatechange = function(){
   if (this.readyState == 4 && this.status == 200){
  document.getElementById("tranzaction").innerHTML = xhttp.responseText;}};
}
   
    
    
</script>
 
 

 
 
 
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
<div class="col-3 col-s-3 menu">
    
<form method="post" action="accepta.php" >

<h1>Accepta un schimb</h1>
  <div class="container">
 <label for="date3"><b><h3>Autograf Cerut</h3></b></label>
  <p></p>
    <select name="date3" onchange="loadtranzaction(this.value);"  style="width:100px">
    <option value="">Selecteaza..:</option>
   <?php
  
  include "afiseaza.php";
   $id= $_SESSION['UNAME'];
 $afiseazatranzactie=new afiseaza($id,1);
 $afiseazatranzactie->afiseazatranzactie();
   ?>
  </select>
  
 
<p></p>
 <button type="submit"  name="action" value="accepta">Accepta</button>
  <button type="submit"  name="action" value="refuza">Refuza</button>
  </form>

</div>
</div>

<div class="col-5 col-s-5">


<div id="tranzaction"><b></b></div>



</div>
</div>
<div class="footer">
  <p></p>
</div>
<script src="Script.js"></script>
</body>
</html>
 
 
