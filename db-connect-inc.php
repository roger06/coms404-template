<?php
/*
Amend this file to connect to your database

*/

//show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);


//connect to db
$db = new PDO('mysql:host=localhost; dbname=uni-system-large;','roger','roger');  // PC
// TODO - add exception handling

// var_dump($db);   
 
/**
 * uncomment line above to test connection 
 *  if it works you'll see something like
 * 
 * object(PDO)#1 (0) { } 
 * 
 * if it doesn't you'll get an error something like:
 * 
 * Fatal error: Uncaught PDOException: PDO::__construct():
 * 
 */
?>
