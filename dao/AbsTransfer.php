<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/24/2017
 * Time: 12:07 AM
 */

namespace dao;


abstract class AbsTransfer
{

    protected function removeWasteProperties($res)
    {

        foreach ($res as $key => $value) {
            if (!isset($value)) {
                unset($res[$key]);
            }
        }
        return $res;
    }

    public abstract function getMeaningProperties();

}