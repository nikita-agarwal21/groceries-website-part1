<?php



  class Category
  {

     private $slno;
     private $item;

     public function __construct($slno,$item)
     {

     $this->slno = $slno;
     $this->item=$item;

     }


     public function getSlno()
     {
        return $this->slno;
     }

     public function setSlno($slno)
     {
        $this->slno= $slno;
     }
     public function getName()
     {
        return $this->item;
     }

     public function setName($item)
     {
        $this->item= $item;
     }



  }



?>
