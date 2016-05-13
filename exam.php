<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Course</title>
	
<style>
		#map { width:400px; height:250px;float:left; }
	</style>
       <link href="css/style not.css" rel="stylesheet" type="text/css" />
       <link href="css/style.css" rel="stylesheet" type="text/css" />
	   
    <link rel="stylesheet" type="text/css" href="css/style list.css" />

</head>

<body>

	<div class="wrapper1">
   	  <div class="wrapper2">
<div class="header">
          
          
              <div class="header">
                  <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                     <div class="top-side" >  <a href="sendMessage.php" >إرسال رسالة</a>  | <a href="SignOut.php" >تسجيل الخروج</a> </div>
					  </div>
           <br> <br>
			
                 
             <div class="menu">
           
     		   <ul class="horz-menu">
                          
                		  
	                   <li><a href="ListAllItems.php" >إظهار جميع المواد الدراسية</a></li>
                 
                      <li><a  id="current">مجالات</a>
                            <ul class="dropdown">
                                <li><a  href="Faculty.php?val=Medicine">الطب</a></li>
                                <li><a  href="Faculty.php?val=Pharmacy">الصيدلة</a></li>
                                <li><a  href="Faculty.php?val=Engineering">الهندسة</a></li>
                                <li><a  href="Faculty.php?val=Computers">الحاسب الألي</a></li>
                            </ul>
                        </li>

                      <li><a href="notification.php" >إشعارات</a></li>
                      <li><a href="ShowInfo.php" >الصفحة الشخصية</a></li>
					  
                      <li><a href="home.html" >الصفحة الرئيسية</a></li>
                </ul>
            </div>
		<br><br>
      <div class='main-not'>
	           <form action='exam.php' method='post'>
	             	
<?php



session_start();

if ( !isset($_POST["submit"])){

 $_SESSION["CourseName"]  = $_GET['CourseName'];
 $_SESSION["questionNum"] = 0;
 $_SESSION['correct'] = 0 ;
 
 }

else
{
  if ( $_SESSION["questionNum"] != 1 )
 { 
  
    if ( $_POST['choices'] == $_SESSION['ans'] )
    $_SESSION['correct'] = $_SESSION['correct'] + 1 ;
  
  
 }
$connenction_link=mysql_connect("127.0.0.1","root","","education");


mysql_select_db("education");

if(!$connenction_link)
{
echo " error in connection".mysql_error();
}
 
  $CourseName = $_SESSION["CourseName"] ;
  $questionNum =  $_SESSION['questionNum'] ;

$select_query = "  select * from exams where CourseName='$CourseName' and  questionNum ='$questionNum'    ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
 $html = "" ;
 
$existRow = mysql_num_rows($result);
$row=mysql_fetch_array($result);

if ( $existRow != 0 ){
 $Question = $row['Question'] ;
 $CourseName = $_SESSION["CourseName"] ;
 $chA = $row['ChoiceA'] ;
 $chB = $row['ChoiceB'] ;
 $chC = $row['ChoiceC'] ;
 $chD = $row['ChoiceD'] ;
 $_SESSION['ans'] = $row['ans'] ;

       $html .=    "  <h2> " . $questionNum . " : رقم السؤال <br><br>" . $Question . "</h2><br><br>
	              <h2> <input type='radio' name='choices' value='A'> " . $chA . " <br></h2>
				  <h2> <input type='radio' name='choices' value='B'> " . $chB . "<br> </h2>
				  <h2> <input type='radio' name='choices' value='C'> " . $chC . "<br></h2>
              	  <h2> <input type='radio' name='choices' value='D'> " . $chD . "<br> </h2>" ; 
				  
}
else{
     $total = 100 /( $_SESSION['questionNum'] - 1) ;
     $Grade = $_SESSION['correct'] * $total;
	 $StudentID = $_SESSION['StudentID'] ;
	 $sql = " update studentcourses set  Grade='$Grade' where StudentID='$StudentID' and CourseName ='$CourseName' ";

     mysql_query($sql)or die($sql."<br/><br/>".mysql_error());
	 
     echo  "  <h1>  100   درجاتك هي : " . $Grade . "  من </h1> ";

}
mysql_close($connenction_link);

   
  
   echo  $html ;
}

    if ( $_SESSION["questionNum"] != 0 ){
    
	    if ( $existRow != 0 )
	    echo   "<input type='submit' name='submit' value='قم بالإجابة' />" ;
	}
	else 
     
	 echo "<input type='submit' name='submit' value='إبدأ الإمتحان ' />";	
	  
	 
  $_SESSION['questionNum'] = $_SESSION['questionNum'] + 1 ; 

?>      
 

	   </form>
	  </div>
      </div>
      </div>
   
 

</body>
</html>
