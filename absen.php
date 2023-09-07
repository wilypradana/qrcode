<?php error_reporting(E_ALL); ini_set('display_errors', '1'); 

$nipid = $_GET["nip"];
$server = "localhost"; $username = "root"; $password = ""; $database = "qrcode"; 
$koneksi = mysqli_connect($server, $username, $password, $database); 
// Return current date from the remote server
date_default_timezone_set('Asia/jakarta');
$date = date('Y-m-d H:i:s');
 

$query = "SELECT * FROM user WHERE nip = $nipid";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);
$nama = $user['nama'];
$nip = $user['nip'];
$status = "sudah absen";
$kode = $user['kode'];
$photo = $user['photo'];

$queryUpdate = "UPDATE user SET
  status = 'sudah absen',
  jam = '$date'
WHERE nip = $nipid";




   $queryInsert = "INSERT INTO user_history (history_id,nama,nip,status,kode,photo,jam)
   VALUES ((SELECT id FROM user WHERE nip=$nipid),'$nama','$nip','$status','$kode','$photo','$date')
   ";
mysqli_query($koneksi, $queryUpdate);
mysqli_query($koneksi, $queryInsert);

header("Location: detail.php?text=$nipid")
?>