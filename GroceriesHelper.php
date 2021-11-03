
<?php
  class GroceriesHelper
  {
    private $item_name;

    public function __construct()
    {
       if ( isset($_POST['item_name']))
       {
         $this->item_name = $_POST['item_name'];
       }

}

    public function isItemName()
    {
        if ( !$this->item_name )
            return '';

       else
       return $this->item_name;
    }






  }
?>
