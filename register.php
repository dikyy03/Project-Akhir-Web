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

    <title>Register Akun</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <label>REGISTER</label>
              <hr>
                
                <div class="form-group">
                  <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                  <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="nomor_telepon" placeholder="Masukkan Nomor Telepon">
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                
                <button class="btn btn-register btn-block btn-primary">REGISTER</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Sudah punya akun? <a href="login">Silahkan Login</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {

        $(".btn-register").click( function() {
        
          var nama_lengkap = $("#nama_lengkap").val();
          var username = $("#username").val();
          var email = $("#email").val();
          var alamat = $("#alamat").val();
          var nomor_telepon = $("#nomor_telepon").val();
          var password = $("#password").val();

          if (nama_lengkap.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });

          } else if(username.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(email.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Email Wajib Diisi !'
            });

          } else if(alamat.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Alamat Wajib Diisi !'
            });

          } else if(nomor_telepon.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Nomor Telepon Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            //ajax
            $.ajax({

              url: "proses_register.php",
              type: "POST",
              data: {
                  "nama_lengkap": nama_lengkap,
                  "username": username,
                  "email": email,
                  "alamat": alamat,
                  "nomor_telepon": nomor_telepon,
                  "password": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Register Berhasil!',
                  }).then(function() {
                    window.location = ".";  
                  });

                  $("#nama_lengkap").val('');
                  $("#username").val('');
                  $("#email").val('');
                  $("#alamat").val('');
                  $("#nomor_telepon").val('');
                  $("#password").val('');

                } else {

                  Swal.fire({
                    icon: 'error',
                    title: 'Register Gagal!',
                    text: 'Silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Server error,Coba Periksa Kembali!'
                  });
              }

            })

          }

        }); 

      });
    </script>

  </body>
</html>
