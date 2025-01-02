<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "data";

$db = mysqli_connect($server, $user, $password, $nama_database);

if(!isset($_POST['submit'])){
	echo"
			<script>
				document.location.href = 'index.html';
			</script>
		";
	die();
}

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

$email=$_POST ['email'];
$pesan=$_POST ['pesan'];

$email=$db->real_escape_string($email);
$pesan=$db->real_escape_string($pesan);

$sql = "INSERT INTO mydata (email, pesan) VALUES ('$email','$pesan')";

if ($db->query ($sql) ===TRUE) {
    echo"
			<script>
				alert('Pesan berhasil dikirim');
				document.location.href = 'contact.html';
			</script>
		";
}else {
    echo "<script>
				alert('Pesan gagal dikirim');
				document.location.href = 'contact.html';
			</script>";
}

$db->close();

?>