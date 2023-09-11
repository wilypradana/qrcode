<?php
 error_reporting(E_ALL); ini_set('display_errors', '1'); 
require "../php/koneksi.php";


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
									<button class="btn btn-warning">Reset data</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
    <script src="js/app.js"></script>
  </body>
</html>
