<!-- StatementofAuthorship: I, Lei Feng, 000355541 
	 certify that this material is my original work. 
	 No other person's work has been used without due acknowledgement. -->
	<html><body>
	<style>
	h1 {text-align:justify;
		 font-size:20pt;
			 color:green;}

	h2 {text-align:justify;
		font-style:italic;
		 font-size:13pt;
			 color:green;}

	div {border:1px solid grey;
		  width:850px;
		  float:left;}
	.borderless {width:800px;
				 float:left;
			text-align:left;
		padding-bottom:10px;
				border:0px;}
	.title {float:left;
			width:150px;
	   text-align:right;
	padding-right:10px;}

	fieldset {width:800px;
			 border:1px solid grey;
			padding:20px;
		 text-align:right;}
	legend {text-align:left;}

	input{   border:1px solid grey;
			  width:120px;
	  margin-bottom:-10px;}
	.shorter{ width:50px;}
	.shortest{width:25px;}
	  
	</style>
	<?php
		
	?>

<?PHP

$Errormsg="";

if(isset($_POST['username']))
{
	if ($_POST['username']=="")
		$Errormsg .= "Username cannot be empty<br>";	
	elseif (strlen($_POST['username'])<=5)
		$Errormsg = "Username must be greater than 5 characters.<br>";
		else
			echo "UNAME  : " .$_POST['username'] ."</br>";
}
if(isset($_POST['emailaddress']))
{
	if ($_POST['emailaddress']=="")
		$Errormsg .= "Email cannot be empty<br>";		
	else
		echo "Emailaddress  : " .$_POST['emailaddress'] ."</br>";
}

if(isset($_POST['year']))
{
	if ($_POST['year']=="")
		$Errormsg .= "year cannot be empty.<br>";	
	elseif (strlen($_POST['year'])<4)
		$Errormsg .= "Years must contain 4 digit number.<br>";
	else
		echo "Year  : " .$_POST['year'] ."</br>" ;
	if(isset($_POST['month']))
		{echo  "Month : " .$_POST['month'] ."</br>";}
	if(!isset($_POST['status']))
		$Errormsg .= "Please select one or more items from status.<br>";
	else
		echo "Status  : " .$_POST['status'] ."</br>";
	if(!isset($_POST['location']))
		$Errormsg .= "Please select a choice from location.<br>";
	else
		echo "Location  : " .$_POST['location'] ."</br>";
		
}
if(isset($_POST['province']))	
{	
	if(!isset($_POST['province']))
		$Errormsg .= "Please select one or more provinces.<br>";
	else
		echo "province is : " .$_POST['province'] ."</br>";
}
echo $Errormsg;
?>

	<h1>Form Validation Lab</h1>

	<div>

	<h2>Please fill in the form.....</h2>

	<form action="<?PHP echo $_SERVER['PHP_SELF']?>" method="post">

	<fieldset>
	<input type="submit" value="Submit This Form" style="margin-left:500px;">
		<a style="margin-left:10px;" href="<?PHP echo $_SERVER["PHP_SELF"] ?>">Start Again</a>
	</fieldset><br>
	NOTE: Required fields are marked with an asterisk (*)

	<fieldset><legend>User Details</legend>

	<div class="borderless"  method = "post">
		<label for="username" class="title">User Name <font style="color:red;">*</font></label>
		<input type="text" name="username" value="" /> (must be greater than 5 chars)
	</div>
	<div class="borderless" method = "post">
		<label for="emailaddress" class="title">Email Address</label>
		<input type="email" name="emailaddress" value="" />
	</div>
	</fieldset>

	<fieldset><legend>Submission</legend>

	<div class="borderless"  method = "post" >
		<label for="year" class="title">Year (YYYY) <font style="color:red;">*</font></label>
		<input type="text" name="year" class="shorter" value="" /> (4 digit number)
	</div>
	<div class="borderless"  method = "post">
		<label for="month" class="title">Month (MM)</label>
		<input type="number" min="1" max="12" name="month" class="shorter" value="" /> (number ranging from 1-12)
	</div>
	</fieldset>

	<fieldset><legend>Preferences</legend>

	<div class="borderless"  method = "post">
	Province (Multiple Select) <font style="color:red;">*</font>
			<select  style="height:210px" name="province" multiple="multiple">
			
			  <option value="--" disabled="disabled">--Please Select Provinces--</option>
			  <option value="Newfoundland">Newfoundland</option>
			  <option value="Prince Edward Island">Prince Edward Island</option>
			  <option value="New Brunswick">New Brunswick</option>
			  <option value="Nova Scotia">Nova Scotia</option>
			  <option value="Quebec">Quebec</option>
			  <option value="Ontario">Ontario</option>
			  <option value="Manitoba">Manitoba</option>
			  <option value="Saskatchewan">Saskatchewan</option>
			  <option value="Alberta">Alberta</option>
			  <option value="British Columbia">British Columbia</option>
			  <option value="Northwest Territories">Northwest Territories</option>
			  
			</select>
	</div>


	<div class="borderless">
		<label for="status" class="title">Status (Mult Select)<font style="color:red;">*</font></label>
			<input type="checkbox" class="shortest" name="status" value="approved" />Approved
			<input type="checkbox" class="shortest" name="status" value="pendingapplication" />Pending Application
			<input type="checkbox" class="shortest" name="status" value="activeservice"/>Active Service
	</div>
	<div class="borderless">
		<label for="location" class="title">Location<font style="color:red;">*</font></label>
			<input type="radio" class="shortest" name="location" value="garage"/>Garage
			<input type="radio" class="shortest" name="location" value="attic"/>Attic
			<input type="radio" class="shortest" name="location" value="house"/>House
	</div>
	</fieldset>

	</form>
	</div>
	
</body></html>