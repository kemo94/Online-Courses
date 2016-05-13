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


<body>

	<div class="wrapper1">
   	  <div class="wrapper2">
<div class="header">
          
          
              <div class="header">
                  <img src="images/مرحبا.png" width="1000" height="150" float="left"/> 
                    
            
		<br><br>
        
			<div id="main">
        	
        <form class="" method="post" action="replySendMessage(eng).php">
        	
<?php


session_start();

if ( isset($_POST["reply"]) ){


$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " error in connection".mysql_error();
}


mysql_select_db("education");
$sender = $_SESSION['Email'];
$receiver = $_POST['Email'];
$Message = $_POST['Message'];


$insert_query= " INSERT into Messages 
          (Message , receiverEmail , senderEmail,status) 
values  ( '$Message' , '$receiver' , '$sender' ,'0')";


mysql_query($insert_query);

	  
mysql_close($connenction_link);

if (   $_SESSION["type"] == 0 ) 
header("Location: home(eng).html?msg=7");

if (   $_SESSION["type"] == 1 ) 
header("Location: home(Teacher)(eng).html?msg=7");
}
else{

    echo   "<input type='email' name='Email' required  value='". $_POST['Email'] ."' />
        		 <br><br>" ;

} 

?>  
 
				 <textarea cols="20" rows="10" name="Message"  >  </textarea>
         	     <br><br>
				 <input type="submit" name="reply" value="send" />
        		
        	</form>
        </div>
        
       </div>
      </div>
      </div>
   
 

</body>
</html>


    </body>
</html>