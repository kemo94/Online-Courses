
<html>

    <head>
        <meta charset="utf-8" />
        <title>إشعارات</title>
        
		
    <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style not.css" />
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
      <div class="main-not" >
	
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
$Email = $_SESSION['Email'];
$StudentID = $_SESSION["StudentID"] ;

$select_query = " SELECT * FROM messages    ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
 $html = "" ;

while($row=mysql_fetch_array($result))
{
       if ( $Email == $row['receiverEmail'] && $row['status'] == "0" )
       $html .= "<div class='not-msg' ><form class='' method='post' action='replySendMessage(eng).php'> 
	   <input type='email' name='Email' required value='". $row['senderEmail'] ."' />   <h3> ". $row['Message']. "</h3> 
	   
     	<input type='submit' name='submit' value='reply message' /> </form></div> "; 

      if ( $Email == $row['receiverEmail'] && $row['status'] == "1" )
       $html .= "<div class='seen-msg-div' >
	  ". $row['senderEmail'] ."   <h3> ". $row['Message']. "</h3> 
	   
		</form></div> "; 
		
}

 $sql = " update messages set  status='1' where receiverEmail='$Email'  ";

     mysql_query($sql)or die($sql."<br/><br/>".mysql_error());
       
$courses = array();

$courses2 = array();
	
$lessons = array();

$imgs = array();

$select_query = " SELECT CourseName FROM  studentcourses where StudentID='$StudentID'  ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))

       array_push($courses,$row['CourseName']);

$select_query = " SELECT * FROM materials ORDER BY lessonNum DESC ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
	   

while($row=mysql_fetch_array($result)){
  
  array_push($courses2, $row['CourseName'] );
   
   array_push($lessons, $row['lessonNum'] );
  
  array_push($imgs, $row['Images'] );
   
}

$arrlength=count($courses);
$arrlength2=count($courses2);
    
    for($x=0;$x<$arrlength;$x++)
    {
        for($i=0;$i<$arrlength2;$i++)
        { 
	       if (  $courses[$x] == $courses2[$i] )
           {
                 $html .=  "<div class='seen-msg-div' ><a href='Course.php?CourseName=". $courses2[$i] ."' > <p> Course name : ".$courses2[$i] ."  </p>  </a> 
				<h2> <a href='Lesson.php?CourseName=". $courses2[$i] ."&Lesson=". $lessons[$i]. "' > Lesson : ".$lessons[$i] ."  </a> </h2> 
				 <br><img src='images/".    $imgs[$i] . "' width='300'height='200' alt='' /></div>"; 

		   
		   }
      
	   }
	}


  echo $html;
   


?>
             </div>			
        		<br><br>
        	
            </div>
          </div>
            </div>

    </body>

</html>
