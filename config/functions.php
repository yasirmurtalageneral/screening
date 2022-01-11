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

                $this->set_message('<div class="alert alert-success bg-success text-white text-center"> Students Affairs Officer Added Successfully</div>');
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


    
            
            

        

    



    

    //Schedule Student
    
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

     public function admin_access_controll(){

        if (!isset($_SESSION['user'])) {
            
            header("location: index.php");
        }else{


        }
    }

    
    
}

?>