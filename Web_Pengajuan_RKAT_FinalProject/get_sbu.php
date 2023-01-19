<?php  
$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_sbd");
$kodeMAK = $_POST["kodeMAK"];
if($kodeMAK !== " "){
    $sql = "SELECT makdansbu.kode_sbu as Code_sbu, sbu.nama_sbu as namaSbu FROM sbu, makdansbu WHERE makdansbu.kode_mak='$kodeMAK' && makdansbu.kode_sbu=sbu.kode_sbu;";
	$query = mysqli_query($koneksi, $sql);
	$output = '<option value="">--Pilih SBU--</option>';
	while($row = mysqli_fetch_array($query)){
		$output .= '<option value="'.$row["Code_sbu"].'">'.$row["namaSbu"].'</option>';
	}
}else{
	$output = '<option value="">--Tolong pilih data--</option>';
}
echo  $output;
?>