
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
              <h1 class="mt-4">DETAIL MAKLUMAT PENAROKA</h1>
            <ol class="breadcrumb mb-4">

            </ol>
            <div class="card mb-4">

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    MAKLUMAT PENEROKA
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>


      </thead>
      <tbody>
      <?php
      if (isset($_GET['peneroka_ic']))
        $public_id = $_GET['peneroka_ic'];
      else
        $public_id = 0;
        include('config.php');
$number=1;
        $query=mysqli_query($link,"SELECT peneroka_ic, peneroka_name FROM peneroka WHERE peneroka_ic=$public_id");
      $row=mysqli_fetch_array($query,MYSQLI_ASSOC)
          ?>
          <tr><th>IC</th>
              <td><?php echo $row['peneroka_ic'];?></td>
            </tr>
            <tr><th>NAMA PENEROKA</th>
                <td><?php echo $row['peneroka_name'];?></td>
              </tr>




          </tr>

          <?php


      ?>
      </tbody>
    </table>



    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            MAKLUMAT KEMATIAN
        </div>

                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
            <th>NO</th>
            <th>SIJIL_KEMATIAN</th>
             <th>VIEW IMAGES</th>
            <th>PERMIT PENGUBURAN</th>
              <th>VIEW IMAGES</th>
          </thead>
          <tbody>
          <?php
          if (isset($_GET['peneroka_ic']))
            $public_id = $_GET['peneroka_ic'];
          else
            $public_id = 0;
            include('config.php');
    $number=1;
            $query=mysqli_query($link,"SELECT s.peneroka_ic,s.peneroka_name,hp.sijil_kematian,hp.permit_penguburan FROM peneroka s INNER JOIN kematian hp on s.peneroka_ic = hp.kematian_ic
              where s.peneroka_ic && hp.kematian_ic=$public_id");
            while($row=mysqli_fetch_array($query)){
              ?>
              <tr>
                  <td><?php echo $number;    $number++;?></td>

                <td ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['sijil_kematian'] ). '"height="200" width="200"/>';?></td>
                <td><button type="button" class="btn btn-danger btn-xs"onclick="window.location.href = 'viewsijilkematian.php?kematian_ic=<?php echo $row['peneroka_ic'];?>';">VIEW</button></td>
                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['permit_penguburan'] ). '"height="200" width="200"/>';?></td>
                <td><button type="button" class="btn btn-danger btn-xs"onclick="window.location.href = 'viewpermitpenguburan.php?kematian_ic=<?php echo $row['peneroka_ic'];?>';">VIEW</button></td>




              </tr>

              <?php
            }

          ?>
          </tbody>
        </table>




<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        MAKLUMAT PENEROKAWATI
    </div>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
        <th>NO</th>
        <th>IC</th>
        <th>NAMA PENEROKAWATI</th>
      </thead>
      <tbody>
      <?php
      if (isset($_GET['peneroka_ic']))
        $public_id = $_GET['peneroka_ic'];
      else
        $public_id = 0;
        include('config.php');
$number=1;
        $query=mysqli_query($link,"SELECT s.peneroka_ic,s.peneroka_name ,h.isteri_ic,h.isteri_name FROM peneroka s INNER JOIN kawin hp on s.peneroka_ic = hp.peneroka_ic INNER JOIN isteri h on hp.isteri_ic = h.isteri_ic


          where s.peneroka_ic && hp.peneroka_ic=$public_id");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr>
              <td><?php echo $number;    $number++;?></td>

            <td><?php echo $row['isteri_ic']; ?></td>
            <td><?php echo $row['isteri_name']; ?></td>



          </tr>

          <?php
        }

      ?>






      </tbody>
    </table>




    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            MAKLUMAT PEWARIS
        </div>

                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
            <th>NO</th>
            <th>IC</th>
            <th>NAMA PEWARIS</th>
          </thead>
          <tbody>
          <?php
          if (isset($_GET['peneroka_ic']))
            $public_id = $_GET['peneroka_ic'];
          else
            $public_id = 0;
            include('config.php');
    $number=1;
            $query=mysqli_query($link,"SELECT s.peneroka_ic,s.peneroka_name ,h.waris_ic,h.waris_name FROM peneroka s INNER JOIN warisan hp on s.peneroka_ic = hp.peneroka_ic INNER JOIN waris h on hp.waris_ic = h.waris_ic where s.peneroka_ic && hp.peneroka_ic=$public_id");
            while($row=mysqli_fetch_array($query)){
              ?>
              <tr>
                  <td><?php echo $number;    $number++;?></td>

                <td><?php echo $row['waris_ic']; ?></td>
                <td><?php echo $row['waris_name']; ?></td>



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
