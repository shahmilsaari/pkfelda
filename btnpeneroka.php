<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['peneroka_ic']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel"></h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($link,"select * from peneroka where peneroka_ic='".$row['peneroka_ic']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Nama: <strong><?php echo $drow['peneroka_name']; ?></strong></center></h5>
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delpeneroka.php?peneroka_ic=<?php echo $row['peneroka_ic']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>

            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['peneroka_ic']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel"></h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($link,"select * from peneroka where peneroka_ic='".$row['peneroka_ic']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="editpeneroka.php?peneroka_ic=<?php echo $erow['peneroka_ic']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Ic:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="name" class="form-control" value="<?php echo $erow['peneroka_ic']; ?>"required pattern="\d*" minlength="12" maxlength="12">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Nama:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="description" class="form-control" value="<?php echo $erow['peneroka_name']; ?>">
						</div>
					</div>
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->
