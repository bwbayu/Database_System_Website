<?php  
$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_sbd");
$kodeKegiatan = $_POST["kodeKegiatan"];
if($kodeKegiatan !== ""){
    $sql = "SELECT kegiatandanmak.kode_mak as kodeMak, mak.nama_mak as namaMak FROM mak, kegiatandanmak WHERE kegiatandanmak.kode_kegiatan= '$kodeKegiatan' && kegiatandanmak.kode_mak=mak.kode_mak;";
	$query = mysqli_query($koneksi, $sql);
	$output = '<option value="">--Pilih MAK--</option>';
	while($row = mysqli_fetch_array($query)){
		$output .= '<option value="'.$row["kodeMak"].'">'.$row["namaMak"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
?>