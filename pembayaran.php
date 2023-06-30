<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
<title>Pembayaran | Penjualan Motor</title>
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
			 
                <h5 class="card-header">Transaksi Cicilan</h5>

                <div class="card-body">

                  <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>
						

						  <th>No</th>
                          <th>ID Pesanan</th>
                          <th>Jumlah Pembayaran </th>
                          <th>Metode Pembayaran </th>
                          <th>Detail Pembayaran</th>
                          <th>File Bukti</th>
                          <th>Status</th>
                          <th>Tgl Bayar</th>
                          <th>Aksi</th>
                        </tr>

                      </thead>
                      <tbody>
						<?php
					  	$querycount =  $connec->query("SELECT * FROM detail_transaksi");
						$no = 1;
						foreach($querycount as $r){
						?>
						<tr>
						  <td><?php echo $no; ?></td>
						  <td><?php echo $r['id_pesanan']; ?></td>
						  <td><?php echo $r['jumlah_pembayaran']; ?></td>
						  <td><?php echo $r['metode_pembayaran']; ?></td>
						  <td><?php echo $r['detail_pembayaran']; ?></td>
						  <td><img src="api/uploads/<?php echo $r['file_bukti']; ?>" style="width: 100px"/> </td>
						  <td><?php echo $r['status']; ?></td>
						  <td><?php echo $r['tgl_bayar']; ?></td>
						  <td>-</td>
						</tr>
						<?php $no++;
						} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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
