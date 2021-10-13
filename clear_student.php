<?php 
 session_start();
 
 $connection = mysqli_connect("localhost", "root", "", "screening");

$id=$_GET['token'];

$sql=mysqli_query($connection, "UPDATE student SET IsDepartmentCleared='1'  WHERE EntryID='$id'");

echo "<script>alert('Student Cleared!!!'); window.location='manage_clearance.php'</script>";

?>