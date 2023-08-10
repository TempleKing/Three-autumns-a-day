<?php

header('content-type:text/html;charset=utf-8');

$con = mysql_connect("localhost","root","");
if (!$con) 
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("movies", $con);

$Choice = $_POST['Choice'];  
$Edit = $_POST['Edit']; 
$UpdateText = $_POST['UpdateText'];  
$InsertText = $_POST['InsertText']; 



if ($Choice !=='' and $Edit == 'Delete') { 

	mysql_query("DELETE FROM eastasiamovies WHERE movie ='$_POST[Choice]'");  
	
	echo "Delete successfully";
	
	mysql_close($con);
}   

if($Choice !=='' and $Edit == 'Update') {   
	
    mysql_query("UPDATE eastasiamovies SET intro = '$_POST[UpdateText]' WHERE movie = '$_POST[Choice]'");  

	echo "Update successfully";
	
	mysql_close($con);
}
if($Choice !== '' and $Edit =='Insert') {  

	mysql_select_db("movies", $con);
	
	$sql = "INSERT INTO eastasiamovies (intro) 
	VALUES
	('$_POST[InsertText]')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error:' . mysql_error());	
	  }
	echo "Insert successfully";
	
	mysql_close($con);
}
?>