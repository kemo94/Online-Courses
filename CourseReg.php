<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Course</title>
	
<style>
		#map { width:400px; height:250px;float:left; }
	</style>
       <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/style list.css" />

</head>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
<body>

	<div class="wrapper1">
   	  <div class="wrapper2">
<div class="header">
          
          
              <div class="header">
                  <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
       	  <div class="top-side" >  <a href="sendMessage.php" >إرسال رسالة</a>  | <a href="SignOut.php" >تسجيل الخروج</a> </div>
              <br> <br>
			
                 
            
			  <div class="menu">
           
     		   <ul class="horz-menu">
                          
                	
					  <li><a href="notification(Teacher).php" >إشعارات</a></li>
                     
                      <li><a href="ShowInfo(Teacher).php" >الصفحة الشخصية</a></li>
					  
                      <li><a href="home(Teacher).html" >الصفحة الرئيسية</a></li>
                </ul>
            </div>
			<section>
        
		
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


$select_query= " SELECT * FROM  studentcourses where CourseName='$CourseName' " ;
// catch resulting records

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

$html  = "<br><br><table style='width:50%'> <caption> <h2> ". $CourseName  ." الطلاب المسجلين في </h2> </caption>

  <tr>
    <th>رقم الطالب</th>	 
	<th> درجة الطالب</th>	
  </tr>";
  
while($row=mysql_fetch_array($result))
{

 
 $StudentID = $row['StudentID'] ;
 $Grade = $row['Grade'] ;
 $html .= "  <tr><td> <a href='ShowInfo(student).php?StudentID=".$StudentID ."' >" . $StudentID  . "</a> </td> " ;
  $html .= "  <td> " . $Grade  . "</td>  </tr>" ;
             
}

     $html .= "   </table> ";
echo $html;

 ?>
         
            
			</section>
       </div>
      </div>
      </div>
   
 

</body>
</html>
