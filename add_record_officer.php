<?php
 require_once('config/db.php');
 $dbb = new operations();
 $dbb->admin_access_controll();
 $dbb->add_record_officer();
/* $main_count = $dbb->fetch_count();
 $hospital_count = mysqli_fetch_array($main_count)["count(*)"];*/
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
            <?php include 'inc/index_navbar.php'; ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <?php include 'inc/sidebar.php'; ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Record Officer</h5>
                                            <p class="m-b-0">Add Record Officer</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <!-- <a href="#!" style="font-size: 30px;"> Registered Record Officers: <b> <?= $hospital_count; ?> </b></a> -->
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
                                                        <h3 class="">Add Record Officer</h3>
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
                                                                    <label class="float-label">Record Officer Name</label>
                                                                    <input type="text" name="name" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Department</label>
                                                                    <select class="form-control" name="department">
                                                                        <option>Select Department</option>
                                                                        <option value="Computer Science">Computer Science</option>
                                                                        <option value="Tsalli biyu">Tsalli biyu</option>
                                                                        <option value="Yindiski">Yindiski</option>
                                                                        <option value="Roseline">Roseline</option>
                                                                        <option value="Dogo nini">Dogo nini</option>
                                                                        <option value="Tudun wada">Tudun wada</option>
                                                                        <option value="Tsohuwar kasuwa">Tsohuwar kasuwa</option>
                                                                        <option value="Unguwan bolewa">Unguwan bolewa</option>
                                                                        <option value="Locust">Locust</option>
                                                                    </select>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                 <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Email Addres</label>
                                                                    <input type="email" name="email" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                                 <div class="form-group form-info col-md-6">
                                                                    <label class="float-label">Password</label>
                                                                    <input type="password" name="password" class="form-control" required>
                                                                    <span class="form-bar"></span> 
                                                                </div>
                                                               
                                                                 <div class="form-group form-info col-md-6 offset-sm-3 mt-4">
                                                                    <button type="submit" name="btn_add_record_officer" class="form-control btn btn-primary">SUBMIT</button>
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
 