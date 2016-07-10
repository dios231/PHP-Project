<?php

class HomeView{
    public function rendCompanies($Companies){
        foreach($Companies as $Company){
            $name = $Company['NAME'];
            $description = $Company['DESCRIPTION'];
            $id = $Company['ID'];
            
            $link = "http://localhost/manager/company/$id";
            echo "<div><a href=$link><h3>$id $name $description</h3></a></div>"; 
        }
    }
}

?>