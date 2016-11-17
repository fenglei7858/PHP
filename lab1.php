<!DOCTYPE html>

	<!-- Author Lei Feng, 000355541-->
	<!-- StatementofAuthorship: I, Lei Feng, 000355541 certify that this material is my original work. No other person's work has been used without due acknowledgement. -->
<html>
<body>
<?PHP
	if(!empty($_POST)) {// if post is hot empty
		print_r($_POST);//print_r to print $_POST values
		echo "<br><br><br>";
	}

	if (!isset($_POST['num_tries'])) {//not set
		$num_tries = 0;//default
	} else {
		$num_tries = $_POST['num_tries'] + 1;//add 1 to total num_tries
	}
	if (!isset($_POST['name'])) {
		$name = "";
	} else {
		$name = $_POST['name'];//use the name which user entered to display
	}
	if (!isset($_POST['guess'])) {
		$guess = "";
	} else if (isset($_POST['name'])) {
		$guess = $_POST['guess'] . "<br>" . $num_tries . ":" . $_POST['name'];//using guess from $_POST + number of tries + name
	}

	$wordChoices = array("grape", "apple", "orange", "banana", "plum", "grapefruit");
	foreach($wordChoices as $val){// foreach to print the wordChoices array
	
		if ($val==$wordChoices[2]){
			echo "<font color=\"green\">" . $val . "</font>"; //set orange's color to green 
		} else {
			echo $val;// print array at top, and I dont know how to set it to center display
			//echo "<p style =text-align:center>" . $val; its not working
		}
		echo " | ";
	}

	?>
	<h1 style="color:brown; text-align:center" >Word Guess</h1>
	<div style="text-align:center"><a href="<?PHP echo $_SERVER["PHP_SELF"] ?>">Refresh this page</a></div>
	<h2 style="text-align:center;color:brown">Guess the word I'm thinking</font></h2>
	
	<form action="<?PHP echo $_SERVER['PHP_SELF']  ?>" method="post" style="text-align:center">
	<input type="text" name="name" value="<?php echo $name;?>">
	<input type="hidden" name="num_tries" value="<?php echo $num_tries;?>">
	<input type="hidden" name="guess" value="<?php echo $guess;?>">
	<input type="submit" value="Guess">
	</form>
<?PHP 
	if (!isset($_POST['name'])) {
		echo "<p style=text-align:center><font color=\"red\"><br><br>It's time to play the guessing game! (1)</font>";//start message will be displayed
}
?>
	</p>

<?PHP if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($name == '') {
		echo "<p style=text-align:center><font color=\"red\"> Come on, enter something (2)</font>"; // if no guess entered, display this message
	}
	else if($name==$wordChoices[2]){
		echo "<p style=text-align:center><font color=\"red\"> You guessed \"". $name . "\" and that's CORRECT!!! (3)</font>";// if user guessed orange, display it's correct
	}
	else if(in_array($name, $wordChoices)){
		echo "<p style=text-align:center><font color=\"red\"> Sorry \"". $name . "\" is wrong. Try again (4)</font>";//if user guessed others, display it's wrong
	}
	else {
		echo "<p style=text-align:center><font color=\"red\"> Hey, that's not even a valid guess. Try again (5)</font>";//if user guessed not one of the array, display not valid guess
	}
	
echo "<br>" . $guess;} // print what user guessed
?>


</body>
</html>