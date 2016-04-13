<?php
#Timothy Davis, ID #1332245
#Section AH
#Homework 5, login php file
#This file logs the user in using a session, using either an existing login,
# or creating a new one.
#Extra features: none

include("common.php");
session_start();
assure_logged_out();

$name = $_POST["name"];
$password = $_POST["password"];
$users = file("users.txt");

#regex for validating entered name and password
$name_regex = "/^[a-z][a-z|\d]{2,7}$/";
$pass_regex = "/^[\d].{4,10}[^\d|^\w]$/";

#check if entered name and password are valid, if not, redirect back to start
if (preg_match($name_regex, $name) != 1 || preg_match($pass_regex, $password) != 1) {
	redirect_start();
}

$user_exists = false;

#checks if entered user name exists, and if so if the password is correct, redirects as necessary
foreach ($users as $user) {
	list($cur_name, $cur_password) = explode(":", $user);
	$cur_password = trim($cur_password);
	if ($name == $cur_name) {
		if ($password == $cur_password) {
			$user_exists = true;
			break;
		} else {
			redirect_start();
		}
	}
}

#only gets to this code if:
# 1. regex match is passed, and
#  2. user exists, and username and password were correct, or
#  3. user doesn't exist
if (!$user_exists) {
	file_put_contents("users.txt", $name.":".$password."\n", FILE_APPEND);
}

$_SESSION["name"] = $name;
$expire_time = time() + 60*60*24*7;
setcookie("last_login", date("D y M d, g:i:s a", $expire_time));

redirect_todolist();
?>
