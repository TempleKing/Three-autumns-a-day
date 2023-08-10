<html>
<head>
  <style>    
    .table-background-center {    
      text-align: center;    
    }    
      
    .table-cell {    
      background-color: #f0f0f0;    
    }    
  </style> 
</head>
</html>

<?php
//show all content from Persons Table

$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("movies", $con);


	
#$result = mysql_query("SELECT * FROM information WHERE location='$_POST[location]' and pantone='$_POST[pantone]'");

$location = $_POST['location'];  
$pantone = $_POST['pantone'];

if ($location !== '' and $pantone !=='') {    
    $result = mysql_query("SELECT * FROM information WHERE location='$_POST[location]' and pantone='$_POST[pantone]'");    
}   
if($location !== '' and $pantone =='') {    
    $result = mysql_query("SELECT * FROM information WHERE location='$_POST[location]'");    
}
if($location == '' and $pantone !=='') {    
    $result = mysql_query("SELECT * FROM information WHERE pantone='$_POST[pantone]'");    	
}
if ($location == '' && $pantone == '') {     
    header('Location: http://localhost/Web111/location.html');  
    exit();     // 跳转到指定页面      
}     


$location = $_POST['location'];  
$pantone = $_POST['pantone'];

// 输出表格头部  
echo "<table class='table-background-center' border='1'>";

// 设置表格宽度  
echo "<colgroup>";  
echo "<col width='10%'/>";  
echo "<col width='20%'/>";  
echo "<col width='70%'/>";  
echo "</colgroup>";

// 文本栏
   
echo "<b>Search results for:</b>";      
echo "<b>" . $location . "</b>"; 
echo "<b>  ,   </b>";         
echo "<b>" . $pantone . "</b>"; 

// 输出表格行头部  
echo "<thead>";    
echo "<tr>";    
echo "<th style='text-align:center; font-size: 20px; font-weight: bold;'>Movie Name</th>";    
echo "<th style='text-align:center; font-size: 20px;'>Location</th>";    
echo "<th style='text-align:center; font-size: 20px;'>Pantone</th>";    
echo "</tr>";    
echo "</thead>";



// 输出表格主体部分  
echo "<tbody>";

// 循环输出每一行数据  
while($row = mysql_fetch_array($result))  
{
  echo "<tr>";  
  echo "<td class='table-cell'>" . $row['moviename'] . "</td>";  
  echo "<td class='table-cell'>" . $row['location'] . "</td>";  
  echo "<td class='table-cell'>" . $row['pantone'] . "</td>";  
  echo "</tr>";  
}

// 输出表格尾端部  
echo "</tbody>";  
echo "</table>";  


/*	
echo "<table class='table-background-center' border='1'>
<tr>
<th>moviename</th>
<th>Location</th>
<th>Pantone</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td class='table-cell'>" . $row['moviename'] . "</td>";
  echo "<td class='table-cell'>" . $row['location'] . "</td>";
  echo "<td class='table-cell'>" . $row['pantone'] . "</td>";
  echo "</tr>";
  }
  
echo "</table>";*/
	
	

mysql_close($con);
?>