<?php

class City{

    public $id;
    public $name;

    public static $errorMsg = "";

    public static $successMsg="";


    public function __construct($name){

        //initialize the attributs of the class with the parameters, and hash the password
     
        $this->name = $name;
    
    }
    public function insertCity($tableName,$conn){

        //insert a City in the database, and give a message to $successMsg and $errorMsg
        $sql = "INSERT INTO $tableName (name)
        VALUES ('$this->name')";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg= "New record created successfully";
        
        } else {
            self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        
        }

    public static function selectAllcities($tableName,$conn){
        $sql = "SELECT id, name  FROM $tableName ";
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

    public static function selectCityById($tableName,$conn,$id){
        $sql = "SELECT name FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
    }
}



?>