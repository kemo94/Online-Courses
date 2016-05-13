<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Show Info</title>
        
        <!-- The stylesheet -->
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style list.css" />
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />
		
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
       
            <br> <br>

<?php


session_start();

$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");

$OwnerEmail = $_GET["email"];

$select_query = " SELECT * FROM courses where OwnerEmail='$OwnerEmail' ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

$html = "" ;
$html .= "<br><br><table style='width:20%'> <caption> <h2> المواد المسؤول عنها </h2> </caption>
 
  <tr>
    <th>المادة</th>	
  </tr>";
  
while($row=mysql_fetch_array($result))
{

 $CourseName = $row['CourseName'] ;
      
 $html .= "  <tr><td> <a href='Course.php?CourseName=".$CourseName ."' >" . $CourseName  . " </td>  </tr>" ;
             
}

     $html .= "   </table> ";
echo $html;


 ?>      
        
            </div>

            </div>

    </body>
</html>