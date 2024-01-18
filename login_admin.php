<!DOCTYPE html>
<html>
<head>
	<title>Login | Admin-Dokter</title>

  <link rel="icon" href="img/logo1.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/sty_admin1.css">
	<script src="dist/sweetalert2.all.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="vend/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body style="background: url(img/bg_admin.jpg);">
	<div class="bar" id="nav">
		<ul>
			<li class="active"><a href="login_admin.php" style="font-size: 12px;">ADMIN-DOKTER</a></li>
			<li><a href="index.php">PASIEN</a></li>
		</ul>
	</div>

	<div class="login-box">
		<img src="img/av2.png" class="avatar">
		<h4 style="text-align:center;">Login Here</h4>
    <hr>
			<p>Email</p>
			<img src="img/email2.png" class="icon"><input class="input" type="text" name="username" id="username" placeholder="Masukkan username">

			<p>Password</p>
			<img src="img/password2.png" class="icon"><input class="input" type="Password" id="password" name="password" placeholder="Masukkan Password"><br><br>

			<button class="btn btn-login-admin btn-block btn-success">LOGIN</button>

		</form>

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

        $(".btn-login-admin").click( function() {
        
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

              url: "cek_login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password,
              },

              success:function(response){

                if (response == "admin") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "admin/halaman_admin.php?top=home.php";
                  });

                } else if (response == "dokter"){

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "dokterumum/halaman_dokter.php?top=home.php";
                  });

                } else if (response == "paru"){

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "dokterumum/halaman_dokter.php?top=home.php";
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