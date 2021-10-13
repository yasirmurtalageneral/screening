<?php
 require_once('config/db.php');
 $dbb = new operations();
 $dbb->hospital_access_controll();
 $id = $_GET['id'];
 $cert= $dbb->get_birth_registration_by_id($id);
 $result = mysqli_fetch_array($cert);
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
            <?php //include 'inc/index_navbar.php'; ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <?php //include 'inc/sidebar.php'; ?>
                    
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            

                                            <div class="col-sm-6 offset-sm-3">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="">Birth Certificate</h3>
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
                                                       <table class="table table">
                                                           <tr>
                                                               <th>Child Name:</th>
                                                               <td><?= $result["fname"]." ".$result["lname"]." ".$result["oname"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Gender:</th>
                                                               <td><?= $result["gender"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Date of Birth:</th>
                                                               <td><?= $result["dbirth"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Time Delivered:</th>
                                                               <td><?= $result["timee"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Weight:</th>
                                                               <td><?= $result["weight"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Place of Birth:</th>
                                                               <td><?= $result["pbirth"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Parent Name:</th>
                                                               <td><?= $result["pname"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>address:</th>
                                                               <td><?= $result["address"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Delivered by:</th>
                                                               <td><?= $result["dr"];  ?></td>
                                                           </tr>
                                                           <tr>
                                                               <th>Hospital:</th>
                                                               <td><?= $result["hname"];  ?></td>
                                                           </tr>
                                                       </table>
                                                       <div class="text-center mt-3"><i><============= With us, you feel secure =============></i></div>
                                                       <div class="form-group form-info col-md-6 offset-sm-3 mt-4">
                                                                    <button type="button" onclick="window.print()" class="form-control btn btn-primary"> PRINT CERTIFICATE</button>
                                                                </div>

                                                                <div class="form-group form-info col-md-6 offset-sm-3 mt-4">
                                                                    <button type="button" onclick="window.location='hospital_dashboard.php'" class="form-control btn btn-outline"> GO TO HOME <i class="fa fa-home"></i></button>
                                                                </div>
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
 