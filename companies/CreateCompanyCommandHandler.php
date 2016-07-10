<?php

class CreateCompanyCommandHandler implements CommandHandler{
    //UnitOfWork normally.
    protected $database_connection;
    
    public function __construct($db) {
        $this->database_connection = $db;
    }
    
    public function Handle($CreateCompanyCommand){
        //LOGIC ABOUT HOW TO CREATE A NEW COMPANY
        echo 'new company created!!!!';
        echo "<br>$CreateCompanyCommand->name";
        echo "<br>$CreateCompanyCommand->description";
    }
}

?>