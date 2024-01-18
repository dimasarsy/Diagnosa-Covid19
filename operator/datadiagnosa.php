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
	<title>Dashboard | Data Diagnosa</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-diagnoses"></i> Diagnosa</h1>
</div> 
        
<div class="card shadow mb-4">
  	<div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Hasil Diagnosa Anda</h6>
		</div>
		
    <div class="card-body">
      <div class="table-responsive">

				<?php 
					include "koneksi.php";
					$id_author = $_SESSION['iduser'];

					$sql = "SELECT * FROM pasien  where id_pasien='$id_author' order by id_pasien DESC";
					$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
					$no=0;
					while ($data=mysqli_fetch_array($qry)) {
					$no++;
				?>

				
				<a href="cetak_pasien.php?idcetak=<?php echo $data['id_pasien'];?>" target='_blank' class='btn btn-primary btn-circle'>
					<i class='fas fa-print'></i>
				</a>
				<a href="#" type="button" class='btn' data-toggle="modal" data-target="#note">
         		<i class="far fa-clipboard"></i>
         </a>
				

				<!-- ======= Diagnosa Section ======= -->
				<section class="doctors">
					<div class="container">

						<div class="row">
							<div class="col-lg-12">
								<div class="member d-flex align-items-start">
								              
								  <div class="member-info">
								    <h5>

								      <?php 

												$id_pasien=$data['id_pasien'];
												$strHasil=mysqli_query
												(
													$koneksi,"SELECT * FROM diagnosa,penyakit WHERE diagnosa.id_pasien='$id_pasien' AND diagnosa.kd_penyakit=penyakit.kd_penyakit ORDER BY diagnosa.persentase DESC "
												);

												while($dataHasil=mysqli_fetch_array($strHasil)){
													echo "<b>(".$dataHasil['kd_penyakit'].")"." ".$dataHasil['nama_penyakit']."</b><p>(".$dataHasil['persentase']."%)</p>";
												}

											?>
								    </h5>
								          
								    <span></span>
								    
								    <p>
								      <?php
												$id_pasien2=$data['id_pasien'];

												$strHasil2=mysqli_query($koneksi,"SELECT * FROM gejala_pasien,gejala where gejala_pasien.id_pasien='$id_pasien2' AND gejala_pasien.kd_gejala = gejala.kd_gejala order by id_pasien");
												echo "Gejala yang dialami :";
												echo "<br>";
												while($dataHasil2=mysqli_fetch_array($strHasil2)){			
													echo "(".$dataHasil2['kd_gejala'].")"." ".$dataHasil2['gejala']."<br>";
												}	

											?>
								    </p>          
								                
								  </div>
								</div>

							</div>
						</div><br><br>
					</div>
				</section>
                    
				<?php } ?>

     	</div>
    </div>

	</div>

	<!-- Modal Note -->
  <div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header" style="color: #760d12;">
          <b>📖 Note :</b>
        </div>
        <div class="modal-body">
        	✥ Dokter Rujukan akan menghubungi anda secepatnya sesuai data diri yang anda masukkan<br>
        	✥ Silahkan kunjungi pusat pelayanan kesehatan sesuai rekomendasi dokter rujukan<br>
        	✥ Jangan lupa, Print dan Bawa surat keterangan Hasil Diagnosa pada halaman ini. 
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
		  
		  

	
 
  
