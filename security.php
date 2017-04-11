<?php

class preq
{

 public function input($data)
 {
   $data=htmlspecialchars($data);	  
   $data=trim($data);
   $data=stripslashes($data);	
      
    return ($data);
   }   
	
}

?>