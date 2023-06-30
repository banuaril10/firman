<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
<title>Motor | Penjualan Motor</title>
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
			 
                <h5 class="card-header">Master Motor</h5>
				
								
				
			<form action="api/action.php?modul=master_data&act=save_motor" method="POST" enctype="multipart/form-data">	
                <div class="card-body">
				

						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Merk Motor</label>
                                  <input class="form-control" type="text" name="merkMotor" placeholder="Merk Motor" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Nama Motor</label>
                                  <input class="form-control" type="text" name="namaMotor" placeholder="Nama Motor" />
                                </div>
                           
                        </div>
						
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Jenis Motor</label>
                                  <input class="form-control" type="text" name="jenisMotor" placeholder="Jenis Motor" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Plat Nomor</label>
                                  <input class="form-control" type="text" name="platNomor" placeholder="Plat Nomor" />
                                </div>
                           
                        </div>
							<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Harga</label>
                                  <input class="form-control cash" type="text" name="harga" placeholder="Harga" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Image</label>
                                  <input class="form-control" type="file" name="image" />
                                </div>
                           
                        </div>
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Warna</label>
                                  <input class="form-control" type="text" name="warna" placeholder="Warna" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Jumlah KM</label>
                                  <input class="form-control" type="text" name="jumlahKM" placeholder="Jumlah KM" />
                                </div>
                           
                        </div>
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Tahun</label>
                                  <input class="form-control" type="number" name="tahun" placeholder="Tahun" />
                                </div>
								 <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Bahan Bakar</label>
                                  <input class="form-control" type="text" name="bahanBakar" placeholder="Bahan Bakar" />
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
                          <th>Merk Motor</th>
                          <th>Nama Motor</th>
                          <th>Jenis </th>
                          <th>Plat Nomor </th>
                          <th>Harga</th>
                          <th>Image</th>
                          <th>Warna</th>
                          <th>Jumlah KM</th>
                          <th>Tahun</th>
                          <th>Bahan Bakar</th>
                          <th>Aksi</th>
                        </tr>

                      </thead>
                      <tbody>
				

						<?php
					  	$querycount =  $connec->query("SELECT * FROM motor");
						$no = 1;
						foreach($querycount as $r){
						?>
						<tr>
						  <td><?php echo $no; ?></td>
						  <td><?php echo $r['merkMotor']; ?></td>
						  <td><?php echo $r['namaMotor']; ?></td>
						  <td><?php echo $r['jenisMotor']; ?></td>
						  <td><?php echo $r['platNomor']; ?></td>
						  <td><?php echo rupiah($r['harga']); ?></td>
						  <td><img src="api/uploads/<?php echo $r['image']; ?>" style="width: 100px"/> </td>
						  <td><?php echo $r['warna']; ?></td>
						  <td><?php echo $r['jumlahKM']; ?></td>
						  <td><?php echo $r['tahun']; ?></td>
						  <td><?php echo $r['bahanBakar']; ?></td>
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
