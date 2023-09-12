<?php 
$server = "localhost"; $username = "root"; $password = ""; $database = "qrcode"; 
$koneksi = mysqli_connect($server, $username, $password, $database);

require_once "../php/koneksi.php";
// Return current date from the remote server
date_default_timezone_set('Asia/jakarta');
$date = date('d-m-y h:i:s');


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
function querySudahAbsen($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
      $users[] = $row;
    }
    return $users;
}
function queryBelumAbsen($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
      $users[] = $row;
    }
    return $users;
}
function querySudahAbsenTable($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
      $users[] = $row;
    }
    return $users;
}

?>