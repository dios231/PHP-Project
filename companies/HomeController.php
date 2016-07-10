<?php

class HomeController{
    protected $HomeView;
    protected $Handler;
    
    public function __construct($HomeView, $Handler) {
        $this->HomeView = $HomeView;
        $this->Handler = $Handler;
    }


    public function processRequest(){        
        $FetchAllCompaniesQuery = new FetchAllCompaniesQuery();
        $FetchAllCompaniesQuery->sort = FALSE;
        $Companies = $this->Handler->Handle($FetchAllCompaniesQuery);
        
        $this->HomeView->rendCompanies($Companies);
    }
}

?>