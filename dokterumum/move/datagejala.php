 <script type="text/javascript">
 function konfirmasi(kd_gejala){
	var kd_hapus=kd_gejala;
	var url_str;
	url_str="hapusgejala.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?");
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	} 
</script>






<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Gejala</h1>
            <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModalTambahData"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
</div>  

<!-- Tambah Data -------------------------------------------------- -->
		<div class="modal fade" id="myModalTambahData" role="dialog">
							 
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											Tambah Data Gejala
										</div>
										<div class="modal-body">
														<form role="form" action="tambahgejala.php" method="post">
																		
																		<div class="form-group">
																		  <label>Kode Gejala</label>
																		  <input type="text" name="kd_gejala" id="kd_gejala" class="form-control">      
																		</div>
																		<div class="form-group">
																		  <label>Gejala</label>
																		  <input type="text" name="gejala" id="gejala"  class="form-control">      
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
              <h6 class="m-0 font-weight-bold text-primary">Data Gejala Login</h6>
					  
            </div>
			
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				  
				  
                    <tr>
                      <th>No</th>
                      <th>Kode Gejala</th>
                      <th>Gejala</th>                      
					  <th class="text-center">Edit</th>
                      <th class="text-center">Delete</th>
                      
                    </tr>
					
                  </thead>
				 
				  
				  
				  
                  
                  <tbody>
				  <?php
						include "koneksi.php";
							$sql = "SELECT * FROM gejala ORDER BY kd_gejala ASC";
							$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
							$no=0;
							while ($data=mysqli_fetch_array($qry)) {
							$no++;
					?>
				
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kd_gejala'];?></td>
                      <td><?php echo $data['gejala'];?></td>
                      
					  
					  <td align='center'> <a href="#" type="button" class='btn btn-success btn-circle' data-toggle="modal" data-target="#myModal<?php echo $data['kd_gejala']; ?>"><i class='fa fa-edit'></i></a></td>
					  <td align="center"><a href="#" class="btn btn-danger btn-circle"  onclick="return konfirmasi('<?php echo $data['kd_gejala'];?>');"><i class="fas fa-trash"></i></a></td>					  					                       
                    </tr>
                    
                   
					
					<div class="modal fade" id="myModal<?php echo $data['kd_gejala']; ?>" role="dialog">
							 
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											Update Data Gejala
										</div>
										<div class="modal-body">
														<form role="form" action="editgejala.php" method="get">
															<?php
																$kd_gejala = $data['kd_gejala']; 
																
																
																	$query_edit = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kd_gejala='$kd_gejala'");
																	//$result = mysqli_query($conn, $query);
																	while ($row = mysqli_fetch_array($query_edit)) {  
																	?>
																		<input type="text" name="kd_gejala" value="<?php echo $row['kd_gejala']; ?>">
																		<div class="form-group">
																		  <label>Gejala</label>
																		  <input type="text" name="gejala" class="form-control" value="<?php echo $row['gejala']; ?>">      
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
		  
		  

	
 
  
