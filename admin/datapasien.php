 <script type="text/javascript">
 function konfirmasi(id_pasien){
	var kd_hapus=id_pasien;
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
  <title>Admin | Data Pasien</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-hospital-user"></i> Data Pasien</h1>
</div> 

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
	</div>

	<!-- ========================= Tabel Data Pasien ================================== -->    
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
				  <tr>
						<th>No</th>
            <th>Nama</th>
            <th>Kelamin</th>
            <th>Umur</th>
            <th>Alamat</th>
					  <th>Email</th>
					  
					  <th class="text-center">Ubah</th>
            <th class="text-center">Hapus</th>
          </tr>
				</thead>
				 
				<tbody>
				  <?php
						include "koneksi.php";
							$sql = "SELECT * FROM pasien ORDER BY id_pasien DESC";
							$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
							$no=0;
							while ($data=mysqli_fetch_array($qry)) {
							$no++;
					?>
				
          <tr>
            <td><?php echo $no; ?></td>
					  <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['kelamin'];?></td>
            <td><?php echo $data['umur'];?></td>
            <td><?php echo $data['alamat'];?></td>
					  <td><?php echo $data['email'];?></td>
					  <td align='center'>
					  	<a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['id_pasien']; ?>"><i class='fa fa-edit'></i></a>
					  </td>
					  <td align="center">
					  	<a href="#" class="btn btn-danger btn-circle"  onclick="return konfirmasi('<?php echo $data['id_pasien'];?>');"><i class="fas fa-trash"></i></a>
					  </td>					  					                       
          </tr>
                
          <!-- ========================= Edit Data Pasien ================================== -->        
					<div class="modal fade" id="myModal<?php echo $data['id_pasien']; ?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									Update Data User
								</div>

								<div class="modal-body">
									<form role="form" action="editpasien.php" method="post">
										<?php
											$id_pasien = $data['id_pasien']; 
											$query_edit = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
											
											//$result = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_array($query_edit)) {  
										?>
										<input type="hidden" name="id_pasien" value="<?php echo $row['id_pasien']; ?>">
											<div class="form-group">
												<label>Nama</label>
												<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
											</div>
																		
											<div class="form-group">
												<label>Jenis Kelamin</label>
												<select name="jk_pasien" id="jk_pasien" class="form-control">
													<option selected="selected"><?php echo $row['kelamin']; ?></option>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>      
											</div>
																		
											<div class="form-group">
												<label>Umur</label>
												<input onkeypress="return hanyaAngka(event)" type="text" name="umur"  class="form-control" value="<?php echo $row['umur']; ?>">      
											</div>

											<div class="form-group">
												<label>Alamat</label>
												<input type="text" name="alamat"  class="form-control" value="<?php echo $row['alamat']; ?>" >      
											</div>

											<div class="form-group">
												<label>Email</label>
												<input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">      
											</div>
																		
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
		  
		  

	
 
  
