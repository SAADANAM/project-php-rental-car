<?php 
require_once "client.php";

class employe extends Client
{
    private $salaire;


    public function __construct($firstname,$lastname,$email,$password,$idCity,$salaire){
        parent::__construct($firstname,$lastname,$email,$password,$idCity);
        $this->salaire = $salaire;
    }

    public function insertClient($tableName,$conn){

        //insert a client in the database, and give a message to $successMsg and $errorMsg
        $sql = "INSERT INTO $tableName (firstname, lastname, email,password,idCity,salaire)
        VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password','$this->idCity','$this->salaire')";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record created successfully";
        
        } else {
        
            self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        
        }
        
        public static function  selectAllClients($tableName,$conn){
        
        //select all the client from database, and inset the rows results in an array $data[]
        $sql = "SELECT id, firstname, lastname,email,idCity,salaire FROM $tableName ";
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
        
        static function selectClientById($tableName,$conn,$id){
            //select a client by id, and return the row result
            $sql = "SELECT firstname, lastname,email,salaire FROM $tableName  WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($result);
            
            }
            return $row;
        }
        
        static function updateClient($client,$tableName,$conn,$id){
            //update a client of $id, with the values of $client in parameter
            //and send the user to read.php
            $sql = "UPDATE $tableName SET lastname='$employe->lastname',firstname='$employe->firstname',email='$employe->email,salaire='$employe->salaire'' WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                self::$successMsg= "New record updated successfully";
        header("Location:read.php");
                } else {
                    self::$errorMsg= "Error updating record: " . mysqli_error($conn);
                }
        
        
        }
        
        static function deleteClient($tableName,$conn,$id){
            //delet a client by his id, and send the user to read.php
            $sql = "DELETE FROM $tableName WHERE id='$id'";
        
        if (mysqli_query($conn, $sql)) {
            self::$successMsg= "Record deleted successfully";
            header("Location:read.php");
        } else {
            self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
        }
        
          
            }
        
        
            public static function selectClientByCityId($tableName,$conn,$idCity){
            
                $sql = "SELECT id, firstname, lastname,email,idCity FROM $tableName  WHERE idCity='$idCity'";
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