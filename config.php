<?php

 // config.php
 
 // database information
 
 mysql_connect("localhost", "root", "root") or die(mysql_error()) ; 
 mysql_select_db("exchange") or die(mysql_error()) ; 
 
 // required files
 
 require_once( 'includes.php' );
 
?>