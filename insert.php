<?php 
error_reporting(E_ALL); ini_set('display_errors', '1'); 

// // Return current date from the remote server
// date_default_timezone_set('Asia/jakarta');
// $date = date('d-m-y h:i:s');
// echo $date;

$server = "localhost"; $username = "root"; $password = ""; $database = "qrcode"; 
$koneksi = mysqli_connect($server, $username, $password, $database); 
// query menggunakan kolom 'kode' bukan 'kodeid'
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
      $users[] = $row;
    }
    return $users;
}

?>