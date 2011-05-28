<?php

 // banner.php
 
 require_once( 'config.php' );

 $action = $_GET['action'];
 
 if( $action == "new" ) :
 
  // New
  
  if( isset( $_POST['banner_upload'] ) ):
  
   if( ( $_FILES["banner_file"]["type"] == "image/gif" || $_FILES["banner_file"]["type"] == "image/jpeg" || $_FILES["banner_file"]["type"] == "image/pjpeg" ) && ( $_FILES["banner_file"]["size"] < 20000 ) ):
   
    $banner_filename = time( ) . '.' . find_ext( $_FILES["banner_file"]["name"] );
    $unique_id = uniqid( );
    
    $banner_url = stripslashes( addslashes( $_POST['banner_url'] ) );
    
    move_uploaded_file( $_FILES["banner_file"]["tmp_name"], "upload/" . $banner_filename );
    
    $banner_insert = mysql_query( "INSERT INTO `banner` ( `banner_unique`, `banner_image`, `banner_url` ) VALUES ( '$unique_id', '$banner_filename', '$banner_url' )" ) or die( mysql_error( ) );
    
   else:
   
    echo "Invalid File.";
   
   endif;
  
  else:
  
   echo "<form action=\"" . $_SERVER['PHP_SELF'] . "?action=new\" method=\"post\" enctype=\"multipart/form-data\">\n";
   echo " <p><label for=\"banner_file\">File:</label> <input type=\"file\" name=\"banner_file\" id=\"banner_file\" /></p>\n";
   echo " <p><label for=\"banner_url\">URL:</label> <input type=\"text\" name=\"banner_url\" id=\"banner_url\" value=\"http://\" /></p>\n";
   echo " <p><input type=\"submit\" name=\"banner_upload\" value=\"Upload\" /></p>\n";
   echo "</form>";
  
  endif;
 
 elseif( $action == "edit" ) :
 
  // Edit
 
 elseif( $action == "delete" ) :
 
  // Delete
 
 else:
 
 endif;
 
?>