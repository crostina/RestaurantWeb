<?php
class Person{
   public  $ID;
   public $CIN;
   public $FirstName;
   public $LastName;
   public $PhoneNumber;
   public $Role;
   public $IdEvaluation;
   public $User_Name;
   public $Password;
   public $Email;
    public function __construct() {
        // allocate your stuff
    }

    // public static function withID( $id ) {
    //     $instance = new self();
    //     $instance->loadByID( $id );
    //     return $instance;
    // }

    public static function withRow( array $row ) {
        $instance = new self();
        $instance->fill( $row );
        return $instance;
    }

    // protected function loadByID( $id ) {
    //     // do query
    //     $row = my_awesome_db_access_stuff( $id );
    //     $this->fill( $row );
    // }

    protected function fill( array $row ) {
      foreach($row as $key => $value) $this->$key = $value;

        // fill all properties from array
    }
//    public function __construct($ID,$CIN, $FirstName, $LastName, $PhoneNumber, $Role,$IdEvaluation,$User_Name,$Password,$Email){
//    $this->$ID = $ID;
//    $this->$CIN = $CIN;
//    $this->$FirstName = $FirstName;
//    $this->$LastName = $LastName;
//    $this->$PhoneNumber = $PhoneNumber;
//    $this->$Role = $Role;
//    $this->$IdEvaluation = $IdEvaluation;
//    $this->$User_Name = $User_Name;
//    $this->$Password = $Password;
//    $this->$Email = $Email;
//     }
//    public function __construct($p){
//    $this->ID = $p->ID;
//    $this->CIN = $p->CIN;
//    $this->FirstName = $p->FirstName;
//    $this->LastName = $p->LastName;
//    $this->PhoneNumber = $p->PhoneNumber;
//    $this->Role = $p->Role;
//    $this->IdEvaluation = $p->IdEvaluation;
//    $this->User_Name = $p->User_Name;
//    $this->Password = $p->Password;
//    $this->Email = $p->Email;
//     }
}
?>