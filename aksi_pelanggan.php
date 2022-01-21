<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$ID_PELANGGAN=$_GET['ID_PELANGGAN'];
	$sql="DELETE FROM PELANGGAN WHERE ID_PELANGGAN = '$ID_PELANGGAN'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:PELANGGAN.php');
}

elseif ($act=='input'){
	$NAMA_PELANGGAN = $_POST["NAMA_PELANGGAN"];
 	$ALAMAT = $_POST["ALAMAT"];

   $sql="insert into PELANGGAN values ('','$NAMA_PELANGGAN','$ALAMAT') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:PELANGGAN.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$ID_PELANGGAN = $_POST["ID_PELANGGAN"];
	$NAMA_PELANGGAN = $_POST["NAMA_PELANGGAN"];
 	$ALAMAT = $_POST["ALAMAT"];

	$sql = "UPDATE PELANGGAN SET NAMA_PELANGGAN='$NAMA_PELANGGAN', ALAMAT='$ALAMAT' WHERE ID_PELANGGAN='$ID_PELANGGAN'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
	header('location:PELANGGAN.php');
	}
	else {echo "gagal";}

}
?>
