
<html>

    <head>
        <meta charset="utf-8" />
        <title>Notification</title>
        
		
    <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style not.css" />
    <link rel="stylesheet" type="text/css" href="css/style list.css" />
		
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
                          
                		  
                      <li><a href="notification(Teacher)(eng).php" >Notification</a></li>
                      <li><a href="ShowInfo(Teacher)(eng).php" >Profile</a></li>
					  
                      <li><a href="home(Teacher)(eng).html" >Home</a></li>
                </ul>
            </div>
			
            <br> <br>
            
	<div class='main-msg' >
<?php
session_start();

 

// Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}
   
// Select Database
mysql_select_db("education");
$Email = $_SESSION['Email'];

$select_query = " SELECT * FROM messages    ";

$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
 $html = "" ;
while($row=mysql_fetch_array($result))
{
       if ( $Email == $row['receiverEmail'] && $row['status'] == "0" )
       $html .= "<br><br><div class='not' ><section><form class='' method='post' action='replySendMessage(eng).php'> <h2> You got a new message from : <input type='email' name='Email' required value='". $row['senderEmail'] ."' /> </h2>  <p> ". $row['Message']. "</p> 
	   
     	<br><br><input type='submit' name='submit' value='Reply' /> <br><br></form></section></div> "; 

      if ( $Email == $row['receiverEmail'] && $row['status'] == "1" )
       $html .= "<br><br><div class='seen' ><section>
	  <h2>  You got a message from : ". $row['senderEmail'] ."  </h2>  <p> ". $row['Message']. "</p> 
	   
		<br><br></form></section></div> "; 
		
}


 $sql = " update messages set  status='1' where receiverEmail='$Email'  ";

     mysql_query($sql)or die($sql."<br/><br/>".mysql_error());

  echo $html;
   


?>
			
        		<br><br>
        	
            </div>
          </div>
            </div>

    </body>

</html>
