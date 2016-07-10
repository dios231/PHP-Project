<?php

class Company{
    protected $id;
    protected $name;
    protected $description;
    
    public function __construct($id, $name, $description){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
    
    public function calculateNameLength(){
        return strlen($this->name);
    }
    
    public function getID(){
        return $this->id;
    }
}


?>