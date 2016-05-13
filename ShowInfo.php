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

        <div class="right-side" >

				
<?php


session_start();


if (!isset ($_POST["submit"]))
{
// Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");

$StudentID = $_SESSION["StudentID"];
$select_query = " SELECT * FROM student where StudentID='$StudentID' ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$row=mysql_fetch_array($result);

$html = "<h4> ". $row['Name'] ." : إسم الطالب</h4> ";

$html .= "<h4> ". $StudentID ."  : رقم الطالب </h4> ";

$select_query = " SELECT * FROM studentcourses where StudentID='$StudentID' ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$existRow = mysql_num_rows($result);
$GPA = 0.0 ;

 

 $html .= " <table style='width:30%'>
 <caption> <h2> درجات الطالب </h2> </caption>
  <tr>
    <th>المادة</th>
    <th>الدرجة</th>		
  </tr>";
 // $html .= "<br><br><p> " . $StudentID.  " :  رقم الطالب  </p> <br><br>";
           
		   
while($row=mysql_fetch_array($result))
{ 

 
	          $html .= "  <tr><td> " . $row['CourseName'] . " </td> <td>" . $row['Grade'] . " </td>  </tr>" ;
              $GPA = $GPA + (int) $row['Grade'];
 
} 


$total = $existRow * 100 ;
$GPA = ($GPA / $total ) * 4 ;
$GPA = round($GPA, 2) ; 
     $html .= " <tr>
    <th>معدل الدرجات</th>
    <th>".$GPA . "</th>		
       </tr>
   </table> ";
    // $html .= "<br><br><p> " . $GPA .  " :  معدل الدرجات  </p>";
        
echo $html ;		
}
 ?>      
        </div>
        </div>
        
            </div>

            </div>

    </body>
</html>