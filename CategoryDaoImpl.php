<?php



require_once 'Category.php';
require_once 'CategoryDao.php';
require_once 'DatabaseUtilities.php';



class CategoryDaoImpl implements CategoryDao
{
    public function searchType($item_name)
    {
        $category=false;
        $connection=DatabaseUtilities::getConnection('grocerieswebsite');

        $sql="select * from categories where item like '%".$item_name."%'";
echo $sql;

        $statement=$connection->prepare($sql);
        $statement->bind_param("s",$item_name);


        if($statement->execute())
        {
            $statement->bind_result($slno,$item);

            if($statement->fetch())
            {
                $category=new Category($slno,$item);
            }
        }


    $statement->close();
    $connection->close();

    return $category;
}

public function searchCode($code)
{
    $category=false;
    $connection=DatabaseUtilities::getConnection('grocerieswebsite');

    $sql="select * from categories where slno = ".$code;
echo $sql;

    $statement=$connection->prepare($sql);
    $statement->bind_param("i",$code);


    if($statement->execute())
    {
        $statement->bind_result($slno,$item);

        if($statement->fetch())
        {
            $category=new Category($slno,$item);
        }
    }


$statement->close();
$connection->close();
echo var_dump($category);
return $category;
}




}


?>
