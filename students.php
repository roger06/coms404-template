<?php 
/**
 * only use this page for a template
 * it includes header and footer files so create 
 * a new 'body' page by duplicating this.
 */

// include the header file

$pagetitle = 'View students';  
// use this to pass a value to the <title> tag in the header file.

require_once('header-inc.php'); 

if (isset($_GET['orderby'])) $orderby = $_GET['orderby'];
else $orderby = 'name';

if (isset($_GET['limit'])) $limit = $_GET['limit'];
else $limit = 10;

if (isset($_GET['order'])) $order = $_GET['order'];
else $order = 'ASC';



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
                <h4 class="my-0 font-weight-normal">Students</h4>
                <b>Order by:

                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?orderby=name">Name</a> :: 
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?orderby=dept_name">Department</a>

                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?orderby=<?php echo $orderby;?>&order=ASC">  <i class="fas fa-sort-amount-down-alt" ></i></a>     
                    
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?orderby=<?php echo $orderby;?>&order=DESC">  <i class="fas fa-sort-amount-up-alt"></i></a>     
 


                </b>
            </div>

            <div class="card-body">


                <?php

         
            

            // change to prep statement

            $stmt = $db->prepare("SELECT * FROM student ORDER BY $orderby $order limit "  . $limit);
         
            // $stmt->bindParam(1, $orderby);
         
  
            $stmt->execute();
            
            // debugging - dont' delete this until final version
            $stmt->debugDumpParams();
            $totalrows = $stmt->rowCount();


            // get all the rows for info 
            // SELECT count(*) is another way...
            $count = $db->prepare("SELECT name FROM student");
            $count->execute();
            $allrows = $count->rowCount();
            // $count->debugDumpParams();
                
            ?>


                <h1 class="card-title uni-card-title">Total students <?php echo  $totalrows;?></h1>

                <table class="table striped">

                    <?php

                while  ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                              
                    
                    echo '<tr><td>';

                    echo '<a href="student.php?id='.$row['ID'].'">'.htmlentities($row['name']).' </a>';

                   

                    echo '</td><td>';


                    echo '<a href="student.php?id='.$row['ID'].'">'.htmlentities($row['last_name']).' </a>';


                    echo '</td><td>';

                    echo htmlentities($row['dept_name']); 

                    echo '</td></tr>';


                    
                } // end while


?>
                </table>

                <a href="students.php?limit=9999999999"> <button type="button" class="btn btn-lg btn-block btn-outline-primary">See all students (<?php echo  $allrows;?>)</button></a>
               
            </div>
        </div>




    </div> <!-- end card-deck -->

    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>