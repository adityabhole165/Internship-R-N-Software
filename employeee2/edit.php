<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch the existing employee data based on the ID
    $sql = "SELECT * FROM employeeinfo1 WHERE SR_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid request";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        #employee-form-container {
            border: 2px solid #000;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Edit Employee Form</h2>
        <div id="employee-form-container">
            <form action="update.php" method="POST" id="employee-form">
                <!-- Include a hidden field to store the employee ID -->
                <input type="hidden" name="id" value="<?php echo $row['SR_id']; ?>" />
                
                <!-- Form fields with existing data -->
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['e_name']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label class="control-label" for="Designation">Designation</label>
                        <select name="Designation" class="form-control" id="Designation" required>
                            <option value="" disabled>Select your Designation</option>
                            <option value="Admin" <?php if ($row['e_design'] == 'Admin') echo 'selected'; ?>>Admin</option>
                            <option value="Manager" <?php if ($row['e_design'] == 'Manager') echo 'selected'; ?>>Manager</option>
                            <option value="Employee" <?php if ($row['e_design'] == 'Employee') echo 'selected'; ?>>Employee</option>
                            <option value="Intern" <?php if ($row['e_design'] == 'Intern') echo 'selected'; ?>>Intern</option>
                        </select>
                    </div>
                </div>
                <!-- Repeat similar structure for other fields with their respective values -->
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['e_address']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="Salary">Basic Salary</label>
                        <input class="form-control" name="Salary" id="Salary" type="text" value="<?php echo $row['e_salary']; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="Paddress">Permanent Address (As per Aadhar Card)</label>
                        <input type="text" name="Paddress" id="Paddress" class="form-control" value="<?php echo $row['e_peradd']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="AdharNo">Aadhar Number</label>
                        <input type="text" name="AdharNo" id="AdharNo" class="form-control" value="<?php echo $row['e_pancard']; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="PanNo">Pan Card No</label>
                        <input type="text" name="PanNo" id="PanNo" class="form-control" value="<?php echo $row['e_pancard']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="DOB">Date Of Birth</label>
                        <input type="date" name="DOB" id="DOB" class="form-control" value="<?php echo $row['e_dob']; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="PerConNo">Personal Contact No</label>
                        <input type="text" name="PerConNo" id="PerConNo" class="form-control" value="<?php echo $row['e_contact']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="email">Email id</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['e_email']; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="famPerNo">Family Person Name</label>
                        <input type="text" name="famPerNo" id="famPerNo" class="form-control" value="<?php echo $row['e_fampersonNo']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="famConNo">Family Contact No</label>
                        <input type="text" name="famConNo" id="famConNo" class="form-control" value="<?php echo $row['e_famcontNo']; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="refPerNam">Reference Person Name</label>
                        <input type="text" name="refPerNam" id="refPerNam" class="form-control" value="<?php echo $row['e_refername']; ?>" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="refPerCon">Reference Person Contact</label>
                        <input type="text" name="refPerCon" id="refPerCon" class="form-control" value="<?php echo $row['e_refercontact']; ?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <input type='submit' name="submitbtn" class='btn btn-primary mt-2' value="Update"/>
                    </div>         
                </div>
            </form>
        </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
