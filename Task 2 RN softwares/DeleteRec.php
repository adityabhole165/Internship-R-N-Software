<?php
$server = "localhost";
$username = "root";
$password = "";
$dbnm = "college1";

// Establish the database connection
$conn = new mysqli($server, $username, $password, $dbnm);

// Check the connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM studentlist WHERE stud_id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();

// Redirect back to the display page after deletion
header("Location: displayPG.php");
exit();
?>