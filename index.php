<?php
 require_once('config/db.php');
 $dbb = new operations();
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
    <div id="" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php //include  'inc/main_navbar.php'; ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <?php //  include 'inc/sidebar.php'; ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                       
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                         
                                            <!-- order-visitor start -->


                                            <!-- order-visitor end -->
                                        <div class="col-md-12 text-center" style="margin-top: 20px;"> <h3>DESIGN AND IMPLEMENTATION OF AN ONLINE CLEARANCE DATE/TIME SCHEDULING SYSTEM</h3></div>
                                            
                                            <div class="col-xl-12 col-md-12" style="margin-top: 100px;">
                                                <div class="row">
                                                    <!-- sale card start -->

                                                    <div class="col-md-6">
                                                        <a href="student.php">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"></h6>
                                                                <h4 class="m-t-15 m-b-15">
                                                                <img src="img/student.png" width="50" height="50">

                                                                 STUDENT</h4>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                        </div></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="department_login.php">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"></h6>
                                                                <h4 class="m-t-15 m-b-15">
                                                                <img src="img/user-icon.png" width="50" height="50">
                                                                 RECORD OFFICER</h4>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                        </div></a>
                                                    </div>
                                                    <div class="col-sm-12" style="margin-bottom: 60px;">&nbsp;</div>
                                                    <div class="col-md-6">
                                                        <a href="studentAffairs_login.php">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"></h6>
                                                                <h4 class="m-t-15 m-b-15">
                                                                <img src="img/lecturer1.png" width="50" height="50">
                                                                STUDENT AFFAIRS</h4>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                        </div></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="admin_login.php">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"></h6>
                                                                <h4 class="m-t-15 m-b-15">
                                                                <img src="img/lecturer.png" width="50" height="50">
                                                                ADMINISTRATOR</h4>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                        </div></a>
                                                    </div>

                                                    <div class="col-md-12 text-center" style="margin-top: 180px;"> <h3>Designed By: Team KPTS</h3></div>
                                                    
                                                  
                                                    <!-- sale card end -->
                                                </div>
                                            </div>

                                            <!--  sale analytics end -->

                                           
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
