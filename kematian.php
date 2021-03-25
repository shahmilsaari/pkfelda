
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

require_once "config.php";
if(isset($_POST['upload']))
{

$file= addslashes(file_get_contents($_FILES["image"]['tmp_name']));
$file2= addslashes(file_get_contents($_FILES["image2"]['tmp_name']));
    $kematian_ic=$_POST['kematian_ic'];

    $query = "INSERT INTO kematian (kematian_ic, sijil_kematian,permit_penguburan)
         VALUES ('$kematian_ic', '$file', '$file2')";
    $query_run = mysqli_query($link,$query);

    if($query_run)
    {
      echo "<script> alert('Successful Add Maklumat Kematian Peneroka.');
           window.location.href='viewkematians.php';</script>";
    }
    else {
        echo "<script> alert('Fails upload');</script>";
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
                            <li class="breadcrumb-item active">MAKLUMAT KEMATIAN</li>
                        </ol>






                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                REGISTER MAKLUMAT KEMATIAN
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"enctype="multipart/form-data">
  <div class="form-group">
    <label for="kematian_ic">IC KEMATIAN</label><input class="form-control" name="kematian_ic" type="text" placeholder="Enter IC Kematian" required pattern="\d*" minlength="12" maxlength="12">
  </div>

  <div class="form-group">
    <label for="sijil_kematian">Sijil Kematian</label><input class="form-control" name="image" id="image" type="file" placeholder="Upload images of sijil kematian" >

  </div>

  <div class="form-group">
    <label for="permit_penguburan">Permit Penguburan</label><input class="form-control" name="image2"  id="image2"type="file" placeholder="Upload images of sijil kematian" >

  </div>








                                </div>

                            </div>

                            <button class="btn btn-success" value="submit" name="upload"type="submit">Submit</button>
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
