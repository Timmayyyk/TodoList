<?php
#Timothy Davis, ID #1332245
#Section AH
#Homework 5, todolist php file
#This file displays the user's todolist. allows the user to delete existing items (if any),
# or add a new item
#Extra features: none

include("common.php");
session_start();
assure_logged_in();

$name = $_SESSION["name"];
$todolist_file = "todo_{$name}.txt";

print_common_top();
?>

	<h2><?=$name ?>'s To-Do List</h2>

	<ul id="todolist">
		<?php
		#write out existing todolist (if any items exist in user's file (if that exists))
		if (file_exists($todolist_file)) {
			$todolist = file($todolist_file);
			
			for ($i = 0; $i < count($todolist); $i++) {
				$item = $todolist[$i]; 
				$item = htmlspecialchars($item); ?>
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="delete" />
						<input type="hidden" name="index" value="<?=$i ?>" />
						<input type="submit" value="Delete" />
					</form>
					<?=$item ?>
				</li>
			<?php }
		} ?>
		<li>
			<form action="submit.php" method="post">
				<input type="hidden" name="action" value="add" />
				<input name="item" type="text" size="25" autofocus="autofocus" />
				<input type="submit" value="Add" />
			</form>
		</li>
	</ul>

	<div>
		<a href="logout.php"><strong>Log Out</strong></a>
		<em>(logged in since <?=$_COOKIE["last_login"] ?>)</em>
	</div>

<?php
print_common_bottom();
?>
