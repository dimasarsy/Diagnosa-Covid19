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
  <title>Admin | Data Hasil Diagnosa</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-diagnoses"></i> Data Diagnosa</h1>
</div> 

<!-- ========================= Tabel Diagnosa Pasien ================================== -->        
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hasil Diagnosa Pasien</h6>
	</div>
			
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
				  <tr>
					  <th>No</th>                      
            <th>Nama</th>			  
            <th>Tanggal Diagnosa</th>
					  <th>Gejala</th>
					  <th>Diagnosa Penyakit</th>				  
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
					<tr>
						<td><?php echo $no; ?></td>
            <td><?php echo $data['nama'];?></td>
					  <td><?php echo $data['tanggal'];?></td>
					  <td>
					  	<?php
								$id_pasien2=$data['id_pasien'];
								$strHasil2=mysqli_query($koneksi,"SELECT * FROM gejala_pasien,gejala where gejala_pasien.id_pasien='$id_pasien2' AND gejala_pasien.kd_gejala = gejala.kd_gejala order by gejala_pasien.kd_gejala asc");
								
								while($dataHasil2=mysqli_fetch_array($strHasil2)){
								echo "(".$dataHasil2['kd_gejala'].")"." ".$dataHasil2['gejala']."<br>";
								}									
							?>
						</td>

						<td>
							<?php
								$id_pasien=$data['id_pasien'];
								$strHasil=mysqli_query($koneksi,"SELECT * FROM diagnosa,penyakit WHERE diagnosa.id_pasien='$id_pasien' AND diagnosa.kd_penyakit=penyakit.kd_penyakit ORDER BY diagnosa.persentase DESC ");
								
								while($dataHasil=mysqli_fetch_array($strHasil)){
									echo "(".$dataHasil['kd_penyakit'].")"." ".$dataHasil['nama_penyakit']."(".$dataHasil['persentase']."%)<br>";
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
		  
		  

	
 
  
