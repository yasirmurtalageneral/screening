<?php 
 session_start();
 
 $connection = mysqli_connect("localhost", "root", "", "demography");

$id=$_GET['id'];

$sql=mysqli_query($connection, "DELETE FROM hospital  WHERE hospital_id='$id'");

echo "<script>alert('Record Deleted!!!'); window.location='manage_hospitals.php'</script>";

?>