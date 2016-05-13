

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>add new question</title>
        
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
        	
<?php



session_start();

if ( !isset($_POST["submit"])){

 $_SESSION["CourseName"]  = $_GET['CourseName'];

}

else
{

$connenction_link=mysql_connect("127.0.0.1","root","","education");


mysql_select_db("education");

if(!$connenction_link)
{
echo " error in connection".mysql_error();
}
 $Question = $_POST['question'] ;
 $CourseName = $_SESSION["CourseName"] ;
 $ChoiceA = $_POST['ChoiceA'] ;
 $ChoiceB = $_POST['ChoiceB'] ;
 $ChoiceC = $_POST['ChoiceC'] ;
 $ChoiceD = $_POST['ChoiceD'] ;
 $Answer = $_POST['Answer'] ;
 
 
$insert_query= " INSERT into exams 
          (CourseName  ,  Question  , ChoiceA  , ChoiceB ,ChoiceC , ChoiceD , Answer ) 
values  ( '$CourseName'   , '$Question'  ,  '$ChoiceA', '$ChoiceB' , '$ChoiceC' , '$ChoiceD' , '$Answer')";

mysql_query($insert_query);

mysql_close($connenction_link);

  $_SESSION["questionNum"] = $_SESSION["questionNum"] - 1 ; 
 if ( $_SESSION["questionNum"]  == 0 )
  header("Location: Home(Teacher)(eng).html?msg=8");
      
}



?>      
             	<form class="" method="post" action="AddQuestion(eng).php">
				
				<textarea name="question" required col="50" rows="5" /> </textarea >
        		<br>
				<input type="text"  name="ChoiceA" required placeholder="A " />
				<br>
        		<input type="text"  name="ChoiceB" required placeholder="B " />
				<br>
        		<input type="text"  name="ChoiceC" required placeholder="C " />
				<br>
        		<input type="text"  name="ChoiceD" required placeholder="D" />
				<br>
				<input type="text"  name="ans" required placeholder="answer : A , B , C , D " />
				<br>
        		<input type="submit" name="submit" value="enter question" />
        		
        	</form>
        </div>
        
		</div>

            </div>

    </body>
</html>