<?php
    include('config.php');
     $query1 = 'select * from dsa_pertahun';
     $result1 = mysqli_query($conn, $query1);
     if(!$result1){
         die('Could not get data'. mysqli_error());
     }

     $query2 = 'select * from dsa_perbulan';
     $result2 = mysqli_query($conn, $query2);
     if(!$result2){
         die('Could not get data'. mysqli_error());
     }
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WEB RKAT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Web</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="rkat.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pengajuan RKAT</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>List Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="iku.php">Daftar IKU</a>
                        <a class="collapse-item" href="kegiatan.php">Daftar Kegiatan</a>
                        <a class="collapse-item" href="mak.php">Daftar MAK</a>
                        <a class="collapse-item" href="sbu.php">Daftar SBU</a>
                        <a class="collapse-item" href="spj.php">Daftar SPJ</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel DSA per tahun</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Pagu Anggaran</th>
                                            <th>Realisasi Anggaran</th>
                                            <th>Realisasi Anggaran(%)</th>
                                            <th>Sisa Anggaran</th>
                                            <th>Sisa Anggaran(%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                                            echo "
                                            <tr>
                                                <td>{$row['tahun']}</td>
                                                <td>Rp.{$row['anggaran_awal']},00</td>
                                                <td>Rp.{$row['realisasi_anggaran']},00</td>
                                                <td>{$row['realisasipersen']}%</td>
                                                <td>Rp.{$row['sisa_anggaran']},00</td>
                                                <td>{$row['sisaanggaranpersen']}%</td>
                                            </tr>
                                            "; 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel DSA per bulan</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">Tahun</th>
                                            <th class="th-sm">Pagu Anggaran</th>
                                            <th class="th-sm">Jan</th>
                                            <th class="th-sm">Feb</th>
                                            <th class="th-sm">Mar</th>
                                            <th class="th-sm">Apr</th>
                                            <th class="th-sm">May</th>
                                            <th class="th-sm">Jun</th>
                                            <th class="th-sm">Jul</th>
                                            <th class="th-sm">Aug</th>
                                            <th class="th-sm">Sep</th>
                                            <th class="th-sm">Oct</th>
                                            <th class="th-sm">Nov</th>
                                            <th class="th-sm">Dec</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)):
                                        ?>
                                            <tr>
                                                <td><?= $row['tahun_rkat']?></td>
                                                <td><?= $row['pagu_awal']?></td>
                                                <td><?php if($row['jan'])echo $row['jan']; else echo 0?>%</td>
                                                <td><?php if($row['feb'])echo $row['feb']; else echo 0?>%</td>
                                                <td><?php if($row['mar'])echo $row['mar']; else echo 0?>%</td>
                                                <td><?php if($row['apr'])echo $row['apr']; else echo 0?>%</td>
                                                <td><?php if($row['may'])echo $row['may']; else echo 0?>%</td>
                                                <td><?php if($row['jun'])echo $row['jun']; else echo 0?>%</td>
                                                <td><?php if($row['jul'])echo $row['jul']; else echo 0?>%</td>
                                                <td><?php if($row['aug'])echo $row['aug']; else echo 0?>%</td>
                                                <td><?php if($row['sep'])echo $row['sep']; else echo 0?>%</td>
                                                <td><?php if($row['oct'])echo $row['oct']; else echo 0?>%</td>
                                                <td><?php if($row['nov'])echo $row['nov']; else echo 0?>%</td>
                                                <td><?php if($row['des'])echo $row['des']; else echo 0?>%</td>
                                            </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="js/script.js"></script>

</body>

</html>