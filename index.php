<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Bilangan Peneroka : <?php
                                                                    include('config.php');

                                                                    $query = mysqli_query($link, "SELECT count(*) as total FROM peneroka ");
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                    ?>
                                <?php echo $row['total']; ?>
                            <?php
                                                                    }

                            ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="viewpeneroka.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Bilangan Penerokawati : <?php
                                                                        include('config.php');

                                                                        $query = mysqli_query($link, "SELECT count(*) as total FROM isteri ");
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                        ?>
                                <?php echo $row['total']; ?>
                            <?php
                                                                        }

                            ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="viewisteri.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Bilangan Pewaris : <?php
                                                                    include('config.php');

                                                                    $query = mysqli_query($link, "SELECT count(*) as total FROM waris ");
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                    ?>
                                <?php echo $row['total']; ?>
                            <?php
                                                                    }

                            ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="viewpewaris.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Bilangan Maklumat Kematian : <?php
                                                                            include('config.php');

                                                                            $query = mysqli_query($link, "SELECT count(*) as total FROM kematian ");
                                                                            while ($row = mysqli_fetch_array($query)) {
                                                                            ?>
                                <?php echo $row['total']; ?>
                            <?php
                                                                            }

                            ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="viewkematians.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    PENDAFTAR BAHARU
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>NO</th>
                                <th>IC PENEROKA</th>
                                <th>NAMA PENEROKA</th>
                                <th>SIJIL KEMATIAN</th>
                                <th>PERMIT PENGUBURAN</th>
                                <th>IC PENEROKAWATI</th>
                                <th>NAMA PENEROKAWATI</th>
                                <th>IC PEWARIS</th>
                                <th>NAMA PEWARIS</th>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['peneroka_ic']))
                                    $public_id = $_GET['peneroka_ic'];
                                else
                                    $public_id = 0;

                                include('config.php');
                                $number = 1;
                                $query = mysqli_query($link, "SELECT s.peneroka_ic,s.peneroka_name,kt.sijil_kematian,kt.permit_penguburan,h.isteri_ic,h.isteri_name,ws.waris_ic,ws.waris_name FROM peneroka s INNER JOIN kawin hp on s.peneroka_ic = hp.peneroka_ic INNER JOIN isteri h on hp.isteri_ic = h.isteri_ic INNER JOIN kematian kt on s.peneroka_ic=kt.kematian_ic INNER JOIN warisan wn on s.peneroka_ic=wn.peneroka_ic INNER JOIN waris ws on wn.waris_ic=ws.waris_ic");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $number;
                                            $number++; ?></td>
                                        <td><?php echo $row['peneroka_ic']; ?></td>
                                        <td><?php echo $row['peneroka_name']; ?></td>
                                        <td align="center"><a href="viewsijilkematian.php?kematian_ic=<?php echo $row['peneroka_ic']; ?>"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['sijil_kematian']) . '"height="100" width="100"/>'; ?></a></td>
                                        <td align="center"><a href="viewpermitpenguburan.php?kematian_ic=<?php echo $row['peneroka_ic']; ?>"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['permit_penguburan']) . '"height="100" width="100"/>'; ?></a></td>
                                        <td><?php echo $row['isteri_ic']; ?></td>
                                        <td><?php echo $row['isteri_name']; ?></td>
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







            </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
</body>

</html>