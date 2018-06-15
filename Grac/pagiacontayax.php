<?php
session_start();
 ?>
 
<script>
function showUser(id) {
   
         var xmlhttp = new XMLHttpRequest();
      
 xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("coloane").innerHTML =
      this.responseText;
    }
 };
        xmlhttp.open("GET","coloane.php?q="+id,true);
        xmlhttp.send();
    }
    

function actualizare(id) {
    setInterval(function(){ showUser(id); }, 1000);
}

  </script>



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
			<a href="pictori">Pictori</a>
			<a href="actori">Actori</a>
                        <a href="sportivi">Sportivi</a>
                        <a href="politicieni">Personalitati politice</a>
                        <a href="muzicieni">Muzicieni</a>
                      
		</div>
   </div> 
     <li> <input type="text" placeholder="Search.."> </li>

  
</ul>
</div>
<div class="row">

<div class="col-3 col-s-3 menu">
  <ul>
     <li><a href="Profile change.html">Modifica profil</a></li>
    <li><a href="Upload.html">Adaugare autograf nou</a></li>
    <li>Autografe dorite</li>
  </ul>
 
  <a href="logout.php"><button type="button" class="cancelbtn">Logout</button></a>
</div>

<div class="col-9 col-s-9">
 <h1>Top autografe</h1>



<div id="coloane"></div>
<?php
echo ('<script>actualizare('.$_SESSION['UNAME'].')'.'</script>');
   
?>



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
 