<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 15px;
            border-right: 1px solid #dee2e6;
        }
        .content {
            padding: 15px;
        }
        .table-container {
            display: none; /* Initially hide the table */
            max-height: 500px; /* Set a fixed height for the container */
            overflow-y: auto; /* Enable vertical scrolling */
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        .table {
            margin-top: 20px;
            min-width: 1000px; /* Ensure table is wide enough for all columns */
        }
        .pagination {
            margin-top: 20px;
        }
        .new-form-btn {
            margin-right: 15px;
        }
        .search-box {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-box input {
            width: 200px;
        }
        .title-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .title-actions h2 {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 sidebar">
            <h4>RN Software and Consultants</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="employeeLink" href="#">Employee</a>
                </li>
                <!-- Add more links as needed -->
            </ul>
        </nav>

        <!-- Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 content">
            <div class="title-actions">
                <h2 class="text-center">Employee Records</h2>
                <!-- New Form Button and Search Box -->
                <div class="d-flex align-items-center">
                    <a href="form.php" class="btn btn-primary new-form-btn mt-2">New Form</a>
                    <div class="search-box mt-4">
                        <input type="text" id="search" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>

            <div class="table-container">
                <?php
                // Database connection details
                $servername = "localhost";
                $username = "root"; // replace with your database username
                $password = ""; // replace with your database password
                $dbname = "employees"; // replace with your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Define the number of records per page
                $records_per_page = 4;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $start_from = ($page - 1) * $records_per_page;

                // Query to fetch records
                $sql = "SELECT * FROM employeeinfo LIMIT $start_from, $records_per_page";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    echo "<table class='table table-striped table-bordered' id='employeeTable'>";
                    echo "<thead><tr><th>Full Name</th><th>Address</th><th>Permanent Address</th><th>PAN Card No</th><th>Personal Contact No</th><th>Family Person Name</th><th>Family Contact No</th><th>Reference Person Name</th><th>Reference Person Contact</th><th>Designation</th><th>Basic Salary</th><th>Aadhar Card No</th><th>Date Of Birth</th><th>Email ID</th></tr></thead>";
                    echo "<tbody>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["e_name"] . "</td>";
                        // echo "<td>" . $row["e_address"] . "</td>";
                        // echo "<td>" . $row["e_peradd"] . "</td>";
                        // echo "<td>" . $row["e_pancard"] . "</td>";
                        echo "<td>" . $row["e_contact"] . "</td>";
                        // echo "<td>" . $row["e_fampersonNo"] . "</td>";
                        // echo "<td>" . $row["e_famcontNo"] . "</td>";
                        // echo "<td>" . $row["e_refername"] . "</td>";
                        // echo "<td>" . $row["e_refercontact"] . "</td>";
                        echo "<td>" . $row["e_design"] . "</td>";
                        // echo "<td>" . $row["e_salary"] . "</td>";
                        // echo "<td>" . $row["e_aadharno"] . "</td>";
                        // echo "<td>" . $row["e_dob"] . "</td>";
                        // echo "<td>" . $row["e_email"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>No results found.</p>";
                }

                // Get the total number of records
                $sql_total = "SELECT COUNT(*) AS total_records FROM employeeinfo";
                $result_total = $conn->query($sql_total);
                $row_total = $result_total->fetch_assoc();
                $total_records = $row_total['total_records'];
                $total_pages = ceil($total_records / $records_per_page);

                // Display pagination
                echo "<nav aria-label='Page navigation'>";
                echo "<ul class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<li class='page-item" . ($i == $page ? " active" : "") . "'>";
                    echo "<a class='page-link' href='display.php?page=" . $i . "'>" . $i . "</a>";
                    echo "</li>";
                }
                echo "</ul></nav>";

                // Close connection
                $conn->close();
                ?>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Initially hide the table container
        $('.table-container').hide();

        // Show the table when the "Employee" link is clicked
        $('#employeeLink').click(function(event) {
            event.preventDefault(); // Prevent the default link behavior
            $('.table-container').toggle(); // Toggle the table visibility
        });

        // Search functionality
        $('#search').on('input', function() {
            let searchTerm = $(this).val().toLowerCase();
            $('#employeeTable tbody tr').each(function() {
                let rowVisible = false;
                $(this).find('td').each(function() {
                    if ($(this).text().toLowerCase().indexOf(searchTerm) > -1) {
                        rowVisible = true;
                        return false; // Break out of each loop
                    }
                });
                $(this).toggle(rowVisible);
            });
        });
    });
</script>
</body>
</html>
