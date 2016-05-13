
<html>

    <head>
        <meta charset="utf-8" />
        <title>تسجيل الدخول</title>
        
		
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
        	
        	<h1 id="h1">قم بتسجيل الدخول</h1>
<?php
session_start();

 

if ( isset($_POST["submit"]))
{

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

$select_query = " SELECT * FROM student where Email='$Email' and Password='$Password'";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$existRow = mysql_num_rows($result);
if ( $existRow == 1 )
{
   $row = mysql_fetch_array($result);
   $_SESSION["StudentID"] = $row["StudentID"];
   
       $_SESSION["Email"] = $Email; 
	   
	
    $_SESSION["type"] = 0 ;
header("Location: home.html?msg=1");
   
}
else
  echo "   <h2> خطأ بالإيميل أو كلمة السر </h2>";
   

}
?>

        	<form class="" method="post" action="Login.php">
        		<input type="email" name="Email" required  placeholder="الإيميل" />
				<br>
        		<input type="password" name="Password" required  placeholder="كلمة السر" />
        		<input type="submit" name="submit" value="تسجيل الدخول" />
				<br><br>
        		<h2>  ليس لديك حساب ؟ <a href="SignUp.php" > سجل في الموقع </a></h2>
		
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
