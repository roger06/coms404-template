<!-- make a copy (Save as...) of this file to create a new file -->
<!-- such as student_details.php or modules.php etc -->

<?php 
// include database connection script
require_once('db-connect-inc.php');

// include the header file
require_once('header-inc.php'); 

?>
<!-- main heading -->
<!-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left"> -->

<div class="pricing-header px-3 pb-md-4  text-left">

    <h1 class="display-4">University database</h1>
    <!-- intro text -->
    <p class="lead">This system allows management of courses, modules, students etc.</p>
</div>



<div class="container">
    <div class="card-deck mb-3 text-center">
        <!-- card one -->
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Students</h4>
            </div>
            <div class="card-body">

                <h1 class="card-title uni-card-title">Total students xxx </h1>

                <!-- options as a list if required. -->
                <!-- <ul class="list-unstyled mt-3 mb-4">
              <li>10 users included</li>
              <li>2 GB of storage</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul> -->

                <button type="button" class="btn btn-lg btn-block btn-outline-primary"><a href="students.php">See all students</a>
                </button>
            </div>
        </div>

        <!-- card two -->

        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Tutors</h4>
            </div>
            <div class="card-body">

                <h1 class="card-title uni-card-title">Total tutors = xxx</h1>
                <!--            
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 users included</li>
              <li>10 GB of storage</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul> -->
                <button type="button" class="btn btn-lg btn-block btn-primary">All tutors</button>
            </div>
        </div>

        <!-- card three -->

        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Courses</h4>
            </div>



            <div class="card-body">
                <h1 class="card-title uni-card-title">Total courses = </h1>
                <!-- <ul class="list-unstyled mt-3 mb-4">
            <li>30 users included</li>
            <li>15 GB of storage</li>
            <li>Phone and email support</li>
            <li>Help center access</li>
          </ul> -->
                <button type="button" class="btn btn-lg btn-block btn-primary">All courses</button>
            </div>
        </div>

        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Courses</h4>
            </div>



            <div class="card-body">
                <h1 class="card-title uni-card-title">Modules</h1>
                <!-- <ul class="list-unstyled mt-3 mb-4">
            <li>30 users included</li>
            <li>15 GB of storage</li>
            <li>Phone and email support</li>
            <li>Help center access</li>
          </ul> -->
                <button type="button" class="btn btn-lg btn-block btn-primary">more...</button>
            </div>
        </div>



    </div> <!-- end card-deck -->

    <?php 
    // include the footer file
    require_once('footer-inc.php'); ?>