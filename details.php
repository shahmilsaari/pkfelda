<?php
include('include/header.php');
include('include/navbar.php');

 ?>
    <div id="content-wrapper">

      <div class="container-fluid">



        <!-- Icon Cards-->


        <!-- Area Chart Example-->


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            DETAILS OF REGISTER AND ATTEND</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>


      </thead>
      <tbody>
      <?php
      if (isset($_GET['public_id']))
        $public_id = $_GET['public_id'];
      else
        $public_id = 0;
        include('dbconnect.php');
$number=1;
        $query=mysqli_query($conn,"SELECT  s.public_id,s.public_name,s.public_email FROM public s
          INNER JOIN register hp on s.public_id = hp.public_id
          INNER JOIN activity h on hp.activity_id = h.activity_id
          INNER JOIN venue v on h.venue_id = v.venue_id


          where s.public_id && hp.public_id=$public_id");
      $row=mysqli_fetch_array($query,MYSQLI_ASSOC)
          ?>
          <tr><th>PUBLIC ID</th>
              <td><?php echo $row['public_id'];?></td>
            </tr>
            <tr><th>PUBLIC NAME</th>
                <td><?php echo $row['public_name'];?></td>
              </tr>
              <tr><th>PUBLIC EMAIL</th>
                  <td><?php echo $row['public_email'];?></td>
                </tr>




          </tr>

          <?php


      ?>
      </tbody>
    </table>







              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
        <th>NO</th>
        <th>ACTIVITY NAME</th>
        <th>ACTIVITY DESCRIPTION</th>
        <th>REGISTER DATE</th>
      </thead>
      <tbody>
      <?php
      if (isset($_GET['public_id']))
        $public_id = $_GET['public_id'];
      else
        $public_id = 0;
        include('dbconnect.php');
$number=1;
        $query=mysqli_query($conn,"SELECT  h.activity_name,h.activity_description,hp.register_date FROM public s
          INNER JOIN register hp on s.public_id = hp.public_id
          INNER JOIN activity h on hp.activity_id = h.activity_id
          INNER JOIN venue v on h.venue_id = v.venue_id


          where s.public_id && hp.public_id=$public_id");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr>
              <td><?php echo $number;    $number++;?></td>

            <td><?php echo $row['activity_name']; ?></td>
            <td><?php echo $row['activity_description']; ?></td>
              <td><?php echo $row['register_date']; ?></td>



          </tr>

          <?php
        }

      ?>
      </tbody>
    </table>


          </div>

        </div>

      </div>


      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

</body>
<?php

include('include/scripts.php');
?>
</html>
