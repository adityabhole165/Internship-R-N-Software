<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        /* CSS to style the form and border */
        #employee-form-container {
            border: 2px solid #000; /* Black border */
            padding: 20px; /* Padding inside the border */
            border-radius: 5px; /* Rounded corners */
            margin-top: 20px; /* Space above the form */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Employee Form</h2> <!-- Title outside the border -->
        <div id="employee-form-container">
            <form action="insert.php" method="POST" id="employee-form"> <!-- Form with ID for access -->
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label class="control-label" for="Designation">Designation</label>
                        <select name="Designation" class="form-control" id="Designation" required>
                            <option value="" disabled selected>Select your Designation</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Employee">Employee</option>
                            <option value="Intern">Intern</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="Salary">Basic Salary</label>
                        <input class="form-control" name="Salary" id="Salary" type="text" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="Paddress">Permanent Address (As per Aadhar Card)</label>
                        <input type="text" name="Paddress" id="Paddress" class="form-control"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="AdharNo">Aadhar Number</label>
                        <input type="text" name="AdharNo" id="AdharNo" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="PanNo">Pan Card No</label>
                        <input type="text" name="PanNo" id="PanNo" class="form-control" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="DOB">Date Of Birth</label>
                        <input type="date" name="DOB" id="DOB" class="form-control"  />
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="PerConNo">Personal Contact No</label>
                        <input type="text" name="PerConNo" id="PerConNo" class="form-control" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="email">Email id</label>
                        <input type="text" name="email" id="email" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="famPerNo">Family Person Name</label>
                        <input type="text" name="famPerNo" id="famPerNo" class="form-control" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="famConNo">Family Contact No</label>
                        <input type="text" name="famConNo" id="famConNo" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="refPerNam">Reference Person Name</label>
                        <input type="text" name="refPerNam" id="refPerNam" class="form-control" />
                    </div>
                    <div class="col-xs-6 form-group">
                        <label for="refPerCon">Reference Person Contact</label>
                        <input type="text" name="refPerCon" id="refPerCon" class="form-control"  />
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                    <input type='submit' name="submitbtn" class='btn btn-primary mt-2'/>
                    </div>         
                </div>
            </form>
        </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
