<?php
class paiement{
   private $idp;
    private $idclient;
   private $date_p;
   private $id_resv;
   private $montant;



   public static $errorMsg = "";

public static $successMsg="";


   public function __construct($idclient,$date_p,$id_resv,$montant){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->date_p  = $date_p ;
    $this->idclient = $idclient;
    $this->id_resv = $id_resv;
    $this->montant = $montant;

    
}

public static function  selectAllpaiement($tableName,$conn){

    //select all the cars from database, and inset the rows results in an array $data[]
    $sql = "SELECT idp,date_p,idclient,id_resv,montant FROM $tableName ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $data=[];
            while($row = mysqli_fetch_assoc($result)) {
            
                $data[]=$row;
            }
            return $data;
        }
    
    }
   public function insertpaiement($tableName,$conn){

        //insert a client in the database, and give a message to $successMsg and $errorMsg
        $sql = "INSERT INTO $tableName (idclient,date_p,id_resv,montant)
        VALUES ( '$this->idclient','$this->date_p','$this->id_resv','$this->montant')";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record created successfully";
        
        } else {
        
            self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        

    }

    
}
?>