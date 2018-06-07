<?php
session_start();
 ?>

<html>
<head>

 
 <script>
    function showUser(str,tip) {
   
    if (str=="") {
       
     if(tip==1)

    document.getElementById("t1").innerHTML="";
    else
      if(tip==2)
    document.getElementById("t2").innerHTML="";
    else
      if(tip==3)
    document.getElementById("t3").innerHTML="";
    else
      if(tip==4)
    document.getElementById("t4").innerHTML="";
    return;
    } else{
  
           var  xmlhttp = new XMLHttpRequest();
       
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(tip==1)
                document.getElementById("t1").innerHTML = this.responseText;
                else
                if(tip==2)
                document.getElementById("t2").innerHTML = this.responseText;
                else
                if(tip==3)
                document.getElementById("t3").innerHTML = this.responseText;
                else
                if(tip==4)
                document.getElementById("t4").innerHTML = this.responseText;
              
            }
        };
        xmlhttp.open("GET","jax.php?q="+str,true);
        xmlhttp.send();
        
    }
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
			<a href="scriitori">Scriitori</a>
			<a href="pictori">Pictori</a>
			<a href="actori">Actori</a>
                        <a href="sportivi">Sportivi</a>
                        <a href="politicieni">Personalitati politice</a>
                        <a href="muzicieni">Muzicieni</a>
                    
		</div>
      
  </div>

   <li><input type="text" placeholder="Search .."> </li>
</ul>
</div>

<div class="row">
<div class="col-3 col-s-3 menu">
    
<form method="post" action="vot.php" >
<h1>Propune un schimb</h1>
  <div class="container">
 <label for="date3"><b><h3>Autograf Cerut</h3></b></label>
  <p></p>
    <select name="date3" onchange="showUser(this.value,1)">
    <option value="">Selecteaza autograf:</option>
   <?php
  
  include "afiseaza.php";
   $id= $_SESSION['UNAME'];
 $afiseazatitlu=new afiseaza($id,1);
 $afiseazatitlu->afiseazaAutograftitlu();
   ?>
  </select>
  
  <label for="date4"><b><h3>Autograf propus</h3></b></label>
  <p></p>
    <select name="date4" onchange="showUser(this.value,2)">
    <option value="">Selecteaza autograf:</option>
   <?php
  
 $id= $_SESSION['UNAME'];
 $afiseazatitlu2=new afiseaza($id,2);
 $afiseazatitlu2->afiseazaAutograftitlu();
   ?>
  </select>

<label for="date5"><b><h3>Autograf propus</h3></b></label>
  <p></p>
    <select name="date5" onchange="showUser(this.value,3)">
 <option value="">Selecteaza autograf:</option>
   <?php
  
$id= $_SESSION['UNAME'];
 $afiseazatitlu3=new afiseaza($id,2);
 $afiseazatitlu3->afiseazaAutograftitlu();
   ?>
  </select>

<label for="date6"><b><h3>Autograf propus</h3></b></label>
  <p></p>
    <select name="date6" onchange="showUser(this.value,4);">
          <option value="">Selecteaza autograf:</option>
   <?php
  
$id= $_SESSION['UNAME'];
 $afiseazatitlu4=new afiseaza($id,2);
 $afiseazatitlu4->afiseazaAutograftitlu();
   ?>
  </select>
<p></p>
<p></p>
 <button type="submit">Trimite schimb</button>
  </form>

</div>
</div>

<div class="col-9 col-s-9">
<div class="row2">
 <div class="column">
 <div class="content2">
<h1 style=  "padding:10px;border: 5px solid brown; border-radius: 45px;margin: 0;">Autograf cerut:</h1>
<div id="t1"><b></b></div>
</div>
 </div>

  <div class="column">
 <div class="content2">
  </div>
 </div>

   <div class="column">
 <div class="content2">
 <h1 style= "padding: 10px;border: 5px solid brown; border-radius: 45px;margin: 0;"> Autografe oferite</h1>
<div id="t2"><b></b></div>
<div id="t3"><b></b></div>
</div>
</div>
  <div class="column">
 <div class="content2">
  <h1></h1>
<div id="t4"><b></b></div>

</div>
</div>
</div>












</div>



</div>
<div class="footer">
  <p></p>
</div>
<script src="Script.js"></script>
</body>
</html>
 
 
