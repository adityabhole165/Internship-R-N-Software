<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "college1";

// Establish the database connection
$conn = mysqli_connect($server, $username, $password, $dbnm);
if($conn->connect_error) {
    die("Error connecting to server: ". $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['stu_name'];
    $mobile = $_POST['stu_mobile'];
    $email = $_POST['stu_email'];
    $address = $_POST['stu_address'];

    // Update the record
    $sql = "UPDATE studentlist SET stud_name='$name', stud_mobile='$mobile', stud_email='$email', stud_address='$address' WHERE stud_id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Redirect to display.php
    header("Location: display.php");
    exit();
} else {
    echo "Invalid Request.";
}

mysqli_close($conn);
?>
