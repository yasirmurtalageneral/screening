<?php
 require_once('config/db.php');
 $dbb = new operations();
 $dbb->student_access_controll();
 $data = $dbb->check_student_schedule();
 $row = mysqli_fetch_array($data);

 $data2 = $dbb->check_student_schedule2();
 $row2 = mysqli_fetch_array($data2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php  include 'inc/header.php'; ?>
</head>


  <body themebg-pattern="theme1">
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

    <section class="mt-4 col-md-12">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                        <form class="md-float-material form-material" method="post">
                            <div class="text-center text-white">
                                <h3>STUDENT CLEARANCE SCHEDULED DATE/TIME  </h3>
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                   <?php $dbb->display_message(); ?>
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h4 class="text-center"> My Clearance Schedule Date/Time</h4>
                                        </div>
                                    </div>
                                    <?php if (!empty($row) || !empty($row2)) { ?>
                                    <div class="col-md-10 offset-sm-1">
                                        <table class="table table-bordered table-striped ">
                                        <tr>
                                            <th><h6>Name:</h6></th>
                                            <td><?php echo $row["StudentName"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><h6>APP NO:</h6></th>
                                            <td><?php echo $row["AppID"] ?></td>
                                        </tr>
                               
                                        <tr>
                                            <th><h6>Department:</h6></th>
                                            <td><?php echo $row["Depart"] ?></td>
                                        </tr>

                                    </table>
                                    <?php if (!empty($row)) { ?>
                                    <table class="table table-bordered table-striped ">
                                        <h4 class="text-center">DEPARTMENTAL CLEARANCE SCHEDULED DATE/TIME</h4>
                                        <tr>
                                            <th><h6>Scheduled Date:</h6></th>
                                            <td><?php echo $row["ScheduledDate"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><h6>Scheduled Time:</h6></th>
                                            <td><?php echo $row["ScheduledTime"] ?></td>
                                        </tr>

                                    </table>
                                    <?php } ?>
                                    <?php if (!empty($row2)) { ?>
                                    <table class="table table-bordered table-striped ">
                                        <h4 class="text-center">STUDENT AFFAIRS CLEARANCE SCHEDULED DATE/TIME</h4>
                                        <tr>
                                            <th><h6>Scheduled Date:</h6></th>
                                            <td><?php echo $row2["ScheduledDate"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><h6>Scheduled Time:</h6></th>
                                            <td><?php echo $row2["ScheduledTime"] ?></td>
                                        </tr>

                                    </table>
                                    <?php } ?>
                                    </div>
                                <?php }else{ ?>

                                    <div class="alert alert-danger text-center">Oops! You have not been schedule for clearance yet, kindly check back later</div>
                                <?php } ?>
                                  
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Student Dashboard</p>
                       
                                        </div>
                                        <div class="col-md-2">
                                            <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                        </div>
                                    </div>
                                  
                                </div>

                            </div>
                        </form>
                        <!-- end of form -->
                          <div class="col-md-4 offset-sm-4">
                                            <a href="index.php"  class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20"><i class="ti-home"></i> GOTO HOME</a>
                                        </div>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
