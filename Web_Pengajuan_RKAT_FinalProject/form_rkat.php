<?php
include("config.php");
if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    header("location: index.php");
    exit();
  } elseif (isset($_POST['cancel'])){
    header("location: index.php");
    exit();
  }
  $iku = $_POST['iku'];
  $kegiatan = $_POST['kegiatan'];
  $mak = $_POST['mak'];
  $sbu = $_POST['sbu'];
  $jumlah = $_POST['jumlah'];
  $query_nominal = "SELECT nominal FROM sbu WHERE kode_sbu='$sbu'";
  $data_nominal = mysqli_query($conn, $query_nominal);
  $nominal = $data_nominal->fetch_array();
  $anggaran = $nominal[0] * $jumlah;
  $query = "INSERT INTO pengajuan (kode_iku, kode_kegiatan, kode_mak, kode_sbu, anggaran) values
  ('$iku', '$kegiatan', '$mak', '$sbu', '$anggaran');";
  $result = mysqli_query($conn, $query);
  header("location: rkat.php");
?>