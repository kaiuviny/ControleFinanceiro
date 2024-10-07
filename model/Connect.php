<?php
class Connect{
    private $conn;

    public function getConnection(){
        $this->conn = new mysqli("127.0.0.1", "root", "", "ControleFinanceiro", "3306");
        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
        else{
            return $this->conn;
        }
    }

    public function execReader($sql){
        return $this->conn->query($sql);
    }

    public function execSql($sql){
        return $this->conn->prepare($sql);
    }

    public function conClose(){
        $this->conn->close();
    }
}
?>