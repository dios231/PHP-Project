<?php

class APICreateController{
    
    protected $CommandHandler;
    
                        
    public function __construct($CommandHandler){
        $this->CommandHandler = $CommandHandler;
    }
    
    public function processRequest($Request){
        //Create and configure the Command.
        $query = new CreateCompanyCommand();
        $query->name = $Request->getParameter('company_name');
        $query->description = $Request->getParameter('company_description');
        //Hanlde the Command
        $this->CommandHandler->Handle($query);
    }
}

?>