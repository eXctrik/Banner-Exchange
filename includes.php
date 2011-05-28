<?php

 // includes.php

 function find_ext( $filename ) { 
 
  // finds the extension of the file.
 
  $filename = strtolower( $filename ); 
  $exts = explode(".", $filename); 
  $n = count($exts)-1; 
  $exts = $exts[$n]; 
  return $exts; 
 
 } 

?>