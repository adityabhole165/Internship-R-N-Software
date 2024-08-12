<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbnm = "college1";

$conn = new mysqli($servername, $username, $password, $dbnm);

if ($conn->connect_error) {
    die("Error connecting to server: " . $conn->connect_error);
}

if (isset($_POST['stud_id']) && isset($_POST['stud_name']) && isset($_POST['stud_mobile']) && isset($_POST['stud_email']) && isset($_POST['stud_address'])) {
    $stud_id = $_POST['stud_id'];
    $stud_name = $_POST['stud_name'];
    $stud_mobile = $_POST['stud_mobile'];
    $stud_email = $_POST['stud_email'];
    $stud_address = $_POST['stud_address'];

   
    $stmt = $conn->prepare("UPDATE student_list SET stud_name = ?, stud_mobile = ?, stud_email = ?, stud_address = ? WHERE stud_id = ?");
    $stmt->bind_param("ssssi", $stud_name, $stud_mobile, $stud_email, $stud_address, $stud_id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
        header("Location: display.php"); 
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid input.";
}

$conn->close();
?>