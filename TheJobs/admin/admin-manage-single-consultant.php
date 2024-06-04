<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['upate_con']))
    {
            $c_id = $_GET['c_id'];
            $c_name=$_POST['c_name'];
            $c_number = $_POST['c_number'];
            $cn_name=$_POST['cn_name'];
            $c_addr=$_POST['c_addr'];
            $c_status=$_POST['c_status'];
            $c_email=$_POST['c_email'];
            $query="update jobs_consultant set c_name=?, c_number=?, c_email=?, cn_name=?, c_status=?,  c_addr = ? where c_id = ?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssi', $c_name, $c_number, $c_email, $cn_name, $c_status,$c_addr, $c_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Updated";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php');?>

<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">
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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Consultants</a>
          </li>
          <li class="breadcrumb-item active">Update Consultant</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
            Update Consultant
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $aid=$_GET['c_id'];
            $ret="select * from jobs_consultant where c_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <form method ="POST" enctype="multipart/form-data"> 
            <div class="form-group">
                <label for="exampleInputEmail1">Consultant Name</label>
                <input type="text" value="<?php echo $row->c_name;?>" required class="form-control" id="exampleInputEmail1" name="c_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" value="<?php echo $row->c_number;?>" class="form-control" id="exampleInputEmail1" name="c_number">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Adress</label>
                <input type="text" value="<?php echo $row->c_addr;?>" class="form-control" id="exampleInputEmail1" name="c_addr">
            </div>
			  
			<div class="form-group">
                <label for="exampleInputEmail1">E mail</label>
                <input type="email" value="<?php echo $row->c_email;?>" class="form-control" id="exampleInputEmail1" name="c_email">
            </div>
            
			<div class="form-group">
                <label for="exampleInputEmail1">Nick Name</label>
                <input type="text" value="<?php echo $row->cn_name;?>" class="form-control" id="exampleInputEmail1" name="cn_name">
            </div>  
            
            <div class="form-group">
              <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control" name="c_status" id="exampleFormControlSelect1">
                <option>Booked</option>
                <option>Available</option>
              </select>
            </div>

            <hr>
            <button type="submit" name="upate_con" class="btn btn-success">Update Consultant</button>
          </form>
          <!-- End Form-->
          <?php }?>
        </div>
      </div>
       
      <hr>
     

      <!-- Sticky Footer -->
      <?php include("vendor/inc/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
