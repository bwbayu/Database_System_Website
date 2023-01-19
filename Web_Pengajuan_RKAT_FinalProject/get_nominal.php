<?php  
$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_sbd");
$kodeSbu = $_POST["kodeSbu"];
if($kodeSbu !== " "){
    $sql = "SELECT nominal FROM sbu WHERE kode_sbu='$kodeSbu';";
	$query = mysqli_query($koneksi, $sql);
	while($row = mysqli_fetch_array($query)){
		$output = '<input value="Rp.'.$row["nominal"].',00" id="nominalsbu" name="nominalsbu" disabled>';
	}
}else{
	$output = '<input value="Nominal Data Tidak Ditemukan">';
}
echo  $output;
?>