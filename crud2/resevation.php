 <?php
require_once'client.php';
require_once'voiture.php';
require_once'connection.php';

class reservation{

private $id;
private $idclient;
private $idvoiture;
private $date_res;
private $duree;




public static $errorMsg = "";

public static $successMsg="";


public function __construct($idclient,$idvoiture,$date_res,$duree){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->idclient = $idclient;
    $this->idvoiture = $idvoiture;
    $this->duree= $duree;
    $this->date_res= $date_res;

    

}

public function insertreservation($tableName,$conn){
//insert a c in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (idclient, idvoiture,date_res,duree)
VALUES ('$this->idclient', '$this->idvoiture','$this->date_res','$this->duree')";
$state = voiture::selectvoitureById('voiture',$conn,$_POST["car"]);
 if($state[etat] == "reserve"){
    self::$errorMsg ="la voiture est deja reserver ";


 }else if($state[etat] == "disponible"){
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {

    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


 }

public static function  selectAllreservation($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id,idclient , idvoiture,date_res,duree FROM $tableName ";
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

static function selectClientByIdvoiture($tableName,$conn,$idcar){
    //select a client by id, and return the row result
    $sql = "SELECT idclient,duree FROM $tableName  WHERE id='$idcar'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo"------------------------------------------";
    echo"$idcar";
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}





static function deletereservation($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:pageemploye.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }

}



?>
