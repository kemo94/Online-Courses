

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Sign Up</title>
        
    
        <link rel="stylesheet" href="css/style-back.css" />
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />

			</head>
   
   <body>
          <div class="wrapper1">
        <div class="wrapper2">
            <div class="header">
             
			 <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
            </div>

           
			<div id="main">
        	
        	<h1> Sign Up  </h1>
<?php


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
$TeacherID= 0 ;
$select_query = " SELECT * FROM  teacher ";
$check = 0 ;
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
    if ( $Email == $row['Email'] )
	
	    
    	$check = 1 ;
    else
	$TeacherID = $row['TeacherID'];
}


if ( $check == 0 )
{

$insert_query= " INSERT into teacher 
          (Name , Email ,Password) 
values  ( '$Name' , '$Email' ,'$Password')";


mysql_query($insert_query);

	  
mysql_close($connenction_link);

$TeacherID = $TeacherID + 1 ;	



$_SESSION["TeacherID"] = $TeacherID;
$_SESSION["Email"] = $_POST["Email"];

}

        if ( $check == 1 )
        echo '<h2> This email is exist </h2>' ;
       if ( $check == 0 )

	   header("Location: home(Teacher)(eng).html?msg=2");
}
 
?>  
 
        <form class="" method="post" action="SignUp(Teacher)(eng).php">
        	   	<input type="text"  name="Name" required placeholder="name" />
             	<input type="email" name="Email" required  placeholder="email" />
        		<input type="password" name="Password" required  placeholder="passowrd" />
        		<input type="submit" name="submit" value="Sign Up" />
        		
        	</form>
        </div>
        
		     
            </div>

            </div>

    </body>
</html>