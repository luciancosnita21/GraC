<?php


    $q = $_GET['q'];

$q=(int)$q;
include "afiseaza.php";

$afiseaza=new afiseaza($q,'nule');

$afiseaza->afiseazaAutografjj();


?>