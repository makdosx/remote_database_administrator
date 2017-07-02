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


session_start();


?>




<html>
<head>
 
 

 <meta charset="UTF-8">
    
 
 

<style>
  
#body
{
background-color:white;
}



#head 
{
    font-family: monospace;
    color: black;
    margin: auto;
    padding: 25px;
    font-size: 30px;
    text-align: center;
}


#bar 
{
    text-align: center;
    width: 43%;
    height: 35px;
    background-color: #DAD9D9;
    margin: 0 auto;
    font-family: monospace;
    padding: auto;
    float: none;
    border-radius: 5px;
}


#red 
{
    background-color: #E94B35;
    border-radius: 100%;
    width: 15px;
    height: 15px;
    margin: 0 auto;
    left: -47%;
    bottom: -20%;
    position:relative;
}


#yellow 
{
    background-color: #f0f000;
    border-radius: 100%;
    width: 15px;
    height: 15px;
    margin: 0 auto;
    left: -44%;
    bottom: 23%;
    position:relative;
    display: block;
}


#green 
{
    background-color: #1AAF5C;
    border-radius: 100%;
    width: 15px;
    height: 15px;
    margin: 0 auto;
    left: -41%;
    bottom: 65%;
    position:relative;
    display: block;
}



#disconect
{
    background-color: #33485E;
    /* border-radius: 100%; */
    width: 140px;
    height: 25px;
    margin: 0 auto;
    left: 35%;
    top: -115%;
    position:relative;
    display: block;
}



#disconect:hover
{
    
    /* border-radius: 100%; */
    width: 142px;
    height: 27px;
    margin: 0 auto;
    left: 35%;
    top: -115%;
    position:relative;
    display: block;	
}





#a
{
text-decoration: none;	
color:white;	
}






#screen 
{
    background-color: #33485E;
    width: 43%;
    height: 350px;
    border-radius: 2%;
    margin: 0 auto;
    padding: 1px;
}


.font 
{
    color: #fff;
    font-family: monospace;
    font-size: 15px;
    text-align: left;
    position: static;
}



.area
{
	background-color: #33485E;
    width: 530px;
    height: 250px;
   /* border-radius:;*/
    border:none;   /* me autes tis duo entoles kanw adiafanw to border */
	outline: none;
    margin: 0 auto; 
    padding: 1px;
	color: white;
	
	left: 1%;
bottom: -455%;
position:relative;
display: block;
}




#pointer
{
background-color:;
border-radius: 100%;
width: 15px;
height: 15px;
margin: 0 auto;
left: -49%;
bottom: -455%;
position:relative;
display: block;
color:white;    
}




#mes
{

background-color: #DAD9D9;
margin: 0 auto;
font-family: monospace;
padding: auto;
float: none;
width:43%;
border-radius: 5px;
color:black;	
}

</style>
 
 
 
 

	
	
  </head>

  <body id="body">
  
    <div align="center">

    <div id="head"> DATABASE TERMINAL EMULATOR </div>

  <div id="bar">
    
	<div id="red">
    </div>
    
	<div id="yellow">
    </div>
	
    <div id="green">
    </div>
	
	<div id="disconect">
	<a href="logout.php" id="a" onclick="return confirm('Are you sure you want to disconect?')"> 
	    <img src="images/disconect.png" height="13" width="20">	 
	   <font size="4"> Disconect </font>
	   </a>
	</div>
	
	
	 <div id="pointer">
	<h4> > </h4>
	 </div>
	
</div>


    <div id="screen">
        <p class="font">
		  root@<?php echo $_SERVER['REMOTE_ADDR'] ?>:~$
              &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;     
		    &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  
		    <?php if(isset($_SESSION['db'])) { echo "Database: " .$_SESSION['db']; }?>
		  </p>


		  
		   <form action="" method="post">
		  <input type="text" name="command" class="area" autofocus="autofocus">
		  <input type="submit" name="submit" style="position: absolute; left: -9999px"> 
		   </form>     

         
		 
    </div>
    
	
	
	</div>
    
    
    
    
  </body>
</html>







