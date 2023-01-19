<?php  
$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_sbd");
$query = mysqli_query($koneksi, "SELECT kode_iku, nama_iku FROM iku");
$output = '<option value="">--Pilih IKU--</option>';
while($row = mysqli_fetch_array($query)){
	$output .= '<option value="'.$row["kode_iku"].'">'.$row["nama_iku"].'</option>';
}
echo $output;
?>