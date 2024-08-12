<?php
include('db.php'); // Database connection file

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the URL
    
    // Fetch the record from the database
    $sql = "SELECT * FROM studentlist";
    $stmt = $con->prepare($sql);
    // $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stud_name = htmlspecialchars($row['stud_name']);
        $stud_mobile = htmlspecialchars($row['stud_mobile']);
        $stud_email = htmlspecialchars($row['stud_email']);
        $stud_address = htmlspecialchars($row['stud_address']);
    } else {
        echo "Record not found!";
        exit;
    }
} else {
    echo "ID not provided!";
    exit;
}
?>