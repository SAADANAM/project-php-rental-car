<?php

class voiture{

private $id;
private $model;
private $idcouleur;
private $etat;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($model,$idcouleur,$etat){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->model = $model;
    $this->idcouleur = $idcouleur;
    $this->etat = $etat;
    
}

public function insertvoiture($tableName,$conn){

//insert a client in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (model, idcouleur, etat)
VALUES ('$this->model', '$this->idcouleur', '$this->etat')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {

    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

public static function  selectAllvoiture($tableName,$conn){

//select all the cars from database, and inset the rows results in an array $data[]
$sql = "SELECT id, model, idcouleur,etat FROM $tableName ";
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

static function selectvoitureById($tableName,$conn,$id){
    //select a car by id, and return the row result
    $sql = "SELECT model, idcouleur,etat FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}

static function reservervoiture($tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    //echo"sqhfeuodvhbuiqgeviuer";
    $sql = "UPDATE $tableName SET etat='reseve' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
       // header("Location:pageempoloye.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}

static function liberervoiture($tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET etat='disponible' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
//header("Location:read.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}




    public static function selectvoitureByCouleurId($tableName,$conn,$idColor){
    
        $sql = "SELECT id, model, etat FROM $tableName  WHERE idcouleur='$idColor'";
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

}

?>
