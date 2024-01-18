<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Scan QR Pasien</title>
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
<div class="modal fade " id="myModal"  role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header bg-primary">
		<h4 class="modal-title text-center">Arahkan QR Pasien Ke Kamera </h5>               
      </div>
      <div class="modal-body text-center">	

						<canvas> </canvas>
						
						
						
							
		</div>

    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.href='halaman_dokter.php?top=datadiagnosa.php'">Keluar</button>        
      </div>
    </div>
  </div>
</div>
</body>
</html>






<script type="text/javascript" src="../js/qrcodelib.js"></script>
<script type="text/javascript" src="../js/webcodecamjquery.js"></script>
<script type="text/javascript" src="../js/DecoderWorker.js"></script>
<script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            //$('.hasilscan').append($('<input name="id_pasien" value=' + result.code + ' readonly><input type="submit" value="CekPasien"/>'));
           // $.post("../cekpasien.php", { id_pasien: result.code} );
            var redirect = 'cekpasien.php';
            $.redirectPost(redirect, {id_pasien: result.code});
        }
    };
    
    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function(){
        decoder.stop().play();
    });

    // jquery extend function
    $.extend(
    {
        redirectPost: function(location, args)
        {
            var form = '';
            $.each( args, function( key, value ) {
                form += '<input type="hidden" name="'+key+'" value="'+value+'">';
            });
            $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
        }
    });

</script>
