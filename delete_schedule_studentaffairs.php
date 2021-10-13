<?php 
 session_start();
 
 $connection = mysqli_connect("localhost", "root", "", "screening");



$sql=mysqli_query($connection, "UPDATE student SET IsStudentAffairsCleared='0',IsScheduleStudentAffairs='0' ");

echo "<script>alert('Schedule Cancelled!!!'); window.location='studentAffairs_schedule_students.php'</script>";

?>