<!DOCTYPE html>
<?php
include 'koneksi.php';
include'fungsi/fungsi_rupiah.php';
include'fungsi/fungsi_indotgl.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DataKedaiPandemi.xls");
?>
<html>

<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Kedai Pandemi</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Tanggal Transaksi</th>
						<th>Nama Pelanggan </th>
						<th>Alamat </th>
						<th>Nama Menu</th>
                        <th>Harga</th>
						<th>Jumlah</th>
                        <th>Total</th>                        										
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi, 'SELECT PELANGGAN.*, DAFTAR_MENU.*, TRANSAKSI.* FROM TRANSAKSI 
TRANSAKSI INNER JOIN PELANGGAN PELANGGAN ON TRANSAKSI.ID_PELANGGAN = PELANGGAN.ID_PELANGGAN 
INNER JOIN DAFTAR_MENU DAFTAR_MENU ON TRANSAKSI.ID_MENU = DAFTAR_MENU.ID_MENU ORDER BY TRANSAKSI.ID_TRAN ASC');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["HARGA_MENU"] * $row["JUMLAH"];
					$total_semua += $total;	
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
                          <td>
						 <?php echo tgl_indo($row["TANGGA_TRAN"]);?>
						</td>
						<td>
						 <?php echo $row["NAMA_PELANGGAN"];?>
						</td>
						<td>
						 <?php echo $row["ALAMAT"];?>
						</td>
						<td>
						 <?php echo $row["NAMA_MENU"];?>
						</td>						
						  <td> 
						 <?php echo rupiah($row['HARGA_MENU']); ?>
						</td>
						<td>
						 <?php echo $row["JUMLAH"];?>
						</td>
						<td>
						 <?php echo rupiah($total); ?>
						</td>
                                             
                      </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
          </div>
 <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Majalengka, <?php echo tgl_indo($hari_ini); ?></center>
							<b><center>Pemilik Usaha</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Norul Huda</center></b>
                </div>
              </div>
            </div>
	
 

 
</body>
</html>