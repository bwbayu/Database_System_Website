<?php
    include('config.php');
    // tabel pengajuan rkat
    $query_iku = "SELECT iku.nama_iku as namaIku FROM iku, pengajuan WHERE id_rkat is null && pengajuan.kode_iku=iku.kode_iku;";
    $result_iku = mysqli_query($conn, $query_iku);
    $query_kegiatan = "SELECT kegiatan.nama_kegiatan as namaKegiatan FROM kegiatan, pengajuan WHERE id_rkat is null && pengajuan.kode_kegiatan=kegiatan.kode_kegiatan;";
    $result_kegiatan = mysqli_query($conn, $query_kegiatan);
    $query_mak = "SELECT mak.nama_mak as namaMak FROM mak, pengajuan WHERE id_rkat is null && pengajuan.kode_mak=mak.kode_mak;";
    $result_mak = mysqli_query($conn, $query_mak);
    $query_sbu = "SELECT sbu.nama_sbu as namaSbu FROM sbu, pengajuan WHERE id_rkat is null && pengajuan.kode_sbu=sbu.kode_sbu;";
    $result_sbu = mysqli_query($conn, $query_sbu);
    $query_total = "SELECT anggaran FROM pengajuan WHERE id_rkat is null;";
    $result_total = mysqli_query($conn, $query_total);
    // total anggaran
    $query_footer = "SELECT SUM(anggaran) as total_anggaran FROM pengajuan WHERE id_rkat is null;";
    $result_footer = mysqli_query($conn, $query_footer);
?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Pengajuan RKAT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- template table -->
    <style>
        #main-label {
            font-weight: bold;
        }

        #alamat-group {
            margin-bottom: 10px;
        }
    </style>
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
                <!-- form -->
                <div class="container">
                    <h2 class="text-center">Form pengajuan RKAT</h2>
                    <form action="form_rkat.php" method="post">
                    <div class="form-group row" id="alamat-group">
					    <label class="col col-form-label" id="main-label">IKU</label>
					    <div class="col-sm-10">
                            <select id="iku" name="iku">
                            </select>
					    </div>
				    </div>

                    <div class="mb-3">
                        <div class="form-group row" id="alamat-group">
                            <label class="col col-form-label" id="main-label">Kegiatan</label>
                            <div class="col-sm-10">
                                <select id="kegiatan" name="kegiatan">
                                <option>--Pilih Kegiatan--</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="alamat-group">
                            <label class="col col-form-label" id="main-label">MAK</label>
                            <div class="col-sm-10">
                                <select id="mak" name="mak">
                                <option>--Pilih MAK--</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="alamat-group">
                            <label class="col col-form-label" id="main-label">SBU</label>
                            <div class="col-sm-10">
                                <select id="sbu" name="sbu">
                                <option>--Pilih SBU--</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="alamat-group">
                            <label class="col col-form-label" id="main-label">Nominal</label>
                            <div class="col-sm-10" id="nominal">
                            </div>
                        </div>

                        <div class="form-group row" id="alamat-group">
                            <label class="col col-form-label" id="main-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input id="jumlah" type="number" name="jumlah">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="new">Submit</button>
                        <button type="cancel" class="btn btn-primary" id="new">Cancel</button>
                    </form>
                </div>
                <!-- end of form -->
                <!-- table -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Pengajuan RKAT</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="pengajuan_rkat.php" method="POST">
                            <div class="row">
                                <label for="tanggal_pengajuan" class="ml-2">Tanggal Pengajuan RKAT</label>
                            </div>
                            <input type="date" class="mb-4" id="tgl_pengajuan" name="tgl_pengajuan" required>
                            <div class="table-responsive">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm text-center"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">No</th>
                                            <th class="th-sm">IKU</th>
                                            <th class="th-sm">Kegiatan</th>
                                            <th class="th-sm">MAK</th>
                                            <th class="th-sm">SBU</th>
                                            <th class="th-sm">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php
                                                $no=1;
                                                while($row = mysqli_fetch_array($result_iku, MYSQLI_ASSOC)){
                                                    echo "<tr>
                                                        <td>{$no}</td>
                                                        <td>{$row['namaIku']}</td>";
                                                    $row1 = mysqli_fetch_array($result_kegiatan, MYSQLI_ASSOC);
                                                    echo "
                                                        <td>{$row1['namaKegiatan']}</td>";
                                                    $row2 = mysqli_fetch_array($result_mak, MYSQLI_ASSOC);
                                                    echo "
                                                        <td>{$row2['namaMak']}</td>";
                                                    $row3 = mysqli_fetch_array($result_sbu, MYSQLI_ASSOC);
                                                    echo "
                                                        <td>{$row3['namaSbu']}</td>";
                                                    $row4 = mysqli_fetch_array($result_total, MYSQLI_ASSOC);
                                                    echo "
                                                        <td>Rp.{$row4['anggaran']},00</td></tr>";    
                                                    $no++;    
                                                }
                                            ?>
                                            
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">Total </td>
                                            <?php
                                                $row = mysqli_fetch_array($result_footer, MYSQLI_ASSOC);
                                                echo "<td>Rp.{$row['total_anggaran']},00</td>";
                                            ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end of table -->
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
    <!-- js table -->
    <script src="js/script.js"></script>
    <!-- js ajax -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        var kodeIku, kodeKegiatan, kodeSbu, nominalSbu, Total;
		var app = {
			iku: function(){
				$.ajax({
					url: "get_iku.php",
					method: "GET",
					success: function(data){
						$("#iku").html(data)
					}
				})
			},
			kegiatan: function(){
				kodeIku = $("#iku").val();
				$.ajax({
					url: "get_kegiatan.php",
					method: "POST",
					data: {kodeIku: kodeIku},
					success: function(data){
						$("#kegiatan").html(data)
					}
				})
			},
            mak: function(){
                kodeKegiatan = $("#kegiatan").val();
                $.ajax({
                    url: "get_mak.php",
                    method: "POST",
                    data: {kodeKegiatan: kodeKegiatan},
                    success: function(data){
                        $("#mak").html(data)
                    }
                })
            },
            sbu: function(){
                kodeMAK = $("#mak").val();
                $.ajax({
                    url: "get_sbu.php",
                    method: "POST",
                    data: {kodeMAK: kodeMAK},
                    success: function(data){
                        $('#sbu').html(data)
                    }
                })
            },
            nominal: function(){
                kodeSbu = $("#sbu").val();
                $.ajax({
                    url: "get_nominal.php",
                    method: "POST",
                    data: {kodeSbu: kodeSbu},
                    success: function(data){
                        $('#nominal').html(data)
                    }
                })
            }
		}
		app.iku();
		$(document).on("change", "#iku", app.kegiatan)
        $(document).on("change", "#kegiatan", app.mak)
        $(document).on("change", "#mak", app.sbu)
        $(document).on("change", "#sbu", app.nominal)
	})
        
</script>

</html>