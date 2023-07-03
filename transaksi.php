<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
<title>Transaksi | Penjualan Motor</title>
	<style>
table td, table td * {
    vertical-align: top;
}

	</style>

  <?php include "menu/header.php"; ?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

		<?php include "menu/menu.php" ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

			<?php include "menu/navbar.php" ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
			
			
			
			
			<div class="card">
			 
                <h5 class="card-header">Transaksi Penjualan</h5>
				
							

				
			<form action="api/action.php?modul=transaksi&act=save" method="POST" enctype="multipart/form-data">	
                <div class="card-body">
				

						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Tgl Pesanan</label>
                                  <input class="form-control" type="date" name="tgl_pesanan" value="<?php echo date('Y-m-d'); ?>"/>
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Nama Pelanggan</label>
                                  <input class="form-control" type="text" name="nama" placeholder="Nama Pelanggan" />
                                </div>
                           
                        </div>
						
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Alamat</label>
                                  <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Kota</label>
                                  <input class="form-control" type="text" name="kota" placeholder="Kota" />
                                </div>
                           
                        </div>
							<div class="row mb-3">
							
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">No Telp</label>
                                  <input class="form-control cash" type="text" name="notelp" placeholder="No Telp" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Email</label>
                                  <input class="form-control" type="text" name="email" placeholder="contoh@gmail.com"/>
                                </div>
                           
                        </div>
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Pilih Motor</label>
                                  <select class="form-select" name="idMotor" required>
										<option value="">Pilih Motor</option>
										<?php $querycount =  $connec->query("SELECT * FROM motor where idMotor not in (select idMotor from transaksi)");
										foreach($querycount as $r){ ?>
										
										<option value="<?php echo $r['idMotor']; ?>"><?php echo $r['namaMotor']; ?> | <?php echo $r['platNomor']; ?></option>
											
											
										<?php } ?>
								  </select>
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Jenis Bayar</label>
                                  <input class="form-control" type="text" name="jenis_bayar" placeholder="Transfer" />
                                </div>
                           
                        </div>
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">DP (Uang Muka)</label>
                                  <input class="form-control" type="number" name="dp" placeholder="DP" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Jumlah Bulan Cicilan</label>
                                  <input class="form-control" type="text" name="cicilan" placeholder="Total Cicilan" />
                                </div>
                           
                        </div>
						
						<div class="row mb-3">
					
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Biaya Cicilan</label>
                                  <input class="form-control" type="number" name="biaya_cicilan" placeholder="Biaya Cicilan" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Keterangan</label>
								     <input class="form-control" type="text" name="keterangan" placeholder="Keterangan" />
                                </div>
                           
                        </div>
						<div class="row mb-3">
					
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Foto KTP</label>
                                   <input class="form-control" type="file" name="foto_ktp" />
                                </div>
								
                        </div>
						 <div class="row mb-3">
						   <div class="col mb-0">
                               <button type="submit" class="btn btn-primary">Save</button>
							</div>
                        </div>

							  
							  <br>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>

						  <th>No</th>
                          <th>Tgl Pesanan</th>
                          <th>Alamat Pelanggan </th>
                          <th>Info Kontak </th>
                          <th>ID Motor</th>
                          <th>Jenis Bayar</th>
                          <th>Keterangan</th>
                          <th>Foto KTP</th>
                          <th>Link Form Cicilan</th>
                          <th>Aksi</th>
                        </tr>

                      </thead>
                      <tbody>
			

						<?php
					  	$querycount =  $connec->query("SELECT * FROM transaksi");
						$no = 1;
						foreach($querycount as $r){
							
								$detail_motor =  $connec->query("SELECT * FROM motor where idMotor = '". $r['idMotor']."'");
							
								foreach($detail_motor as $rr){
									
									$plat = $rr['platNomor'];
									$nama = $rr['namaMotor'];
								}
								$stat = "Tidak Aktif";
								if($r['status'] == 'Y'){
									
									$stat = "Aktif";
								}
						?>
						<tr>
						  <td><?php echo $no; ?></td>
						  <td><?php echo $r['tgl_pesanan']; ?><br><?php echo $stat; ?></td>
						  <td>Nama : <?php echo $r['nama']; ?><br>Alamat : <?php echo $r['alamat']; ?><br>Kota : <?php echo $r['kota']; ?></td>
						  <td>No Telp : <?php echo $r['notelp']; ?><br>Email : <?php echo $r['email']; ?></td>
						  <td>Motor : <?php echo $nama; ?><br>Plat : <?php echo $plat; ?></td>
						  <td><?php echo $r['jenis_bayar']; ?>
						  <br>DP : <?php echo rupiah($r['dp']); ?>
						  <br>Cicilan : <?php echo $r['cicilan']; ?>
						  <br>Biaya Cicilan : <?php echo rupiah($r['biaya_cicilan']); ?>
						  </td>
						  <td><?php echo $r['keterangan']; ?></td>
						  <td><img src="api/uploads/<?php echo $r['foto_ktp']; ?>" style="width: 100px"/> </td>
						  <td><a href="form.php?id=<?php echo $r['id_pesanan']; ?>">Link Pembayaran</a><br><a href="detail_cicilan.php?id=<?php echo $r['id_pesanan']; ?>">Detail Cicilan</a></td>
						  <td>-</td>
						</tr>
						<?php $no++;
						} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
				</form>
              </div>
			</div>
            <!-- / Content -->
            <!-- Footer -->
				<?php include "menu/footer.php"; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
	
	<?php include "menu/library.php"; ?>
	<script>
	$("#example").DataTable();
	</script>
  </body>
  
  
</html>
