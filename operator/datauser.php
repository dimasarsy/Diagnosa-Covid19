
<script type="text/javascript">
 function konfirmasi(idser){
	var kd_hapus=idser;
	var url_str;
	url_str="hapuspasien.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	} 

		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	
</script>
<head>
	<title>Dashboard | Data Login</title>
</head>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user"></i> Profil User Login</h1>
</div>


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data User Login</h6>
	</div>
			
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
				  <tr>
            <th>ID User</th>
  					<th>Username</th>
            <th>Password</th>
            <th>Level</th>
					  <th class="text-center">Edit</th>
          </tr>
					
        </thead> 
				  
				<tbody>
				  
				  <?php
						include "koneksi.php";
						$id_author = $_SESSION['iduser'];						
						$sql = "SELECT * FROM users where iduser='$id_author' ORDER BY iduser DESC";
						$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
						$no=0;
						while ($data=mysqli_fetch_array($qry)) {
						$no++;
					?>
				
            <tr>
              <td><?php echo $data['iduser'];?></td>
              <td><?php echo $data['username'];?></td>
              <td><?php echo $data['password'];?></td>
						 	<td><?php echo $data['level'];?></td>

					  	<td align='center'> <a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['iduser']; ?>"><i class='fa fa-edit'></i></a></td>
					  			  					                       
            </tr>       
                   
					
					<div class="modal fade" id="myModal<?php echo $data['iduser']; ?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									Ubah Data Profile
								</div>
										
								<div class="modal-body">
									<form role="form" action="edituser.php" method="post">
										<?php
											$iduser = $data['iduser']; 
											$query_edit = mysqli_query($koneksi, "SELECT * FROM users WHERE iduser='$iduser'");
											
											//$result = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_array($query_edit)) {  
										?>
										<input type="hidden" name="iduser" value="<?php echo $row['iduser']; ?>">
											<div class="form-group">
												<label>Username</label>
												<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">      
											</div>
											
											<div class="form-group">
												<label>Password</label>
												<input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">      
											</div>

												<input type="hidden" name="level" value="<?php echo $row['level']; ?>">																
																		
											<div class="modal-footer">  
												<button type="submit" class="btn btn-success">Ubah</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
											</div>
										<?php   } ?> 
									</form>
								</div>
										
							</div>
									
						</div>
					</div>
							
					<?php } ?>
        </tbody>
      </table>
							
		</div>
  </div>
</div>