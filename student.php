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
// $stmt->debugDumpParams();
 

?>
 

<div class="pricing-header px-3 pb-md-4  text-left">

    <h1 class="display-4">View Student Details</h1>
    <!-- intro text -->
    <p class="lead">View details for an individual student.</p>
</div>
 

<div class="container">
    


<div class="tudent-card-deck mb-3 text-left">
        <!-- card one -->
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Student <?php echo  $fullname;?></h4>
            </div>
            <div class="card-body">

                <!-- <h1 class="card-title uni-card-title">Total students xxx </h1> -->
            <h4>Department: <?php echo  $row['dept_name'];?></h4>
            <h4>Total credit: <?php echo  $row['tot_cred'];?></h4>

          

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
            <h3>Modules (<?php echo $totalrows;?>)</h3>
            <table class="table table-striped"> 

            <?php

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                echo '<tr><td>';

                echo $row['title'];

                echo '</td><td>';
                
                echo $row['semester'];
                echo '</td><td>';
                echo $row['year'];
                echo '</td></tr>';

            }
            
            // exit();

        ?>
        </table>
            </div>
      
             
            </div>

          
          
            
                <a href="students.php?limit=9999999999"> <button type="button" class="btn btn-lg btn-block btn-outline-primary">See all students</button></a>
               
            
        </div>




    </div> <!-- end card-deck -->

    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>