<?php
#Timothy Davis, ID #1332245
#Section AH
#Homework 5, submit php file
#This file handles deleting or adding an item to a user's todolist
#Extra features: none

include("common.php");
session_start();
assure_logged_in();

$name = $_SESSION["name"];

$can_redirect = false;

#"action" post is supposed to be "delete" or "add", if not, none of the ifs below will be entered
if (isset($_POST["action"])) {
	$action = $_POST["action"];
	$todolist_file = "todo_{$name}.txt";
	
	if ($action == "delete") {
		$todolist = file($todolist_file);
		
		#var $action = "delete", check required param "index"
		if (isset($_POST["index"]) && preg_match("/^\d+$/", $_POST["index"]) == 1 &&
			$_POST["index"] < count($todolist) && $_POST["index"] >= 0) {
			#set variables
			$index = $_POST["index"];
			$can_redirect = true;
			
			#delete item
			$newlist = "";
			for ($i = 0; $i < count($todolist); $i++) {
				if ($i != $index) {
					$newlist .= $todolist[$i];
				}
			}
			
			#place new list
			file_put_contents($todolist_file, $newlist);
		}
		
	} else if ($action =="add") {
		#var $action = "add", check required param "item"
		if (isset($_POST["item"])) {
			#set variables
			$item = $_POST["item"];
			$can_redirect = true;
			
			#place item (whether or not the user's todolist file exists)
			file_put_contents($todolist_file, $item."\n", FILE_APPEND);
		}
	}
}

#checks to redirect to todolist, or to die
if ($can_redirect) {
	redirect_todolist();
} else {
	exit("Something failed, try again without being mean :(");
}

?>
