<?php

class CompanyView{
    protected $FindCompanyByIdQueryHandler;
    
    public function __construct($FindCompanyByIdQueryHandler) {
        $this->FindCompanyByIdQueryHandler = $FindCompanyByIdQueryHandler;
    }

    public function rendCompany($id){
        $Query = new FindCompanyByIdQuery();
        $Query->id = $id;
        
        $Company = $this->FindCompanyByIdQueryHandler->Handle($Query);
        var_dump($Company);
        
        $this->rendForm($Company['ID']);
    }
    
    protected function rendForm($id){
    $link = "http://localhost/manager/company/$id";    
    echo '<form method="GET" action='.$link.'>
                <br>
                Company New Name:<br>
                <input type="text" name="name"><br>
                <input type="submit" value="Submit">
          </form>';
    }
}

?>