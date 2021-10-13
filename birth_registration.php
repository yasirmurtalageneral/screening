<?php
 require_once('config/db.php');
 $dbb = new operations();
 $dbb->hospital_access_controll();
 $dbb->birth_registration();

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
            <?php include 'inc/hospital_navbar.php'; ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <?php include 'inc/hospital_sidebar.php'; ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Registration</h5>
                                            <p class="m-b-0"> Birth Registration</p>
                                        </div>
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
                                                        <h3 class="">Birth Registration</h3>
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
                                                        <form method="post">
                                                            <div class="row">
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Baby First Name</label>
                                                                    <input type="text" name="fname" size="11" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Baby Last Name</label>
                                                                    <input type="text" name="lname" size="11" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Baby Other Names</label>
                                                                    <input type="text" name="oname" size="11" class="form-control" >
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Gender</label>
                                                                    <select class="form-control" name="gender">
                                                                        <option>Select Gender</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                 <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Date of Birth</label>
                                                                    <input type="date" name="dob" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                 <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Time of Birth</label>
                                                                    <input type="time" name="timee" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Place of Birth</label>
                                                                    <input type="text" class="form-control" name="pbirth" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Weight</label>
                                                                    <input type="text" class="form-control" name="weight" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Parent Name</label>
                                                                    <input type="text" class="form-control" name="pname" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">LGA</label>
                                                                    <input type="text" class="form-control" name="lga" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Address</label>
                                                                    <input type="text" class="form-control" name="address" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Delivered by </label>
                                                                    <input type="text" class="form-control" name="doctor" placeholder="Doctor's Name"  required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                 <div class="form-group form-info col-md-6 offset-sm-3 mt-4">
                                                                    <button type="submit" name="btn_register" class="form-control btn btn-primary">SUBMIT</button>
                                                                </div>
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
 