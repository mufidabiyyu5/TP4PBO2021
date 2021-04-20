<?php

/******************************************
PRAKTIKUM RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// insert data
if(isset($_POST['add'])){
	$iname = $_POST['tname'];
	$inim = $_POST['tnim'];
	$ijk = $_POST['tjk'];
	$ialamat = $_POST['talamat'];
	$iprodi = $_POST['tprodi'];
	$istatus = "Belum Lulus";

	$otask->insertTask($iname, $inim, $ijk, $ialamat, $iprodi, $istatus);

	// $result = mysqli_query($otask, $otask->insertTask($iname, $idetails, $ideadline, $isubject, $ipriority, $istatus));
	
	header('Location: index.php');
}

// delete data
if(isset($_GET['nim_hapus'])){
	$nim = $_GET['nim_hapus'];
	$otask->delete($nim);
	// $query = mysqli_query($otask, $otask->delete($id));

    // if ($query) {
        header('Location: index.php');
    // }else{
        // die("Data gagal dihapus...");
    // }
// }else{
	// die("Akses Dilarang");
}

// update status data mahasiswa
if(isset($_GET['nim_status'])){
	$nim = $_GET['nim_status'];
	$otask->update($nim);

	header('Location: index.php');
}

// Memanggil method getTask di kelas Task
$otask->getTask();

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($nim, $tname, $tjk, $tprodi, $talamat, $tstatus) = $otask->getResult()) {
	// Tampilan jika status nya sudah lulus
	if($tstatus == "Sudah Lulus"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nim . "</td>
		<td>" . $tname . "</td>
		<td>" . $tjk . "</td>
		<td>" . $talamat . "</td>
		<td>" . $tprodi . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?nim_hapus=" . $nim . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status nya belum lulus
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nim . "</td>
		<td>" . $tname . "</td>
		<td>" . $tjk . "</td>
		<td>" . $talamat . "</td>
		<td>" . $tprodi . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?nim_hapus=" . $nim . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?nim_status=" . $nim .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}


// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Menutup koneksi database
$otask->close();


// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();
