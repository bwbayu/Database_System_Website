<?php
include("config.php");
if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    header("location: index.php");
    exit();
  }
  $tgl_pengajuan = $_POST['tgl_pengajuan'];

  $query_footer = "SELECT SUM(anggaran) as total_anggaran FROM pengajuan WHERE id_rkat is null;";
  $result_footer = mysqli_query($conn, $query_footer);
  $data_anggaran = $result_footer->fetch_array();
  $data1 = $data_anggaran[0];

//   $query_pagu = "SELECT id_pagu FROM pagu WHERE tahun=YEAR($tgl_pengajuan);";
//   $result_pagu = mysqli_query($conn, $query_pagu);
//   $data_pagu = $result_pagu->fetch_array();
//   $data2 = $data_pagu[0];

  $query_insert = "INSERT INTO rkat(tgl_kegiatan, total_anggaran) VALUES 
  ('$tgl_pengajuan', '$data1');";
  $result = mysqli_query($conn, $query_insert);
  header("location: rkat.php");
?>