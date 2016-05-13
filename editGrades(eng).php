<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>تعديل درجات الطالب </title>
        
        <!-- The stylesheet -->
       <link rel="stylesheet" href="css/style.css" />  
        <link rel="stylesheet" type="text/css" href="css/style list.css" />

    </head>
   
   <body>
          <div class="wrapper1">
        <div class="wrapper2">
            <div class="header">
                   <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                                 <div class="top-side" >  <a href="sendMessage(eng).php" >Send message</a>  | <a href="SignOut(eng).php" >Sign Out</a> </div>
            <br> <br>
			
                 
             <div class="menu">
           
     		   <ul class="horz-menu">
                          
                		  
                      <li><a href="notification(Teacher)(eng).php" >Notification</a></li>
                      <li><a href="ShowInfo(Teacher)(eng).php" >Profile</a></li>
					  
                      <li><a href="home(Teacher)(eng).html" >Home</a></li>
                </ul>
            </div>
			
        <div id="main">
        	
        	<h1>edit grades </h1>
<?php


session_start();

 
if (isset ($_POST["submit"]))
{
 $connenction_link=mysql_connect("127.0.0.1","root","","education");
  mysql_select_db("education");

if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}


$Email = $_SESSION["Email"] ;

$CourseName = $_POST["CourseName"] ;
$Grade = $_POST["Grade"] ;
$StudentID = $_POST["StudentID"] ;
(int) $StudentID ;
//header("Location: home(Teacher).html?msg=4");   
 

$select_query = " SELECT * FROM coursesowner where OwnerEmail='$Email' and CourseName ='$CourseName'";

$resultCourse= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());


$existRow = mysql_num_rows($resultCourse);

if ( $existRow == 1 )
{
  
  $select_query = " select * from  studentcourses where  StudentID='$StudentID' ";
 
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

$existRow = mysql_num_rows($result);

   if ( $existRow != 0){
     (int) $Grade; 
	 $sql = " update studentcourses set  Grade='$Grade' where StudentID='$StudentID' and CourseName ='$CourseName' ";

   
   
   header("Location: home(Teacher)(eng).html?msg=4");   
 
   }
   else
   echo "   <h2> this student not exist or not registered in this course </h2>";
  
}
 
 else
   echo "   <h2> You can's access to this course</h2>";


}

 ?>      
       
	   

	     <form class="" method="post" action="editGrades(eng).php">
        		<input type="text" name="StudentID" required  placeholder="student id" />
				<br>
				<input type="text" name="CourseName" required  placeholder="course name" />
				<br>
				<input type="text" name="Grade" required  placeholder="student grade" />
				<br>
        		<input type="submit" name="submit" value="edit grade" />
				<br><br>
        		
        	</form>
        </div>
        
            </div>

            </div>

    </body>
</html>