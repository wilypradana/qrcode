<?php 
error_reporting(E_ALL); ini_set('display_errors', '1'); 
require "insert.php";
// Decode dan simpan gambar


// Redirect ke halaman detail.php sambil kirim URL gambar
$nip = strval($_GET["text"]);
$query = query("SELECT * FROM user WHERE nip='$nip'")[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center">
             
             <div class="card">

              <div class="upper">

                <img src="https://i.imgur.com/Qtrsrk5.jpg" class="img-fluid">
                
              </div>

              <div class="user text-center">

                <div class="profile">

                  <img src="./image/<?= $query["photo"] ?>" class="mt-5" width="80">
                  
                </div>

              </div>


              <div class="mt-1  text-center">

                <h4 class="mb-3 mt-3"><?= $query["nama"] ?></h4>
             

                <a href="absen.php?nip=<?= $query["nip"] ?>" class="btn btn-primary btn-sm follow">Absen</a>


                <div class="d-flex justify-content-between align-items-center mt-4 px-4">

                  <div class="stats">
                    <h6 class="mb-0">nip</h6>
                    <span><?= $query["kode"] ?></span>

                  </div>




                  <div class="stats">
                    <h6 class="mb-0">status</h6>
                    <span><?= $query["status"] ?></span>

                  </div>
                  
                </div>
                
              </div>
               
             </div>

           </div>
</body>
</html>