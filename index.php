<!DOCTYPE html>
<html>
<head>
	 <title>Login | Pasien</title>

  <link rel="icon" href="img/logo1.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/sty_pasien.css">
	<script src="dist/sweetalert2.all.min.js"></script>

	<!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body style="background: url(img/bg_pasien.jpg);">
  <div class="bar" id="nav" >
		<ul>
			<li><a href="login_admin.php" style="font-size: 12px;">ADMIN-DOKTER</li>
			<li class="active" ali><a href="index.php">PASIEN</a></li>	
		</ul>
	</div>

  <div class="login-box">
		<img src="img/av1.png" class="avatar">
			<h4 style="text-align:center;">Login Here</h4>
        <hr>
        <p>Username</p>
        <img src="img/email.png" class="icon"><input class="input" type="text" name="username" id="username" placeholder="Masukkan Username">

        <p>Password</p>
        <img src="img/password.png" class="icon"><input class="input" type="Password" id="password" name="password" placeholder="Masukkan Password"><br><br>
         
       	<button class="btn btn-login btn-block btn-primary">LOGIN</button>

          <div class="text-center" style="margin-top: 15px">
            <a href="#" type="button" class="d-none d-sm-inline-block btn btn-sm  shadow-sm" data-toggle="modal" data-target="#myModalTambahData">Belum punya akun? </a>
          </div>

  </div>
  <!-- Tambah Data -------------------------------------------------- -->
		<div class="modal fade" id="myModalTambahData" role="dialog">
							 
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						Tambah Data User
					</div>

					<div class="modal-body">
						<form role="form" action="cek_regist_pasien.php" method="post">

							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" id="username"  class="form-control">      
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" id="password" class="form-control">      
							</div>

							<div class="form-group">
								<label>Level</label>
								<select name="level" id="level" class="form-control">											
									<option value="pasien">Pasien</option>													
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


    <!-- Bootstrap core JavaScript-->
	  <script src="vend/jquery/jquery.min.js"></script>
	  <script src="vend/bootstrap/js/bootstrap.bundle.min.js"></script>

	  <!-- Core plugin JavaScript-->
	  <script src="vend/jquery-easing/jquery.easing.min.js"></script>

	  <!-- Custom scripts for all pages-->
	  <script src="js/spj.js"></script>

	  <!-- SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {

        $(".btn-login").click( function() {
        
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "cek_login_pasien.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 2 Detik',
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "operator/halaman_pasien.php";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'Username/Password Salah, Silahkan coba lagi!'
                  });

                } 

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
    </script>

  </body>
</html>

