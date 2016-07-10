<?php

class APIDisplayController{
    
    protected $QueryHandler;

    public function __construct($QueryHandler) {
        $this->QueryHandler = $QueryHandler;
    }

    public function processRequest($Request){
        echo "ok";
        $Query = new FindCompanyByIdQuery();
        $Query->id = $Request->getParameter('companyID');
        $company_data = $this->QueryHandler->Handle($Query);
        return $company_data;
    }
}

?>