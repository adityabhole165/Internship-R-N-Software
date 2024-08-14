
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Employee";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $designation = $_POST['Designation'];
//     $address = $_POST['address'];
//     $salary = $_POST['Salary'];
//     $paddress = $_POST['Paddress'];
//     $adhar = $_POST['AdharNo'];
//     $pan = $_POST['PanNo'];
//     $dob = $_POST['DOB'];
//     $contact = $_POST['PerConNo'];
//     $email = $_POST['email'];
//     $famPerNam = $_POST['famPerNo'];
//     $famConNo = $_POST['famConNo'];
//     $refPerNam = $_POST['refPerNam'];
//     $refPerCon = $_POST['refPerCon'];

//     // Prepare the UPDATE statement
//     $stmt = $conn->prepare("UPDATE employeeinfo1 SET e_name=?, e_design=?, e_address=?, e_salary=?, e_paddress=?, e_adhar=?, e_pan=?, e_dob=?, e_contact=?, e_email=?, e_famPerNam=?, e_famConNo=?, e_refPerNam=?, e_refPerCon=? WHERE SR_id=?");
//     $stmt->bind_param("ssssssssssssssi", $name, $designation, $address, $salary, $paddress, $adhar, $pan, $dob, $contact, $email, $famPerNam, $famConNo, $refPerNam, $refPerCon, $id);

//     if ($stmt->execute()) {
//         // Update successful, redirect to the display page
//         header("Location: display.php?showTable=true");
//         exit();
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }

//     $stmt->close();
// } else {
//     echo "Invalid request";
// }

// $conn->close();


// Database connection details
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Employee";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     // echo "Connected to server successfully<br>";
// }
// echo "connected";
// if (isset($_POST['submitbtn'])) {
  
//     $fnm = $_POST['name'];
//     $des = $_POST['Designation'];
//     $ad = $_POST['address'];
//     $sal = $_POST['Salary'];
//     $pad = $_POST['Paddress'];
//     $adno = $_POST['AdharNo'];
//     $pano = $_POST['PanNo'];
//     $dob = $_POST['DOB'];
//     $pcno = $_POST['PerConNo'];
//     $eid = $_POST['email'];
//     $fname = $_POST['famPerNo'];
//     $fcno = $_POST['famConNo'];
//     $rnm = $_POST['refPerNam'];
//     $rcno = $_POST['refPerCon'];
//     // echo "hei";


//     $sql =   $conn->prepare("UPDATE employeeinfo1 SET e_name ='$fnm' , e_design = '$des' , e_address = '$ad', e_salary = '$sal', e_peradd = '$pad' , e_aadharno = '$adno', e_pancard ='$pano', e_dob = '$dob', e_contact = '$pcno', e_email = '$eid', e_fampersonNo = '$fname', e_famcontNo = '$fcno', e_refername = '$rnm', e_refercontact = '$rcno' WHERE SR_id='$id'");
    
   
//     // echo "hei";
//     // if ($conn->query($sql) === TRUE) {
//     if  ($sql->execute()) {
//         // Update successful, redirect to the display page
//         header("Location: display.php?showTable=true");
//         exit();
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }

// } else {
//     echo "Invalid request";
// }

// $conn->close();


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
echo "Connected";

if (isset($_POST['submitbtn'])) {
    $id = $_POST['id']; // Assuming 'id' is passed in the form data
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

    // Construct the UPDATE SQL query
    $sql = "UPDATE employeeinfo1 
            SET e_name='$fnm', e_design='$des', e_address='$ad', e_salary='$sal', 
                e_peradd='$pad', e_aadharno='$adno', e_pancard='$pano', e_dob='$dob', 
                e_contact='$pcno', e_email='$eid', e_fampersonNo='$fname', e_famcontNo='$fcno', 
                e_refername='$rnm', e_refercontact='$rcno' 
            WHERE SR_id='$id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Update successful, redirect to the display page
        header("Location: display.php?showTable=true");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request";
}

// Close the connection
mysqli_close($conn);


?>


