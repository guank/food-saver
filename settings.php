<?php
if(isset($_POST['update1'])){
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'guank-db';
	$dbuser = 'guank-db';
	$dbpass = 'S6brWmBzjsmFyh1A';
	$tbl_name = "business"; 
	$tbl_name1 = "bus-itm"; 
	$tbl_name2 = "item"; 

	$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
		or die("Error connecting to database server");
	mysql_select_db($dbname, $mysql_handle)
		or die("Error selecting database: $dbname");

	$name=$_POST['name'];
	$food=$_POST['food'];
	
	if (empty($_POST["name"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter an email.";
	exit();
	}
	if (empty($_POST["food"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter a food.";
	exit();
	}

	$sql="DELETE from $tbl_name2
		  WHERE name = '$food' AND userid = '$name'";
	$result=mysql_query($sql);

	if($result){
	echo "The process is complete!";
	echo "<BR>";
	echo "<a href='index.html'>Return to Main</a>";
	}
	else {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR";

	}
}

if(isset($_POST['update2']))
{
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'guank-db';
	$dbuser = 'guank-db';
	$dbpass = 'S6brWmBzjsmFyh1A';
	$tbl_name = "business"; 
	$tbl_name1 = "bus-itm"; 
	$tbl_name2 = "item"; 

	$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
		or die("Error connecting to database server");
	mysql_select_db($dbname, $mysql_handle)
		or die("Error selecting database: $dbname");

	$name=$_POST['name'];
	$food=$_POST['food'];
	$quantity=$_POST['quantity'];
	$desc=$_POST['desc'];
	
	if (empty($_POST["name"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter an email.";
	exit();
	}
	if (empty($_POST["food"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter a food.";
	exit();
	}
	if (empty($_POST["quantity"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter a quantity.";
	exit();
	}
	else if(!is_numeric($_POST["quantity"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "Quantity needs numbers! Please try again.";
	exit();
	}
	else if(strlen($_POST["quantity"]) > 10) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "The value entered is too large.";
	exit();
	}

	$sql2="INSERT INTO $tbl_name2(name, description,id,quantity,claimed,userid)VALUES('$food', '$desc',NULL,'$quantity',0,'$name')";
	$result2=mysql_query($sql2);

	if($result2){
		echo "Thank you! The process is complete!";
		echo "<BR>";
		echo "<a href='index.html'>Return to Main</a>";
	}
	else{
		echo "<a href='settings.php'><-Back</a><br><br>";
		echo "ERROR";
	}
}

if(isset($_POST['update3']))
{
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'guank-db';
	$dbuser = 'guank-db';
	$dbpass = 'S6brWmBzjsmFyh1A';
	$tbl_name = "business"; 
	$tbl_name1 = "bus-itm"; 
	$tbl_name2 = "item"; 

	$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
		or die("Error connecting to database server");
	mysql_select_db($dbname, $mysql_handle)
		or die("Error selecting database: $dbname");


	$name=$_POST['name'];
	$food=$_POST['food'];
	$quantity=$_POST['quantity'];
	$claim=$_POST['claim'];
	
	if (empty($_POST["name"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter en email.";
	exit();
	}
	if (empty($_POST["food"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter a food.";
	exit();
	}
	if (empty($_POST["quantity"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter a quantity.";
	exit();
	}
	else if(!is_numeric($_POST["quantity"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "Quantity needs numbers! Please try again.";
	exit();
	}
	else if(strlen($_POST["quantity"]) > 10) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "The quantity entered is too large.";
	exit();
	}
	if (empty($_POST["claim"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "ERROR! Enter a claimed value.";
	exit();
	}
	else if(!is_numeric($_POST["claim"])) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "Claim needs numbers! Please try again.";
	exit();
	}
	else if(strlen($_POST["claim"]) > 10) {
	echo "<a href='settings.php'><-Back</a><br><br>";
	echo "The claimed value entered is too large.";
	exit();
	}

	$sql1="UPDATE $tbl_name2
			SET quantity = '$quantity'
			WHERE name = '$food' AND userid = '$name'";

	$sql2="UPDATE $tbl_name2
			SET claimed = '$claim'
			WHERE name = '$food' AND userid = '$name'";

	$result1=mysql_query($sql1);
	$result2=mysql_query($sql2);

	if($result2){
		echo "Thank you! The process is complete!";
		echo "<BR>";
		echo "<a href='database.php'>Return to Main</a>";
	}
	else{
		echo "<a href='settings.php'><-Back</a><br><br>";
		echo "ERROR";
	}
}

else
{

?>
<body bgcolor = "#FFFFFF">
	
	<div align = "center">
		<div style = "width:325px; border: solid 1px #333333; " align = "left">
			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add Food Entry</b></div>
				
			<div style = "margin:30px">

				<form method="post" action="<?php $_PHP_SELF ?>">
				<table width="400" border="0" cellspacing="1" cellpadding="2"><tr>
				<td width="120">Business Email*: </td>
				<td><input name="name" type="text" id="name"></td>
				</tr><tr>
				<td width="120">Food Name*: </td>
				<td><input name="food" type="text" id="food"></td>
				</tr><tr>
				<td width="120">Quantity*: </td>
				<td><input name="quantity" type="text" id="quantity"></td>
				</tr><tr>
				<td width="120">Description: </td>
				<td><input name="desc" type="text" id="desc"></td>
				</tr><tr>
				<td>
				<input name="update2" type="submit" id="update2" value="Add">
				</td>
				</tr>
				</div>
			</div>
		</div>
	</table>
</form>
	
			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Delete Food Entry</b></div>
				

				<form method="post" action="<?php $_PHP_SELF ?>">
				<table width="400" border="0" cellspacing="1" cellpadding="2"><tr>
				<td width="120">Business Email*: </td>
				<td><input name="name" type="text" id="name"></td>
				</tr><tr>
				<td width="120">Food Name*: </td>
				<td><input name="food" type="text" id="food"></td>
				</tr><tr>
				<td>
				<input name="update1" type="submit" id="update1" value="Delete">
				</td>
				</tr>
	</table>
</form>

			<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Change Entry</b></div>
				

				<form method="post" action="<?php $_PHP_SELF ?>">
				<table width="400" border="0" cellspacing="1" cellpadding="2"><tr>
				<td width="120">Business Email*: </td>
				<td><input name="name" type="text" id="name"></td>
				</tr><tr>
				<td width="120">Food Name*: </td>
				<td><input name="food" type="text" id="food"></td>
				</tr><tr>
				<td width="120">Quantity*: </td>
				<td><input name="quantity" type="text" id="quantity"></td>
				</tr><tr>
				<td width="120">Claimed*: </td>
				<td><input name="claim" type="text" id="claim"></td>
				</tr><tr>
				<td>
				<input name="update3" type="submit" id="update3" value="Submit">
				</td>
				</tr>
	</table>
</form>
</body>


<?php
}
?>


</html>


<html>
   
   <head>
      <title>Manage Account</title>

      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }

         body {
            background-image: url("http://www-pbm.stjohns.k12.fl.us/wp-content/uploads/sites/10/2014/05/food-1024x747.jpg");
            background-repeat: none; text-align: center;
         }
      </style>
      
   </head>
   
</html>