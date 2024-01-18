 <script type="text/javascript">
 function konfirmasi(id_pasien){
	var kd_hapus=id_pasien;
	var url_str;
	url_str="hapusdiagnosa.php?kdhapus="+kd_hapus;
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
	<title>Admin | Hasil Skrining</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-laptop-medical"></i> Data Hasil Skrining</h1>
</div> 
        
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hasil Skrining Awal Pasien</h6>			  
  </div>
			
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
				  <tr>
					  <th>No</th>                      
            <th>Nama</th>				  
					  <th>Skrining</th>
					  <th>Hasil Skrining</th>		  
					</tr>
				</thead>
				  
				<tbody>
				  <?php 
					  include "koneksi.php";						
						$sql = "SELECT * FROM pasien order by id_pasien DESC";
						$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
						$no=0;
						while ($data=mysqli_fetch_array($qry)) {
						$no++;
					  ?>
				
        	<tr> <!-- Tabel Skrining -->
            <td><?php echo $no; ?></td>
					  <td><?php echo $data['nama'];?></td>
					  
					  <td>
					  	<?php
							$id_pasien2=$data['id_pasien'];
							$strHasil2=mysqli_query($koneksi,"SELECT * FROM skrining_pasien,skrining where skrining_pasien.id_pasien='$id_pasien2' AND skrining_pasien.kd_skrining = skrining.kd_skrining order by skrining_pasien.kd_skrining asc");
							
							while($dataHasil2=mysqli_fetch_array($strHasil2)){
								echo "(".$dataHasil2['kd_skrining'].")"." ".$dataHasil2['skrining']."<br>";
								}
								$count    =mysqli_num_rows($strHasil2);										
							?>
							
						</td>

						<td><!-- Tabel Hasil Skrining -->
						<?php 
										if ($count >= 5) {
											echo "POTENSI TINGGI";

										} else if ($count >= 3){
											echo "POTENSI SEDANG";
												
										} else if ($count >= 1){
											echo "POTENSI RENDAH";
																
										} else{
											echo "TIDAK BERPOTENSI";
										}
									?>
							</td>
					</tr>
                    
					<?php } ?>


				</tbody>
  		</table>

	 	</div>
  </div>
</div>
		  
		  

	
 
  
