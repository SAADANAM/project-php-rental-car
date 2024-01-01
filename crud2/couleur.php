<?php

class Color{

    public $id;
    public $namec;


    public static $errorMsg = "";

    public static $successMsg="";


    public function __construct($namec){

        //initialize the attributs of the class with the parameters, and hash the password
        
        $this->namec = $namec;
    
    }
    public function insertColor($tableName,$conn){

        //insert a Color in the database, and give a message to $successMsg and $errorMsg
        $sql = "INSERT INTO $tableName (namec)
        VALUES ('$this->namec')";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record created successfully";
        
        } else {
            self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        
        }

    public static function selectAllcolors($tableName,$conn){
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

    public static function selectColorById($tableName,$conn,$id){
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