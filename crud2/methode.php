<?php
class Login1 {
    public $id;
    public $lname;
    public function login($email, $password,$conn,$tab){
        $result = mysqli_query($conn, "SELECT * FROM $tab WHERE email = '$email' ");
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }else{
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if(password_verify($password, $row["password"])){
                $this->id = $row ["id"];
                $this->lname = $row ["firstname"];

                return 1;
            }
            else {
                return 10; 
            }

        }
        else{
            return 100;
        }
    }
    }
    public function idclient(){
        return $this->id;
    }
    public function nameclient(){
        return $this->lname;
    }
    
}
?>
