<?php
class Stock {
private $id_stock;
private $brand;
private $nbrofcars;


public static $errorMsg = "";

public static $successMsg="";





public function __construct($brand,$nbrofcars){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->brand = $brand;
    $this->nbrofcars = $nbrofcars;
    
}

public function insertstock($tableName,$conn){

        //insert a client in the database, and give a message to $successMsg and $errorMsg
        $sql = "INSERT INTO $tableName (brand,nbrofcars)
        VALUES ('$this->brand','$this->nbrofcars')";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record created successfully";
        
        } else {
        
            self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        
        }

        public static function  selectAllstock($tableName,$conn){

            //select all the client from database, and inset the rows results in an array $data[]
            $sql = "SELECT id_stock, brand, nbrofcars FROM $tableName ";
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


            static function selectstockById($tableName,$conn,$id){
                //select a client by id, and return the row result
                $sql = "SELECT brand, nbrofcars FROM $tableName  WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
                
                }
                return $row;
            }


            static function updatestock($stock,$tableName,$conn,$id){
                //update a client of $id, with the values of $client in parameter
                //and send the user to read.php
                $sql = "UPDATE $tableName SET nbrofcars='$stock->nbrofcars'";
                    if (mysqli_query($conn, $sql)) {
                    self::$successMsg= "New record updated successfully";
            header("Location:read.php");
                    } else {
                        self::$errorMsg= "Error updating record: " . mysqli_error($conn);
                    }
            
            
            }
        }
?>