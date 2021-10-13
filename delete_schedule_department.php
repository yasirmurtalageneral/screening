<?php 
 session_start();
 
 $connection = mysqli_connect("localhost", "root", "", "screening");



$sql=mysqli_query($connection, "UPDATE student SET IsDepartmentCleared='0',IsSchedule='0' ");

echo "<script>alert('Schedule Cancelled!!!'); window.location='schedule_students.php'</script>";

?>