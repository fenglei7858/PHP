
<!-- StatementofAuthorship: I, Lei Feng, 000355541 certify that this material is my original work. 
	 No other person's work has been used without due acknowledgement. -->

<?PHP
$FullName = "";
$Street = "";
$PostalCode = "";
$Phone = "";
$Email = "";
$Pass = true;
$Err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FullName = trim($_POST['fullname']);
    $Street = trim($_POST['street']);
    $PostalCode = trim($_POST['postalcode']);
    $Phone = trim($_POST['phone']);
    $Email = trim($_POST['email']);
	
	if(!preg_match('/^Mr\.\s*[a-zA-Z]+\s+[a-zA-Z]+$/',$FullName)){
		$Pass = false;
		$Err.="<li>Fullname not entered correctly</li>";
	}
	
	
	if(!preg_match('/^[0-9]{2,3} [0-9a-zA-Z]+\s+(Street$|Road$)/',$Street)){
		$Pass = false;
		$Err.="<li>Street address not entered correctly</li>";
	}
	
	
	if(!preg_match('/^([D-K]|[M-W])[1-9]([D-K]|[M-W])[\s\-]?[1-9]([D-K]|[M-W])[1-9]$/i',$PostalCode)){
		$Pass = false;
		$Err.="<li>Postal Code in wrong format</li>";
	}
	
	if(!preg_match('/^\(?[0-9]{3}\)?[\s.-]?[0-9]{3}[\s.-]?[0-9]{4}$/',$Phone)){
		$Pass = false;
		$Err.="<li>Invalid Phone Number</li>";
	}
	
	if(!preg_match('/^[a-zA-Z]{4,10}\.[a-zA-Z]{4,10}@mohawkcollege\.(ca$|com$|org$)/',$Email)){
		$Pass = false;
		$Err.="<li>Email is in wrong format!</li>";
	}
	
	if($Pass == true){
		$ip = $_SERVER['REMOTE_ADDR'];
		date_default_timezone_set("US/Eastern");
		$time= date(" h:i:s ");
		$info="$ip,$time,$FullName,$Street,$PostalCode,$Phone,$Email";	
		$file = fopen("logfile.txt","a");	
		fputcsv($file,explode(',',$info));	
		fclose($file);
	}
}
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	if($Pass == true){
	echo "You submitted: <br>
	$FullName, $Street, $PostalCode, $Phone<br>
	$Email";}
	else{
	echo "There are errors in the code:<ul>$Err</ul></div>";
	}		
	}				
?>

<html><body>
<style>
table {text-align:justify;
        font-size:14pt;
	        color:black;}
.column1 {background-color:green;
                text-align:center;
                 font-size:14pt;
                     color:white;
					 width:200px;
					 height:75px;}
.column2 {background-color:gray;
                text-align:justify;
                 font-size:14pt;
                     color:black;
					 width:300px;
					 height:75px;}
.column3 {background-color:gray;
                text-align:justify;
                 font-size:14pt;
                     color:black;
			         width:300px;
			    	height:75px;}
.top {background-color:green;
            text-align:center;
             font-size:14pt;
                 color:white;}
.body {background-color:gray
             text-align:justify;
              font-size:14pt;
		   padding-left:10px;
			      width:900px;}
				  
input {font-size:14pt;}
.submit{font-size:14pt;
 background-color:gray;}
.file{  font-size:14pt;
       text-align:center;
            color:white;
 background-color:green;}
.data{font-size:14pt;
        text-align:justify;
             color:black;
      padding-left:10px;
			 width:340px;
    		height:75px;}
			
div{    font-size:12pt;
           color:green;
	       width:400px;
	      border:1px solid green;
    padding-left:10px;
   padding-right:10px;}
</style>

<link rel='stylesheet' type='text/css' href='Lab4.css'>
<table>
<tr>
<td class="top"><a href=<?PHP echo $_SERVER["PHP_SELF"] ?>>&nbsp;Refresh This Page&nbsp;</a></td>
<td class="top"><a href = "logfile.txt" target = "_blank">&nbsp;Show Logfile.txt&nbsp;</td>
<td class="top">&nbsp;Show Logfile.txt Formatted&nbsp;</td>
<td class="top">&nbsp;Clear logfile.txt&nbsp;</td>
</tr>
</table>

<br>

<form action="<?PHP echo $_SERVER['PHP_SELF']?>" method="post">
<table class="body">
<tr>
<td class="column1">Full Name:</td>
<td class="column2"><input class="data" type="text" name="fullname" value="<?PHP if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>" ></td>
<td class="column3">Salution of Mr. and Mrs. followed by two text strings separated by any number of spaces</td>
</tr>
<tr>
<td class="column1">Street:</td>
<td class="column2"><input class="data" type="text" name="street" value="<?PHP if(isset($_POST['street'])) echo $_POST['street']; ?>" ></td>
<td class="column3">2 or 3 digit number followed by a text string ending with Street or Road separated by any number of space</td>
</tr>
<tr>
<td class="column1">PostalCode:</td>
<td class="column2"><input class="data" type="text" name="postalcode" value="<?PHP echo $PostalCode;?>" ></td>
<td class="column3">Char Char Digit optional Hyphen or space Char Digit Digit (abclxyz and number 0 not allowed. Case insensitive</td>
</tr>
<tr>
<td class="column1">Phone:</td>
<td class="column2"><input class="data" type="text" name="phone" value="<?PHP echo $Phone;?>" ></td>
<td class="column3">10 digits, first 3 digits have optional parentheses, either side of digits 456 are optional space, dot or hyphen</td>
</tr>
<tr>
<td class="column1">Email:</td>
<td class="column2"><input class="data" type="text" name="email" value="<?PHP echo $Email;?>" ></td>
<td class="column3">firstname.lastname@mohawkcollege.domain (firstname and lastname must be 4-10 characters in length, domain may be either .com, .ca or .org)</td>
</tr>
</table>

<br>

<input class="submit" type="submit" value="Submit me now!!!"/>
</form>

</body></html>