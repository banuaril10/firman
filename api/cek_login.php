<?php session_start();
include "../config/db.php";
$nik = $_POST['nik'];
$pwd = md5($_POST['password']);

		$row = $connec->prepare("select * from users where username = ? and password = ?" );
        $row->execute(array($nik,$pwd));
        $count = $row->rowCount();
		
		
	if($count > 0){
	$hasil = $row->fetchAll();
	foreach ($hasil as $row) {
		
		$_SESSION['username'] = $row["username"];
		
		header("Location: ../motor.php?".$_SESSION['username']);
	}
	}else{
	
	
		header("Location: ../index.php?pesan=Username/pass salah");
	}


	

?>