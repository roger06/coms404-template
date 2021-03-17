<?php 
/**
 * get details for individual student 
 */

// include the header file

$pagetitle = 'View students';  
// use this to pass a value to the <title> tag in the header file.

require_once('header-inc.php'); 

if (isset($_GET['id'])) $id = $_GET['id'];
else {
    
    echo 'no student id';
    exit;

    // todo - redirect back to student list.

}

 
$stmt = $db->prepare("SELECT * FROM student WHERE ID = :id ");
$stmt->bindparam(":id", $id);
         
$stmt->execute();

 

$row = $stmt->fetch(PDO::FETCH_ASSOC);


$fullname =   htmlentities($row['name']) . ' ' . htmlentities($row['last_name']) ;

 

// debugging - dont' delete this until final version
$stmt->debugDumpParams();
 

?>
<!-- main heading -->
<!-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left"> -->

<div class="pricing-header px-3 pb-md-4  text-left">

    <h1 class="display-4">View Student Details</h1>
    <!-- intro text -->
    <p class="lead">View details for an individual student.</p>
</div>



<div class="container">
    


<div class="card-deck mb-3 text-center">
        <!-- card one -->
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Student <?php
                echo  $fullname  ;

            ?></h4>
            </div>
            <div class="card-body">

                <h1 class="card-title uni-card-title">Total students xxx </h1>
  
            </div>
      
             
            </div>

         


          
                <!-- <h1 class="card-title uni-card-title">Total students <?php echo  $totalrows;?></h1> -->
          
            
                <a href="students.php?limit=9999999999"> <button type="button" class="btn btn-lg btn-block btn-outline-primary">See all students</button></a>
               
            
        </div>




    </div> <!-- end card-deck -->

    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>