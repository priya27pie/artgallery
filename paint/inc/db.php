<?php
class Db{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "itsweb_paint";
    private $username = "itsweb_paint";
    private $password = "hackit_321";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>