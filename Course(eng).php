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

<script type='text/javascript'>
       
        function getLesson(a,b) {
       
            window.location.href = 'Lesson(eng).php?CourseName=' + a + '&Lesson=' + b ;
        }
		 
        
		
       
</script>

<body>

	<div class="wrapper1">
   	  <div class="wrapper2">
<div class="header">
          
          
              <div class="header">
                     <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                      <div class="top-side" >  <a href="sendMessage(eng).php" >Send message</a>  | <a href="SignOut(eng).php" >Sign Out</a> </div>
            <br> <br>
			
                 
             <div class="menu">
           
     		   <ul class="horz-menu">
                          
                		  
	                   <li><a href="ListAllItems(eng).php" >List all courses </a></li>
                 
                        <li><a  id="current">Categories</a>
                            <ul class="dropdown">
                                <li><a  href="Medicine(eng).php">Medicine</a></li>
                                <li><a  href="Pharmacy(eng).php">Pharmacy</a></li>
                                <li><a  href="Engineering(eng).php">Engineering</a></li>
                                <li><a  href="Computers(eng).php">Computers</a></li>
                            </ul>
                        </li>

                      <li><a href="notification(eng).php" >Notification</a></li>
                      <li><a href="ShowInfo(eng).php" >Profile</a></li>
					  
                      <li><a href="home(eng).html" >Home</a></li>
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


$select_query= " SELECT * FROM  materials " ;
// catch resulting records

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

// get result 
$check = 0 ;
$html = "" ;
while($row=mysql_fetch_array($result))
{ 
 if (  $row["CourseName"] == $CourseName)
   {   
   
       $lessonNum = $row["lessonNum"];
       
	   
	   $html .=  " <br> <br> <h2> <a href='#'   name='".  $lessonNum ."' id= '" . $CourseName. "' onclick='getLesson(this.id , this.name );' > Lesson num : ".   $lessonNum."  </a> </h2>";
     $check = 1 ;

  
			
					 
     }
 
}

$StudentID = $_SESSION["StudentID"];
$select_query = " SELECT * FROM studentcourses where StudentID='$StudentID' and CourseName='$CourseName' ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

$existRow = mysql_num_rows($result);

if ( $existRow != 0 ){

  if ( $CourseName == "sw-1" ){

 $html .= "<br/><br/><div class='menuCat' >
                    <ul>
	            <li><a href='exam(eng).php?CourseName=" . $CourseName . "' >Exam</a></li>
                 

                    </ul>
       </div>";

}
}
if ($check == 0 )
  echo " <br>  <h2> no materials yet </h2>";
else

      echo $html;

 ?>
         
            
			</section>
       </div>
      </div>
      </div>
   
 

</body>
</html>
