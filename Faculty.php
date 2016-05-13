<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/jq-style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />
    <link rel="stylesheet" type="text/css" href="css/style list.css" />

</head>
      <script type = 'text/javascript'>


        function show(a) {
       
            window.location.href = 'Course.php?CourseName=' + a ;
        }
		 function join(a) {
       
            window.location.href = 'joinCourse.php?CourseName=' + a ;
        }
        
    </script>
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
			
  <div class="left-side">

                 <div class="search">
                    <div class="search-top"></div>
                    <div class="searchwrap">


                       	<form class="" method="post" action="selectItem.php">
        	   	        <input type="text"  name="CourseName" class="search-box" required placeholder="... قم بالبحث عن " />
                         <input type="submit" class="search-button" value=""/>
                       
                          
                       
                        </form>
                       </div>

                </div>
               
                         
              
			
            </div>
		
        <div class="right-side">
		
		
<?php
// Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");

$Category =  $_GET["val"];
// catch resulting records

       $select= " SELECT * FROM  courses WHERE Category='$Category' " ;
   
   
$result= mysql_query($select)or die($select."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
       echo "<div class='offer-box'> 
		 <div class='offer-h'>  
		 <span class='tittle'> <a >".  $row["CourseName"] ."</a> </span><br />
		   <span class='tittle'> <a href='ShowInfo(trgt).php?email=". $row["OwnerEmail"] ."'>".  $row["OwnerEmail"] ."</a> :  دكتور المادة </span><br />
		 <span class='tittle'><a href='#' id='". $row["CourseName"] ."' onclick='join(this.id);'>إنضم للمادة</a></span><br />
		
		 <br /> 
		 </div>
		 <div class='offer-img'>
		  <a href='#' id='". $row["CourseName"] ."' onclick='show(this.id);'> <img src='images/".    $row["Picture"] . "' width='340'height='220' alt='' /> </a>
		 </div></div>";	 
}


?>

  
        <br><br>  
        <br><br>  
        <br><br>  
		<br><br>  
        
        </div>
		
		
      </div>
 
        </div>
            </div>

</body>
</html>
