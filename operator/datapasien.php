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
	<title>Dashboard | Biodata Pasien</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-hospital-user"></i> Data Diri</h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Diri Pasien</h6>
	</div>
			
	<div class="card-body">
    <div class="table-responsive">
				  
				  <?php
						include "koneksi.php";
						$id_author = $_SESSION['iduser'];						
						$sql = "SELECT * FROM pasien where iduser='$id_author' ORDER BY id_pasien DESC";
						$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
						$no=0;
						while ($data=mysqli_fetch_array($qry)) {
						$no++;
					?>
				
         <a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['id_pasien']; ?>">
         		<i class='fa fa-edit'></i>
         </a>
         <a href="#" type="button" class='btn' data-toggle="modal" data-target="#note">
         		<i class="far fa-clipboard"></i>
         </a>

           <!-- ======= Pasien Section ======= -->
			    <section id="dokter" class="doctors">
			      <div class="container">

			        <div class="row">

			          <div class="col-lg-12">
			            <div class="member d-flex align-items-start">
			              <div class="pic"><img src="../img/user_mask.jpg" class="img-fluid" alt=""></div>
			              <div class="member-info">
			                <h4><?php echo $data['nama'];?></h4>
			                <span><?php echo $data['umur'];?> Tahun</span>
			                <pre>
			                <p>Jenis Kelamin : <?php echo $data['kelamin'];?></p>
			                <p>Alamat        : <?php echo $data['alamat'];?></p>
			                <p>No Telepon    : <?php echo $data['no_telp'];?></p>
			                <p>E-mail        : <?php echo $data['email'];?></p>
			                </pre>
			                
			              </div>
			            </div>
			          </div>

			      
			      </div>
			    </section>
                    
                   
					
					<div class="modal fade" id="myModal<?php echo $data['iduser']; ?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									Ubah Data Pasien
								</div>
										
								<div class="modal-body">
									<form role="form" action="editpasien.php" method="post">
										<?php
											$iduser = $data['iduser']; 
											$query_edit = mysqli_query($koneksi, "SELECT * FROM pasien WHERE iduser='$iduser'");
											
											//$result = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_array($query_edit)) {  
										?>
										<input type="hidden" name="iduser" value="<?php echo $row['iduser']; ?>">
											<div class="form-group">
												<label>Nama</label>
												<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
											</div>

											<div class="form-group">
												<label>Jenis Kelamin</label>
												<select name="kelamin" class="form-control">
													<option selected="selected"><?php echo $row['kelamin']; ?></option>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
											
											<div class="form-group">
												<label>Umur</label>
												<input type="text" name="umur" class="form-control" value="<?php echo $row['umur']; ?>">      
											</div>

											<div class="form-group">
												<label>Alamat</label>
												<input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">      
											</div>

											<div class="form-group">
												<label>Nomer Telepon</label>
												<input type="text" name="no_telp" class="form-control" value="<?php echo $row['no_telp']; ?>">      
											</div>

											<div class="form-group">
												<label>E-mail</label>
												<input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">      
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


  <!-- Modal Note -->
  <div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: #760d12;">
          <b>📖 Note :</b>
        </div>
        <div class="modal-body">
        	✥ Pastikan Data yang Anda Masukan Benar <br>
        	✥ Silahkan Edit data jika ditemukan kesalahan data <br>
        	✥ Data akan digunakan untuk dokter rujukan menghubungi anda 
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
							
		</div>
  </div>
</div>