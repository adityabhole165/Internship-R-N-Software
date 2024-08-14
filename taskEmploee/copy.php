<?php
// insert.php

// Database connection details
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "employee"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO employeeinfo(e_name, e_address, e_peradd, e_pancard, e_contact, e_fampersonNo, e_famcontNo, e_refername, e_refercontact, e_design, e_salary, e_aadharno, e_dob, e_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssss", $full_name, $address, $permanent_address, $pan_card_no, $personal_contact_no, $family_person_name, $family_contact_no, $reference_person_name, $reference_person_contact, $designation, $basic_salary, $aadhar_card_no, $dob, $email_id);

// Set parameters and execute
$full_name = $_POST['name'];
$designation = $_POST['Designation'];
$address = $_POST['address'];
$basic_salary = $_POST['Salary'];
$permanent_address = $_POST['Paddress'];
$aadhar_card_no = $_POST['AdharNo'];
$pan_card_no = $_POST['PanNo'];
$dob = $_POST['DOB'];
$personal_contact_no = $_POST['PerConNo'];
$email_id = $_POST['email'];
$family_person_name = $_POST['famPerNo'];
$family_contact_no = $_POST['famConNo'];
$reference_person_name = $_POST['refPerNam'];
$reference_person_contact = $_POST['refPerCon'];

if ($stmt->execute()) {
    echo "<script>
               alert('Record Submitted Successfully');
                window.location.href = 'display.php';
              </script>";
} else {
    echo "<script>
                alert('Error inserting data: " . mysqli_error($conn) . "');
                window.history.back();
              </script>";
}

// Close connections
$stmt->close();
$conn->close();
?>





<?php
// Enable error reporting for troubleshooting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "Employee"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO employeeinfo1(
    e_name,
    e_design,
    e_address,
    e_salary,
    e_peradd,
    e_aadharno,
    e_pancard,
    e_dob,
    e_contact,
    e_email,
    e_fampersonNo,
    e_famcontNo,
    e_refername,
    e_refercontact
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param(
    "ssssssssssssss",
    $full_name,
    $designation,
    $address,
    $basic_salary,
    $permanent_address,
    $aadhar_card_no,
    $pan_card_no,
    $dob,
    $personal_contact_no,
    $email_id,
    $family_person_name,
    $family_contact_no,
    $reference_person_name,
    $reference_person_contact
);

// Set parameters and execute
$full_name = $_POST['name'];
$designation = $_POST['Designation'] ;
$address = $_POST['address'] ;
$basic_salary = $_POST['Salary'] ;
$permanent_address = $_POST['Paddress'] ;
$aadhar_card_no = $_POST['AdharNo'] ;
$pan_card_no = $_POST['PanNo'] ;
$dob = $_POST['DOB'] ;
$personal_contact_no = $_POST['PerConNo'] ;
$email_id = $_POST['email'] ;
$family_person_name = $_POST['famPerNo'] ;
$family_contact_no = $_POST['famConNo'] ;
$reference_person_name = $_POST['refPerNam'] ;
$reference_person_contact = $_POST['refPerCon'] ;

if ($stmt->execute()) {
    echo "<script>
               alert('Record Submitted Successfully');
               window.location.href = 'display.php';
          </script>";
} else {
    echo "<script>
               alert('Error inserting data: " . $stmt->error . "');
               window.history.back();
          </script>";
}

// Close connections
$stmt->close();
$conn->close();
?>
