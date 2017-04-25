<?php
namespace dao;
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/23/2017
 * Time: 10:16 PM
 */

interface IProductDAO
{
    function insertProduct( ProductTransfer $obj);
    function deleteProduct( ProductTransfer $obj);
    function getById( ProductTransfer $obj);
    function getAllProducts();

}