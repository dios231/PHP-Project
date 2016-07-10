<?php

class APIDisplayControllerTest extends PHPUnit_Framework_TestCase{
    
    public function testProcessRequestReturnsCompany(){
        
        $Request = $this->getMockBuilder('Request')
            ->setConstructorArgs(array())
            ->getMock();
                
        $FindCompanyByIdQueryHandler = $this->getMockBuilder('FindCompanyByIdQueryHandler')
            ->setConstructorArgs(array(Database::newConnection()))
            ->getMock();
        
        $FindCompanyByIdQueryHandler->expects($this->once())
            ->method('Handle')
            ->will($this->returnValue(array("ID" => 1, "NAME" =>"NAME", "DESCRIPTION" =>"DESCRIPTION")));
        
        
        $APIDisplayController = new APIDisplayController($FindCompanyByIdQueryHandler);

        $data = $APIDisplayController->processRequest($Request);
        
        $this->assertArrayHasKey('ID', $data);
        $this->assertArrayHasKey('NAME', $data);
        $this->assertArrayHasKey('DESCRIPTION', $data);
    }
    
}


?>