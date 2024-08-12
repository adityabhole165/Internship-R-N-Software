<?php
include('db.php');

if(isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['stu_name'];
    $class = $_POST['stu_year'];
    $mobile = $_POST['stu_mobile'];
    $email = $_POST['stu_email'];
    $address = $_POST['stu_address'];

    // // Insert the data into the database
    // $sql = "INSERT INTO studentlist (stud_name, stud_class, stud_mobile, stud_email, stud_address) 
    //         VALUES ('$name', '$class', '$mobile', '$email', '$address')";

    // $exe = mysqli_query($con, $sql);

    // if ($exe === true) {
    //     echo "<script>
    //             alert('Record submitted successfully.');
    //             window.location.href = 'display.php';
    //           </script>";
    // } else {
    //     echo "<script>
    //             alert('Error inserting data: " . mysqli_error($con) . "');
    //             window.history.back();
    //           </script>";
    // }

    // // Close the database connection
    // mysqli_close($con);

    // Use prepared statements to prevent SQL injection
$stmt = $con->prepare("INSERT INTO studentlist (stud_name, stud_class, stud_mobile, stud_email, stud_address) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $class, $mobile, $email, $address);

// Execute the statement
$execute = $stmt->execute();

if ($execute) {
    echo "<script>
            alert('Record submitted successfully.');
            window.location.href = 'displayPG.php';
          </script>";
} else {
    echo "<script>
            alert('Error inserting data: " . $stmt->error . "');
            window.history.back();
          </script>";
}

// Close statement and connection
$stmt->close();
mysqli_close($con);

}
?>
