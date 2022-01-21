<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$ID_MENU=$_GET['ID_MENU'];
	$sql="DELETE FROM DAFTAR_MENU WHERE ID_MENU = '$ID_MENU'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:DAFTAR_MENU.php');
}

elseif ($act=='input'){
	$NAMA_MENU = $_POST["NAMA_MENU"];
 	$HARGA_MENU = $_POST["HARGA_MENU"];

   $sql="insert into DAFTAR_MENU values ('','$NAMA_MENU','$HARGA_MENU') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:DAFTAR_MENU.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$ID_MENU = $_POST["ID_MENU"];
	$NAMA_MENU = $_POST["NAMA_MENU"];
 	$HARGA_MENU = $_POST["HARGA_MENU"];
	

	$sql = "UPDATE DAFTAR_MENU SET NAMA_MENU='$NAMA_MENU', HARGA_MENU='$HARGA_MENU' WHERE ID_MENU='$ID_MENU'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:DAFTAR_MENU.php');
	}
	else {echo "gagal";}
   



}
?>
