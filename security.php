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
