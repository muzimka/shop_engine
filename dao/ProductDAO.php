<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/23/2017
 * Time: 10:28 PM
 */

namespace dao;


use util\QueryHandler;

class ProductDAO implements IProductDAO
{
    private $qHandler;
    private $productTransfer;
    private $table_name = 'product_items';
    private $initialParams;

    /**
     * ProductDAO constructor.
     * @param $qHandler
     */
    public function __construct(QueryHandler $qHandler)
    {
        $this->qHandler = $qHandler;
        $this->initialParams = ['table' => $this->table_name];
    }


    function insertProduct(ProductTransfer $product)
    {
        $params = $this->prepareParams($product);
        $query = $this->qHandler->getQuery('insert', $params);
        $pr_stmnt = DAOFactory::createConnection()->prepare($query);
        $pr_stmnt->execute();
        if ('0000'!=$pr_stmnt->errorCode()) {
            return $pr_stmnt->errorInfo();
        }
        return true;
    }

    function deleteProduct(ProductTransfer $product)
    {
        $params = $this->prepareParams($product);
        $query = $this->qHandler->getQuery('delete', $params);
        $pr_stmnt = DAOFactory::createConnection()->prepare($query);
        $pr_stmnt->execute();
        if ('0000'!=$pr_stmnt->errorCode()) {
            return $pr_stmnt->errorInfo();
        }
        return true;
    }

    function getById(ProductTransfer $product)
    {
        $params = $this->prepareParams($product);
        $query = $this->qHandler->getQuery('getById', $params);
        $pr_stmnt = DAOFactory::createConnection()->query($query);
        return $pr_stmnt->fetchAll();
    }

    function getAllProducts()
    {
        $params = array_merge($this->initialParams, []);
        $query = $this->qHandler->getQuery('getById', $params);
        return [];
    }

    /**
     * @param ProductTransfer $product
     * @return array
     */
    private function prepareParams(ProductTransfer $product)
    {
        $atr_set = $product->getAtrSet();
        $properties = $product->getMeaningProperties();
        $params = array_merge($this->initialParams, $atr_set, $properties);
        return $params;
    }

}