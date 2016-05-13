
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Home</title>
    <link href='css/style.css' rel='stylesheet' type='text/css' />
    <link href='css/jq-style.css' rel='stylesheet' type='text/css' />
        <link rel='stylesheet' type='text/css' href='css/style SignUp.css' />
    <link rel='stylesheet' type='text/css' href='css/style list.css' />

    <!-------mainslidercripts-------->
    <script type='text/javascript' src='js/Js Slider.js'></script>
    <script type='text/javascript' src='js/nivo.slider.pack.js'></script>
    <script type='text/javascript' src='js/slider.js'></script>
    
    <!-------mainslidercripts-------->
    
  

          
      
      <script type = 'text/javascript'>
      
      function getMsg() {

          var vars = {};
          var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
              vars[key] = value;

          });
        
          
              if (vars['msg'] == 2)
                  alert('sign up success ');
            else if (vars['msg'] == 5)
                alert('you are already in this course');
              else if (vars['msg'] == 6)
                alert('join to course success');
          else if (vars['msg'] == 7)
                alert('send message success');
          
	       
      }
	  window.addEventListener('load', getMsg, false);
 
    </script>
</head>

<body>
    <div class='wrapper1'>
        <div class='wrapper2'>
            <div class='header'>
                  
				    <img src='images/مرحبا.png' width='1000' height='150' float='left'/> 
                      <div class='top-side' >  <a href='sendMessage(eng).php' >Send message</a>  | <a href='SignOut(eng).php' >Sign Out</a> </div>
            <br> <br>
			
                 
             <div class='menu'>
           
     		   <ul class='horz-menu'>
            
					  <li><a href='home(eng).php' >Home</a></li>
                      <li><a href='ShowInfo(eng).php' >Profile</a></li>
                      <li><a href='notification(eng).php' >Notification</a></li>
<?php
session_start();    		  

       if ( $_SESSION['type'] == 2 ){
	                 
              echo "<li><a href='Faculty(eng).php?val=all' >List all courses </a></li>
                 
                        <li><a  id='current'>Categories</a>
                            <ul class='dropdown'>
                                <li><a  href='Faculty(eng).php?val=Medicine'>Medicine</a></li>
                                <li><a  href='Faculty(eng).php?val=Pharmacy'>Pharmacy</a></li>
                                <li><a  href='Faculty(eng).php?val=Engineering'>Engineering</a></li>
                                <li><a  href='Faculty(eng).php?val=Computers'>Computers</a></li>
                            </ul>
                        </li>";
	   }
	   else{
		   
		    echo "<li><a  id='current'>Functions</a>
                            <ul class='dropdown'>
                                <li><a href='AddItem(eng).php' >add course</a></li>
                                <li><a href='AddMaterial(eng).php' >add lesson</a></li>
                                <li><a href='editGrades(eng).php' >edit grades </a></li>
                                <li><a href='AddExam(eng).php' > add exam</a></li> 
							</ul>
              </li>";
	 
	   }
?>
                </ul>
            </div>
		
       

            <!--main slider-->
            <div class='main-slider'>
                <div id='slider' class='nivoslider'>
                    <img src='images/slider.jpg' alt=''>
                    <img src='images/slider2.jpg' alt=''>
                    <img src='images/slider1.jpg' alt=''>
                    <img src='images/slider3.jpg' alt=''>
                </div>
            </div>
            <!--main slider-->

                         
             
<?php

  if ( $_SESSION['type'] == 2 ){
	 
	  echo "<div class='left-side'>

                 <div class='search'>
                    <div class='search-top'></div>
                    <div class='searchwrap'>


                       	<form class='' method='post' action='selectItem(eng).php'>
        	   	        <input type='text'  name='CourseName' class='search-box' required placeholder='search ' />
                         <input type='submit' class='search-button' value=''/>
                       
                          
                       
                        </form>
                       </div>

                </div>
               
                </div>
				
        <div class='right-side'>";
				
 // Open Connection 
$connenction_link=mysql_connect("127.0.0.1","root","","education");
if(!$connenction_link)
{
echo " Connection Failed".mysql_error();
}

// Select Database
mysql_select_db("education");

$select= " SELECT * FROM  courses " ;
       
$result= mysql_query($select)or die($select."<br/><br/>".mysql_error());
$i = 0 ;
while($row=mysql_fetch_array($result)  )
{
	
      echo "<div class='offer-box'> 
		 <div class='offer-h'>  
		 <span class='tittle'> <a href='Course(eng).php?CourseName=". $row["CourseName"] ."' >".  $row["CourseName"] ."</a> </span><br />
		   <span class='tittle'> <a href='ShowInfo(trgt)(eng).php?email=". $row["OwnerEmail"] ."'> Proffesor : ".  $row["OwnerEmail"] ."</a> </span><br />
		 <span class='tittle'><a href='joinCourse(eng).php?CourseName=". $row["CourseName"] ."' >join to this course</a></span><br />
		
		 <br /> 
		 </div>
		 <div class='offer-img'>
		  <a href='Course(eng).php?CourseName=". $row["CourseName"] ."' > <img src='images/".    $row["Picture"] . "' width='340'height='220' alt='' /> </a>
		 </div></div>";	  
          
		 $i = $i + 1 ;
		 if ( $i == 6 )
			 break ;
}
	
 }
 
 ?>     
          </div>
		<br><br><br><br>
			
		
			  <footer>
	        
            <a class='al3xis'>2015 موقع هيا بنا نتعلم @ الحقوق محفوظة </a>
        </footer>
        
        <!-- JavaScript includes - jQuery, the complexify plugin and our own script.js -->
		<script src='http://code.jquery.com/jquery-1.7.2.min.js'></script>

        </div>
		
        </div>
        </div>
</body>
</html>
