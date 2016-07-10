<?php
require 'vendor/autoload.php';

use \Pimple\Container;
$container = new Container();

$container['FindCompanyByIdQueryHandler'] = function ($container) {
    return new FindCompanyByIdQueryHandler(Database::newConnection());
};

$container['UpdateCompanyCommandHandler'] = function ($container){
    return new UpdateCompanyCommandHandler(Database::newConnection());
};

$container['CompanyView'] = function ($container){
    return new CompanyView($container['FindCompanyByIdQueryHandler']);
};

$container['CompanyController'] = function ($container){
    return new CompanyController($container['CompanyView'], $container['UpdateCompanyCommandHandler']);
};

$container['FetchAllCompaniesQueryHandler'] = function ($container){
    return new FetchAllCompaniesQueryHandler(Database::newConnection());
};

$container['HomeView'] = function ($container){
    return new HomeView();
};

$container['HomeController'] = function ($container){
    return new HomeController($container['HomeView'], $container['FetchAllCompaniesQueryHandler']);
};

$container['CreateCompanyCommandHandler'] = function ($container){
    return new CreateCompanyCommandHandler(Database::newConnection());
};

$container['APICreateController'] = function ($container){
    return new APICreateController($container['CreateCompanyCommandHandler']);
};

$container['APIDisplayController'] = function ($container){
    return new APIDisplayController($container['FindCompanyByIdQueryHandler']);
}
?>