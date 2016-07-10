<?php

class CompanyController{
    protected $View;
    protected $Handler;
    
    public function __construct($View, $Handler) {
        $this->View = $View;
        $this->Handler = $Handler;
    }
    
    public function processRequest($Request){
        if ($Request->getParameter('new_name') !== NULL ){
            $UpdateCompanyCommand = new UpdateCompanyCommand();
            $UpdateCompanyCommand->new_name = $Request->getParameter('new_name');
            $UpdateCompanyCommand->companyID = $Request->getParameter('companyID');  
           $this->Handler->Handle($UpdateCompanyCommand);
        }

        $this->View->rendCompany($Request->getParameter('companyID'));
    }
}

?>