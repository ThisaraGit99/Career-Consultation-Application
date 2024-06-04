<!--Server Side Scripting To inject Login-->
<?php
// Include the database configuration file
include('vendor/inc/config.php');

if (isset($_POST['add_user'])) {
    $u_fname = $_POST['u_fname'];
    $u_lname = $_POST['u_lname'];
    $u_phone = $_POST['u_phone'];
    $u_addr = $_POST['u_addr'];
    $u_email = $_POST['u_email'];
    $u_pwd = $_POST['u_pwd'];
    $u_category = $_POST['u_category'];
	$c_n_name = $_POST['c_n_name'];
	$c_n_phone = $_POST['c_n_phone'];
	$c_bookdate = $_POST['c_bookdate'];
	$c_book_status = $_POST['c_book_status'];

    // Prepare the SQL INSERT statement
    $query = "INSERT INTO jobs_user (u_fname, u_lname, u_phone, u_addr, u_category, u_email, u_pwd,c_n_name,c_n_phone,c_bookdate,c_book_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die("Error in preparing the statement: " . $mysqli->error);
    }

    // Bind parameters to the statement
    $stmt->bind_param('sssssssssss', $u_fname, $u_lname, $u_phone, $u_addr, $u_category, $u_email, $u_pwd,$c_n_name,$c_n_phone,$c_bookdate,$c_book_status);

    // Execute the statement
    if ($stmt->execute()) {
        $succ = "Account Created. Proceed To Log In.";
    } else {
        $err = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>


<!--End Server Side Scriptiong-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Tranport Management System, Saccos, Matwana Culture">
  <meta name="author" content="MartDevelopers ">

  <title>The Jobs Client- Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Create An Account With Us</div>
      <div class="card-body">
        <!--Start Form-->
        <form method = "POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                <input type="text" required class="form-control" id="exampleInputEmail1" name="u_fname">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                <input type="text" required class="form-control" id="exampleInputEmail1" name="u_lname">
                  <label for="lastName">Last name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                <input type="text" required class="form-control" id="exampleInputEmail1" name="u_phone">
                  <label for="lastName">Contact</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
            <input type="text" required class="form-control" id="exampleInputEmail1" name="u_addr">
              <label for="inputEmail">Address</label>
            </div>
          </div>
          <div class="form-group" style ="display:none">
            <div class="form-label-group">
            <input type="text" required class="form-control" id="exampleInputEmail1" value="User" name="u_category">
              <label for="inputEmail">User Category</label>
            </div>
          </div>
			<div class="form-group" style ="display:none">
            <div class="form-label-group">
            <input type="text" required class="form-control" id="exampleInputEmail1" value=" " name="c_n_name">
              <label for="inputEmail">User Category</label>
            </div>
          </div>
			<div class="form-group" style ="display:none">
            <div class="form-label-group">
            <input type="text" required class="form-control" id="exampleInputEmail1" value=" " name="c_n_phone">
              <label for="inputEmail">User Category</label>
            </div>
          </div>
			<div class="form-group" style ="display:none">
            <div class="form-label-group">
            <input type="text" required class="form-control" id="exampleInputEmail1" value=" " name="c_bookdate">
              <label for="inputEmail">User Category</label>
            </div>
          </div>
			<div class="form-group" style ="display:none">
            <div class="form-label-group">
            <input type="text" required class="form-control" id="exampleInputEmail1" value=" " name="c_book_status">
              <label for="inputEmail">User Category</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
            <input type="email" required class="form-control" id="exampleInputEmail1" name="u_email">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                <input type="password" required class="form-control" name="u_pwd" id="exampleInputEmail1">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="add_user" class="btn btn-success">Create Account</button>
        </form>														   
        <!--End FOrm-->
																	   
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
          
        </div>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
