<?php 

/******************************************
PRAKTIKUM RPL
******************************************/

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke data_mhs
		$query = "SELECT * FROM data_mhs";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	// memasukan data ke data_mhs
	function insertTask($iname, $inim, $ijk, $ialamat, $iprodi, $istatus){
		// query insert
		$sql_add = "INSERT INTO data_mhs  
				(nim, nama, jk_mhs, prodi_mhs, alamat_mhs, status_mhs) VALUES  
				('$inim', '$iname', '$ijk', '$iprodi', '$ialamat', '$istatus')";

		return $this->execute($sql_add);
		
	}

	// hapus data dari data_mhs
	function delete($data){
		// query delete dari nim yang dipilih
        $sql = "DELETE FROM data_mhs WHERE nim=$data";

		return $this->execute($sql);
    }

	// update status mahasiswa
	function update($data){
		// query update statusnya menjadi sudah lulus
		$sql = "UPDATE data_mhs SET status_mhs='Sudah Lulus' WHERE nim=$data";

		return $this->execute($sql);
	}

}



?>
