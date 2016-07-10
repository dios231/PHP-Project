<?php 

class UpdateCompanyCommandHandler implements CommandHandler{
    //UnitOfWork normally.
    protected $database_connection;
    
    public function __construct($db) {
        $this->database_connection = $db;
    }
    
    public function Handle($UpdateCommpanyCommand){
        $conn = $this->database_connection;
        $new_name = $UpdateCommpanyCommand->new_name;
        $id = $UpdateCommpanyCommand->companyID;
        $sql = "UPDATE companies SET name='$new_name' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
}