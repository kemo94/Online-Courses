

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>add course name</title>
        
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
        	
        	<h1>add new material</h1>
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
$lessonNum = $_POST['lessonNum'];
$Images = $_POST['Images'];
$Videos = $_POST['Videos'];
$lesson = $_POST['lesson'];

$select_query = " SELECT * FROM  Courses ";
$check = 0 ;
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
    if ( $CourseName == $row['CourseName']  )
	
	    
    	$check = 1 ;
		
}
if ( $check == 1 )
{

    
$insert= " INSERT into materials 
          (CourseName , lessonNum ,Images , Videos,lesson ) 
values  ( '$CourseName' ,'$lessonNum' ,'$Images','$Videos','$lesson')";


mysql_query($insert);


mysql_close($connenction_link);

  header("Location: Home(Teacher)(eng).html?msg=5");

}
else{

  echo "   <h2> this course not exist </h2>";
}

}
 
?>      
             	<form class="" method="post" action="AddMaterial(eng).php">
        	   	<input type="text"  name="CourseName" required placeholder="course name" />
				<br>
        	
         
         		<input type="text"  name="lessonNum" required placeholder="lesson number" />
				<br>
        		<input type="text"  name="Images"  placeholder="lesson image" />
				<br>
        		<input type="text"  name="Videos"  placeholder="lesson video" />
				<br>
				<br><br>
				<textarea name="lesson" required col="200" rows="20" /> </textarea >
        	<input type="submit" name="submit" value="Add the lesson" />
        	</form>
        </div>
        
		</div>

            </div>

    </body>
</html>