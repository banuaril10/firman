<?php session_start();
include "../config/db.php";
// $ch = curl_init();

function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {
		$dates = [];
		$current = strtotime( $first );
		$last = strtotime( $last );
	
		while( $current <= $last ) {
	
			$dates[] = date( $format, $current );
			$current = strtotime( $step, $current );
		}
	
		return $dates;
	}


function guid($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if($_GET['modul'] == 'master_data'){
	if($_GET['act'] == 'save_motor'){
		
				$date = date('Ymd');
				$temp_nik = 'uploads/'.$date.'/';
				
				if (!file_exists($temp_nik)) {
						mkdir($temp_nik, 0777, true);
					}	
					
					
				if ( isset($_FILES['image'])) {
					$tmp_name = $_FILES['image']['tmp_name'];
					$new_name = $date.'/'.uniqid().$_FILES['image']['name'];
					move_uploaded_file( $tmp_name, 'uploads/'.$new_name );
				}else{
					
					$new_name = "";
					
				}

				$sql = "INSERT INTO motor
				(merkMotor, namaMotor, jenisMotor, platNomor, harga, image, warna, jumlahKM, tahun, bahanBakar)
				VALUES('".$_POST['merkMotor']."','".$_POST['namaMotor']."','".$_POST['jenisMotor']."','".$_POST['platNomor']."','".$_POST['harga']."',
				'".$new_name."','".$_POST['warna']."','".$_POST['jumlahKM']."','".$_POST['tahun']."','".$_POST['bahanBakar']."');";					
	
				$statement1 = $connec->query($sql);
	
				if($statement1){
					header("Location: ../motor.php?Berhasil");
				
				}else{
				
					header("Location: ../motor.php?Gagal");
				}
			
			echo $sql;
		
	}
}else if($_GET['modul'] == 'transaksi'){
	if($_GET['act'] == 'save'){
		
				$date = date('Ymd');
				$temp_nik = 'uploads/'.$date.'/';
				
				if (!file_exists($temp_nik)) {
						mkdir($temp_nik, 0777, true);
					}	
					
					
				if ( isset($_FILES['foto_ktp'])) {
					$tmp_name = $_FILES['foto_ktp']['tmp_name'];
					$new_name = $date.'/'.uniqid().$_FILES['foto_ktp']['name'];
					move_uploaded_file( $tmp_name, 'uploads/'.$new_name );
				}else{
					
					$new_name = "";
					
				}

				$sql = "INSERT INTO transaksi
				(id_pesanan, tgl_pesanan, nama, alamat, kota, notelp, email, idMotor, jenis_bayar, dp, cicilan, biaya_cicilan, status, keterangan, foto_ktp)
				VALUES('".guid()."', '".$_POST['tgl_pesanan']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['kota']."','".$_POST['notelp']."',
				'".$_POST['email']."','".$_POST['idMotor']."','".$_POST['jenis_bayar']."','".$_POST['dp']."','".$_POST['cicilan']."','".$_POST['biaya_cicilan']."','1','".$_POST['keterangan']."','".$new_name."');";					
	
				$statement1 = $connec->query($sql);
	
				if($statement1){
					header("Location: ../transaksi.php?Berhasil");
				
				}else{
				
					header("Location: ../transaksi.php?Gagal");
				}
			
			// echo $sql;
		
	}if($_GET['act'] == 'pembayaran'){
				$id_pesanan = $_GET['id'];
				$date = date('Ymd');
				$temp_nik = 'uploads/'.$date.'/';
				
				if (!file_exists($temp_nik)) {
						mkdir($temp_nik, 0777, true);
					}	
					
					
				if ( isset($_FILES['file_bukti'])) {
					$tmp_name = $_FILES['file_bukti']['tmp_name'];
					$new_name = $date.'/'.uniqid().$_FILES['file_bukti']['name'];
					move_uploaded_file( $tmp_name, 'uploads/'.$new_name );
				}else{
					
					$new_name = "";
					
				}

				$sql = "INSERT INTO detail_transaksi
				(id_pesanan, jumlah_pembayaran, metode_pembayaran, detail_pembayaran, tgl_bayar, file_bukti, status)
				VALUES('".$id_pesanan."', '".$_POST['jumlah_pembayaran']."','".$_POST['metode_pembayaran']."','".$_POST['detail_pembayaran']."','".date('Y-m-d H:i:s')."', '".$new_name."','1');";					
	
				$statement1 = $connec->query($sql);
	
				if($statement1){
					header("Location: ../form.php?id=".$id_pesanan);
				
				}else{
				
					header("Location: ../form.php?id=".$id_pesanan);
				}
			
			// echo $sql;
		
	}
}
		
		
    

?>