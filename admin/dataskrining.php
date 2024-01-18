 <script type="text/javascript">
 
 
	
 function konfirmasi(kd_skrining){
	var kd_hapus=kd_skrining;
	var url_str;
	url_str="hapusskrining.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	} 
	
$(document).ready(function(){
	var maxLength = 50;
	$(".show-read-more").each(function(){
		var myStr = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		}
	});
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
	});
});

</script>

<head>
  <title>Admin | Data Skrining</title>
</head>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-laptop-medical"></i> Data Skrining Awal</h1>
  <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModalTambahData"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
</div> 

<!-- ========================= Tambah Data Skrining ================================== -->
<div class="modal fade" id="myModalTambahData" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Tambah Data Skrining
			</div>

			<div class="modal-body">
				<form role="form" action="tambahskrining.php" method="post">
					<div class="form-group">
						<label>Kode Skrining</label>
						<input type="text" name="kd_skrining" id="kd_skrining" class="form-control">      
					</div>
																		
					<div class="form-group">
						<label>Nama Skrining</label>
						<input type="text" name="skrining" id="skrining"  class="form-control">      
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
<!--END of Tambah Data  -->
        
<!-- ========================= Tabel Data Skrining ================================== -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Skrining Awal</h6>
	</div>
			
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Skrining</th>

						<th class="text-center">Ubah</th>
            <th class="text-center">Hapus</th> 
          </tr>
				</thead>

				<tbody>

					<?php
						include "koneksi.php";
						$sql = "SELECT * FROM skrining ORDER BY kd_skrining ASC";
						$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
						$no=0;
						while ($data=mysqli_fetch_array($qry)) {
						$no++;
					?>

          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kd_skrining'];?></td>
					  <td><?php echo $data['skrining'];?></td>   
					  
						<td align='center'> 
							<a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['kd_skrining']; ?>"><i class='fa fa-edit'></i></a>
						</td>
						<td align="center">
							<a href="#" class="btn btn-danger btn-circle"  onclick="return konfirmasi('<?php echo $data['kd_skrining'];?>');"><i class="fas fa-trash"></i></a>
						</td>					  					                       
		      </tr>
          <!-- End of Tabel Data -->          
                   
					<!-- ========================= Edit Data Skrining ================================== -->
					<div class="modal fade" id="myModal<?php echo $data['kd_skrining']; ?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									Update Data Penyakit
								</div>

								<div class="modal-body">
									<form role="form" action="editskrining.php" method="get">
										<?php
											$kd_skrining = $data['kd_skrining']; 
											$query_edit = mysqli_query($koneksi, "SELECT * FROM skrining WHERE kd_skrining='$kd_skrining'");
																	
											while ($row = mysqli_fetch_array($query_edit)) {  
										?>
										<div class="form-group">
											<label>Kode Skrining</label>
											<input type="text" name="kd_skrining" class="form-control" value="<?php echo $row['kd_skrining']; ?>">      
										</div>
																		
										<div class="form-group">
											<label>Nama Skrining</label>
											<input type="text" name="skrining" class="form-control" value="<?php echo $row['skrining']; ?>">      
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
      <!-- End of Form Edit Data --> 
    </div>
  </div>
</div>
		  
		  

	
 
  
