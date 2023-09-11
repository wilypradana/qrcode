<?php 

require "../php/koneksi.php";

$kode = strval($_GET["text"]);
$query = query("SELECT * FROM user WHERE kode='$kode'")[0];
// var_dump($query); die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS links -->
    <link href="css/app.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

	
<div class="main">
        <main class="content">
          <div class="container-fluid p-0">
            <div class="mb-3">
              <h1 class="h3 d-inline align-middle">Profile</h1>
              <a
                class="badge bg-dark text-white ms-2"
                href="upgrade-to-pro.html"
              >
                Get more page examples
              </a>
            </div>
            <div class="row">
              <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                  </div>
                  <div class="card-body text-center">
                    <img
                      src="../image/wily.png"
                      alt="Christina Mason"
                      class="img-fluid rounded-circle mb-2"
                      width="128"
                      height="128"
                    />
                    <h5 class="card-title mb-0"><?= $query["nama"] ?></h5>
                    <div class="text-muted mb-2"><?= $query["status"] ?></div>

                    <div>
                      <a class="btn btn-primary btn-sm" href="../php/absen.php?kode=<?= $query["kode"] ?>"
                        ><span data-feather="message-square"></span> Absen</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    <script src="js/app.js"></script>
</body>
</html>