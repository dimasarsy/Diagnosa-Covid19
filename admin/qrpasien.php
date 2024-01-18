




<div class="modal fade" id="modalKamera"  role="dialog" aria-hidden = "true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
		<h5 class="modal-title" style="margin: 0 auto;" id="exampleModalLongTitle">Arahkan QR Pasien Ke Kamera </h5>               
      </div>
      <div class="modal-body" style="margin: 0 auto;">	

						<canvas> </canvas>
						<select></select>
							
		</div>

    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.href='halaman_admin.php?top=home.php'">Keluar</button>        
      </div>
    </div>
  </div>
</div>








<!-- Js Lib -->
<script type="text/javascript" src="../js/jquery.js"></script>
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

<script>
	$(document).ready(function(){
		$("#modalKamera").modal('show');
	});
</script>