
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo "<script> alert('You need login to access this pages');
  window.location.href='login.php';</script>";
    exit;
}
?>
<?php
// Include config file
require_once "config.php";


  $isteri_ic = "";
  $isteri_name = "";

  if (isset($_POST['register'])) {
      	$isteri_ic = $_POST['Ic'];
  	$isteri_name = $_POST['Nama'];



  	$sql_u = "SELECT * FROM isteri WHERE isteri_ic='$isteri_ic'";
  	$sql_e = "SELECT * FROM isteri WHERE isteri_name='$isteri_name'";
  	$res_u = mysqli_query($link, $sql_u);
  	$res_e = mysqli_query($link, $sql_e);

/* (mysqli_num_rows($res_u) > 0) {
      $isteri_name_error = "Sorry... Name already taken";
  	}else */


     if(mysqli_num_rows($res_u) > 0){
    $isteri_ic_error = "Ic Number already exist!";
  	}else{
           $query = "INSERT INTO isteri (isteri_ic, isteri_name)
      	    	  VALUES ('$isteri_ic', '$isteri_name')";
           $results = mysqli_query($link, $query);
           echo "<script> alert('Successful Add Isteri Peneroka.');
           window.location.href='viewisteri.php';</script>";
           exit();
  	}
  }
?>
<?php include 'include/head.php'; ?>
<?php include 'include/nav.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add New</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">ISTERI PENEROKA</li>
                        </ol>






                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DAFTER PENEROKAWATI
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="form-group">
<div <?php if (isset($isteri_name_error)): ?> class="form_error" <?php endif ?> >
    <label for="Nama">Name</label><input class="form-control" name="Nama" type="text" placeholder="Enter Full Name" value="<?php echo $isteri_name; ?>"required >
    <?php if (isset($isteri_name_error)): ?>
          <span ><?php echo $isteri_name_error; ?></span>
        <?php endif ?>

  </div>

  <div class="form-group">
<div <?php if (isset($isteri_ic_error)): ?> class="form_error" <?php endif ?> >
    <label for="Ic">IC Number</label><input class="form-control" name="Ic" type="text" placeholder="IC Number"value="<?php echo $isteri_ic; ?>"required pattern="\d*" minlength="12" maxlength="12">
    <?php if (isset($isteri_ic_error)): ?>
          <span style="color:red"><?php echo $isteri_ic_error; ?></span>
        <?php endif ?>
  </div>






                                </div>

                            </div>

                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button class="btn btn-success" type="submit" name="register">Submit</button>
                        </div>
</form>




                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PKFelda System 2020</div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
