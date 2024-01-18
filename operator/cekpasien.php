<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Data Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/xyz.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Validasi Pasien</h3>
                </div>
                <div class="panel-body">
                    
                    <?php
                    $sql=mysqli_query($koneksi, "SELECT * FROM analisa_hasil WHERE id_pasien='$_POST[id_pasien]'");
                    $d=mysqli_fetch_array($sql);

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi Admin Terkait untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID Hasil</th>
                            <th>ID Pasien</th>
                            <th>Kode Penyakit</th>
                            <th>Persentase</th>
                            <th>Tanggal</th>
                            
                        </tr>
                        <tr>
                            <td><?php echo $d['id_hasil']; ?></td>
                            <td><?php echo $d['id_pasien']; ?></td>
                            <td><?php echo $d['kd_penyakit']; ?></td>
                            <td><?php echo $d['persentase']; ?></td>
                            <td><?php echo $d['tanggal']; ?></td>
                      
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="haladmin.php?top=home.php">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>