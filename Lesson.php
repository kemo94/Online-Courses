<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Course</title>
	
<style>
		#map { width:400px; height:250px;float:left; }
	</style>
       <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/jq-style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />
    <link rel="stylesheet" type="text/css" href="css/style list.css" />

</head>


<body>

	<div class="wrapper1">
   	  <div class="wrapper2">
<div class="header">
          
           
                  <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                <div class="top-side" >  <a href="sendMessage.php" >إرسال رسالة</a>  | <a href="SignOut.php" >تسجيل الخروج</a> </div>
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
<?php
  

session_start();

 

 $connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");


$CourseName = $_GET['CourseName'];

$lessonNum = $_GET['Lesson'];

$select_query= " SELECT * FROM  materials " ;
// catch resulting records

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

// get result
while($row=mysql_fetch_array($result))
{ 
 if (  $row["CourseName"] == $CourseName && $row["lessonNum"]  == $lessonNum )
   {   
   
       $Images = $row["Images"];
       $Videos = $row["Videos"];
       $Lesson = $row["Lesson"];
	   
	   $html = " <div class='menuCat' >
                    <ul>
	            <li><a href='MaterialLesson.php?trgt1=" . $Lesson ."&trgt2=". $Images ."' >الدرس</a></li>
                 

                    </ul>
                   </div>
				   
				   
             <br /><br />	
             <div class='menuCat' >
                    <ul>
	            <li><a href='videos.php?trgt=" . $Videos ."' >مقاطع فيديو</a></li>
                 

                    </ul>
                   </div>
				   
             <br /><br />";
  
			
			
      echo $html;		 
     }
 
}

 ?>

       </div>
      </div>
      </div>
   
 

</body>
</html>