<?php


  if(!$_SESSION['host'] || !$_SESSION['user'] || !$_SESSION['pass'])
  {	
	  
	  //|| !$_SESSION['db']
	  // auto to ekan gia na mhn einai upoxrewtikh h vash wste na mpainei se oles
	header('Location: index.php'); 
  }

  
   else
   {
    
		$host=$_SESSION['host'];
        $db=$_SESSION['db'];
         $link="mysql:host=$host;dbname=$db";		 
		$user=$_SESSION['user'];
        $pass=$_SESSION['pass'];		
		
        try
		{
		  $conn = new PDO($link,$user,$pass);	
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
		   if($conn)
		   {
			   
			  if(isset($_POST['submit']))
	           {
			   
			    $command=$_POST['command'];
				 
				 
				 
				 
				 // here is commands for user terminal
				 
				 if($command=='help')
				 {
					 
				  echo '<div align="center">
				       <table id="mes">
						
						<tr>
						 <td> clear </td> <td> Clear terminal </td>
						</tr>
						
						
						 <tr>
						 <td> dns_rec </td> <td> Dns record </td>
						</tr>
						
						
					    <tr>
						 <td> host </td> <td> Hostname </td>
						</tr>
						
						
						<td> host_ip </td> <td> Get ip from host </td>
						</tr>
						</tr>
						
						
						<tr>
						<td> ipaddr </td> <td> ipv4 address </td> 
					    <tr>
					
					
					    <tr>
						 <td> mac </td> <td> Psysical address </td>
						</tr>
						
						<tr>
						<td> os </td> <td> Operating system  </td> 
					    <tr>
						
						
						 <tr>
						 <td> php_info </td> <td> Php informations </td>
						</tr>
						 
						 <tr>
						 <td> server_info </td> <td> Server informations </td>
						</tr>
						
						
						<tr>
						 <td> time </td> <td> Date-time </td>
						</tr>
						
				       </table>
					    </div>';	 
						
				   exit;				  
				 }
				 
				 
				 
				 
				   // auto den to vazw na fenetai pouthena
				   // einai to clasiko exit gia apeutheias eksodo
				   
				   if($command=='exit')
				  {
                   header('Location: logout.php');
				  exit;
				  }
				  
				 
				 else if($command=='clear')
				  {
                    header("Refresh:0");
				  exit;
				  }
				  		  
				  
				 
				 else if (preg_match('/dns_rec/',$command)) 
					{
					
				  $url_rec=substr($command,8);  	  
				  $dns_rec = dns_get_record($url_rec);
                  echo '<h4 align="center" id="mes"> <pre>',print_r($dns_rec),'</pre> </h4>';
				    
					exit; 
					}
					
					
				 
				else if($command=='host')
				  {
				 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			  echo '<h3 align="center" id="mes"> Hostname: '.$hostname.' </h3>';
				  exit;
				  }
				 
				
				 
				 else if (preg_match('/host_ip/',$command)) 
					{
					
				    $url_host=substr($command,8);
					
				      $host_ip = gethostbyname($url_host);	
                    echo '<h3 align="center" id="mes"> '.$url_host.'  -->  '.$host_ip.' </h3>';
				     exit;
			         }
				 
				 
				 
				 
		     else if($command=='ipaddr')
			    {
			  echo '<h3 align="center" id="mes"> Ipv4 Address: '.$_SERVER['REMOTE_ADDR'].' </h3>';
				
				 exit;
			      }
			    
	
				
				  else if($command=='mac')
					{
				   	// find mac address  
				  ob_start(); // Turn on output buffering
                  system('ipconfig /all'); //Execute external program to display output
                  $mycom=ob_get_contents(); // Capture the output into a variable
                  ob_clean(); // Clean (erase) the output buffer
                  $findme = "Physical";
                  $pmac = strpos($mycom, $findme); // Find the position of Physical text
                  $mac=substr($mycom,($pmac+36),17); // Get Physical Address 
					 
					echo '<h3 align="center" id="mes"> Psysical Address: '.$mac.' </h3>'; 
					 
					  exit;
					  }
				   				 
				   
				    else if($command=='os')
					 {
						echo '<h3 align="center" id="mes"> '.php_uname().' </h3>';   
						
                      exit;
					 }						 
				 
				 
				    else if($command=='php_info')
					{
					 echo '<h3 align="center" id="mes"> '.phpinfo(INFO_MODULES).' </h3>';
					  
					  exit;
					}
				 
				 
				 
				 
				 
				 else if($command=='server_info')
				  {
					require_once('information_server.php');  
					 exit;
				  }
				  
				 
				 
				else if ($command=='time')
				 {
			echo '<h3 align="center" id="mes"> Date-time: '.date("Y-m-d H:i:s").' </h3>';
			    exit;
				 }
				 
				 
			
				 
				 
				 
				
				 
				 
				 
				 
				 
				 
				  // here is sql queries for database
				 
				 $sql="$command";
				 $result=$conn->query($sql);
				  
				
	
				   if($result==TRUE)
				   {
					   if (preg_match('/select/',$command))  // find word in a string
					   {
					  while($row=$result->fetch(PDO::FETCH_ASSOC))  
					  {	  
					  echo '<h4 align="center" id="mes"> <pre>',print_r($row),'</pre> </h4>';
					   }
					  }
                    
					else if (preg_match('/insert/',$command))
					{
					 echo '<h3 align="center" id="mes"> Insert data successfully </h3>';	
					 }  
				  
				    
				  	else if (preg_match('/insert into select/',$command))
					{
					 echo '<h3 align="center" id="mes"> Backup data create successfully </h3>';	
					 }  
				  
				    else if (preg_match('/delete/',$command))
					{
					 echo '<h3 align="center" id="mes"> Delete data successfully </h3>';	
					}
				  
				    else if(preg_match('/update/',$command))
					{
					  echo '<h3 align="center" id="mes"> Update data successfully </h3>';
					 }
				   
				   
				    else if(preg_match('/show databases/',$command))
					{
					   while ($row3=$result->fetch(PDO::FETCH_ASSOC))
						{							
					   echo '<h4 align="center" id="mes"> <pre>',print_r($row3),'</pre> </h4>';
						}
					}
					
					
			      else if(preg_match('/use/',$command))
				   {				
				   $database_name=substr($command,4); 
			    echo '<h4 align="center" id="mes"> Selected database <u>'.$database_name.'</u> </h4>';
                    $_SESSION['db']=$database_name;
					 header("Refresh:1");
					}
					
					
			
				     else if(preg_match('/create database/',$command))
					 {
					 $database_cr=substr($command,16);	
					 echo '<h3 align="center" id="mes"> Create database <u>'.$database_cr.'</u> successfully </h3>';
					 }
					
					
			     else if(preg_match('/drop database/',$command))
				  {
				   $database_cr=substr($command,14);	
				  echo '<h3 align="center" id="mes"> Delete database <u>'.$database_cr.'</u> successfully </h3>';
				    $_SESSION['db']=null;
					header("Refresh:1");
					 }
					
					
					
				   
				   else if(preg_match('/show tables/',$command))
					{
					   while ($row2=$result->fetch(PDO::FETCH_ASSOC))
						{							
					   echo '<h4 align="center" id="mes"> <pre>',print_r($row2),'</pre> </h4>';
						}
					 }
				   
				   
				      else if(preg_match('/create table/',$command))
					 {
					 $table=substr($command,12);	
					 echo '<h3 align="center" id="mes"> Create table <u>'.$table.'</u> successfully </h3>';
					 }
					
				   
				     else if(preg_match('/drop table/',$command))
					 {
					 $table=substr($command,10);	
					 echo '<h3 align="center" id="mes"> Delete table <u>'.$table.'</u> successfully </h3>';
					 }
				   
				   
				   else if(preg_match('/show columns/',$command))
				     {
					while ($row3=$result->fetch(PDO::FETCH_ASSOC))
						{							
					   echo '<h4 align="center" id="mes"> <pre>',print_r($row3),'</pre> </h4>';
						}
					}
				   
				   
				   
				  
				   } // end if result
			
			
			
			   } // end of isset submit
			   
			   
			   
			 
			   
			   
		   } // end if for this connection
		  
		  
		  
		} //end of try
			
		 
		 
		 catch (PDOException $e)
		 {
	echo '<h3 align="center" id="mes"> Error: '.$e->getMessage().' </h3>';
		 }		 
		 
		 
	

   }  // end of else
   
   

?>
