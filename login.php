<?php
session_start();
if (!empty($_SESSION['username'])) {
    header('location:.');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login Akun</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <label>LOGIN</label>
              <hr>

                <div class="form-group">
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                
                <button class="btn btn-login btn-block btn-primary">LOGIN</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Belum punya akun? <a href="register">Silahkan Register</a>
          </div>

        </div>
      </div>
    </div>

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
              icon: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "proses_login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!'
                  }).then (function() {
                    window.location.href = ".";
                  });

                } else {

                  Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'Masukkan Username dan password yang benar, Silahkan Login Kembali!'
                  });

                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Masukkan Username dan password yang benar, Silahkan Login Kembali!'
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
<!--ini adalah halaman bagian login-->