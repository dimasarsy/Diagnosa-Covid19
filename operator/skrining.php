<?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location:../index.php?pesan=gagal");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Diagnosa | Form Skrining Awal</title>
  <link rel="icon" href="../img/logo1.png" type="image/png">
	<link rel="stylesheet" href="../css/kamerapasien3.css">
<script src="../js/kamerapasien.js"></script>
<script src="../js/kamerapasien2.js"></script>
<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});	
</script>

<script type="text/javascript">
$(document).ready(function()
		{
			$("form").submit(function()
			{
				if (!isCheckedById("skrining"))
				{
					alert ("Anda Belum Memilih Skrining awal Apapun\nSilahkan Pilih Terlebih Dahulu..!");
					return false;
				}else{				
					return true; //submit the form
					}				
			});
			function isCheckedById(id)
			{
				var checked = $("input[@id="+id+"]:checked").length;
				if (checked == 0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			// pilih bobot
			function isCheckedById2(id)
			{
				var checked = $("option[@id="+id+"]:checked").length;
				if (checked =="")
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			//--
		});
</script>




</head>
<body>
				
  

<!-- Tambah Data -------------------------------------------------- -->
		<div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
							 
								<div class="modal-dialog" style="width:950px;">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											Form Skrining Awal : Silahkan Centang yang Anda Alami

										</div>
										<div class="modal-body">
											<form  method="post" name="form" target="_self" action="konsultasi_skrining.php">
												<table width="1000"  border="0" align="center" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF">
															
													<tr>
														<td colspan="5">&nbsp;</td>
													</tr>
													
													<tr>
														<td width="504" >  
															<?php
																include "koneksi.php";
																$query=mysqli_query($koneksi,"SELECT * FROM skrining order by kd_skrining asc") or die("Query Error..!" .mysqli_error);
																while ($row=mysqli_fetch_array($query)){
															?>
															<li><input type="checkbox" name="skrining[]" id="skrining" value="<?php echo $row['kd_skrining'];?>">&ensp;<?php echo "[".$row['kd_skrining']."] ".$row['skrining'];?></li><br>
															<?php } ?>&nbsp;
														</td> 
													</tr>
															
													<tr>  
														<td width="504" align="right" bgcolor="#FFFFFF"></td>
													</tr>
												</table>
														
												<div class="modal-footer">  
																			
													<input type="submit" name="Submit" value="Proses Skrining" class="btn bg-primary">
													<input type="reset" value="Reset" class="btn btn-default">
													<button type="button" class="btn btn-default" onclick="location.href='konsultasi_form.php'">Batal</button>
												
												</div>
											</form>	
	 
										</div>
										
									</div>
									
								</div>
							</div> 





</body>
</html>






