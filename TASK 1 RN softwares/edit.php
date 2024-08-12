<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    // Fetch the record to be edited
    $sql = "SELECT * FROM studentlist WHERE stud_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Display the form with current values
    echo "
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>
                        <h4>Edit Student Information</h4>
                    </div>
                    <div class='card-body'>
                        <form method='POST' action='update.php'>
                            <input type='hidden' name='id' value='".$row['stud_id']."'>
                            <div class='form-group'>
                                <label for='stu_name'>Name</label>
                                <input type='text' class='form-control' id='stu_name' name='stu_name' value='".$row['stud_name']."' required>
                            </div>
                            <div class='form-group'>
                                <label for='stu_mobile'>Mobile</label>
                                <input type='text' class='form-control' id='stu_mobile' name='stu_mobile' value='".$row['stud_mobile']."' required>
                            </div>
                            <div class='form-group'>
                                <label for='stu_email'>Email</label>
                                <input type='email' class='form-control' id='stu_email' name='stu_email' value='".$row['stud_email']."' required>
                            </div>
                            <div class='form-group'>
                                <label for='stu_address'>Address</label>
                                <input type='text' class='form-control' id='stu_address' name='stu_address' value='".$row['stud_address']."' required>
                            </div>
                            <button type='submit' class='btn btn-primary mt-2'>Update</button>
                            <a href='display.php' class='btn btn-secondary mt-2'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Invalid Request.</div>";
}

mysqli_close($conn);
?>

</body>
</html>