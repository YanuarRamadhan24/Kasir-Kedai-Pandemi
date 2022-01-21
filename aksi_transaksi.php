<?php
include("koneksi.php");
$hari_ini = date("dmY");

$act=$_GET['act'];

if ($act=='input'){
echo	$ID_PELANGGAN = $_POST['ID_PELANGGAN'];
echo	$ID_MENU = $_POST['ID_MENU'];
echo	$JUMLAH = $_POST['JUMLAH'];

	$sql = "INSERT INTO TRANSAKSI VALUES ('','$ID_PELANGGAN','$ID_MENU', '$JUMLAH', '$hari_ini')";
	$prepare = ociparse($koneksi, $sql);
    ociexecute($prepare);
    oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";} 

}

?>
