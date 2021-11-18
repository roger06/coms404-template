<?php 
/**
 * details for a single student
 * you could amend this to be details for a single module or course etc.
 */

// include database connection script
require_once('db-connect-inc.php');

// query using an id passed in the URL

$id = $_GET['id'];

$stmt = $db->prepare("select * from student where id =  :id");

$stmt->bindParam(':id',  $id);  // need to use bindParam with a vars

$stmt->execute(); // 
// echo  $stmt->debugDumpParams();  // debugging

$rowsReturned = $stmt->rowCount();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$pagetitle = 'Student Detail : ' .  $row['name'];  
// use this to pass a value to the <title> tag in the header file.

// include the header file

require_once('header-inc.php'); 

?>
<!-- main heading -->
<!-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left"> -->

<div class="pricing-header px-3 pb-md-4  text-left">

    <h1 class="display-4">View Students</h1>
    <!-- intro text -->
    <p class="lead">This system allows management of courses, modules, students etc.</p>
</div>



<div class="container">
    <div class="card-deck mb-3 text-left">
        <!-- card one -->
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Student details</h4>
            
            </div>

            <div class="card-body">


            <?php

            if ( $rowsReturned == 0 ) {

                echo "<p>No data</p>";

            }

            else { 
                

                ?>


                <h1 class="card-title uni-card-title"><?php echo $row['name'];?></h1>

                <!-- layout details as you see fit -->



            <?php
            }

               
 
            ?>

                <button type="button" class="btn btn-lg btn-block btn-outline-primary">See all students</button>
            </div>
        </div>
    </div> <!-- end card-deck -->
    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>