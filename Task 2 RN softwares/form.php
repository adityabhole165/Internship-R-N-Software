<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Form</title>
</head>
<body>
    <div class="container-lg mt-5 col-4 py-3 border border-dark">
        <h2 class="text-center">Student Data</h2>

        <form action="insert.php" method="POST">
            <div class="form-group">
                <label for="stud_name">Name</label>
                <input type="text" class="form-control" id="stud_name" name="stu_name" placeholder="Enter Student Name" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="year">Learning Year</label>
                <div class="col-sm-14">
                    <select name="stu_year" class="form-control" id="year" required>
                        <option value="" disabled selected>Select your year</option>
                        <option value="First Year">First Year</option>
                        <option value="Second Year">Second Year</option>
                        <option value="Third Year">Third Year</option>
                        <option value="Fourth Year">Fourth Year</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="stud_mobile">Mobile</label>
                <input type="text" class="form-control" id="stud_mobile" name="stu_mobile" placeholder="Enter Mobile Number" required>
            </div>
            <div class="form-group">
                <label for="stud_email">Email</label>
                <input type="email" class="form-control" id="stud_email" name="stu_email" placeholder="Enter Email Address" required>
            </div>
            <div class="form-group">
                <label for="stud_address">Address</label>
                <textarea class="form-control" id="stud_address" name="stu_address" placeholder="Enter Address" rows="3" required></textarea>
            </div>
            <div class="row">
            <div class="col text-left">
                <button class="btn btn-primary" type="submit" name="submit">
                    Submit
                </button>
            </div>

            <div class="col text-right ">
            <form action="displayPG.php" method="POST">
                <button class="btn btn-primary" type="submit" name="back">
                    Back
                </button>
            </form>
            </div>
           
        
        </div>
        </div>
        </form>

  
       
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
