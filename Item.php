<?php

  class Item
  {

     private $code;
     private $name;
     private $itemcode;
     private $price;

     public function __construct($code, $name,$itemcode,$price)
     {

       $this->code = $code;
       $this->name = $name;
       $this->itemcode = $itemcode;
       $this->price = $price;

     }

     public function getCode()
     {
        return $this->code;
     }

     public function setCode($code)
     {
        $this->code= $code;
     }

     public function getName()
     {
        return $this->name;
     }

     public function setName($name)
     {
        $this->name = $name;
     }

     public function getItemCode()
     {
        return $this->itemcode;
     }

     public function setItemCode($itemcode)
     {
        $this->itemcode= $itemcode;
     }

     public function getPrice()
     {
        return $this->price;
     }

     public function setPrice($price)
     {
        $this->price = $price;
     }


  }



?>
