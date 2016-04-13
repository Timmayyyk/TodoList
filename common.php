<?php
#Timothy Davis, ID #1332245
#Section AH
#Homework 5, common php file
#This file handles all the common php between the remember the cow files
#Extra features: none

#this function holds the common code at the top of the web pages that are displayed
function print_common_top() { ?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<title>Remember the Cow</title>
			<link href="https://webster.cs.washington.edu/css/cow-provided.css" type="text/css" rel="stylesheet" />
			<link href="cow.css" type="text/css" rel="stylesheet" />
			<link href="https://webster.cs.washington.edu/images/todolist/favicon.ico" type="image/ico" rel="shortcut icon" />
		</head>

		<body>
			<div class="headfoot">
				<h1>
					<img src="https://webster.cs.washington.edu/images/todolist/logo.gif" alt="logo" />
					Remember<br />the Cow
				</h1>
			</div>

			<div id="main">
<?php }

#this function holds the common code at the bottom of the web pages that are displayed
function print_common_bottom() { ?>
			</div>

			<div class="headfoot">
				<p>
					<q>Remember The Cow is nice, but it's a total copy of another site.</q> - PCWorld<br />
					All pages and content &copy; Copyright CowPie Inc.
				</p>

				<div id="w3c">
					<a href="https://webster.cs.washington.edu/validate-html.php">
						<img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
					<a href="https://webster.cs.washington.edu/validate-css.php">
						<img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
				</div>
			</div>
		</body>
	</html>
<?php }

#this function assures that the user is logged out, redirects to todolist if they are
function assure_logged_out() {
	if (isset($_SESSION["name"])) {
		redirect_todolist();
	}
}

#this function assures that the user is logged in, redirects to start if they are not
function assure_logged_in() {
	if (!isset($_SESSION["name"])) {
		redirect_start();
	}
}

#this function redirects the user to the start page, and exits the currently running code
function redirect_start() {
	header("Location: start.php");
	exit();
} 

#this function redirects the user to the todolist page, and exits the currently running code
function redirect_todolist() {
	header("Location: todolist.php");
	exit();
} ?>
