<?php

define('CONFIG', __DIR__.'/../config/config.php');
include_once CONFIG;
try {
    checkConfigLoading();
} catch (Exception $e) {
    die($e->getMessage());
}
use util\Autoloader;
spl_autoload_register([new Autoloader(),'autoLoadClass']);

$dao = \dao\DAOFactory::getProductDAO();
$prod = \dao\DAOFactory::buildProductTransfer()->setId(45)->setArticle('dfdf')->setTitle('dfdf')->setPrice(2)->getProduct();
var_dump($dao->insertProduct($prod));
var_dump($dao->getById($prod));
var_dump($dao->deleteProduct($prod));



function checkConfigLoading(){
    if(!defined('CONFIG_LOADED')){
        throw new Exception('Config file not included');
    }
}