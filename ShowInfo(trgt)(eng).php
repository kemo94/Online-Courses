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
                      <div class="top-side" >  <a href="sendMessage(eng).php" >Send message</a>  | <a href="SignOut(eng).php" >Sign Out</a> </div>
            <br> <br>
			
                 
             <div class="menu">
           
     		   <ul class="horz-menu">
                          
                		  
	                   <li><a href="ListAllItems(eng).php" >List all courses </a></li>
                 
                       
                        <li><a  id="current">Categories</a>
                            <ul class="dropdown">
                                <li><a  href="Faculty(eng).php?val=Medicine">Medicine</a></li>
                                <li><a  href="Faculty(eng).php?val=Pharmacy">Pharmacy</a></li>
                                <li><a  href="Faculty(eng).php?val=Engineering">Engineering</a></li>
                                <li><a  href="Faculty(eng).php?val=Computers">Computers</a></li>
                            </ul>
                        </li>


                      <li><a href="notification(eng).php" >Notification</a></li>
                      <li><a href="ShowInfo(eng).php" >Profile</a></li>
					  
                      <li><a href="home(eng).html" >Home</a></li>
                </ul>
            </div>
		
       
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
$html .= "<br><br><table style='width:20%'> <caption> <h2> His courses </h2> </caption>
 
  <tr>
    <th>course</th>	
  </tr>";
  
while($row=mysql_fetch_array($result))
{

 $CourseName = $row['CourseName'] ;
      
 $html .= "  <tr><td> <a href='Course(eng).php?CourseName=".$CourseName ."' >" . $CourseName  . " </td>  </tr>" ;
             
}

     $html .= "   </table> ";
echo $html;


 ?>      
        
            </div>

            </div>

    </body>
</html>