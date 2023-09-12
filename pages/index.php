<?php
 
 session_start();
require "../php/query.php";
if (  !$_SESSION["login"] ) {
   header("Location: ../");
}

$queryJumlahGuru = query("SELECT COUNT(*) FROM user")[0]["COUNT(*)"];

$queryJumlahGuruSudahAbsen = querySudahAbsen("SELECT COUNT(*) 
FROM user 
WHERE status='sudah absen'")[0]["COUNT(*)"];
$queryJumlahGuruSudahAbsenTable = querySudahAbsenTable("SELECT * 
FROM user 
WHERE status='sudah absen'");

$queryJumlahGuruBelumAbsen = queryBelumAbsen("SELECT COUNT(*) 
FROM user 
WHERE status='belum absen'")[0]["COUNT(*)"];

if ( isset($_POST["filter"]) ) {
   $dari_tanggal = $_POST["dari_tgl"];
   $sampai_tanggal = $_POST["sampai_tgl"];
   $filter = mysqli_query($koneksi, "SELECT * FROM user_history WHERE left(jam, 10) BETWEEN '$dari_tanggal' and '$sampai_tanggal'");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5"
    />
    <meta name="author" content="AdminKit" />
    <meta
      name="keywords"
      content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin Absen</title>

    <link href="css/app.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
          <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
          </a>

          <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item active">
              <a class="sidebar-link" href="index.html">
                <i class="align-middle" data-feather="sliders"></i>
                <span class="align-middle">Dashboard</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="pages-profile.html">
                <i class="align-middle" data-feather="user"></i>
                <span class="align-middle">Profile</span>
              </a>
            </li>
        </div>
      </nav>

      <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="../image/wily.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Admin</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../php/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        <main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

            <div class="row">
              <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                  
                  <div class="row">
                    <div class="col-sm-6">
                    
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                          
                            <div class="col mt-0">
                              <h5 class="card-title">Total guru</h5>
                            </div>
                            <div class="col-auto">
                              <div class="stat text-primary">
                                <i
                                  class="align-middle"
                                  data-feather="users"
                                ></i>
                              </div>
                            </div>
                          </div>
                          <h1 class="mt-1 mb-3"><?= $queryJumlahGuru ?></h1>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col mt-0">
                              <h5 class="card-title">Belum Absen</h5>
                            </div>

                            <div class="col-auto">
                              <div class="stat text-primary">
                                <i
                                  class="align-middle"
                                  data-feather="users"
                                ></i>
                              </div>
                            </div>
                          </div>
                          <h1 class="mt-1 mb-3"><?= $queryJumlahGuruBelumAbsen ?></h1>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col mt-0">
                              <h5 class="card-title">Sudah Absen</h5>
                            </div>

                            <div class="col-auto">
                              <div class="stat text-primary">
								<i
								class="align-middle"
								data-feather="users"
							  ></i>
                              </div>
                            </div>
                          </div>
                          <h1 class="mt-1 mb-3"><?= $queryJumlahGuruSudahAbsen ?></h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            <div class="row">
              <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Terakhir absen</h5>
                  </div>
                  <table class="table table-hover my-0">
                    <thead>
                      <tr>
                        <th>nama</th>
                        <th class="d-none d-xl-table-cell">jam absen</th>
                        <th class="d-none d-xl-table-cell">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($queryJumlahGuruSudahAbsenTable as $table) : ?>
                      <tr>
                        <td><?= $table["nama"] ?></td>
                        <td class="d-none d-xl-table-cell"><?= $table["jam"] ?></td>
                        <td><span class="badge bg-success"><?= $table["status"] ?></span></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <form action="" method="post">
            <table>
              <tr>
                <td>Dari Tanggal</td>
                <td><input type="date" name="dari_tgl" required></td>
                <td>Sampai Tanggal</td>
                <td><input type="date" name="sampai_tgl" required></td>
                <td><button type="submit" name="filter"> filter</button></td>
              </tr>
            </table>
            </form>
            <!-- filter absen -->
            <div class="row">
              <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Filter absen</h5>
                  </div>
                  <table class="table table-hover my-0">
                    <thead>
                      <tr>
                        <th>nama</th>
                        <th class="d-none d-xl-table-cell">jam absen</th>
                        <th class="d-none d-xl-table-cell">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($filter as $filteras) : ?>
                      <tr>
                        <td><?= $filteras["nama"] ?></td>
                        <td class="d-xl-filter-cell"><?= $filteras["jam"] ?></td>
                        <?php if ($filteras["status"] === "sudah absen") : ?>
                        <td><span class="badge bg-success"><?= $filteras["status"] ?></span></td>
                        <?php endif; ?>
                        <?php if ($filteras["status"] === "belum absen") : ?>
                        <td><span class="badge bg-danger"><?= $filteras["status"] ?></span></td>
                        <?php endif; ?>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- end filter absen -->
          </div>
        </main>
      </div>
    </div>
<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a  href="../reset.php" class="btn btn-warning">Reset data</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
    <script src="../pages/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
