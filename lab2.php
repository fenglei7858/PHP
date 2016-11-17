<html>
		<!-- I, Lei Feng, 000355541 certify that this material is my original work. 
			 No other person's work has been used without due acknowledgement. -->
<body>

	<h1 style = "color:lightgrey">Table Generator</h1>

	<h3 style = "textalign:middle"><a href="<?PHP echo $_SERVER["PHP_SELF"] ?>">Refresh</a></h3>

<?PHP

	function isInteger( $value ) {
		return !(is_numeric($value) && is_int($value + 0));
	}


	if(!isset ($_POST['rows']))
	{
		$rows=10;
	}
	else
	{
		$rows = $_POST['rows'];
		if($rows>15||isInteger($rows))
			$rows=15;
	}

	if(!isset ($_POST['cols']))
	{
		$cols=10;
	}
	else
	{
		$cols = $_POST['cols'];
		if($cols>15||isInteger($cols))
			$cols=15;
	}

	if(!isset ($_POST['highlight']))
	{
		$highlight=5;
	}
	else
	{
		$highlight = $_POST['highlight'];
		if($highlight>15||isInteger($highlight))
			$highlight=15;
	}
?>

	<form action="<?PHP echo $_SERVER["PHP_SELF"] ?>" method="post">
	
	<fieldset style="width:400px; background-color:lightgray">

	Rows: <input type="text" name="rows" size="3" value="<?php echo $rows;?>">

	Cols: <input type="text" name="cols" size="3" value="<?php echo $cols;?>">

	Highlight: <input type="text" name="highlight" size="3" value="<?php echo $highlight;?>">
	</br>
	<input type="submit" value="Generate Table with Form Values">


	</fieldset>
	</form>

	</br>
<?php

	$randomNum = rand(0, 100);

	if($randomNum %2 == 1) {echo "First value is an <span style=\"background-color:lightgreen\">odd</span> number</br>" ;}
	else {echo "First value is an <span style=\"background-color:green\">even</span> number</br>" ;}

	echo "<table border=\"1\">" ;

	for($i=0; $i<$rows; $i++){
		echo "<tr>";
		
		for($j=0; $j<$cols; $j++){
			$number= $randomNum+$i*$cols+$j;
			if($number%$highlight == 0){ 
			echo "<td style=\"background-color:red; color:white\">$number</td>";}
			else if (($i+$randomNum)%2 == 0){         
			echo "<td style=\"background-color:green\">$number</td>";}
			else{echo "<td style=\"background-color:lightgreen\">$number</td>";}
		}
		echo "</tr>";
	}
	

?>


</body>
</html>