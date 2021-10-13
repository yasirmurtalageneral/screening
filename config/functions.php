<?php
session_start();
require_once('config/db.php');
$db = new dbconfig();

class operations extends dbconfig{

    //Add Record
    public function add_record_officer(){
        
        global $db;

        if (isset($_POST['btn_add_record_officer'])) {

            $name = $db->check($_POST['name']);
            $department = $db->check($_POST['department']);
            $email = $db->check($_POST['email']);
            $password = $db->check($_POST['password']);
            # code...

            
            if ($this->insert_record($name, $department, $email, $password)) {

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Record Officer Added Successfully</div>');
                 ?>
                    <script>
                        setTimeout(() => window.location.href = "", 3000);
                    </script>

                <?php
                # code...
            }else{
                $this->set_message('<div class="alert alert-danger"> Failed! </div>');
            }
        }

    }

     //Inserting Record into the Database
    function insert_record($name, $department, $email, $password){

        global $db;

        $query = "INSERT INTO record_officer (RecordOfficerName, Department, Email, Password) VALUES('$name','$department','$email','$password')";

        $result = mysqli_query($db->connection, $query);

        if ($result) {

            return true;
            # code...
        }else{
            return false;
        }
    }


    //Add Student Affairs 
    public function add_student_affairs(){
        
        global $db;

        if (isset($_POST['btn_add_student_affairs'])) {

            $name = $db->check($_POST['name']);
            $department = $db->check($_POST['college']);
            $email = $db->check($_POST['email']);
            $password = $db->check($_POST['password']);
            # code...

            
            if ($this->insert_student_affairs($name, $department, $email, $password)) {

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Record Officer Added Successfully</div>');
                 ?>
                    <script>
                        setTimeout(() => window.location.href = "", 3000);
                    </script>

                <?php
                # code...
            }else{
                $this->set_message('<div class="alert alert-danger"> Failed! </div>');
            }
        }

    }

     //Inserting Record into the Database
    function insert_student_affairs($name, $department, $email, $password){

        global $db;

        $query = "INSERT INTO student_affairs (OfficerName, College, Email, Password) VALUES('$name','$department','$email','$password')";

        $result = mysqli_query($db->connection, $query);

        if ($result) {

            return true;
            # code...
        }else{
            return false;
        }
    }


    //Add Multiple Student
    public function upload_student(){
        
        global $db;

        if (isset($_POST['btn_upload_students'])) {

            $filename = $_FILES["file"]["tmp_name"];
                    $filePath = 'uploads/'.$filename;
                    $tmp_name = $_FILES['file']['tmp_name'];
                    move_uploaded_file($tmp_name, $filePath);

                    if ($_FILES["file"]["size"] > 0) {
                        
                        $file = fopen($filename, "r");
                        while (($column=fgetcsv($file, 1000, ',')) !==FALSE) {
            
                          //echo '<pre>'; print_r($column);


                            if ($this->upload_record($column[0], $column[1], $column[2], $column[3], $column[4])) {

                            $this->set_message('<div class="alert alert-success text-center"> Students Uploaded Successfully</div>');
                             ?>
                                <script>
                                    setTimeout(() => window.location.href = "", 2000);
                                </script>

                                <?php
                                # code...
                            }else{
                                $this->set_message('<div class="alert alert-danger"> Failed to Add record! </div>');
                            }
            
                          // $query2 = mysqli_query($connection, "INSERT INTO staff (staff_name, email, phone, position) VALUES('".$column[0]."', '".$column[1]."', '".$column[2]."', '".$column[3]."')");
                          
                        }
                    }

        }

    }



     //Inserting Record into the Database
    function upload_record($name, $AppID, $email, $phone, $department){

        global $db;

        $query = "INSERT INTO student (StudentName, AppID, Email, Phone, Department) VALUES('$name','$AppID', '$email','$phone','$department')";
        $result = mysqli_query($db->connection, $query);

        if ($result) {

            return true;
            # code...
        }else{
            return false;
        }
    }




