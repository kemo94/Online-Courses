

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Add new Exam</title>
        
        <!-- The stylesheet -->
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style list.css" />
      
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
   
   <body>
          <div class="wrapper1">
        <div class="wrapper2">
            <div class="header">
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
        	
        	<h1>Add new Exam</h1>
<?php



session_start();


if ( isset($_POST["submit"]))
{

$connenction_link=mysql_connect("127.0.0.1","root","","education");


mysql_select_db("education");

if(!$connenction_link)
{
echo " error in connection".mysql_error();
}

$CourseName = $_POST['CourseName'];
$questionNum = $_POST['questionNum'];

$select_query = " SELECT * FROM  Courses ";
$check = 0 ;
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
    if ( $CourseName == $row['CourseName'] )
    {	
	   
     $_SESSION["questionNum"] = (int)$questionNum  ;
       header("Location: AddQuestion(eng).php?CourseName=" . $CourseName );
       mysql_close($connenction_link);
    
	}	
}



  echo "   <h2> This course not exist</h2>";
}



 
?>      
             	<form class="" method="post" action="AddExam(eng).php">
        	   	<input type="text"  name="CourseName" required placeholder="course name" />
				<br>
        		<input type="text"  name="questionNum" required placeholder="number of question" />
				<br>
        		<input type="submit" name="submit" value="enter the questions" />
        		
        	</form>
        </div>
        
		</div>

            </div>

    </body>
</html>