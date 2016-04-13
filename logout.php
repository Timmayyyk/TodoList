<?php
#Timothy Davis, ID #1332245
#Section AH
#Homework 5, logout php file
#This file logs the user out, destroys the session, and redirects to start
#Extra features: none

include("common.php");
session_start();
assure_logged_in();

session_destroy();
session_regenerate_id(true);
redirect_start();
?>
