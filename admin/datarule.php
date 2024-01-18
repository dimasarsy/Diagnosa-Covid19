 <script type="text/javascript">
 function konfirmasi(id_rule){
	var kd_hapus=id_rule;
	var url_str;
	url_str="hapusrule.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	} 
</script>


<?php
include "koneksi.php";

?>

<head>
  <title>Admin | Data Rule CBR</title>
</head>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-briefcase-medical"></i> Data Rule Case Based Reasoning (CBR)</h1>
  <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModalTambahData"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
</div>  

<!-- ========================= Tambah Data Rule CBR ================================== -->
	<div class="modal fade" id="myModalTambahData" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Tambah Data Rule
				</div>

				<div class="modal-body">
					<form role="form" action="tambahrule.php" method="post">
						<div class="form-group">
							<label>Kode</label>
							<select name="TxtKdPenyakit" id="TxtKdPenyakit" class="form-control">
								<option value="NULL">[ Daftar Penyakit ]</option>
								<?php 
									$sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
									$qryp = mysqli_query($koneksi,$sqlp) or die ("SQL Error: ".mysqli_error());

									while ($datap=mysqli_fetch_array($qryp)) {
									if ($datap['kd_penyakit']==$kdsakit) {
										$cek ="selected";
									}else {
										$cek ="";
									}
										echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
									}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Gejala</label>
							<select name="TxtKdGejala" id="TxtKdGejala" class="form-control">
								<option value="NULL">[ Daftar Gejala ]</option>
								<?php 
									$sqlp = "SELECT * FROM gejala ORDER BY kd_gejala";
									$qryp = mysqli_query($koneksi,$sqlp) or die ("SQL Error: ".mysqli_error());

									while ($datap=mysqli_fetch_array($qryp)) {
									if ($datap['kd_gejala']==$kdsakit) 
									{
										$cek ="selected";
									}else {
										$cek ="";
									} echo "<option value='$datap[kd_gejala]' $cek>$datap[kd_gejala]&nbsp;|&nbsp;$datap[gejala]</option>";
									
									}
								?>
							</select>
						</div>

						<div class="form-group">
						  <label>Bobot</label>
						  <select name="txtbobot" id="txtbobot" class="form-control">
								<option value="NULL">[ Bobot Penyakit ]</option	>
								<option value="0.33">0.33 | Mungkin</option>
								<option value="0.5">0.5 | Kemungkinan Besar</option>
								<option value="0.8">0.8 | Hampir Pasti</option>
								<option value="1">1.0 | Pasti</option>
							</select>
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Tambah</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div> 

<!-- ========================= Tabel Data Rule CBR ================================== -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Rule CBR</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Gejala</th>
							<th>Penyakit</th>
						</tr>
							<?php
								$query=mysqli_query($koneksi,"SELECT rule.kd_gejala,rule.kd_penyakit,penyakit.kd_penyakit,penyakit.nama_penyakit AS penyakit FROM rule,penyakit WHERE penyakit.kd_penyakit=rule.kd_penyakit GROUP BY rule.kd_penyakit")or die(mysqli_error());
								$no=0;
								while($row=mysqli_fetch_array($query)){
								$idpenyakit=$row['kd_penyakit'];
								$no++;
							?>
					</thead>

					<tbody>
						<tr>
							<td><?php echo $no; ?></td>
              <td>
						  <?php
								$query2=mysqli_query($koneksi,"SELECT rule.id_rule,rule.kd_gejala,rule.bobot,rule.kd_penyakit,gejala.gejala AS namagejala FROM rule,gejala WHERE rule.kd_penyakit='$idpenyakit' AND gejala.kd_gejala=rule.kd_gejala")or die(mysqli_error());
								while ($row2=mysqli_fetch_array($query2)){
									$kd_gej=$row2['kd_gejala'];
									$kd_pen=$row2['kd_penyakit'];
									echo "<table>";
									echo "<tr >";
									echo "<td width='50'>$row2[kd_gejala]</td>";
									echo "<td width='300'>$row2[namagejala]</td>";
									echo "<td width='50'>$row2[bobot]</td>";							//
									echo "<td><a href='#' class='btn btn-danger btn-circle' onclick='return konfirmasi($row2[id_rule])'><i class='fas fa-trash'></i></a></td>";
									echo "</tr>";
									echo "</table>";	
								}
							?>				  
					  	</td>
              <td>
              	<?php echo $row['kd_penyakit'];?>
						  	&nbsp;|&nbsp;<strong>
						  	<?php echo $row['penyakit'];?>
						  </td>
            </tr> 
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

		  
		  

	
 
  
