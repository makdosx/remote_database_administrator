<?php

/* 
 *   Remote database administrator is a programm for managing and executing queries.
 *   Copyright (c) 2016 Barchampas Gerasimos.
 *
 *   Remote database administrator is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   Remote database administrator is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Affero General Public License for more details.
 *
 *   You should have received a copy of the GNU Affero General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


?>


<html>
<head>

 <link rel="stylesheet" type="text/css" href="/css/index.css">

</head>

<body id="body">

  <div align="center">
    <table border="5" id="table">
   <form action="" method="post" enctype="multipart/form-data">
   
        <tr>
         <td colspan="2" align="center" id="header"> 
        <img src="/images/remote.png" height="80" width="150"> 
		 </td>
        </tr>
	   
	   	 
	</tr>
	   <td align="center">
	  <img src="/images/host.png" height="40" width="60">
	     </td>
	    <td colspan="2">
	  <input type="text" name="host" id="hst" placeholder="Host">
       </td>
	  </tr>
	   
	   
	     <tr>
		   <td align="center">
	  <img src="/images/database.png" height="40" width="50">
	     </td> 
       <td colspan="2"> 
	   <input type="text" name="database" id="databas" placeholder="Database"> 
	   </td>
     </tr>  
	      
	   
      <tr>
	      <td align="center">
	  <img src="/images/user.svg" height="40" width="50">
	     </td>
       <td colspan="2"> 
	   <input type="text" name="user" id="usr" placeholder="User"> 
	   </td>
     </tr>  
	 
	 
	</tr>
	    <td align="center">
	  <img src="/images/pass.png" height="45" width="55">
	     </td>
	  <td colspan="2">
	  <input type="password" name="password" id="pas" placeholder="Password">
       </td>
	  </tr>
	  
	  

		
	 
	  <tr>
	  <td colspan="2"> 
	   <input type="submit" name="submit" value="Connect now" id="con" onclick="return confirm('Are you sure you want to connect to this database?');"> 
	    </td>
	  <!-- <td align="right"> <input type="reset" name="reset" value="Disconect" id="discon"> </td> -->
	  </tr>
	 
     </form>
   </table> 
  </div>
  
  
  
    <div id="footer">
	     <br>
	    <font size="4"> <b> Remote connect mysql database </b> </font>
   	</div>
	 
  
</body>

</html>






<?php


   session_start();
 

  if(isset($_POST['submit']))
  {
	  
 
		  if (!$_POST['host'] || !$_POST['user'] || !$_POST['password'])
		      {
			  header('Location: delay.php');	
              ob_flush(); 
            flush(); 
           sleep(10);	   
		    }
		 
		 
		 
        else if (!$_POST['host'] && !$_POST['user'] && !$_POST['password'])	
		    {
			 header('Location: delay.php');	
              ob_flush(); 
            flush(); 
           sleep(10);
		   }			 
 
		  
		else if(!$_POST['host'] && !$_POST['user'])	
		    {
			 header('Location: delay.php');	
              ob_flush(); 
            flush(); 
           sleep(10); 
		   }
		 
		 
		 	else if(!$_POST['host'] && !$_POST['password'])	
		      {
			 header('Location: delay.php');	
              ob_flush(); 
            flush(); 
           sleep(10); 
		    }
		 
		 
		 
		 	 else if(!$_POST['user'] && !$_POST['password'])	
		      {
			 header('Location: delay.php');	
              ob_flush(); 
            flush(); 
           sleep(10); 
		   }
		 
		  
		  
		   
		  
		  
	   
	 else
     {		  

 
   require ('security.php');
   
    $obj = new preq;
	
	$host_f=$obj->input($_POST['host']);
	$database_f=$obj->input($_POST['database']);
	$user_f=$obj->input($_POST['user']);
	$pass_f=$obj->input($_POST['password']);

	
	$host=$host_f;
	$db=$database_f;
	 $link="mysql:host=$host;dbname=$db";
	$user=$user_f; 
    $pass=$pass_f;
	
	 try
	 {
	$conn = new PDO($link,$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	 if($conn) 	 
	   {
	  $_SESSION['host']=$host;	  
	  $_SESSION['db']=$db;	
      $_SESSION['user']=$user;
      $_SESSION['pass']=$pass;	   
	  header('Location: terminal.php');
	 }

	  
     
	 
	 $conn = null;
	
     } // end of try
	 
	 
	 
	 
	 catch (PDOException $e)
	 {
	  //echo "Connection failed " .$e->getMessage();
		header('Location: delay.php');	
         ob_flush(); 
         flush(); 
         sleep(10);   		  
	 }
	
	
	   } //end else
	
  } // end of submit 
 
?>
