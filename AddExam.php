

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>أضف إمتحان جديد</title>
        
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
                  
            <br> <br>
             <div class="menu">
           
     		  <ul class="horz-menu">
                          
                    <li><a href="SignOut.php" >تسجيل الخروج</a></li>
                		  
                      <li><a href="ShowInfo(Teacher).php" >الصفحة الشخصية</a></li>
					  
                      <li><a href="home(Teacher).html" >الصفحة الرئيسية</a></li>
                </ul>
            </div>
			
			
        <div id="main">
        	
        	<h1>أضف إمتحان جديد</h1>
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
       header("Location: AddQuestion.php?CourseName=" . $CourseName );
       mysql_close($connenction_link);
    
	}	
}



  echo "   <h2> هذه ليست موجودة</h2>";
}



 
?>      
             	<form class="" method="post" action="AddExam.php">
        	   	<input type="text"  name="CourseName" required placeholder="إسم المادة" />
				<br>
        		<input type="text"  name="questionNum" required placeholder="عدد الأسألة" />
				<br>
        		<input type="submit" name="submit" value="أدخل الأسألة" />
        		
        	</form>
        </div>
        
		</div>

            </div>

    </body>
</html>