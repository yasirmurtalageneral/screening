<?php 
 session_start();
 
 $connection = mysqli_connect("localhost", "root", "", "demography");

$id=$_GET['id'];

$sql=mysqli_query($connection, "DELETE FROM birth_registration  WHERE birth_id='$id'");

echo "<script>alert('Record Deleted!!!'); window.location='manage_birth_registration.php'</script>";

?>