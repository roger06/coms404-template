<?php 
/**
 * only use this page for a template
 * it includes header and footer files so create 
 * a new 'body' page by duplicating this.
 */
// include database connection script
require_once('db-connect-inc.php');

// include the header file

$pagetitle = 'View students';  
// use this to pass a value to the <title> tag in the header file.

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
                <h4 class="my-0 font-weight-normal">Students</h4>
                <b>Order by:   

                <a href="<?php echo $_SERVER['PHP_SELF'];?>?orderby=name">Name</a> ::   <a href="<?php echo $_SERVER['PHP_SELF'];?>?orderby=dept_name">Department</a>

                </b>
            </div>

            <div class="card-body">


            <?php

                if (isset($_GET['orderby'])) $orderby = $_GET['orderby'];
                else $orderby = 'name';


                $query = "SELECT `student`.`ID`,
                `student`.`name`,
                `student`.`dept_name`,
                `student`.`tot_cred`
                FROM `uni-system-large`.`student` ORDER BY " . $orderby;
                    

                $stmt = $db->query($query);
               
                // $stmt->debugDumpParams();  // query display for debugging.
 
            ?>


                <h1 class="card-title uni-card-title">Total students <?php echo $stmt->rowCount();?></h1>

                <!-- options as a list if required. -->

                <table class="table striped">

                <?php

                while  ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    // options
                    /*
                    PDO::FETCH_NUM
                    PDO::FETCH_ASSOC
                    */
             
                    
                    echo '<tr><td>';

                    echo '<a href="student.php?id='.$row['ID'].'">'.htmlentities($row['name']).' </a>';

                   

                    echo '</td><td>';
                    echo htmlentities($row['dept_name']); 

                    echo '</td></tr>';


                    
                } // end while


?>
            </table>


                <button type="button" class="btn btn-lg btn-block btn-outline-primary">See all students</button>
            </div>
        </div>




    </div> <!-- end card-deck -->

    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>