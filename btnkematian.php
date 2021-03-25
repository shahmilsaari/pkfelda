<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['kematian_ic']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel"></h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($link,"SELECT s.peneroka_ic,s.peneroka_name,hp.sijil_kematian,hp.permit_penguburan FROM peneroka s INNER JOIN kematian hp on s.peneroka_ic = hp.kematian_ic
              where s.peneroka_ic && hp.kematian_ic='".$row['kematian_ic']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Nama: <strong><?php echo $drow['peneroka_name']; ?></strong></center></h5>
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delkematian.php?kematian_ic=<?php echo $row['kematian_ic']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>

            </div>
        </div>
    </div>
<!-- /.modal -->
