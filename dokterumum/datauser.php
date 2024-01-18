 <script type="text/javascript">
 function konfirmasi(iduser){
	var kd_hapus=iduser;
	var url_str;
	url_str="hapususer.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	} 
</script>

<head>
  <title>Dokter | Data Profil</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-md"></i> Data User</h1>         
</div>  

         
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Profil</h6>
	</div>

	<!-- ========================= Tabel Data User ================================== --> 		
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
				  <tr>
            <th>No</th>
            <th>Nama</th>
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
							$sql = "SELECT * FROM user where iduser='$id_author' ORDER BY iduser DESC";
							$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
							$no=0;
							while ($data=mysqli_fetch_array($qry)) {
							$no++;
					?>
				
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['username'];?></td>
            <td>**********</td>
            <td><?php echo $data['level'];?></td>
					  
					  <td align='center'> <a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['iduser']; ?>"><i class='fa fa-edit'></i></a></td>
					  			  					                       
          </tr>
                    
          <!-- ========================= Ubah Diagnosa Pasien ================================== -->          
					<div class="modal fade" id="myModal<?php echo $data['iduser']; ?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									Ubah Data Login
								</div>

								<div class="modal-body">
									<form role="form" action="edituser.php" method="post">
										<?php
											$iduser = $data['iduser']; 
											$query_edit = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser='$iduser'");
										  //$result = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_array($query_edit)) {  
										?>

										<input type="hidden" name="iduser" value="<?php echo $row['iduser']; ?>">
											<div class="form-group">
												<label>Nama</label>
												<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
											</div>

											<div class="form-group">
												<label>Username</label>
												<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">      
											</div>

											<input type="hidden" name="level" value="<?php echo $row['level']; ?>">																
												<div class="modal-footer">  
													<button type="submit" class="btn btn-success">Ubah</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
												</div>

										<?php } ?> 
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


  <div class="card-body">
    <div class="table-responsive">
				  
				  <?php
            include "koneksi.php";

              $$id_author = $_SESSION['iduser'];						
							$sql = "SELECT * FROM dokter where iduser='$id_author' ORDER BY iduser DESC";
							$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
							$no=0;
							while ($data=mysqli_fetch_array($qry)) {
							$no++;

          ?>

          <!-- ======= Pasien Section ======= -->
			    <section id="dokter" class="doctors">
			      <div class="container">

			        <div class="row">

			          <div class="col-lg-12">
			            <div class="member d-flex align-items-start">
			              <div class="pic"><img src="../img/dokter1.png" class="img-fluid" alt="" width="200px"></div>
			              <div class="member-info">
			              	
<pre>
	<h4><b>Biodata Diri :</b></h4><hr>
	● Tempat Lahir   : <?php echo $data['lahir'];?></p>
	● Tanggal Lahir  : <?php echo $data['tgl_lahir'];?></p>
	● Jenis Kelamin  : <?php echo $data['kelamin'];?></p>
	● Tempat Praktek : <?php echo $data['praktek'];?></p>
</pre>
			                
			              </div>
			            </div>
			          </div>

			      
			      </div>
			    </section>
			    <?php } ?>
		</div>
	</div>

</div>