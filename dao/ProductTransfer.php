<?php
namespace dao;

class ProductTransfer extends AbsTransfer
{

    private $id;
    private $article;
    private $title;
    private $price;
    private $prev_price;
    private $icon;
    private $record_date;
    private $type_id;
    private $brand_id;

    /**
     * Product constructor.
     * @param $id
     * @param $artticle
     * @param $title
     * @param $price
     * @param $prev_price
     * @param $icon
     * @param $record_date
     * @param $type_id
     * @param $brand_id
     */
    public function __construct($id = null,
                                $article = null,
                                $title = null,
                                $price = null,
                                $prev_price = null,
                                $icon = null,
                                $record_date = null,
                                $type_id = null,
                                $brand_id = null)
    {
        $this->id = $id;
        $this->article = $article;
        $this->title = $title;
        $this->price = $price;
        $this->prev_price = $prev_price;
        $this->icon = $icon;
        $this->record_date = $record_date;
        $this->type_id = $type_id;
        $this->brand_id = $brand_id;

    }




    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param int $prev_price
     */
    public function setPrevPrice($prev_price)
    {
        $this->prev_price = $prev_price;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param string $record_date
     */
    public function setRecordDate($record_date)
    {
        $this->record_date = $record_date;
    }

    /**
     * @param int $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    /**
     * @param int $brand_id
     */
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function getMeaningProperties()
    {
        $res = get_object_vars($this);
        $res = $this->removeWasteProperties($res);
        return $res;
    }

    public function getAtrSet(){
        $arr = $this->getMeaningProperties();
        $atr_names = array_keys($arr);
        $atr_values = array_values($arr);
        $atr_values = $this->addQuoteForStr($atr_values);
        $atr_set = [
            'atr_names' => $atr_names,
            'atr_values' => $atr_values];
        return $atr_set;
    }

    /**
     * @param $atr_values
     * @return mixed
     */
    private function addQuoteForStr($atr_values)
    {
        foreach ($atr_values as $key => $val) {
            if (is_string($val)) {
                $atr_values[$key] = "'{$val}'";
            }
        }
        return $atr_values;
    }

}

