<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Employee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Connected to server successfully<br>";
}

if (isset($_POST['submitbtn'])) {
  
    $fnm = $_POST['name'];
    $des = $_POST['Designation'];
    $ad = $_POST['address'];
    $sal = $_POST['Salary'];
    $pad = $_POST['Paddress'];
    $adno = $_POST['AdharNo'];
    $pano = $_POST['PanNo'];
    $dob = $_POST['DOB'];
    $pcno = $_POST['PerConNo'];
    $eid = $_POST['email'];
    $fname = $_POST['famPerNo'];
    $fcno = $_POST['famConNo'];
    $rnm = $_POST['refPerNam'];
    $rcno = $_POST['refPerCon'];

    // Prepare the SQL query
    $sql = "INSERT INTO employeeinfo1 (e_name, e_design, e_address, e_salary, e_peradd, e_aadharno, e_pancard, e_dob, e_contact, e_email, e_fampersonNo, e_famcontNo, e_refername, e_refercontact)
            VALUES ('$fnm', '$des', '$ad', '$sal', '$pad', '$adno', '$pano', '$dob', '$pcno', '$eid', '$fname', '$fcno', '$rnm', '$rcno')";


    // echo $sql;
        // Debug: print the SQL query
    // echo "SQL Query: " . $sql . "<br>";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>
                alert('Record Submitted Successfully');
                window.location.href = 'display.php';
              </script>";
    } else {
        echo "<script>
                alert('Error inserting data: " . mysqli_error($conn) . "');
                window.history.back();
              </script>";
        // Debug: show MySQL error
        echo "MySQL Error: " . mysqli_error($conn) . "<br>";
    }
}
$conn->close();
?>
