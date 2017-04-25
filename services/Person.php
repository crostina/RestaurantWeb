<?php
Class Person {
	public function __construct($db,$table_name="Person",$defaultOrdercolumn = "ID",$idColumn = "ID"){
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
	public function insert($CIN, $FirstName, $LastName, $PhoneNumber, $Role,$IdEvaluation,$User_Name,$Password,$Email){
        $sql = "INSERT INTO " . $this->table_name . " (CIN, FirstName, LastName, PhoneNumber, Role,IdEvaluation,User_Name,Password,Email) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($CIN, $FirstName, $LastName, $PhoneNumber, $Role,$IdEvaluation,$User_Name,$Password,$Email));
        return $status;
	}
	public function update($ID,$CIN, $FirstName, $LastName, $PhoneNumber, $Role,$IdEvaluation,$User_Name,$Password,$Email){
        $sql = "UPDATE " . $this->table_name . " SET CIN= ?, FirstName= ?, LastName= ?, PhoneNumber= ?, Role= ?, IdEvaluation= ?, User_Name= ?, Password= ?, Email= ? WHERE " . $this->idColumn . "= ?";
        $stmt = $this->db->prepare($sql); 
        $status = $stmt->execute(array($CIN, $FirstName, $LastName, $PhoneNumber, $Role,$IdEvaluation,$User_Name,$Password,$Email,$ID));
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
