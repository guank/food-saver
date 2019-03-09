<?php
if(isset($_POST['update'])){
$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'guank-db';
$dbuser = 'guank-db';
$dbpass = 'S6brWmBzjsmFyh1A';
   
$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
    or die("Error connecting to database server");
mysql_select_db($dbname, $mysql_handle)
    or die("Error selecting database: $dbname");

$bus=$_POST['bus'];

$sql="SELECT item.id, item.name, item.quantity, item.claimed, item.description, business.id
	  FROM item, business
	  WHERE item.id = business.id
	  AND business.name = '$bus'
	  GROUP BY business.name";

$result=mysql_query($sql);
$row = mysql_fetch_array($result);

$fields_num = mysql_num_fields($result);

echo "<a href='inventory.php'><-Back</a><br><br>";
echo "Donations of: '$bus'<br>";
echo "<table border='1'>";

echo "<td>Food</td>";
echo "<td>Quantity</td>";
echo "<td>Claimed</td>";
echo "<td>Description</td>";

for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
}

echo "</tr>\n";

if (!$row)
    {
        echo "<br>Seems like there's nothing here... Please try again. ..!!";
    } 

	else
    {
        while($row)
        {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['quantity'] . "</td>";
			echo "<td>" . $row['claimed'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
            $row = mysql_fetch_array($result);
        }
    }
}

else
{

?>
<body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:325px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Check Inventory</b></div>
				
            <div style = "margin:30px">

<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<tr>
<td width="120">Enter Business Name: </td>
<td><input name="bus" type="text" id="bus"></td>
</tr>
<td>
<input name="update" type="submit" id="update" value="Search">
</td>
</tr>
            </div>
				
         </div>
			
      </div>

</table>
</form>
<?php
}
?>
      </div>
    </div>
</body>
</html>


<html>
   
   <head>
      <title>Lookup Inventory</title>

      
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