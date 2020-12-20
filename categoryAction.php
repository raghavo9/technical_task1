<?php require_once('includes/header.php');?>
<?php require_once('lib/cleanOperations.php');?>
<?php require_once('lib/dbOperations.php');?>
<?php require_once('includes/navigation.php');?>
<div class="row">
  <div class="column side">
  <?php require_once('includes/sidebar.php');?>
  </div>
  <div class="column middle">
   <?php
    $category = array();    
    if(isset($_POST) and $_POST){
        // action for deletion or update
        $cleanData = clean($_POST);
        //echo "<br><br>";
        //var_dump($_POST);
        //echo "<br><br>";
        //echo "this is clean dart id: ".$cleanData['id']." before this <br>";
        updateRecord('category',$cleanData['id'],$cleanData);
    }
    if(isset($_GET['action']) and $_GET['action']=='update'){
      $v2=$_SESSION["id"];
        // clean data
        // display form with existing data
        $cleanData = clean($_GET);
        if($cleanData['action']=='update'){
          
            //$category = fetchRecordSpecific('category',$cleanData['id']);
            $category = fetchRecordSpecific('category',$v2);
            //var_dump($category);
            if(empty($category)){
                $err_msg = 'No Records Found';
            }
        }
        if($cleanData['action']=='delete'){
            echo "here is is delete function to be called";
            //$response = deleteRecord('category',$cleanData['id']);
            $response = deleteRecord('category',$v2);
        }
    ?>

    <?php 
      // this is additional for delete
      if(isset($_GET['action']) and $_GET['action']=='delete')
      {
        echo "here is is delete function to be called";
        //$response = deleteRecord('category',$cleanData['id']);
        $response = deleteRecord('category',$v2);
      }
      ?>



    <div class="login">
  <fieldset>
  <legend>Update Category details</legend>
  <?php if(isset($err_msg) and $err_msg) echo '<div class="error">'.$err_msg.'</div>';?>
  <form action="categoryAction.php" method="post" class="login">
  <input type="hidden" name="id" value="<?php echo $category['id'];?>" />
  <table width="100%">
    <tr>
      <td> Name : </td>
      <td><input type="text" name="name" value="<?php echo $category['name'];?>" /></td>
    </tr>
    <tr>
      <td> Desc : </td>
      <td><input type="text" name="descp" value="<?php echo $category['descp'];?>" /></td>
    </tr>
    <tr>
      <td> Status </td>
      <td>
          <input 
                type="radio"
                name="status"
                value="A"
               <?php echo $category['status'] == 'A'? 'checked':''; ?> />Show
        <input 
                type="radio"
                name="status"
                value="I"
                <?php  echo $category['status'] == 'I'?'checked':''; ?> />Hide        
            
       
       </td>
    </tr>
    <tr>
      <td> &nbsp;</td>
      <td><input type="submit" name="sub" value=" Update "/></td>
    </tr>
  </table>   
  </form>
  </fieldset>
</div>
    <?php
        }
   ?>
  </div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>

