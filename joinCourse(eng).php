
		
<?php

session_start();
// Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");
$StudentID = $_SESSION["StudentID"];

$CourseName = $_GET['CourseName'];


$select_query = " SELECT * FROM  studentcourses ";
$check = 0 ;
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
    if ( $StudentID == $row['StudentID'] && $row['CourseName'] == $CourseName)
	
    	$check = 1 ;
}


if ( $check == 0 )
{


$Insert= " Insert into   studentcourses 
         (StudentID  , CourseName , Grade) 
values  ( '$StudentID' , '$CourseName' ,0) ";

mysql_query($Insert);

	  
mysql_close($connenction_link);


header("Location: home(eng).html?msg=6");
}
else
header("Location: home(eng).html?msg=5");

?>