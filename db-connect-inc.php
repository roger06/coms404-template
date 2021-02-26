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
 


//host, user, pw    

// var_dump($db);

?>
