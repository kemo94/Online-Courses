

<!DOCTYPE html>
<html>

    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>التسجيل بالموقع</title>
        
        <!-- The stylesheet -->
     <link rel="stylesheet" href="css/style-back.css" />
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />

		
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
   
   <body>
          <div class="wrapper1">
        <div class="wrapper2">
            <div class="header">
             
			 <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
            </div>

           
			<div id="main">
        	
        	<h1> ! قم بالتسجيل , إنه مجاني  </h1>
<?php

mb_internal_encoding('UTF-8'); 

 session_start();

if ( isset($_POST["submit"]))
{

$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " error in connection".mysql_error();
}


mysql_select_db("education");

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$StudentID= 0 ;
$select_query = " SELECT * FROM  student ";
$check = 0 ;

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
    if ( $Email == $row['Email'] )
	
	    
    	$check = 1 ;
    else
	$StudentID = $row['StudentID'];
}


if ( $check == 0 )
{

$Name = 'واللغة العربية PHP مشروع';
  mb_strlen($Name, 'UTF-8');

   mb_strtolower($Name);  

$insert_query= " INSERT into student 
          (Name , Email ,Password) 
values  ( '$Name' , '$Email' ,'$Password')";


mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET CHARACTER SET utf8');
mysql_query($insert_query);

	  
mysql_close($connenction_link);

$StudentID = $StudentID + 1 ;	



$_SESSION["StudentID"] = $StudentID;
$_SESSION["Email"] = $_POST["Email"];

}

        if ( $check == 1 )
        echo '<h2> هذا الإيميل موجود من قبل </h2>' ;
     //  if ( $check == 0 )

	//   header("Location: home.html?msg=2");
}
 
?>  
 
        <form class="" method="post" action="SignUp.php">
        	   	<input type="text"  name="Name" required placeholder="إسمك" />
             	<input type="email" name="Email" required  placeholder="إيميلك" />
        		<input type="password" name="Password" required  placeholder="كلمة السر" />
        		<input type="submit" name="submit" value="سجل" />
        		
        	</form>
        </div>
        
		     
            </div>

            </div>

    </body>
</html>