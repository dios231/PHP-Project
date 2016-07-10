<?php

class Request{
    //Query
    protected $companyID;
    
    protected $source;
    
    //Command
    protected $company_name;
    protected $company_description;
    
    protected $new_name;
    
    public function prepare($url){
        $this->doGet($url);
        $this->getJSON();
    }
    
    protected function doGet($url){
        $parameters = explode('/', $url['url']);

        //Configure Request for API use cases
        if ($parameters[0] == 'companies'){
            if (isset($parameters[1])){
                $this->companyID = $parameters[1];
                $this->source = 'APIDisplay';
            }
            else{
                $this->getJSON();
                $this->source = 'APICreate';
            }
            return 0;
        }
        //Confiure Request for Home, Company pages
        if ($parameters[0] == 'company'){
            $this->source = 'Company';
            if (isset($parameters[1])){
                $this->companyID = $parameters[1];
                if (isset($_GET['name'])){
                    $this->new_name = $_GET['name'];
                }
            }
            else{
                throw new Exception("den uparxei id ");
            }
            return 0;
        }
        $this->source = 'Home';

    }

    //Lotic to retrieve JSON data.
    protected function getJSON(){
        $this->company_name = "Company Name";
        $this->company_description = "Compamy Description";        
    }
    
    //A generic method to access request data.
    public function getParameter($parameter_name){
        return $this->{$parameter_name};
    }
   
}

?>