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
  <title>Dokter | Pasien Diagnosa</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-stethoscope"></i> Pasien Diagnosa</h1>       
</div> 
        
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hasil Diagnosa Pasien</h6>
	</div>
			
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
				  <tr>
						<th>No</th> 						
				    <th>Nama</th>
				    <th>Usia</th>
				    <th>No.Telp</th>
				    <th>E-mail</th>
						<th>Diagnosa Covid</th>
						<th>Keluhan</th>
						<th class="text-center">Scan</th>
					</tr>
				</thead>
				  
        <tbody>
				  <?php 
					  include "koneksi.php";
						$id_aut_dokl = $_SESSION['iduser'];	
						$sql = "SELECT * FROM pasien,diagnosa where diagnosa.id_pasien = pasien.id_pasien AND diagnosa.iduser='$id_aut_dokl' group by diagnosa.id_pasien desc";
						$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
						$no=0;
						while ($data=mysqli_fetch_array($qry)) {
						$no++;
					 ?>
					 
          <tr>        
						<td><?php echo $no; ?></td>					  
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['umur'];?></td>
            <td><?php echo $data['no_telp'];?></td>
            <td><?php echo $data['email'];?></td>
					  <td>
					  	<?php
							$id_pasien=$data['id_pasien'];
							$id_aut_dok2 = $_SESSION['iduser'];	
							$strHasil=mysqli_query($koneksi,"SELECT * FROM diagnosa,penyakit WHERE diagnosa.iduser='$id_aut_dok2' AND diagnosa.id_pasien='$id_pasien' AND diagnosa.kd_penyakit=penyakit.kd_penyakit ORDER BY diagnosa.iduser DESC ");
							
							while($dataHasil=mysqli_fetch_array($strHasil)){
								echo "(".$dataHasil['kd_penyakit'].")"." ".$dataHasil['nama_penyakit']."(".$dataHasil['persentase']."%)<br>";
								
								
								}									
							?>
						</td>
						<td>
							<?php
								include "koneksi.php";
								$id_cet_pasien3 = $data['id_pasien'];
								$sql3=mysqli_query($koneksi,"SELECT * FROM diagnosa,user where diagnosa.id_pasien='$id_cet_pasien3' and diagnosa.iduser = user.iduser");
								$query_rujukan = mysqli_fetch_array($sql3);
								echo $query_rujukan['keluhan'];
							?>	
						</td>

					  <td align='center'> 
					  	<a href="scanpasien.php" type="button" class='btn btn-primary btn-circle'><i class="fas fa-qrcode"></i></a>
					  </td>

					  <?php } ?>
					  				  					                       
          </tr> 
          <caption><b>Note : </b>Untuk data yang lebih lengkap, Silahkan Scan QR pada form Pasien</caption>

				</tbody>
      </table>
		</div>
  </div>
</div>