<?php

$tipErr=$pathErr = $titleErr = $date1Err=$date2Err=$date3Err=$detlErr=$tagErr="";

$path=$title=$date1=$date2=$date3=$detl=$tag=$tip="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["Path"])) {

    $pathErr = "Nu ati specificat o poza a autografului";

	 

  } else {

    $path = test_input($_POST["Path"]);

    // verify if path is valid (somehow)

  }

  

  

  if (empty($_POST["title"])) {

    $titleErr = "Nu ati speificat titlul";

  } else {

    $title = test_input($_POST["title"]);

    // check if name only contains letters and whitespace

    if (!preg_match("/^[a-zA-Z ]*$/",$title)) {

      $titleErr = "Only letters and white space allowed"; 

    }

   }







  if (empty($_POST["date1"])) {

    $date1Err = "Nu ati speificat data achizitionarii (daca nu va reamintiti exact dati o data estimatoare)";

  } else {

    $date1 = test_input($_POST["date1"]);

    }





   if (empty($_POST["date2"])) {

    $date2Err = "Nu ati speificat Vedeta";

  } else {

    $date2 = test_input($_POST["date2"]);

   

    

  }





  if (empty($_POST["date3"])) {

    $date3Err = "Nu ati ales un domeniu al autografului";

  } else {

    $date3= test_input($_POST["date3"]);

  
  }



if (empty($_POST["detl"])) {
    $detlErr = "Nu ati introdus detalii";
  } else {
    $detl = test_input($_POST["detl"]);
  }


  





   if (empty($_POST["tag"])) {

    $tagErr = "Trebuie sa introduceti un set de taguri.";

	} else {

	  $tag=test_input($_POST["tag"]);

	}



if (empty($_POST["type"])) {
    $tipErr = "Nu ati specificat daca e privat sau public";
  } else {
    $tip = test_input($_POST["type"]);
  }

}


function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

  

  

include 'autograf.php';

  ECHO($detl);

$autograf=new autograf($path, $title, $date1, $date2,$date3,$detl,$tag,$tip);

$autograf->inserttodb();



?>