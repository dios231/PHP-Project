<?php
    require_once 'CompositionRoot.php';

    $Request = new Request();
    $Request->prepare($_GET);
    
    $controller = $Request->getParameter('source') . 'Controller';

    $Controller = $container[$controller];
    $Controller->processRequest($Request);
?>