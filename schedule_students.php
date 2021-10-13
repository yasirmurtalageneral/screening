<?php
 require_once('config/db.php');
 $dbb = new operations();
 $dbb->department_access_controll();
 $data = $dbb->fetch_admitted_students();
 $student_list = [];
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
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Admission List</h5>
                               <!--              <p class="m-b-0">Welcome to FastMoney</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Students</a>
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
                                            

                                            <div class="col-sm-12">
                                                <div class="card">
                                            <div class="card-header">
                                                <h3>Admission List</h3>
                                                <div class="card-header">
                                                    <div class="card-header-left">
                                                        <a href="schedule.php"  class="btn btn-primary " style="border-radius: 50px; font-size: 20px; font-weight: bold;"><i class="fa fa-refresh text-light "></i> SCHEDULE STUDENT(s)</a>
                                                        
                                                    </div>
                                                       
                                                    <div class="card-header-right">
                                                        <a href="delete_schedule.php"  class="btn btn-danger " style="border-radius: 50px; font-size: 20px; font-weight: bold;"><i class="fa fa-refresh text-light "></i> CANCEL SCHEDULES</a>
                                                        
                                                    </div>
                                                        
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="btn-primary">
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Application NO.</th>
                                                                <th>Student Name</th>
                                                                <th>Department</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $count = 1;
                                                            while ($row = mysqli_fetch_array($data)) {
                                                                # code...
                                                               array_push($student_list, $row["EntryID"]);
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?= $count++; ?></th>
                                                                <td><?= $row["AppID"]; ?></td>
                                                                <td><?= $row["StudentName"]; ?></td>
                                                                <td><?= $row["Department"]; ?> </td>
                                                                <td><?= $row["Email"]; ?></td>
                                                                <td><?= $row["Phone"]; ?> </td>
                                                                <td class="<?= $row["IsSchedule"] == "0" ? "text-danger" : "text-success"; ?>"><?= $row["IsSchedule"] == "0" ? "Not Scheduled" : "Scheduled"; ?></td>
                                                                
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
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
 