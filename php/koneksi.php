<?php 
$server = "localhost"; $username = "root"; $password = ""; $database = "qrcode"; 
$koneksi = mysqli_connect($server, $username, $password, $database); 


function registrasi($data) {
    global $koneksi;

   $username =   strtolower(stripslashes($data["name"])); 
   $password = mysqli_escape_string($koneksi, $data["password"]);
   $password2 = mysqli_escape_string($koneksi, $data["password2"]);


    $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE username = '$username'");
    
   if ( mysqli_fetch_assoc($result) ) {
      echo "username telah digunakan";
      exit;
   }

   if (  $password !== $password2 ) {
      echo "
      <script>
            alert('Password tidak sesuai')
      </script>
      ";
      return false;
   }


   $password = password_hash($password, PASSWORD_DEFAULT);

   mysqli_query($koneksi, "INSERT INTO  admin (username, password) VALUES ('$username', '$password')");

   return mysqli_affected_rows($koneksi);
}


?>