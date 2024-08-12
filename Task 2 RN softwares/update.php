<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $dbnm = "college1";

// // Establish the database connection
// $con = mysqli_connect($server, $username, $password, $dbnm);
// if($con->connect_error) {
//     die("Error connecting to server: ". $con->connect_error);
// }

// $message = ""; // Variable to hold the alert message

// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $name = $_POST['stu_name'];
//     $year = $_POST['stu_year'];
//     $mobile = $_POST['stu_mobile'];
//     $email = $_POST['stu_email'];
//     $address = $_POST['stu_address'];

//     // Update the record
//     $sql = "UPDATE studentlist SET stud_name='$name',stud_class='$year' ,stud_mobile='$mobile', stud_email='$email', stud_address='$address' , WHERE stud_id=$id";

//     if (mysqli_query($con, $sql)) {
//         $message = "Record updated successfully.";
//     } else {
//         $message = "Error updating record: " . mysqli_error($con);
//     }

//     // Redirect to display.php after showing the alert
//     echo "<script type='text/javascript'>
//         alert('$message');
//         window.location.href = 'display.php';
//     </script>";
//     exit();
// } else {
//     echo "<script type='text/javascript'>
//         alert('Invalid Request.');
//         window.location.href = 'display.php';
//     </script>";
// }

// mysqli_close($con);

include('db.php');

$message = ""; // Variable to hold the alert message

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['stu_name'];
    $year = $_POST['stu_year'];
    $mobile = $_POST['stu_mobile'];
    $email = $_POST['stu_email'];
    $address = $_POST['stu_address'];

    // Update the record
    $sql = "UPDATE studentlist SET stud_name='$name', stud_class='$year', stud_mobile='$mobile', stud_email='$email', stud_address='$address' WHERE stud_id=$id";

    if (mysqli_query($con, $sql)) {
        $message = "Record updated successfully.";
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }

    // Redirect to display.php after showing the alert
    echo "<script type='text/javascript'>
        alert('$message');
        window.location.href = 'displayPG.php';
    </script>";
    exit();
} else {
    echo "<script type='text/javascript'>
        alert('Invalid Request.');
        window.location.href = 'displayPG.php';
    </script>";
}

mysqli_close($con);


?>
