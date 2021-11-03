<?php

     require_once 'ItemDaoImpl.php';

     require_once 'Item.php';
     require_once 'ItemDao.php';
     require_once 'CategoryDaoImpl.php';

     require_once 'Category.php';
     require_once 'CategoryDao.php';

     require_once 'DatabaseUtilities.php';

$category=false;
if(isset($_POST['item_name']))
{
    $item_name = $_POST['item_name'];

     $categoryDao = new CategoryDaoImpl();
    // $itemDao = new ItemDaoImpl();



        $category= $categoryDao->searchType($item_name);

//$item=$itemDao->search($item_name);

          $_POST['category'] = $category;

        //  $_POST['item'] = $item;


}
include 'search1.php';

     //include 'search.php';
?>
