<?php

require_once 'QueryHandler.php';

class FindCompanyByIdQueryHandler implements QueryHandler{
    protected $database;
    
    public function __construct($database) {
        $this->database = $database;
    }
    public function Handle($Query) {        
        $conn = $this->database;
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $id = mysqli_real_escape_string($conn, $Query->id);
        $sql = "SELECT * FROM companies where ID=$id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $conn->close();
                return $row;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        return null;
    }
}

?>