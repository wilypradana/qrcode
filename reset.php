<?php error_reporting(E_ALL); ini_set('display_errors', '1'); 

$server = "localhost"; $username = "root"; $password = ""; $database = "qrcode"; 
$koneksi = mysqli_connect($server, $username, $password, $database); 
// Return current date from the remote server
date_default_timezone_set('Asia/jakarta');
$date = date('Y-m-d H:i:s');

   
$query = "SELECT * FROM `user`";
$result = mysqli_query($koneksi, $query);
while ($user = mysqli_fetch_assoc($result)) {
  $nipid = $user['nip'];
  $nama = $user['nama'];
  $status = "belum absen";
  $kode = $user['kode'];
  $photo = $user['photo'];

  $queryUpdate = "UPDATE user SET status = 'belum absen', jam = '$date' WHERE nip = '$nipid'";
  mysqli_query($koneksi, $queryUpdate);

  $queryInsert = "INSERT INTO user_history (history_id, nama, nip, status, kode, photo, jam)
                  VALUES ((SELECT id FROM user WHERE nip = '$nipid'), '$nama', '$nipid', '$status', '$kode', '$photo', '$date')";
  mysqli_query($koneksi, $queryInsert);
}

header("Location: detail.php")
?>