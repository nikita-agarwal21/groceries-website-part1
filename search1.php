

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Required Core stylesheet -->
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">

    <!-- Optional Theme stylesheet -->
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">


    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/87609a89cc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


        <script src="https://code.jquery.com/jquery-1.10.2.js">
              </script>
              <script>
    $(function(){
      $('#navigator').load('navigator.php');
    });
    </script>
    <script>
    $(function(){
    $('#footer').load('footer.html');
    });
    </script>
    <style>

    #image{
        padding-left:10px;
      float: left;
      margin-left: 100px;
    }
    </style>
    <title></title>
  </head>
  <body>
<br>
    <form name='groceries' method='post' action='GroceriesController.php'>


      <?php
          require_once 'GroceriesHelper.php';
          $groceriesHelper = new GroceriesHelper();

          $category = false;
$message=false;
          if ( isset($_POST['category']))
               $category = $_POST['category'];
          if ( isset($_POST['message']))
                    $message = $_POST['message'];

      ?>

    <center>  Search:
      <input type='text' size='50' name='item_name' value='<?php echo $groceriesHelper->isItemName() ; ?>' onChange='this.form.submit();'/>
    </center><br>


    <div id='navigator'></div>




             <br>




<?php
/*
if($category)
{

    $dir_path = "images/$item_name/";

      $extensions_array = array('jpg','png','jpeg');

      if(is_dir($dir_path))
      {
          $files = scandir($dir_path);

          for($i = 0; $i < count($files); $i++)
          {
              if($files[$i] !='.' && $files[$i] !='..')
             {
                  // get file name
                //  echo "File Name -> $files[$i]<br>";

                  // get file extension
                  $file = pathinfo($files[$i]);
                  $extension = $file['extension'];
                //  echo "File Extension-> $extension<br>";

                $itemDao=new ItemDaoImpl();
                $categoryDao=new CategoryDaoImpl();
                $items=$itemDao->searchItem($category->getSlno());

              //  foreach ($items as $item)
                //{
                 ////$name=$item->getName();

                 //$fileName = "../grofinl/images/".$name.".jpg";
                 if(in_array($extension, $extensions_array))
                { $fileName = "$dir_path$files[$i]";
}
               ?>




                <?php
                foreach ($items as $item)
                {
                 $name=$item->getName();
                 ?>
                 <div id='image' ><img src="<?php echo $fileName ;?>" height="140" width="160" />
                 <?php echo '<br><br> NAME : '.$name .'<br>';?>



                 Price : &#8377; <?php echo $item->getPrice().'<br>';?>

                 </div>
                <?php

              }
          }
      }

}
*/
?>


<?php

if($category)

{
  $itemDao=new ItemDaoImpl();
  $categoryDao=new CategoryDaoImpl();
  $items=$itemDao->searchItem($category->getSlno());
$filename=$item_name;
       foreach ($items as $item)
       {
        $name=$item->getName();
        $fileName = "../grofinl/images/".$filename."/".$name.".jpg";
      ?>

<div id='image' ><img src="<?php echo $fileName ;?>" height="140" width="160" />
<?php echo '<br><br> NAME : '.$name .'<br>';?>



Price : &#8377; <?php echo $item->getPrice().'<br>';?>

 </div>
 <?php
}





  }
  ?>
  <?php

if(!$category){
  $itemDao=new ItemDaoImpl();
  $categoryDao=new CategoryDaoImpl();

  $items=$itemDao->search($item_name);


  foreach ($items as $item)
  {

    $category=$categoryDao->searchCode($item->getItemCode());

  $filename=$category->getName();

   $name=$item->getName();
   $fileName = "../grofinl/images/".$filename."/".$name.".jpg";


 ?>

<div id='image' ><img src="<?php echo $fileName ;?>" height="140" width="160" />
<?php echo '<br><br> NAME : '.$name .'<br>';?>



Price : &#8377; <?php echo $item->getPrice().'<br>';?>

</div>
<?php
}





}


  ?>


<br>









</form>
</body>
</html>
