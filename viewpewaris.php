
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

<?php include 'include/head.php'; ?>
<?php include 'include/nav.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
              <h1 class="mt-4">SEMUA MAKLUMAT PEWARIS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">LIHAT MAKLUMAT</a></li>
                <li class="breadcrumb-item active">PEWARIS</li>
            </ol>
            <div class="card mb-4">

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    MAKLUMAT
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>NO</th>
      <th>NAME</th>
      <th>IC</th>
      <th>EDIT</th>
        <th>DELETE</th>
    </thead>
    <tbody>
    <?php
    if (isset($_GET['waris_ic']))
  $public_id = $_GET['waris_ic'];
else
  $public_id = 0;
      include('config.php');
$number=1;
      $query=mysqli_query($link,"select * from waris");
      while($row=mysqli_fetch_array($query)){
        ?>
        <tr>
<td><?php echo $number;    $number++;?></td>
<td><?php echo $row['waris_name']; ?></td>
<td><?php echo $row['waris_ic']; ?></td><?php include('btnpewaris.php'); ?>
<td>
              <a href="#edit<?php echo $row['waris_ic']; ?>" data-toggle="modal" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td><td>
              <a href="#del<?php echo $row['waris_ic']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>

            </td>
        </tr>
        <?php
      }

    ?>
    </tbody>
  </table>
                    </div>
                </div>
            </div>
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