    //Schedule Student
    public function schedule_date_time(){
        
        global $db;

        if (isset($_POST['btn_schedule_students'])) {

            $begin =  new DateTime($_POST['schedule_date_from']);
            $end =  new DateTime($_POST['schedule_date_to']);
            $noOfStudents =  $_POST['NoOfStudent'];
            $department =  $_POST['DepartmentID'];
            $departmentName =  $_POST['DepartmentName'];
            $student_list = [];
            $student_phone_no = [];
            $student_name = [];

            $end = $end->modify( '+1 day' );
            $dateArray = [];

            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($begin, $interval ,$end);

            foreach($daterange as $date){
                //echo $date->format("d-m-Y") . "<br>";
                array_push($dateArray, $date->format("d-m-Y"));
            }

            $query = "SELECT EntryID, Phone, StudentName FROM student WHERE Department LIKE '$departmentName' AND IsSchedule LIKE '0'";
            $result = mysqli_query($db->connection, $query);
            // $dataResult = mysqli_fetch_array($result);
            while ($row = mysqli_fetch_array($result)) {
                # code...
               array_push($student_list, $row["EntryID"]);
               array_push($student_phone_no, $row["Phone"]);
               array_push($student_name, $row["StudentName"]);
            }

            if (empty($student_list)) {
                        // code...
                        $this->set_message('<div class="alert alert-danger text-center"> No record found!</div>');
                        return;
                    }


            $students = $student_list;
            $date =  $dateArray;
            $time =  ['8:30 - 10:30', '10:30 - 12:30', '12:30 - 3:30'];

            $allocation = [];
            $studentArray = [];
            $currentStudent = [];
            $duplicate = [];
            shuffle($students);
            shuffle($date);
            shuffle($time);

            for ($i=0; $i < sizeof($date); $i++) { 
                // code...
                
                $currentDate = $date[$i];
                for ($j=0; $j < sizeof($time); $j++) { 
                    // code...
                    $arrayDiff = array_diff($students, $duplicate);
                    shuffle($arrayDiff);
                    if (empty($arrayDiff)) {
                        //$this->set_message('<div class="alert alert-danger text-center"> No record found!</div>');
                        break;
                    }
                    $currentTime = $time[$j];
                    for ($k=0; $k < $noOfStudents; $k++) { 
                        // code...
                        if (!empty($arrayDiff[$k] )) {
                            // code...
                            $currentStudent[] = isset($arrayDiff[$k]) ? $arrayDiff[$k] : null;
                            array_push($studentArray, $currentStudent[$k]);
                            array_push($duplicate, isset($arrayDiff[$k]) ? $arrayDiff[$k] : null);
                            // $query = "INSERT INTO schedule (DepartmentID, StudentID, ScheduledDate, ScheduledTime) VALUES(1,'{$arrayDiff[$k]}', '$currentDate','$currentTime')";
                            // $result = mysqli_query($connection, $query);
                            $this->schedule_students($department, $arrayDiff[$k], $currentDate, $currentTime);
                            $this->sendMessage($student_phone_no[$k], !empty($student_name[$k]) ? explode(' ', $student_name[$k])[0] : null, $currentDate, $currentTime);
                            unset($student_phone_no[$k]);
                            unset($student_name[$k]);
                        }
                    }
                    $currentAllocation = $currentDate.'*'.$currentTime.'*'.json_encode($studentArray);
                    array_push($allocation, $currentAllocation);
                    $studentArray = [];
                    $currentStudent = [];
                }
            }

             ?>

                <?php         

        }

    }


