<?php
#Timothy Davis, ID #1332245
#Section AH
#Homework 5, start php file
#This file displays the home page which allows the user to login
#Extra features: none

include("common.php");
session_start();
assure_logged_out();

print_common_top();
?>

	<p>
		The best way to manage your tasks. <br />
		Never forget the cow (or anything else) again!
	</p>

	<p>
		Log in now to manage your to-do list. <br />
		If you do not have an account, one will be created for you.
	</p>

	<form id="loginform" action="login.php" method="post">
		<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
		<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
		<div><input type="submit" value="Log in" /></div>
	</form>

	<p>
		<?php
		if (isset($_COOKIE["last_login"])) { ?>
			<em>(last login from this computer was <?=$_COOKIE["last_login"] ?>)</em>
		<?php } ?>
	</p>

<?php
print_common_bottom();
?>
