<?php
//show all content from Persons Table

$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("movies", $con);


$sql = "INSERT INTO information (PhoneNumber,Email,moviename,pantone,location,description) 
VALUES
('$_POST[phonenum]','$_POST[Email]','$_POST[movie]','$_POST[color]','$_POST[Area]','$_POST[Description]')";

/*(
foreach ($_POST['color'] as $color){
	$pantone = $color['pantone'];
	$sql = "INSERT INTO information (pantone) VALUES ($pantone)";
	mysql_query($sql,$con);
	echo $v;
	echo $"<br>"
	}*/




if(!mysql_query($sql,$con))
	{
	die('Error:' . mysql_error());	
	}
echo "	Thank you for your support! We'll look at it and sort it out! ";
	header('Refresh:3,Url=location.html');
	
	/*
$result = mysql_query("SELECT * FROM information WHERE moviename='$_POST[location]' and pantone='$_POST[pantone]'");
echo "<table border='1'>
<tr>
<th>moviename</th>
<th>Location</th>
<th>Pantone</th>
</tr>";

while($row = mysql_fetch_array($result))
  {

  echo "<tr>";
  echo "<td>" . $row['moviename'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['pantone'] . "</td>";
  echo "</tr>";
  }
  
echo "</table>";*/
	
	

mysql_close($con)
?>