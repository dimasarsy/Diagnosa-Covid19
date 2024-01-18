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
	<title>Dashboard | Data Skrining</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-laptop-medical"></i> Skrining</h1>
</div> 
        
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hasil Skrining Awal Anda</h6>
	</div>
		
  <div class="card-body">
    <div class="table-responsive">
        
			<?php 
				include "koneksi.php";
				$id_author = $_SESSION['iduser'];	
				$sql = "SELECT * FROM pasien where id_pasien='$id_author' ORDER BY id_pasien DESC";
				$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
				$no=0;

				while ($data=mysqli_fetch_array($qry)) {
				$no++;
						
				$id_pasien2=$data['id_pasien'];

				$strHasil2=mysqli_query($koneksi,"SELECT * FROM skrining_pasien,skrining where skrining_pasien.id_pasien='$id_pasien2' AND skrining_pasien.kd_skrining = skrining.kd_skrining order by id_pasien");

										
				while($dataHasil2=mysqli_fetch_array($strHasil2))
				$count    =mysqli_num_rows($strHasil2);

			?>

			<a href="hasil_skrining.php?idcetak=<?php echo $data['id_pasien'];?>" target='_blank' class='btn btn-primary btn-circle'><i class='fas fa-print'></i></a>
			<a href="#" data-toggle="modal" data-target="#keterangan1" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-alt-circle-right"></i> Lanjut Diagnosa</a>

			<!-- ======= Skrining Section ======= -->
			<section id="dokter" class="doctors">
				<div class="container">

					<div class="row">

						<div class="col-lg-12">
							<div class="member d-flex align-items-start">
							              
							  <div class="member-info">
							    <h5>
							    <?php 
										if ($count >= 5) {
											echo "<b>~POTENSI TINGGI~</b><br>";
											echo "Ket. :Anda Sangat Berpotensi Terkena Covid-19<br>";
											echo "Solusi : Segera Lakukan Tes SWAB/PCR";

										} else if ($count >= 3){
											echo "<b>~POTENSI SEDANG~</b><br>";
											echo "Ket. : Anda Memiliki Potensi Terkena Covid-19<br>";
											echo "Solusi : Segera Lakukan Tes SWAB/PCR";
												
										} else if ($count >= 1){
											echo "<b>~POTENSI RENDAH~ </b><br>";
											echo "Ket. : Anda Memiliki Potensi Rendah Terkena Covid-19 <br>";
											echo "Solusi : Istirahat dan Isolasi di Rumah 7 Hari";
																
										} else{
											echo "<b>~TIDAK BERPOTENSI~ </b><br>";
											echo "Ket. : Anda Tidak Berpotensi terkena Covid-19";
											echo "Solusi : Tetap patuhi protokol kesehatan dan Minum Vitamin";
										}
									?>
							    </h5>
							          
							    <span></span>
							    <p>
							      <?php 
							        $id_pasien2=$data['id_pasien'];

											$strHasil2=mysqli_query($koneksi,"SELECT * FROM skrining_pasien,skrining where skrining_pasien.id_pasien='$id_pasien2' AND skrining_pasien.kd_skrining = skrining.kd_skrining order by id_pasien");

							        echo "Data Skrining :";
							        echo "<br>";
							        while($dataHasil2=mysqli_fetch_array($strHasil2))
											{

												echo "(".$dataHasil2['kd_skrining'].")"." ".$dataHasil2['skrining']."<br>";
											}
										

							     	?>
							    </p>
							    <p><?php echo "Jumlah Hasil Skrining : " .$count; ?></p>

							  </div>
							</div>
						</div>
					</div>
				</div>
			</section>
                    
			<?php } ?>
																										
    </div>
  </div>
</div>


		<!-- Keterangan 1 Modal-->
		  <div class="modal fade" id="keterangan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document" >
		      <div class="modal-content">
		        <div class="modal-header" style="color: red;">
		          <b>⚠ Alert !!!</b>
		        </div>
		        <div class="modal-body">Apakah anda sudah melakukan Tes Covid-19 dan Terkonfirmasi Positif Covid-19 ?<br></div>
		        
		        <div class="modal-footer">
		          <button class="btn btn-secondary" type="button" data-dismiss="modal">Belum</button>
		          <a class="btn btn-danger" href="konsultasi_gejala.php">Sudah</a>
		        </div>
		      </div>
		    </div>
		  </div>
		  
		  

	
 
  
