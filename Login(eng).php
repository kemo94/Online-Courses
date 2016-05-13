
<html>

    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        
		
        <link rel="stylesheet" href="css/style-back.css" />
        <link rel="stylesheet" type="text/css" href="css/style SignUp.css" />

		
    </head>
    
  
    <body>

             <div class="wrapper1">
        <div class="wrapper2">
            <div class="header">
                   <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                  
            <br> <br>
            

        <div id="main">
        	
        	<h1 id="h1">Login</h1>
<?php
session_start();
if ( !isset($_POST["submit"]))
$_SESSION['type'] = $_GET['type']; 

else{

// Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");
$Email = $_POST['Email'];
$Password = $_POST['Password'];


if ( $_SESSION['type'] == 2 )
$select_query = " SELECT * FROM student where Email='$Email' and Password='$Password'";
else
$select_query = " SELECT * FROM teacher where Email='$Email' and Password='$Password'";
	
	
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$existRow = mysql_num_rows($result);
if ( $existRow == 1 )
{
       $row = mysql_fetch_array($result);
       $_SESSION["UserID"] = $row["UserID"];
       $_SESSION["UserEmail"] = $Email; 
	   
header("Location: home(eng).php?msg=1");
   
}
else
  echo "   <h2> wrong name or password </h2>";
   

}
?>

        	<form class="" method="post" action="Login(eng).php">
        		<input type="email" name="Email" required  placeholder="email" />
				<br>
        		<input type="password" name="Password" required  placeholder="password" />
        		<input type="submit" name="submit" value="login" />
				<br><br>
        		<h2>  You do not have an account<a href="SignUp(eng).php" > sign up</a></h2>
		
        	</form>
        </div>
        	<br><br>
        		<br><br>
        		<br><br>
        	
            </div>
          </div>
            </div>

    </body>

</html>
