<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
<title>Bukti Pembayaran | Penjualan Motor</title>
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


        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->



          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
			
			
			
			
			<div class="card">
			 
                <h5 class="card-header">Konfirmasi Pembayaran</h5>
				
							

				
			<form action="api/action.php?modul=transaksi&act=pembayaran&id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">	
                <div class="card-body">
				

						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Jumlah Pembayaran</label>
                                  <input class="form-control" type="number" name="jumlah_pembayaran" />
                                </div>
								
                        </div>
						
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Metode Pembayaran</label>
                                  <input class="form-control" type="text" name="metode_pembayaran" />
                                </div>
								
                        </div>
						
						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Detail Pembayaran</label>
                                 <textarea class="form-control" name="detail_pembayaran" placeholder="Detail Pembayaran"></textarea>
                                </div>
								
                        </div>
					

						<div class="row mb-3">
						
                                <div class="col mb-0">
                                  <label for="emailExLarge" class="form-label">Upload Bukti Pembayaran</label>
                                  <input class="form-control" type="file" name="file_bukti" />
                                </div>
								
                        </div>
						
						
						 <div class="row mb-3">
						   <div class="col mb-0">
                               <button type="submit" class="btn btn-primary">Save</button>
							</div>
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
  </body>
  
  
</html>
