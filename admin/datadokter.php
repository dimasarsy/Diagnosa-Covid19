<script type="text/javascript">
 function konfirmasi(iduser){
	var kd_hapus=iduser;
	var url_str;
	url_str="hapusdokter.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
		}
	} 
</script>

<head>
  <title>Admin | Data Dokter</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-md"></i> Data Dokter</h1>

</div>  

<!-- ========================= Tabel Data Dokter ================================== -->    
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
	</div>
			
	<div class="card-body">
    <div class="table-responsive">
    	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
				  <tr>
            <th>ID Dokter</th>
            <th>Nama</th>
            <th>Kelamin</th>
            <th>Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Praktek</th>
            <th>Level</th>
					  <th class="text-center">Ubah</th>
            <th class="text-center">Hapus</th>
          </tr>
				</thead>
				 
				<tbody>
				  <?php
            include "koneksi.php";

              $sql = "SELECT * FROM user INNER JOIN dokter ON user.iduser = dokter.iduser order by user.iduser";
              $qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
              $no=0;

              while ($data=mysqli_fetch_array($qry)) {
              $no++;

          ?>
				
          <tr>
            <td><?php echo $data['id_dokter']; ?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['kelamin'];?></td>
            <td><?php echo $data['lahir'];?></td>
            <td><?php echo $data['tgl_lahir'];?></td>
            <td><?php echo $data['praktek'];?></td>
            <td><?php echo $data['level'];?></td>
					  
					  <td align='center'> 
					  	<a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['iduser']; ?>"><i class='fa fa-edit'></i></a>
					  </td>
					  <td align="center">
					  	<a href="#" class="btn btn-danger btn-circle"  onclick="return konfirmasi('<?php echo $data['iduser'];?>');"><i class="fas fa-trash"></i></a>
					  </td>					  					                       
          </tr>
                    
                   
					<!-- ========================= Modal Edit Data Dokter ================================== -->  
					<div class="modal fade" id="myModal<?php echo $data['iduser']; ?>" role="dialog">
							 
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									Update Data Dokter
								</div>

								<div class="modal-body">
									<form role="form" action="editdokter.php" method="get">
										<?php
											$iduser = $data['iduser']; 
											$query_edit = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN dokter ON user.iduser = dokter.iduser WHERE user.iduser='$iduser'");
																	
											while ($row = mysqli_fetch_array($query_edit)) {  
										?>


										<input type="hidden" name="iduser" value="<?php echo $row['iduser']; ?>">
											<div class="form-group">
												<label>Nama</label>
												<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
											</div>
											<div class="form-group">
												<label>Kelamin</label>
												<select name="kelamin" class="form-control">
													<option selected="selected"><?php echo $row['kelamin']; ?></option>
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>

											<div class="form-group">
												<label>Tempat Lahir</label>
												<input type="text" name="lahir" class="form-control" value="<?php echo $row['lahir']; ?>">      
											</div>

											<div class="form-group">
												<label>Tanggal Lahir</label>
												<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $row['tgl_lahir']; ?>">      
											</div>

											<div class="form-group">
												<label>Tempat Praktek</label>
												<input type="text" name="praktek" class="form-control" value="<?php echo $row['praktek']; ?>">      
											</div>

																		
											<div class="modal-footer">  
												<button type="submit" class="btn btn-success">Ubah</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
											</div>

										<?php  } ?> 
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
		  
		  

	
 
  
