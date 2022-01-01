<?php

// include database connection script
require_once('db-connect-inc.php');

if (!isset($pagetitle)) $pagetitle = "Bootstrap template for COMS404";
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico"> -->

    <title><?php if (!isset($pagetitle)) echo $pagetitle;?> </title>

    

     <!-- Bootstrap CSS -->
   <!-- this is really useful - https://hackerthemes.com/bootstrap-cheatsheet/ -->

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <!-- Custom styles for this template -->
    <link href="custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">COMS404 Database Systems</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <!-- main nav links, change these to what you need -->
        <a class="p-2 text-dark" href="students.php">Students</a>
        <a class="p-2 text-dark" href="#">Link 2</a>
        <a class="p-2 text-dark" href="#">Link 3</a>
        <a class="p-2 text-dark" href="#">Link </a>
      </nav>
      <a class="btn btn-outline-primary" href="index.php">Home</a>
    </div>
