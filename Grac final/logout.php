<?php
session_start();

session_unset(); 
if(session_destroy())
{Echo('Ai iesit');
header("Location:login.html");
}
?>
