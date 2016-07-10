<?php


class FetchAllCompaniesQueryHandler implements QueryHandler{
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

        $sql = "SELECT * FROM companies";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $conn->close();
            return $rows;
        } 
        else {
            echo "0 results";
        }
        $conn->close();
        return null;
    }
}


?>