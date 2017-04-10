<?php
Class Barang {
	public function __construct($db,$table_name="barang",$defaultOrdercolumn = "namaBarang",$idColumn = "idBarang"){
		$this->db = $db->getConnection();;
                $this->table_name = $table_name;
                $this->defaultOrdercolumn = $defaultOrdercolumn;
                $this->idColumn = $idColumn ;
	}
    // object properties
    // public $idBarang;
    // public $nameBarang;
    // public $kategori;
    // public $sok;
    // public $hargabeli;
    // public $hargajual;
	public function insertBarang($namaBarang, $kategori, $stok, $hargaBeli, $hargaJual){
        $sql = "INSERT INTO barang (namaBarang, kategori, stok, hargaBeli, hargaJual) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($namaBarang, $kategori, $stok, $hargaBeli, $hargaJual));
        return $status;
	}
	public function updateBarang($idBarang, $namaBarang, $kategori, $stok, $hargaBeli, $hargaJual){
        $sql = "UPDATE barang SET namaBarang=?, kategori=?, stok=?, hargaBeli=?, hargaJual=? WHERE idBarang=?";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($namaBarang, $kategori, $stok, $hargaBeli, $hargaJual, $idBarang));
        return $status;
	}

        // copy past
	public function getAll(){
        $sql = "SELECT * FROM " . $this->table_name . " ORDER BY " . $this->defaultOrdercolumn . " ASC";
        $stmt = $this->db->query($sql); 
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
	}
	public function get($id){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE " . $this->idColumn ."=?";
        $stmt = $this->db->prepare($sql); 
        $stmt->execute(array($id));
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;
	}
	public function delete($id){
        $sql = "DELETE FROM " . $this->table_name . " WHERE " . $this->idColumn ."=?";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($id));
        return $status;
	}
}
?>
