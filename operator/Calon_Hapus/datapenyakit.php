 <script type="text/javascript">
 
 
	
 function konfirmasi(kd_penyakit){
	var kd_hapus=kd_penyakit;
	var url_str;
	url_str="hapuspenyakit.php?kdhapus="+kd_hapus;
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








<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Penyakit</h1>
            <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModalTambahData"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
</div> 

<!-- Tambah Data -------------------------------------------------- -->
		<div class="modal fade" id="myModalTambahData" role="dialog">
							 
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											Tambah Data Penyakit
										</div>
										<div class="modal-body">
														<form role="form" action="tambahpenyakit.php" method="post">
																		
																		<div class="form-group">
																		  <label>Kode Penyakit</label>
																		  <input type="text" name="kd_penyakit" id="kd_penyakit" class="form-control">      
																		</div>
																		<div class="form-group">
																		  <label>Penyakit</label>
																		  <input type="text" name="nama_penyakit" id="nama_penyakit"  class="form-control">      
																		</div>
																		<div class="form-group">
																		  <label>Definisi</label>
																		  <textarea name="definisi" id="definisi"  class="form-control">  </textarea>    
																		</div>
																		<div class="form-group">
																		  <label>Solusi</label>
																		  <textarea name="solusi" id="solusi"  class="form-control">   </textarea>    
																		</div>
																		
																		
																		<div class="modal-footer">  
																		  <button type="submit" class="btn btn-success">Update</button>
																		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		</div>
																</form>		
																																									
																		    
														 
										</div>
										
									</div>
									
								</div>
							</div> 

         
        
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penyakit</h6>
					  
            </div>
			
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				  
				  
                    <tr>
                      <th>No</th>
                      <th>Kode Penyakit</th>
                      <th>Penyakit</th>
						<th>Definisi</th>
						<th>Solusi</th>                      
					  <th class="text-center">Edit</th>
                      <th class="text-center">Delete</th>
                      
                    </tr>
					
                  </thead>
				 
				  
				  
				  
                  
                  <tbody>
				  <?php
						include "koneksi.php";
							$sql = "SELECT * FROM penyakit ORDER BY kd_penyakit ASC";
							$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
							$no=0;
							while ($data=mysqli_fetch_array($qry)) {
							$no++;
					?>
				
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kd_penyakit'];?></td>
					  <td><?php echo $data['nama_penyakit'];?></td>
					  <td >
							
							<?php
							echo $data['definisi'];
							?>
							
						
					  <td><?php
							echo $data['solusi'];
							?>
							</td>
                      
					  
					  <td align='center'> <a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['kd_penyakit']; ?>"><i class='fa fa-edit'></i></a></td>
					  <td align="center"><a href="#" class="btn btn-danger btn-circle"  onclick="return konfirmasi('<?php echo $data['kd_penyakit'];?>');"><i class="fas fa-trash"></i></a></td>					  					                       
                    </tr>
                    
                   
					
					<div class="modal fade" id="myModal<?php echo $data['kd_penyakit']; ?>" role="dialog">
							 
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											Update Data Penyakit
										</div>
										<div class="modal-body">
														<form role="form" action="editpenyakit.php" method="get">
															<?php
																$kd_penyakit = $data['kd_penyakit']; 
																
																
																	$query_edit = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kd_penyakit='$kd_penyakit'");
																	//$result = mysqli_query($conn, $query);
																	while ($row = mysqli_fetch_array($query_edit)) {  
																	?>
																		<div class="form-group">
																		  <label>Kode Penyakit</label>
																		  <input type="text" name="kd_penyakit" class="form-control" value="<?php echo $row['kd_penyakit']; ?>">      
																		</div>
																		
																		<div class="form-group">
																		  <label>Penyakit</label>
																		  <input type="text" name="nama_penyakit" class="form-control" value="<?php echo $row['nama_penyakit']; ?>">      
																		</div>												
	
																		<div class="form-group">
																		  <label>Definisi</label>
																		  <textarea name="definisi" class="form-control" value="<?php echo $row['definisi']; ?>">    </textarea>  
																		</div>
																		<div class="form-group">
																		  <label>Solusi</label>
																		  <textarea name="solusi" class="form-control" value="<?php echo $row['solusi']; ?>">    </textarea>  
																		</div>
																		
																		<div class="modal-footer">  
																		  <button type="submit" class="btn btn-success">Update</button>
																		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		</div>
																		<?php   }
																		//mysql_close($host);
																		?> </form>
																																				
																		    
														 
										</div>
										
									</div>
									
								</div>
							</div>
							
							 <?php
								} ?>
                  </tbody>
                </table>
							
				
				
				
																										
              </div>
            </div>
          </div>
		  
		  

	
 
  
