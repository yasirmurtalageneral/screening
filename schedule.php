<?php
 error_reporting(0);
 require_once('config/db.php');
 $dbb = new operations();
 $dbb->department_access_controll();
 $dbb->schedule_date_time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php  include 'inc/header.php'; ?>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php include 'inc/department_navbar.php'; ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <?php include 'inc/department_sidebar.php'; ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Schedule</h5>
                                            <p class="m-b-0">Schedule Students</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                            <!--     <a href="#!" style="font-size: 30px;"> Registered Student: <b> <?= $hospital_count; ?> </b></a> -->
                                            </li>
                                            <!-- <li class="breadcrumb-item"><a href="#!"> 150,000</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            

                                            <div class="col-sm-10">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="">Schedule Student Clearance Date/Time</h3>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li>
                                                                    <i class="fa fa fa-wrench open-card-option"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-window-maximize full-card"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-minus minimize-card"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-refresh reload-card"></i>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-trash close-card"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <?php $dbb->display_message(); ?>
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="form-group form-info col-md-6 offset-sm-3">
                                                                    <label class="float-label">Schedule Date From</label>
                                                                    <input type="date" data-date="" data-date-format="DD MMMM YYYY" name="schedule_date_from" id="schedule_date_from" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>

                                                                <div class="form-group form-info col-md-6 offset-sm-3">
                                                                    <label class="float-label">Schedule Date To</label>
                                                                    <input type="date" name="schedule_date_to" id="schedule_date_to" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>

                                                                <div class="form-group form-info col-md-6 offset-sm-3">
                                                                    <label class="float-label">No of student(s) per schedule time</label>
                                                                    <input type="number" name="NoOfStudent" id="NoOfStudent" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>

                                                                
                                                                 <div class="form-group form-info col-md-6 offset-sm-3 mt-4">
                                                                     <button type="submit" name="btn_schedule_students" id="btn_schedule_students" class="btn btn-primary form-control" style="border-radius: 50px; font-size: 20px; font-weight: bold;"><i class="fa fa-refresh text-light "></i> SCHEDULE STUDENT(s)</button>
                                                        <input type="hidden" name="DepartmentID" id="DepartmentID" value="<?= $_SESSION['DepartmentID']; ?>" hidden>
                                                        <input type="hidden" name="DepartmentName" id="DepartmentName" value="<?= $_SESSION['Department']; ?>" hidden>

                                                                </div>
<div class="col-sm-8 offset-sm-2 alert alert-success"><b>NOTE: Schedule time are '8:30 - 10:30', '10:30 - 12:30', '12:30 - 3:30'</b></div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                      

                                           
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php include 'inc/mainJS.php'; ?>
   
</body>

</html>
 