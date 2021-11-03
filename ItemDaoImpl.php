<?php

require_once 'Item.php';
require_once 'ItemDao.php';
require_once 'DatabaseUtilities.php';

class ItemDaoImpl implements ItemDao
{
    public function searchItem($itemcode)
    {
        $items=array();
        $connection=DatabaseUtilities::getConnection('grocerieswebsite');

        $sql='select * from items where itemcode=?';
        $statement=$connection->prepare($sql);
        $statement->bind_param('i',$itemcode);


    if( $statement->execute())

          {

            $resultstmt=$statement->get_result();

            while ( $row=$resultstmt->fetch_assoc())
            {
              $item = new Item($row['code'],$row['name'],$row['itemcode'],$row['price']);
              $items[] = $item;
            }

          }

    $statement->close();
    $connection->close();

    return $items;
}

public function search($item_name)
{
  $items=array();
  $connection=DatabaseUtilities::getConnection('grocerieswebsite');


  $sql="select * from items where name like '%".$item_name."%'";

  $statement=$connection->prepare($sql);
  $statement->bind_param('s',$item_name);


if( $statement->execute())

    {

      $resultstmt=$statement->get_result();

      while ( $row=$resultstmt->fetch_assoc())
      {
        $item = new Item($row['code'],$row['name'],$row['itemcode'],$row['price']);
        $items[] = $item;
      }

    }

$statement->close();
$connection->close();

return $items;
}

}



?>
