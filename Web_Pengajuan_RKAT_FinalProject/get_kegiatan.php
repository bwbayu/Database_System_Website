<?php  
$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_sbd");
$kodeIku = $_POST["kodeIku"];
if($kodeIku !== ""){
	$query = mysqli_query($koneksi, "SELECT kode_kegiatan, nama_kegiatan FROM kegiatan WHERE kode_iku = '$kodeIku' ");
	$output = '<option value="">--Pilih Kegiatan--</option>';
	while($row = mysqli_fetch_array($query)){
		$output .= '<option value="'.$row["kode_kegiatan"].'">'.$row["nama_kegiatan"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
?>