    //SEND MESSAGE TEMPLATE FOR DEPARTMENTAL CLEARANCE SCHEDULLE
    public function sendMessage($phone, $name, $dateSchedulled, $timeSchedulled) {

                    if (!empty($phone)) {
                        $phoneNumber = '+234'.substr($phone,1);
                        $MessageBody = "Hello ".$name.", You are scheduled for departmental clearance on ".$dateSchedulled." from ".$timeSchedulled." ";
                        $username = 'TEAMKPT';
                    }else{
                        $phoneNumber = '+2348102564648';
                        $MessageBody = "Hello ".$name.", You are scheduled for departmental clearance on ".$dateSchedulled." from ".$timeSchedulled." ";
                        $username = 'TEAMKPT';
                    }
                    

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://fsi.ng/api/v1/africastalking/version1/messaging',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>'{
                        "username" : "'.$username.'",
                        "to" : "'.$phoneNumber.'",
                        "message": "'.$MessageBody.'"
                    }',
                      CURLOPT_HTTPHEADER => array(
                        'sandbox-key: W9H1bC4eTBVeuxKSVx8FshzaYxzjlYnV1634023324',
                        'Content-Type: application/json'
                      ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                

       $body = "Hello ".$name.", You are scheduled for departmental clearance on ".$dateSchedulled." from ".$timeSchedulled." ";
             // $body = preg_replace('/[^a-zA-Z0-9\']/', '_',$body);

              $url='https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=PTAVoI6yA7luCcjQU5aXIlR33pA0tqQ8yTzcSF5PJosfTYMTvihC2jjPGHYI&from=KADPOLY&to='.$phone.'&body='.$body.'';

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url); 
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
              curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
              $result = curl_exec ($ch); 
              curl_close ($ch);
    }



     //Inserting Record into the Database
    function schedule_students($department, $students, $scheduledDate, $scheduledTime){

        global $db;

        $query = "INSERT INTO schedule (DepartmentID, StudentID, ScheduledDate, ScheduledTime) VALUES($department,'$students', '$scheduledDate','$scheduledTime')";
        $result = mysqli_query($db->connection, $query);

        $this->student_scheduled($students);

        // if ($result) {

        //     return true;
        //     # code...
        // }else{
        //     return false;
        // }
    }


    public function student_scheduled($StudentID){

        global $db;
        $query22 = "UPDATE student SET IsSchedule='1' WHERE EntryID LIKE '$StudentID' ";
        $result22 = mysqli_query($db->connection, $query22);
        $this->set_message('<div class="alert alert-success text-center"> Scheduled Successfully</div>');
    }


    public function get_student_schedule(){

        global $db;
        $query22 = "SELECT *, student.Department as 'Depart' FROM schedule
        LEFT JOIN student ON student.EntryID = schedule.StudentID
        LEFT JOIN record_officer ON record_officer.EntryID = schedule.DepartmentID
        WHERE DepartmentID LIKE '{$_SESSION['DepartmentID']}' ";
        $result22 = mysqli_query($db->connection, $query22);
        return $result22;
    }


    //Schedule Student
    public function studentAffairs_schedule_date_time(){
        
        global $db;

        if (isset($_POST['btn_schedule_students'])) {

            $begin =  new DateTime($_POST['schedule_date_from']);
            $end =  new DateTime($_POST['schedule_date_to']);
            $noOfStudents =  $_POST['NoOfStudent'];
            $college =  $_POST['ColegeID'];
            $collegeName =  $_POST['ColegeName'];
            $student_list = [];
            $student_phone_no = [];
            $student_name = [];


            $end = $end->modify( '+1 day' );
            $dateArray = [];

            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($begin, $interval ,$end);

            foreach($daterange as $date){
                
                //echo $date->format("d-m-Y") . "<br>";
                array_push($dateArray, $date->format("d-m-Y"));
            }

            $query = "SELECT * FROM student WHERE IsScheduleStudentAffairs LIKE '0'";
            $result = mysqli_query($db->connection, $query);
            // $dataResult = mysqli_fetch_array($result);
            while ($row = mysqli_fetch_array($result)) {
                # code...
               array_push($student_list, $row["EntryID"]);
               array_push($student_phone_no, $row["Phone"]);
               array_push($student_name, $row["StudentName"]);
            }


            $students = $student_list;
            $date =  $dateArray;
            $time =  ['8:30 - 10:30', '10:30 - 12:30', '12:30 - 3:30'];

            $allocation = [];
            $studentArray = [];
            $currentStudent = [];
            $duplicate = [];
            shuffle($students);
            shuffle($date);
            shuffle($time);

            for ($i=0; $i < sizeof($date); $i++) { 
                // code...
                 if (empty($students)) {
                        // code...
                        $this->set_message('<div class="alert alert-danger text-center"> No record found!</div>');
                        break;
                    }
                $currentDate = $date[$i];
                for ($j=0; $j < sizeof($time); $j++) { 
                    // code...
                    $arrayDiff = array_diff($students, $duplicate);
                    shuffle($arrayDiff);
                    if (empty($arrayDiff)) {
                        // code...
                       // $this->set_message('<div class="alert alert-danger text-center"> No record found!</div>');
                        break;
                    }
                    $currentTime = $time[$j];
                    for ($k=0; $k < $noOfStudents; $k++) { 
                        // code...
                        if (!empty($arrayDiff[$k] )) {
                            // code...
                            $currentStudent[] = isset($arrayDiff[$k]) ? $arrayDiff[$k] : null;
                            array_push($studentArray, $currentStudent[$k]);
                            array_push($duplicate, isset($arrayDiff[$k]) ? $arrayDiff[$k] : null);
                            // $query = "INSERT INTO schedule (DepartmentID, StudentID, ScheduledDate, ScheduledTime) VALUES(1,'{$arrayDiff[$k]}', '$currentDate','$currentTime')";
                            // $result = mysqli_query($connection, $query);
                            $this->studentAffairs_schedule_students($college, $arrayDiff[$k], $currentDate, $currentTime);
                            $this->sendMessageStudentAffairs($student_phone_no[$k], !empty($student_name[$k]) ? explode(' ', $student_name[$k])[0] : null, $currentDate, $currentTime);
                            unset($student_phone_no[$k]);
                            unset($student_name[$k]);
                        }
                    }
                    $currentAllocation = $currentDate.'*'.$currentTime.'*'.json_encode($studentArray);
                    array_push($allocation, $currentAllocation);
                    $studentArray = [];
                    $currentStudent = [];
                }
            }

             ?>

                <?php
                       

        }

    }



     //SEND MESSAGE TEMPLATE FOR STUDENT AFFAIRS CLEARANCE SCHEDULLE
    public function sendMessageStudentAffairs($phone, $name, $dateSchedulled, $timeSchedulled) {

         if (!empty($phone)) {
                        $phoneNumber = '+234'.substr($phone,1);
                        $MessageBody = "Hello ".$name.", You are scheduled for student affairs clearance on ".$dateSchedulled." from ".$timeSchedulled." ";
                        $username = 'TEAMKPT';
                    }else{
                        $phoneNumber = '+2348102564648';
                        $MessageBody = "Hello ".$name.", You are scheduled for student affairs clearance on ".$dateSchedulled." from ".$timeSchedulled." ";
                        $username = 'TEAMKPT';
                    }
                    

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://fsi.ng/api/v1/africastalking/version1/messaging',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>'{
                        "username" : "'.$username.'",
                        "to" : "'.$phoneNumber.'",
                        "message": "'.$MessageBody.'"
                    }',
                      CURLOPT_HTTPHEADER => array(
                        'sandbox-key: W9H1bC4eTBVeuxKSVx8FshzaYxzjlYnV1634023324',
                        'Content-Type: application/json'
                      ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);

       $body = "Hello ".$name.", You are scheduled for student affairs clearance on ".$dateSchedulled." from ".$timeSchedulled." ";
             // $body = preg_replace('/[^a-zA-Z0-9\']/', '_',$body);

              $url='https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=PTAVoI6yA7luCcjQU5aXIlR33pA0tqQ8yTzcSF5PJosfTYMTvihC2jjPGHYI&from=KADPOLY&to='.$phone.'&body='.$body.'';

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url); 
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
              curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
              $result = curl_exec ($ch); 
              curl_close ($ch);
    }




     //Inserting Record into the Database
    function studentAffairs_schedule_students($college, $students, $scheduledDate, $scheduledTime){

        global $db;

        $query = "INSERT INTO schedule (CollegeID, StudentID, ScheduledDate, ScheduledTime) VALUES($college,'$students', '$scheduledDate','$scheduledTime')";
        $result = mysqli_query($db->connection, $query);

        $this->studentAffairs_student_scheduled($students);

        // if ($result) {

        //     return true;
        //     # code...
        // }else{
        //     return false;
        // }
    }


    public function studentAffairs_student_scheduled($StudentID){

        global $db;
        $query22 = "UPDATE student SET IsScheduleStudentAffairs='1' WHERE EntryID LIKE '$StudentID' ";
        $result22 = mysqli_query($db->connection, $query22);
        $this->set_message('<div class="alert alert-success text-center"> Scheduled Successfully</div>');
    }


    public function get_studentAffairs_student_schedule(){

        global $db;
        $query22 = "SELECT *, student.Department as 'Depart' FROM schedule
        LEFT JOIN student ON student.EntryID = schedule.StudentID
        LEFT JOIN student_affairs ON student_affairs.EntryID = schedule.CollegeID
        WHERE CollegeID LIKE '{$_SESSION['StudentAffairsID']}' ";
        $result22 = mysqli_query($db->connection, $query22);
        return $result22;
    }



    public function check_student_schedule(){

        global $db;
        $query22 = "SELECT *, student.Department as 'Depart' FROM schedule
        LEFT JOIN student ON student.EntryID = schedule.StudentID
        LEFT JOIN student_affairs ON student_affairs.EntryID = schedule.CollegeID
        LEFT JOIN record_officer ON record_officer.EntryID = schedule.DepartmentID
        WHERE  schedule.StudentID LIKE '{$_SESSION['StudentID']}' AND student.IsSchedule LIKE '1' AND schedule.DepartmentID NOT LIKE '0' ";
        $result22 = mysqli_query($db->connection, $query22);
        return $result22;
    }


    public function check_student_schedule2(){

        global $db;
        $query22 = "SELECT *, student.Department as 'Depart' FROM schedule
        LEFT JOIN student ON student.EntryID = schedule.StudentID
        LEFT JOIN student_affairs ON student_affairs.EntryID = schedule.CollegeID
        LEFT JOIN record_officer ON record_officer.EntryID = schedule.DepartmentID
        WHERE  schedule.StudentID LIKE '{$_SESSION['StudentID']}' AND student.IsScheduleStudentAffairs LIKE '1' AND schedule.CollegeID NOT LIKE '0' ";
        $result22 = mysqli_query($db->connection, $query22);
        return $result22;
    }












    public function fetch_record_officers(){

        global $db;
        $query = "SELECT * FROM record_officer ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


    public function fetch_student_affairs(){

        global $db;
        $query = "SELECT * FROM student_affairs ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


    public function fetch_admitted_students(){

        global $db;
        $query = "SELECT * FROM student";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }

     public function fetch_schedulled_students(){

        global $db;
        $query = "SELECT * FROM student WHERE IsSchedule LIKE '1' ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


    public function fetch_StudentAffairas_schedulled_students(){

        global $db;
        $query = "SELECT * FROM student WHERE IsScheduleStudentAffairs LIKE '1' ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


      public function fetch_all_students(){

        global $db;
        $query = "SELECT * FROM student WHERE isDepartmentCleared LIKE '1' ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }





















    public function get_birth_registration(){

        global $db;
        $query = "SELECT * FROM birth_registration LEFT JOIN hospital ON hospital.hospital_id = birth_registration.hospital_id";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


     public function get_birth_registration_by_id($id){

        global $db;
    $query = "SELECT * FROM birth_registration LEFT JOIN hospital ON hospital.hospital_id = birth_registration.hospital_id WHERE birth_id LIKE '$id'";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


     //Fetching Request from the Database
    public function fetch_count(){

        global $db;
        $query = "SELECT count(*) FROM student";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }



     //Fetching Request from the Database
    public function fetch_schedule_count(){

        global $db;
        $query = "SELECT count(*) FROM schedule";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


//Fetching Request from the Database
    public function fetch_birth_count(){

        global $db;
        $query = "SELECT count(*) FROM birth_registration";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }


    //Getting a particular Record
    public function get_transaction_count(){

        global $db;
        $query = "SELECT * FROM transaction ";
        $result = mysqli_query($db->connection, $query)->num_rows;
        return $result;
    }

  


    public function set_message($msg){

        if (!empty($msg)) {

            $_SESSION['Message'] = $msg;
            # code...
        }else{
            $msg ="";
        }
    }

    public function display_message(){

        if (isset($_SESSION['Message'])) {

            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
            # code...
        }
    }




    //Delete user record
    public function delete($table_name, $where_clause){

        global $db;

        if (isset($_POST['btn_delete'])) {

            $id = $db->check($_POST['btn_delete']);

            if ($this->delete_record($id, $table_name, $where_clause)) {

                $this->set_message('<div class="alert alert-danger"> Record Deleted Successfully</div>');
                 ?>
                    <script>
                        setTimeout(() => window.location.href = "", 2000);
                    </script>

                <?php
               
                # code...
            }else{

                $this->set_message('<div class="alert alert-danger"> Failed to delete record! </div>');
            }
            # code...
        }

    }




    public function delete_record($id, $table_name, $where_clause){

        global $db;
        $query = "DELETE FROM $table_name WHERE $where_clause='$id'";
        $result = mysqli_query($db->connection, $query);

        if ($result) {

            return true;
            # code...
        }else{

            return false;
        }

    }





      //Admin Login
    public function admin_login(){
        

        if (isset($_POST['btn_admin_login'])) {


            $_SESSION['username'] = $this->check($_POST['username']);
            $password = $this->check($_POST['password']);
            

            if ($this->app_login($_SESSION['username'], $password)) {

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Login Successfully!</div>');
                    # code...
                    ?>
                 <script>
                        setTimeout(() => window.location.href = "dashboard.php", 3000);
                    </script>


                <?php

            }else{
                $this->set_message('<div class="alert alert-danger bg-danger text-white text-center" id="msg"> Invalid Login Credentials! </div>');
                ?>
                 <script>
                        setTimeout(() => document.getElementById('msg').style.display = "none", 3000);
                    </script>
                <?php
            }
        }

    }


        //Admin Login 
     protected function app_login($a, $b){

        $query = "SELECT * FROM login WHERE USERNAME LIKE '$a' AND PASSWORD LIKE '$b' And PW_STATUS LIKE 'Active'";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {

               $_SESSION['user'] = $data["user_id"];
             
            

            return true;
            # code...
        }else{
            return false;
        }

    }




   //Department Login
    public function department_login(){
        

        if (isset($_POST['btn_department_login'])) {


            $_SESSION['email'] = $this->check($_POST['email']);
            $password = $this->check($_POST['password']);
            

            if ($this->login($_SESSION['email'], $password)) {

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Login Successfully!</div>');
                    # code...
                    ?>
                 <script>
                        setTimeout(() => window.location.href = "department_dashboard.php", 3000);
                    </script>


                <?php

            }else{
                $this->set_message('<div class="alert alert-danger bg-danger text-white text-center" id="msg"> Invalid Login Credentials! </div>');
                ?>
                 <script>
                        setTimeout(() => document.getElementById('msg').style.display = "none", 3000);
                    </script>
                <?php
            }
        }

    }


        //Department Login 
     protected function login($a, $b){

        $query = "SELECT * FROM record_officer WHERE Email LIKE '$a' AND Password = '$b'";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {

               $_SESSION['Department'] = $data["Department"];
               $_SESSION['HOD'] = $data["RecordOfficerName"];
               $_SESSION['DepartmentID'] = $data["EntryID"];

            return true;
            # code...
        }else{
            return false;
        }

    }



    //StudentAffairs Login
    public function studentAffairs_login(){
        

        if (isset($_POST['btn_studentAffairs_login'])) {


            $_SESSION['email'] = $this->check($_POST['email']);
            $password = $this->check($_POST['password']);
            

            if ($this->StudentAffairslogin($_SESSION['email'], $password)) {

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Login Successfully!</div>');
                    # code...
                    ?>
                 <script>
                        setTimeout(() => window.location.href = "studentAffairs_dashboard.php", 3000);
                    </script>


                <?php

            }else{
                $this->set_message('<div class="alert alert-danger bg-danger text-white text-center" id="msg"> Invalid Login Credentials! </div>');
                ?>
                 <script>
                        setTimeout(() => document.getElementById('msg').style.display = "none", 3000);
                    </script>
                <?php
            }
        }

    }


        //Department Login 
     protected function StudentAffairslogin($a, $b){

        $query = "SELECT * FROM student_affairs WHERE Email LIKE '$a' AND Password = '$b'";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {

               $_SESSION['StudentAffairs'] = $data["College"];
               $_SESSION['StudentAffairsName'] = $data["OfficerName"];
               $_SESSION['StudentAffairsID'] = $data["EntryID"];

            return true;
            # code...
        }else{
            return false;
        }

    }





     //Student Check 
    public function student_check(){
        

        if (isset($_POST['btn_check'])) {


            $_SESSION['check'] = $this->check($_POST['check']);
            

            if ($this->Studentlogin($_SESSION['check'])) {

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Please wait...</div>');
                    # code...
                    ?>
                 <script>
                        setTimeout(() => window.location.href = "student_dashboard.php", 200);
                    </script>


                <?php

            }else{
                $this->set_message('<div class="alert alert-danger bg-danger text-white text-center" id="msg"> Invalid  Application No.! </div>');
                ?>
                 <script>
                        setTimeout(() => document.getElementById('msg').style.display = "none", 3000);
                    </script>
                <?php
            }
        }

    }


        //Department Login 
     protected function Studentlogin($a){

        $query = "SELECT * FROM student WHERE Email LIKE '$a' OR AppID LIKE '$a'";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {

               $_SESSION['DepartmentName'] = $data["Department"];
               $_SESSION['StudentEmail'] = $data["Email"];
               $_SESSION['StudentID'] = $data["EntryID"];

            return true;
            # code...
        }else{
            return false;
        }

    }





     public function admin_access_controll(){

        if (!isset($_SESSION['user'])) {
            
            header("location: index.php");
        }else{


        }
    }

     public function hospital_access_controll(){

        if (!isset($_SESSION['hospital'])) {
            
            header("location: index.php");
        }else{


        }
    }

    public function department_access_controll(){

        if (!isset($_SESSION['Department'])) {
            
            header("location: index.php");
        }else{


        }
    }

    public function studentAffair_access_controll(){

        if (!isset($_SESSION['StudentAffairsID'])) {
            
            header("location: index.php");
        }else{


        }
    }


    public function student_access_controll(){

        if (!isset($_SESSION['StudentID'])) {
            
            header("location: index.php");
        }else{


        }
    }

    
}

?>