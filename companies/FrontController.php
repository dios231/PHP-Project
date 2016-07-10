<?php

//How to implement decorators with this class???
class FrontController{
    public function processHome(){
        $HomeView = new HomeView();
        $Handler =  new FetchAllCompaniesQueryHandler(Database::newConnection());
        $HomeController = new HomeController($HomeView, $Handler);
        $HomeController->processRequest();
    }
    
    public function processCompany($Request){
        $CompanyView = new CompanyView();
        $Handler = new UpdateCompanyCommandHandler(Database::newConnection());
        $CompanyController = new CompanyController($CompanyView, $Handler);
        $CompanyController->processRequest($Request);
    }
    
    public function processAPI($Request){
        //if company ID is omitted from the request
        //that means that the Command side of the API will be processed.
        if ($Request->getParameter('companyID') !== NULL){
            $Handler = new FindCompanyByIdQueryHandler(Database::newConnection());
            
            $FindCompanyByIdQuery = new FindCompanyByIdQuery();
            $FindCompanyByIdQuery->id = $Request->getParameter('companyID');
            
            $company_data = $Handler->Handle($FindCompanyByIdQuery);
            //echo JSON format!!!!
            print_r($company_data);
        }
        else{
            $Handler = new ValidateInputHandlerDecorator(new CreateCompanyCommandHandler(Database::newConnection()));
            
            $CreateCompanyCommand = new CreateCompanyCommand();
            $CreateCompanyCommand->name = $Request->getParameter('company_name');
            $CreateCompanyCommand->description = $Request->getParameter('company_description');

            $Handler->Handle($CreateCompanyCommand);
        }
    }
}

?>