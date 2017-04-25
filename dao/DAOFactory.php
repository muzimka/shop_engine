<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/23/2017
 * Time: 10:25 PM
 */

namespace dao;


use util\ConnectionManager;
use util\IConnectionManager;
use util\QueryHandler;


class DAOFactory
{
    /** @var \util\IConnectionManager */
    private static $connectionManager = null;
    const DEFAULT_CONFIG_DB = ROOT_DIR.'config/db_params.json';

    private function __construct()
    {
    }


    /**
     * @param null $queryFilePath
     * @return IProductDAO
     */
    public static function getProductDAO($queryFilePath = null)
    {
        return empty($queryFilePath) ?
            new ProductDAO(self::getQueryHandler()) :
            new ProductDAO(self::getQueryHandler($queryFilePath));
    }

    /**
     * @return ProductTransferBuilder*/
    public static function buildProductTransfer(){

        return ProductTransferBuilder::initBuildingProsess();
    }

    /**
     * @return \PDO
    */
    public static function createConnection($fileConfig = self::DEFAULT_CONFIG_DB,IConnectionManager $connectionManager=null)
    {

        if(empty($connectionManager) || empty(static::$connectionManager)){
            static::$connectionManager = new ConnectionManager();
        }
        $connection = static::$connectionManager->getConnection($fileConfig);
        return $connection;
    }


    /**
     * @param $queryFilePath
     * @return QueryHandler
     */
    private static function getQueryHandler($queryFilePath = null)
    {
        return empty($queryFilePath) ?
            new QueryHandler() :
            new QueryHandler($queryFilePath);
    }
}