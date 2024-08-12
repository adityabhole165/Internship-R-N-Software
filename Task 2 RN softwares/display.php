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
            <a href="form.php" class="btn btn-success">Add New</a>
            <h2 class="text-center w-100 mb-0">Student List</h2>
        </div>

        <?php
       include('db.php');

        // Define the SQL query to include the stud_class field
        $sql = "SELECT * FROM studentlist";

        // Execute the query
        $data = mysqli_query($con, $sql);

        // Check if there are any results
        if (mysqli_num_rows($data) > 0) {
            echo "<div class='table-responsive'><table class='table table-bordered text-center'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

            // Fetch and displayPG each row
            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>
                    <td>".$row['stud_id']."</td>
                    <td>".$row['stud_name']."</td>
                    <td>".$row['stud_class']."</td>
                    <td>".$row['stud_mobile']."</td>
                    <td>".$row['stud_email']."</td>
                    <td>".$row['stud_address']."</td>
                    <td>
                        <form method='POST' action='edit.php' style='display:inline;'>
                            <input type='hidden' name='id' value='".$row['stud_id']."'>
                            <button type='submit' class='btn btn-primary'>Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method='POST' action='DeleteRec.php' style='display:inline;'>
                            <input type='hidden' name='id' value='".$row['stud_id']."'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<p class='text-center'>No records found</p>";
        }

        mysqli_close($con);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
