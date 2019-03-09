<?php
//include('config.php');
include('session.php');

//session_start();
// $dbhost = 'oniddb.cws.oregonstate.edu';
// $dbname = 'baellyd-db';
// $dbuser = 'baellyd-db';
// $dbpass = 'khWeGLttprkpFLdR';

// $mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
//     or die("Error connecting to database server");

// mysql_select_db($dbname, $mysql_handle)
//     or die("Error selecting database: $dbname");

// echo 'Successfully connected to database!';

// mysql_close($mysql_handle);
?>

<head>
	<meta charset="utf-8">
	<title >No Wasted Food</title>

	<link rel="stylesheet" href="jquery-ui.theme.min.css">
	<link rel="stylesheet" href="jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="styles-done.css">
	<link rel="stylesheet" href="registrationform.css"/>
	
</head>

<header class="content">
<h1> Welcome to the No Wasted Food Website </h1>
<?php if (isset($_SESSION['login_user'])): ?>
<a href="logout.php"><input type="button" href="logout.php" value="Logout!"></a>
<a href="settings.php"><input type="button" href="settings.php" value="Manage Account"></a>
<a href="inventory.php"><input type="button" href="inventory.php" value="Check Donations"></a>
<?php else: ?>
<a href="login.php"><input type="button" href="login.php" value="Registered Donor? Login Here."></a>
<?php endif; ?>
<header class="content">
<ul id="tabs">
    <li><a href="#business">Find a Business</a></li>
    <li><a href="#donate">Donate Food</a></li>
    <li><a href="#enroll">New Donor Registration</a></li>
</ul>
<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","frishmab-db","rtU242L9OruOWiFf","frishmab-db");
if($mysqli->connect_errno){
       echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
       }
?>

<div id="business" class="content tab-section">
<table id="book-grid">
	<thead>
		<tr>
			<th>Business Name</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Email</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Watching</th>
		</tr>
	</thead>
	<tbody>
                <?php
                       if(!($stmt = $mysqli->prepare("SELECT bus.name, bus.phone, bus.address, bus.email, i.name, i.quantity, i.watching FROM business bus INNER JOIN item i on i.bid = bus.id"))){
                               echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                       }
                       if(!$stmt->execute()){
                               echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                       }
                       if(!$stmt->bind_result($bname, $phone, $address, $email, $iname, $quant, $watching)){
                               echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                       }
                       while($stmt->fetch()){
                               echo "<tr>\n<td>" . $bname . "\n</td>\n<td>" . $phone . "\n</td>\n<td>" . $address . "\n</td>\n<td>" . $email . "\n</td>\n<td>" . $iname . "\n</td>\n<td>" . $quant . "\n</td>\n<td>" . $watching . "\n</td>\n</tr>";
                       }
                       $stmt->close();
               ?>
	</tbody>
</table>
</div>
<div id="enroll" class="content tab-section">
	<div align = "center">
         <div style = "width:600px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register a Donor Account</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
               <fieldset>
                  <label>Business Name  :</label><input type = "text" name = "name" class = "box"/><br /><br />
                  <label>Email  :</label><input type = "text" name = "email" class = "box" /><br/><br />
                  <label>Password  :</label><input type = "text" name = "password" class = "box" /><br/><br />
                  <label>Address  :</label><input type = "text" name = "address" class = "box" /><br/><br />
                  <label>Phone  :</label><input type = "text" name = "phone" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </fieldset>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>	
         </div>
	</div>		
</div>
<div align="left">
		<label for="address-input" id="form-Label">Enter an address </label>
		<input type="text" id="address-input">
    	<button onclick="searchAddress();">Search</button>

</div> 
<div id="map-canvas"></div>
		<script src="jquery.js"></script>
		<script src="jquery.dataTables.min.js"></script>
		<script src="scripts2.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAASSBSQY4-zysNkxO3z5BljN04XFhT3ik"></script>
		<script type="text/javascript" src="map.js"></script>
</body>
</html>
