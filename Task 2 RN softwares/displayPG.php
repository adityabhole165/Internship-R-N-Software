<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Student List</title>
</head>
<body>
    <div class="container mt-5">
        <!-- Add New Button and Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="form.php" class="btn btn-success col-1">Add New</a>
            <h2 class="text-center w-100 mb-0">Student List</h2>
        </div>

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

        // Define the number of records per page
        $records_per_page = 6;
        
        // Get the current page number from the URL, default is 1 if not present
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if($page < 1) $page = 1;

        // Calculate the offset for the SQL LIMIT clause
        $offset = ($page - 1) * $records_per_page;

        // Calculate the total number of pages
        $total_records_query = "SELECT COUNT(*) FROM studentlist";
        $total_records_result = mysqli_query($conn, $total_records_query);
        $total_records = mysqli_fetch_array($total_records_result)[0];
        $total_pages = ceil($total_records / $records_per_page);

        // Define the SQL query with LIMIT and OFFSET
        $sql = "SELECT * FROM studentlist LIMIT $records_per_page OFFSET $offset";

        // Execute the query
        $data = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($data) > 0) {
            echo "<div class='table-responsive'><table class='table table-striped text-left'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

            // Fetch and display each row
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>
                    <td>".$row['stud_id']."</td>
                    <td>".$row['stud_name']."</td>
                    <td>".$row['stud_year']."</td>
                    <td>".$row['stud_mobile']."</td>
                    <td>".$row['stud_email']."</td>
                    <td>".$row['stud_address']."</td>
                    <td class='table-info'>
                        <form method='POST' action='edit.php' style='display:inline;'>
                            <input type='hidden' name='id' value='".$row['stud_id']."'>
                            <button type='submit' class='btn btn-primary'>Edit</button>
                        </form>
                    </td>
                    <td class='table-active'>
                        <form method='POST' action='DeleteRec.php' style='display:inline;' onsubmit='return confirmDelete()'>
                            <input type='hidden' name='id' value='".$row['stud_id']."'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>";
            }
            echo "</tbody></table></div>";

            // Pagination links
            echo "<nav aria-label='Page navigation'>";
            echo "<ul class='pagination justify-content-center'>";

            if($page > 1){
                echo "<li class='page-item'><a class='page-link' href='?page=".($page-1)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
            }

            for($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo "<li class='page-item active'><span class='page-link'>".$i."</span></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                }
            }

            if($page < $total_pages){
                echo "<li class='page-item'><a class='page-link' href='?page=".($page+1)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
            }

            echo "</ul>";
            echo "</nav>";

        } else {
            echo "<p class='text-center'>No records found</p>";
        }

        mysqli_close($conn);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
    </script>
</body>
</html>