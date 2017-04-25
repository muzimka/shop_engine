<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/24/2017
 * Time: 3:06 PM
 */

namespace dao;


class ProductTransferBuilder
{

    private  $product;

    /**
     * ProductTransferBuilder constructor.
     * @param ProductTransfer $product
     */
    private function __construct($product)
    {
        $this->product = $product;
    }


    /**
     * @return self
     */
    public static function initBuildingProsess()
    {
        return new ProductTransferBuilder(new ProductTransfer());
    }

    /**
     * @return $this
     */
    public  function setId($id)
    {
        $this->product->setId($id);
        return $this;
    }

    /**
     * @return $this
     * @param string $article
     * 
     */
    public function setArticle($article)
    {
        $this->product->setArticle($article);
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public  function setTitle($title)
    {
        $this->product->setTitle($title);
        return $this;
    }

    /**
     * @param int $price
     * @return $this
     */

    public  function setPrice($price)
    {
        $this->product->setPrice($price);
        return $this;
    }

    /**
     * @param int $prev_price
     * @return $this
     */
    public function setPrevPrice($prev_price)
    {
        $this->product->setPrevPrice($prev_price);
        return $this;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public  function setIcon($icon)
    {
        $this->product->setIcon($icon);
        return $this;
    }

    /**
     * @param string $record_date
     * @return $this
     */
    public  function setRecordDate($record_date)
    {
        $this->product->setRecordDate($record_date);
        return $this;
    }

    /**
     * @param int $type_id
     * @return $this
     */
    public  function setTypeId($type_id)
    {
        $this->product->setTypeId($type_id);
        return $this;
    }

    /**
     * @param int $brand_id
     * @return $this
     */
    public  function setBrandId($brand_id)
    {
        $this->product->setBrandId($brand_id);
        return $this;
    }

    /**
     * @return ProductTransfer
     */
    public function getProduct()
    {
        return $this->product;
    }




}