<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #212121;
            padding: 15px;
            border-right: 1px solid #dee2e6;
            height: 100vh;
        }
        .content {
            padding: 15px;
        }
        .table-container {
            display: none;
            max-height: 500px;
            overflow-y: auto;
            overflow-x: auto;
        }
        .table {
            margin-top: 20px;
            min-width: 1000px;
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
        .design h4 {
            color: azure;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 sidebar design">
            <h4>RN Software and Consultants</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link" href="display.php" style="background-color: #dee2e6;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-2" id="employeeLink" href="#" style="background-color: #dee2e6;">Employee</a>
                </li>
                <!-- Add more links as needed -->
            </ul>
        </nav>

        <!-- Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 content">
            <div class="title-actions">
                <h2 class="text-center">Employee Records</h2>
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
                $username = "root";
                $password = "";
                $dbname = "Employee";

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
                $sql = "SELECT * FROM employeeinfo1 LIMIT $start_from, $records_per_page";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Start Sr No count
                    $sr_no = $start_from + 1;

                    // Output data of each row
                    echo "<table class='table table-striped table-bordered' id='employeeTable'>";
                    echo "<thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Full Name</th>
                        <th>Personal Contact No</th>
                        <th>Designation</th>
                        <th>Actions</th>
                    </tr>
                    </thead>";
                    echo "<tbody>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $sr_no . "</td>";
                        echo "<td>" . $row["e_name"] . "</td>";
                        echo "<td>" . $row["e_contact"] . "</td>";
                        echo "<td>" . $row["e_design"] . "</td>";
                        echo "<td>
                        <form method='POST' action='edit.php' style='display:inline;'>
                            <input type='hidden' name='id' value='".$row['SR_id']."'>
                            <button type='submit' name='submit' class='btn btn-primary'>Edit</button>
                        </form>
                        <form method='POST' action='delete.php' style='display:inline;' onsubmit='return confirmDelete()'>
                            <input type='hidden' name='id' value='".$row['SR_id']."'>
                            <button type='submit' name='submit' class='btn btn-danger'>Delete</button>
                        </form>
                        </td>";
                        echo "</tr>";
                        $sr_no++;
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>No results found.</p>";
                }

                // Get the total number of records
                $sql_total = "SELECT COUNT(*) AS total_records FROM employeeinfo1";
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if the URL contains the 'showTable' parameter
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('showTable')) {
            $('.table-container').show();
        } else {
            // Initially hide the table container
            $('.table-container').hide();
        }

        // Show the table when the "Employee" link is clicked
        $('#employeeLink').click(function(event) {
            event.preventDefault();
            $('.table-container').toggle();
        });

        // Search functionality
        $('#search').on('input', function() {
            let searchTerm = $(this).val().toLowerCase();
            $('#employeeTable tbody tr').each(function() {
                let rowVisible = false;
                $(this).find('td').each(function() {
                    if ($(this).text().toLowerCase().indexOf(searchTerm) > -1) {
                        rowVisible = true;
                        return false;
                    }
                });
                $(this).toggle(rowVisible);
            });
        });
    });

    // Confirm delete action
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>

</body>
</html>
