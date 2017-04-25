<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/24/2017
 * Time: 11:05 AM
 */

namespace util;


interface IConnectionManager
{
    public function getConnection($configFilePath);

}