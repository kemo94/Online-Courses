<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>الصفحة الشخصية</title>
        
        <!-- The stylesheet -->
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style list.css" />
   
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
    </head>
   
   <body>
          <div class="wrapper1">
        <div class="wrapper2">
            <div class="header">
                    <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                      <div class="top-side" >  <a href="sendMessage(eng).php" >Send message</a>  | <a href="SignOut(eng).php" >Sign Out</a> </div>
            <br> <br>
			
                 
                  
             <div class='menu'>
           
     		   <ul class='horz-menu'>
            
					  <li><a href='home(eng).php' >Home</a></li>
                      <li><a href='ShowInfo(eng).php' >Profile</a></li>
                      <li><a href='notification(eng).php' >Notification</a></li>
<?php
session_start();    		  

       if ( $_SESSION['type'] == 2 ){
	                 
              echo "<li><a href='Faculty(eng).php?val=all' >List all courses </a></li>
                 
                        <li><a  id='current'>Categories</a>
                            <ul class='dropdown'>
                                <li><a  href='Faculty(eng).php?val=Medicine'>Medicine</a></li>
                                <li><a  href='Faculty(eng).php?val=Pharmacy'>Pharmacy</a></li>
                                <li><a  href='Faculty(eng).php?val=Engineering'>Engineering</a></li>
                                <li><a  href='Faculty(eng).php?val=Computers'>Computers</a></li>
                            </ul>
                        </li>";
	   }
	   else{
		   
		    echo "<li><a  id='current'>Functions</a>
                            <ul class='dropdown'>
                                <li><a href='AddItem(eng).php' >add course</a></li>
                                <li><a href='AddMaterial(eng).php' >add lesson</a></li>
                                <li><a href='editGrades(eng).php' >edit grades </a></li>
                                <li><a href='AddExam(eng).php' > add exam</a></li> 
							</ul>
              </li>";
	 
	   }
?>
                </ul>
            </div>
		

       
		
        <div class="right-side" >

				
<?php

// Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");

$UserID = $_SESSION["UserID"];

if ( $_SESSION['type'] == 2 )
$select_query = " SELECT * FROM student where StudentID='$UserID' ";
else
$select_query = " SELECT * FROM teacher where TeacherID='$UserID' ";	

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$row=mysql_fetch_array($result);
$html ="";


if ( $_SESSION['type'] == 2 ){
$html .= "<h2> Student's name : ". $row['Name'] ." </h2> ";

$html .= "<h2> Student's id :". $UserID ."  </h2> ";

$select_query = " SELECT * FROM studentcourses where StudentID='$UserID' ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$existRow = mysql_num_rows($result);
$GPA = 0.0 ;

 $html .= " <table style='width:30%'>
 <caption> <h2>Student's grades : </h2> </caption>
  <tr>
    <th>course</th>
    <th>grade</th>		
  </tr>";
		   
while($row=mysql_fetch_array($result))
{ 

 
	          $html .= "  <tr><td> " . $row['CourseName'] . " </td> <td>" . $row['Grade'] . " </td>  </tr>" ;
              $GPA = $GPA + (int) $row['Grade'];
 
} 
$total = $existRow * 100 ;
if ( $total != 0 )
$GPA = ($GPA / $total ) * 4 ;
$GPA = round($GPA, 2) ; 
     $html .= " <tr>
    <th>GPA</th>
    <th>".$GPA . "</th>		
       </tr>
   </table> ";
}
else{
	

$html .= "<h2> Name : ". $row['Name'] ." </h2> ";

$html .= "<h2> Email : ". $row['Email']  ." </h2> ";

$UserEmail = $_SESSION['UserEmail'];
$select_query = " SELECT * FROM courses where OwnerEmail='$UserEmail' ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

 

$html  .= "<br><br><table style='width:20%'> <caption> <h2> Your courses </h2> </caption>

  <tr>
    <th>course</th>	
  </tr>";
  
while($row=mysql_fetch_array($result))
{

 $CourseName = $row['CourseName'] ;
      
 $html .= "  <tr><td> <a href='CourseReg(eng).php?CourseName=".$CourseName ."' >" . $CourseName  . " </td>  </tr>" ;
             
}

     $html .= "   </table> ";

}
echo $html ;		

 ?>      
        </div>
        </div>
        
            </div>

            </div>

    </body>
</html>