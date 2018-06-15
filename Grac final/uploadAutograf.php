<?php
session_start();

$tipErr=$pathErr = $titleErr = $date1Err=$date2Err=$date3Err=$detlErr=$tagErr="";

$imagine=$path=$title=$date1=$date2=$date3=$detl=$tag=$tip="";





$directorupload="C:/xampp/htdocs/Grac/uploadp/";




 $path = $directorupload . basename($_FILES["Picture"]["name"]);
$imagine="uploadp/". basename($_FILES["Picture"]["name"]);
  
  $title=$_POST["title"];
  
    if (!preg_match("/^[a-zA-Z ]*$/",$title)) 

	{
      $titleErr = "Only letters and white space allowed"; 

    }

  $date1=$_POST["date1"];
   $date2=$_POST["date2"]; 
  $date3=$_POST["date3"];
$detl=$_POST["detl"];
 $tag=$_POST["tag"];
	$tip=$_POST["type"];

 
 $path=strip_tags($path);
$title=strip_tags($title);
$date1=strip_tags($date1);
$date2=strip_tags($date2);
$date3=strip_tags($date3);
$detl=strip_tags($detl);
$tag=strip_tags($tag);
$tip=strip_tags($tip);

   
include "autograf.php";

 if(!($tipErr||$pathErr ||$titleErr ||$date1Err||$date2Err||$date3Err||$detlErr||$tagErr));
  {


$autograf=new autograf($_SESSION['UNAME'],$imagine, $title, $date1, $date2,$date3,$detl,$tag,$tip);

$autograf->inserttodb();
move_uploaded_file($_FILES["Picture"]["tmp_name"], $path);
header("Location:paginacont.php");
}

  {if($tipErr)
  {echo $tipErr;
echo("<br>");
  }
   if($pathErr)
  {echo $pathErr;
echo("<br>");
  }
    if($titleErr)
  {echo($titlerErr);
echo("<br>");
  }
     if($date1Err)
  {echo($date1Err);
echo("<br>");
  }
  if($date2Err)
  {echo($date2Err);
echo("<br>");
  }
    if($date3Err)
  {echo($date3Err);
echo("<br>");
  }
    if($detlErr)
  {echo($detlErr);
echo("<br>");
  }
  }



?>