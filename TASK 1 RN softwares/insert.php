<?php
include('db.php');
if (isset($_POST['submit'])) 
{

$name = $_POST['stu_name'];
$no = $_POST['stu_mobile'];
$mail = $_POST['stu_email'];  
$add = $_POST['stu_address'];  

    $sql = "INSERT INTO studentlist (stud_name,stud_mobile,stud_email,stud_address) VALUES ('$name', '$no','$mail','$add')";

    $exe=mysqli_query($con,$sql);
    if ($exe === true) {
        echo "<script>
                alert('Record Submited Successfully');
                window.location.href = 'display.php';
              </script>";
    } else {
        echo "<script>
                alert('Error inserting data: " . mysqli_error($con) . "');
                window.history.back();
              </script>";
    }
}
mysqli_close($con);

?>