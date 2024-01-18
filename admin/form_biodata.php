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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin | Form Biodata Dokter</title> 
  <link rel="icon" href="../img/logo1.png" type="image/png">
<link rel="stylesheet" href="../css/kamerapasien3.css">
<script src="../js/kamerapasien.js"></script>
<script src="../js/kamerapasien2.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
	
	
	
</script>
</head>
<body>
  

<!-- Tambah Data -------------------------------------------------- -->
<div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
							 
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				Tambah Biodata Lengkap
			</div>

			<div class="modal-body">
				<form role="form" action="tambahbiodata.php" method="post">
																		
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" name="lahir" id="lahir"  class="form-control">      
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control">      
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select name="kelamin" id="kelamin" class="form-control">
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Lokasi Praktek</label>
						<input type="text" name="praktek" id="praktek" class="form-control">      
					</div>
										
					<div class="modal-footer">  
						<button type="submit" class="btn bg-primary">Tambah</button>
						<button type="button" class="btn btn-default" onclick="location.href='halaman_admin.php?top=datauser.php'">Skip</button>
					</div>
				</form>	
																		
			</div>
		</div>
	</div>
</div> 

</body>
</html>