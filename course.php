<?php 
/**
 * get details for individual course 
 */

// include the header file

$pagetitle = 'Course';  
// use this to pass a value to the <title> tag in the header file.

require_once('header-inc.php'); 

if (isset($_GET['course_id'])) $id = $_GET['course_id'];
else {
    
    echo 'no course_id id';
    exit;

    // todo - redirect back to student list.

}

 
$stmt = $db->prepare("SELECT * FROM course WHERE course_id = :course_id ");
$stmt->bindparam(":course_id", $id);
         
$stmt->execute();

 

$row = $stmt->fetch(PDO::FETCH_ASSOC);


$coursename =   htmlentities($row['title']);

 

// debugging - dont' delete this until final version
// $stmt->debugDumpParams();
 

?>
 

<div class="pricing-header px-3 pb-md-4  text-left">

    <h1 class="display-4">View Course Details</h1>
    <!-- intro text -->
    <p class="lead">View details for an individual course.</p>
</div>
 

<div class="container">
    


<div class="tudent-card-deck mb-3 text-left">
        <!-- card one -->
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Course <?php echo  $coursename;?></h4>
            </div>
            <div class="card-body">

                <!-- <h1 class="card-title uni-card-title">Total students xxx </h1> -->
            <h4>Department: <?php echo  $row['dept_name'];?></h4>
           
          

        <?php

            $stmt = $db->prepare("SELECT c.course_id, c.title, t.semester, t.year from student as s 
            JOIN takes as t on t.ID = s.ID 
            JOIN course as c on t.course_id = c.course_id
            where s.ID = ? ORDER BY t.year");

            $stmt->bindParam(1, $id);
         
            $stmt->execute();
            
            // debugging - dont' delete this until final version
            // $stmt->debugDumpParams();
            $totalrows = $stmt->rowCount();

                  

            ?>  
            <h3>Students enrolled (<?php echo $totalrows;?>)</h3>
            <table class="table table-striped"> 

            <?php

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                echo '<tr><td>';

                echo ' <a href="courses.php?course_id='.$row['course_id'].'">';

                echo $row['title'];

                echo '</td><td>';
                
                echo $row['semester'];
                echo '</td><td>';
                echo $row['year'];
                echo '</td></tr>';

            }
            
            // exit();

        ?>

       </a>
        </table>
            </div>
      
             
            </div>

          
          
            
                <a href="students.php?limit=9999999999"> <button type="button" class="btn btn-lg btn-block btn-outline-primary">See all students</button></a>
               
            
        </div>




    </div> <!-- end card-deck -->

    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>